<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Document;

class DocumentController extends Controller
{
    private $document;
    public function __construct(Document $document)
    {
        $this->document = $document;
    }
    public function index()
    {
        // TO-DE fazer: Join para pegar a classificação da empresa
        $institution_id =  auth()->guard('client')->user()->institution_id;
        $documents = $this->document->where('institution_id', $institution_id)->get();

        return view('institution.doc.index', compact('documents'));
    }
    public function saveDoc(Request $request)
    {
        $messages = [
            'doc_name.required' => 'O campo Documento é obrigatório',
            'description.required' => 'O campo descrição é obrigatório',
        ];
        $validator = Validator::make($request->all(), [
            'doc_name' => 'required',
            'description' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return redirect()
                ->route('doc.index')
                ->withErrors($validator)
                ->withInput();
        } else {
            # Define um nome aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
            # Recupera a extensão do arquivo
            $extension = $request->doc_name->extension();
            # Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
            # Faz o upload para uma pasta chamdas de documents:
            $upload = $request->doc_name->storeAs('documents/anexos', $nameFile);
            # Verifica se NÃO deu certo o upload (Redireciona de volta)
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload de arquivos')
                    ->withInput();
            } else {
                # Salvando registro no banco de dados.
                $this->document->doc_name = $nameFile;
                // $documento->caminho = url('storage/arquivos/'.$nameFile);
                $this->document->description = $request->description;
                $this->document->institution_id = auth()->guard('client')->user()->institution_id;
                $this->document->save();
                return redirect()
                    ->route('doc.index')
                    ->with('success', 'Documento salvo com sucesso!');
            }
        }
    }
    public function show(Request $request)
    {
        // TO-DE fazer: downloand do arquivo
        $doc_name = $request->doc_name;
        // $doc_name = '212225201910035d9690c180f1d.pdf';

        // dd($doc_name);
        // return response()->download(storage_path("app/public/storage/documents/anexos/".$doc_name));
        return Storage::download("app/public/storage/documents/anexos/".$doc_name);
    }
}