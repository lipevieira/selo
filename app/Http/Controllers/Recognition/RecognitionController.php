<?php

namespace App\Http\Controllers\Recognition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InstitutionRecognition;
use App\Models\DocumentRecognition;
use App\Models\Institution;
use \Validator;

class RecognitionController extends Controller
{
    private $institutionRecognition;
    private $documentRecognition;
    private $institution;

    public function __construct(InstitutionRecognition $institutionRecognition, DocumentRecognition $documentRecognition,Institution $institution)
    {
        $this->institutionRecognition = $institutionRecognition;
        $this->documentRecognition = $documentRecognition;
        $this->institution = $institution;
    }
    public function save(Request $request)
    {
        $dataForm = $request->all();
        $rules = $this->institutionRecognition->rules();
        $messages = $this->institutionRecognition->messages();
        $validator = Validator::make($dataForm, $rules, $messages);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }if($this->institution->validateCnpj($dataForm['cnpj']) == false){
            return redirect()->back()->with('error' ,'CNPJ Inválido por favor corrija');
        } 
        else {
            $recognitionInstitution = $this->institutionRecognition->create($dataForm);
            $fantasyName = $recognitionInstitution->fantasy_name;

            $name = uniqid(date('HisYmd'));
            $extension = $request->doc_name->extension();
            $nameFile = "{$fantasyName}.{$name}.{$extension}";
            $upload = $request->doc_name->storeAs('recognition', $nameFile);
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload de arquivos')
                    ->withInput();
            } else {
                $recognitionInstitution->documents()->create([
                    'doc_name'  => $nameFile,
                ]);
                return redirect()
                    ->back()
                    ->with('success', 'Instituição salva com sucesso!');
            }
        }
    }
    /**
     * Listando toas as Instituições
     * que são reconhecimento
     * @return void
     */
    public function getInstitutionRecognition()
    {
        $recognition = $this->institutionRecognition->all();

        return view('home.recognition.recognition', compact('recognition'));
    }

    /**
     * Buscando o modelo de anexo 07 para 
     * as Instituições do tipo reconheicmento
     *
     * @param Document $document
     * @return void
     */
    public function downloandAnexos()
    {
        return $this->documentRecognition->downloandAnexoServen();
    }
}
