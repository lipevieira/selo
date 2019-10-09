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
        $anexos = auth()->guard('client')->user()->institution->company_classification;
        $institution_id =  auth()->guard('client')->user()->institution_id;
        $documents = $this->document->where('institution_id', $institution_id)->get();

        return view('institution.doc.index', compact('documents', 'anexos'));
    }
    /**
     * Salvando o nome documento no DB e
     * e o Documento na pasta
     * @param Request $request
     * @return app/public/documents/anexos
     */
    public function saveDoc(Request $request)
    {
        $messages = [
            'doc_name.required' => 'O campo Documento é obrigatório',
            'description.max' => 'O campo Descrição não pode ser maior que 190 caracteres',
            // 'description.required' => 'O campo descrição é obrigatório',
        ];
        $validator = Validator::make($request->all(), [
            'doc_name' => 'required',
            'description' => 'max:190',
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
        $doc_name = $request->name;

        return response()->download(storage_path("app/public/documents/anexos/" . $doc_name));
    }
    /**
     * Baixando o modelo do Anexo 01
     *
     * @return void
     */
    public function downloandAnexoOne()
    {
        return response()->download(storage_path("app/public/models/anexo01.doc"));
    }
    /**
     * Baixando o modelo do Anexo 06
     *
     * @return void
     */
    public function downloandAnexoSix()
    {
        return response()->download(storage_path("app/public/models/anexo06.doc"));
    }
    /**
     * Baixando o modelo do Anexo 07
     * @return void
     */
    public function downloandAnexoServen()
    {
        return response()->download(storage_path("app/public/models/anexo07.doc"));
    }
}