<?php

namespace App\Http\Controllers\Recognition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InstitutionRecognition;
use App\Models\DocumentRecognition;
use App\Models\CompanyClassification;
use App\Models\Institution;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use \Validator;

class RecognitionController extends Controller
{
    private $institutionRecognition;
    private $documentRecognition;
    private $institution;

    public function __construct(InstitutionRecognition $institutionRecognition, DocumentRecognition $documentRecognition, Institution $institution)
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
        }
        if ($this->institution->validateCnpj($dataForm['cnpj']) == false) {
            return redirect()->back()->with('error', 'CNPJ Inválido por favor corrija');
        } else {
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
                $this->notifiableEmailRegisterInstitution($recognitionInstitution);

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
        return view('home.recognition.recognition', compact('recognition','dates'));
    }

    /**
     * Buscando o modelo de anexo 07 para 
     * as Instituições do tipo reconheicmento
     *
     * @param null 
     * @return void
     */
    public function downloandAnexos()
    {
        return $this->documentRecognition->downloandAnexoServen();
    }
    /**
     * chamando a tela de atualização para as 
     * instituições que são reconhecimento
     *
     * @return void
     */
    public function show(Request $request)
    {
        if ($request->cnpj != null) {
            $companyClassifications = CompanyClassification::all();
            $institution = $this->institutionRecognition->where('cnpj', $request->cnpj)->first();
        } else {
            $institution  = null;
        }
        return view('institution.update.recognition.recognition-update', \compact('institution', 'companyClassifications'));
    }
    /**
     * Atulizando uma Instituição reconhecimento
     * e arquiviando seus documento.
     *
     * @param Request $request
     * @return Boolean
     */
    public function update(Request $request)
    {
        $dataForm = $request->all();
        $institution = $this->institutionRecognition->find($dataForm['id']);
        $institution->update($dataForm);
        $fantasyName = $institution->fantasy_name;

        if ($request->hasFile('doc_name') && $request->file('doc_name')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->doc_name->extension();
            $nameFile = "{$fantasyName}.{$name}.{$extension}";
            $upload = $request->doc_name->storeAs('recognition', $nameFile);

            $institution->documents()->create([
                'doc_name'  =>  $nameFile,
            ]);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload de arquivos')
                    ->withInput();
            }
        }
        if ($institution)
            return \redirect()->back()
                ->with('success', 'Informações atualizadas com sucesso!')
                ->withInput();
        else
            return \redirect()->back()
                ->with('erro', 'Ocorreu um erro ao atualizar as informações!')
                ->withInput();
    }
    /**
     * @description- Enviar uma notificação por E-mail
     * Após uma instituição se cadastrar.
     * @param array
     * @return void
     */
    private function notifiableEmailRegisterInstitution($institution = array())
    {
        Mail::send('email.register',compact('institution'),function($message){
            $adresses = "testepi2018.1@gmail.com";
            $message->to($adresses);
            $message->subject('Novo cadastro no selo da diversidade!');
        });
    }
    
}
