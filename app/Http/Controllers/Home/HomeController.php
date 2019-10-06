<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\CollaboratorActivityLevel;
use App\Models\CommissionMembers;
use App\Models\Schedule;
use App\Models\Question;
use App\Models\ScheduleAction;
use Illuminate\Support\Facades\DB;
use App\Models\CompanyClassification;


class HomeController extends Controller
{
    private $institution;
    private $collaboratorActivitylevel;
    private $profileCollaborator;
    private $commissionMembers;
    private $schedule;
    private $companyClassification;
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
        CompanyClassification $companyClassification
    ) {
        $this->institution = $institution;
        $this->collaboratorActivitylevel = $collaboratorActivitylevel;
        $this->commissionMembers = $commissionMembers;
        $this->schedule = $schedule;
        $this->companyClassification = $companyClassification;
    }
    /**
     * Mostrar a tela home.
     *
     * @return Institution
     */
    public function index()
    {
        $instituions = $this->institution->all();

        return view('home.home', compact('instituions'));
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
        // Buscando o Diagnostico censitário
        $actions = ScheduleAction::all();
        $questionAlternatives = Question::with('alternatives')->get();
        $instituion = $this->institution->find($id);
        $profile = $this->collaboratorActivitylevel->getProfileCollaboratorDetail($id);
        $companyClassifications = $this->companyClassification->all();

        return view('home.show_institution', compact('questionAlternatives', 'actions', 'instituion', 'companyClassifications', 'profile'));
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
    /***
     * @return Page Inex-user
     *
     */
    public function getIndexUser()
    {
        return view('auth.index');
    }
    public function getUserCad()
    {
        return view('auth.register');
    }
}
