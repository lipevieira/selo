<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\CollaboratorActivityLevel;
use App\Models\CommissionMembers;
use App\Models\Schedule;
use App\Models\Question;
use App\Models\InstitutionRecognition;
use App\Models\ScheduleAction;
use App\Models\Document;
use App\Models\DocumentRecognition;
use Illuminate\Support\Facades\DB;
use App\Models\CompanyClassification;
use App\Models\DateOpenSystemClose;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Boolean;

class HomeController extends Controller
{
    private $institution;
    private $collaboratorActivitylevel;
    private $profileCollaborator;
    private $commissionMembers;
    private $schedule;
    private $companyClassification;
    private $institutionRecognition;
    private $dateOpenSystemClose;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Institution $institution,
        CollaboratorActivityLevel $collaboratorActivitylevel,
        CommissionMembers $commissionMembers,
        Schedule $schedule,
        CompanyClassification $companyClassification,
        InstitutionRecognition $institutionRecognition,
        DateOpenSystemClose    $dateOpenSystemClose
    ) {
        $this->institution = $institution;
        $this->collaboratorActivitylevel = $collaboratorActivitylevel;
        $this->commissionMembers = $commissionMembers;
        $this->schedule = $schedule;
        $this->companyClassification = $companyClassification;
        $this->institutionRecognition = $institutionRecognition;
        $this->dateOpenSystemClose = $dateOpenSystemClose;
    }
    /**
     * Mostrar a tela home.
     *
     * @return Institution
     */
    public function index()
    {
        $instituions = $this->institution->all();
        $dates = $this->dateOpenSystemClose->find(1);
        

        return view('home.home', compact('instituions', 'dates'));
    }
    /**
     * Undocumented function
     * @Description:  Nivel de atividade dos colaboradores:
     * @return CollaboratorActivityLevel
     */
    public function getActivitLevelCollaborator()
    {
        $collaboratorActivitylevels = $this->collaboratorActivitylevel->all();
        return view('home.activityLevelCollaborator', compact('collaboratorActivitylevels'));
    }

    /**
     * Listando e agrupando a quantidade total de pessoas 
     * negras e não negras de todas as empresas
     *
     * @return CollaboratorActivityLevel
     */
    public function getProfileCollaborator()
    {
        $profileCollaborator = $this->collaboratorActivitylevel->getProfileCollaborator();

        return view('home.profile_collaborator', compact('profileCollaborator'));
    }
    /**
     * Undocumented function
     *@description: Listando os membros da comissão
     * @return MembrersComiission
     */
    public function getCommissionMembers()
    {
        $membrers = $this->commissionMembers->all();

        return view('home.commission_members', compact('membrers'));
    }
    /**
     * Undocumented function
     *@description: Listando o Cronograma das Instituições
     * @return MembrersComiission
     */
    public function getSchedules()
    {
        $schedules = $this->schedule->all();
        return view('home.schedules', compact('schedules'));
    }
    public function getInstituitionDetails($id)
    {
        $actions = ScheduleAction::all();
        $questionAlternatives = Question::with('alternatives')->get();
        $instituion = $this->institution->find($id);
        $profile = $this->collaboratorActivitylevel->getProfileCollaboratorDetail($id);
        $companyClassifications = $this->companyClassification->all();

        $now = new Carbon('next year');
        $yearNow = $now->year;

        return view('home.show_institution', compact('questionAlternatives', 'actions', 'instituion', 'companyClassifications', 'profile','yearNow'));
    }
    /**
     * Baixando ducumentos da isntituição
     * @return $Request
     * @return arquivo
     */
    public function show(Request $request)
    {
        $doc_name = $request->name;

        return response()->download(storage_path("app/public/documents/anexos/" . $doc_name));
    }
    /**
     * Listando todas as Instituições
     * que são reconhecimento
     * @return void
     */
    public function getInstitutionRecognition()
    {
        $dates = $this->dateOpenSystemClose->find(1);

        $recognition = $this->institutionRecognition->all();

        return view('home.recognition.recognition', compact('recognition','dates'));
    }
    /**
     * Listando todas as Informações da Instituição
     * Com seus documentos
     *
     * @param [interger] $id
     * @return void
     */
    public function getShowInstitutionRecognition($id)
    {
        $recognition = $this->institutionRecognition->find($id);
        $companyClassifications = $this->companyClassification->all();

        return view('home.recognition.recognition-detalhes', compact('recognition', 'companyClassifications'));
    }
    public function showDocumentRecongnition(Request $request)
    {
        $doc_name = $request->doc_name;

        return response()->download(storage_path("app/public/recognition/" . $doc_name));
    }
    /**
     * Atualizando as Datas de abertura e encerramento
     *
     * @param Request $request
     * @return void
     */
    public function updateDatesOpenCloseSystem(Request $request)
    {
        $dataForm = $request->all();
        $message = [
            'date_open.required' => 'O campo Data de abertura é obrigatorio',
            'date_close.required' => 'O campo Data de encerramento é obrigatorio',
            'date_close.after' => 'O campo Data de Abertura não pode ser maior que o Campo de Encerramento',
        ];
        $validator = Validator::make($dataForm, [
            'date_open' => 'required|date',
            'date_close' => 'required|date',
            'date_close' => 'required|date|after:date_open'
        ], $message);

        if ($validator->fails())
            return redirect()
                ->route('home')
                ->withErrors($validator)
                ->withInput();
        else
            $update =  $this->dateOpenSystemClose->find(1);
        $update->update($dataForm);

        if ($update)
            return \redirect()->route('home')->with('success', ' Data Atualizada com sucesso!');
        else
            return \redirect()->back()->with('error', 'Ocorreu um erro ao atualizar as Datas, tente novamente.');
    }
    public function updatAnexos(Request $request)
    {
        if ($request->hasFile('document') && $request->file('document')->isValid())
            $name = $request->doc_name;
            $nameFile = "{$name}";
            Storage::delete("models/{$nameFile}");
            $upload = $request->document->storeAs('models', $nameFile);

        if (!$upload)
            return redirect()
                ->back()
                ->with('error', 'Falha ao fazer upload de arquivos')
                ->withInput();
        else
            return \redirect()->route('home')->with('success', 'Anexo Atualizado com sucesso');
    }
   /**
     *@param Type var Request
     * Descricption - Deletando um documento
     * da instituição compromisso
     * 
     */
    public function delete($id)
    {
        $document = Document::find($id);
        $name = $document->doc_name;
        $document->delete();
            
        $check = Storage::delete("documents/anexos/{$name}"); // true ou false

        if($check && $document)
            return redirect()->back()
                             ->with('success', 'Documento deletado com Sucesso')
                             ->withInput();
        else
            return redirect()->back()
                             ->with('error', 'Aconteçeu um error ao deletar o Documento!')
                             ->withInput();
    }
    public function deleteActionSchedule($id)
    {
        $actionSchedule = $this->schedule->find($id);
        
        $actionSchedule->delete();

        if($actionSchedule)
             return redirect()->back()
            ->with('success', 'Ação deletada com Sucesso')
            ->withInput();
        else
            return redirect()->back()
                             ->with('error', 'Aconteçeu um error ao deletar a Ação do cronograma!')
                             ->withInput();
    }
    /**
     *@param Type var Request
     * Descricption - Deletando um documento
     * da instituição reconhecimento
     * 
     */
    public function deleteDocumentionRecognition($id)
    {
        $document =  DocumentRecognition::find($id);
        $name = $document->doc_name;
        $document->delete();
            
        $check = Storage::delete("recognition/{$name}"); 

        if($check && $document)
            return redirect()->back()
                             ->with('success', 'Documento deletado com Sucesso')
                             ->withInput();
        else
            return redirect()->back()
                             ->with('error', 'Aconteçeu um error ao deletar o Documento!')
                             ->withInput();
    }
    /**
     * @param Type var Request
     * @Descricption - Recuperando id da Instituição reconhecimento 
     * @InstitutionRecognition
     */
    public function findIdInstitutionRegnition(Request $request)
    {
        $recognition = $this->institutionRecognition->find($request->id);

        return response()->json($recognition);
    }
    public function delelteInstitutionRecognition(Request $request)
    {
        $id = $request->id;
        $delete = $this->institutionRecognition->find($id)->delete();
        if($delete)
            return redirect()->back()
                             ->with('success', 'Instituição deletada com Sucesso!')
                             ->withInput();
        else
            return redirect()->back()
                             ->with('error', 'Aconteçeu um error ao deletar essa Instituição!')
                             ->withInput();

    }
    /**
    * @param Type var Request
    * @Descricption - Recuperando id da Instituição compromisso 
    * @InstitutionRecognition
    */
    public function findIdInstitutionCommitment(Request $request)
    {
        $Commitment = $this->institution->find($request->id);

        return response()->json($Commitment);
    }
    /**
     * @description Deletando uma instituição compromisso
     * juntamente com todo o seu plano de trabalho
     * @param int
     * @return Boolean
     */
    public function deleteInstitutionCommitment(Request $request)
    {
        $id = $request->id;
        $delete = $this->institution->find($id)->delete();
        
        if($delete)
            return redirect()->back()
                             ->with('success', 'Instituição deletada com Sucesso!')
                             ->withInput();
        else
            return redirect()->back()
                             ->with('error', 'Aconteçeu um error ao deletar essa Instituição!')
                             ->withInput();
    }
    
}
