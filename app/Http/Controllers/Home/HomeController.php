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

class HomeController extends Controller
{
    private $institution;
    private $collaboratorActivitylevel;
    private $profileCollaborator;
    private $commissionMembers;
    private $schedule;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Institution $institution,
        CollaboratorActivityLevel $collaboratorActivitylevel,
        CommissionMembers $commissionMembers,
        Schedule $schedule
    ) {
        $this->institution = $institution;
        $this->collaboratorActivitylevel = $collaboratorActivitylevel;
        $this->commissionMembers = $commissionMembers;
        $this->schedule = $schedule;
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
    public function getProfileCollaborator()
    {
        $collaboratorActivitylevels = $this->collaboratorActivitylevel->all();
        return view('home.profile_collaborator', compact('collaboratorActivitylevels'));
    }

    /**
     * Listando e agrupando a quantidade total de pessoas 
     * negras e não negras de todas as empresas
     *
     * @return CollaboratorActivityLevel
     */
    public function getActivitLevelCollaborator()
    {
        $activitLevelCollabator = DB::table('institutions')
            ->join('collaborator_activity_levels', 'institutions.id', '=', 'collaborator_activity_levels.institution_id')
            ->selectRaw('collaborator_activity_levels.color, institutions.name,
              sum(collaborator_activity_levels.human_quantity_activity_level)  as max_human,
               sum(collaborator_activity_levels.woman_quantity_activity_level) as max_woman')
            ->groupBy('collaborator_activity_levels.color', 'institutions.name')
            ->get();
            
            return view('home.activityLevelCollaborator' , compact('activitLevelCollabator'));
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
        // $schedules = $this->schedule->with('schedule')->first();

        $schedules = $this->schedule->all();
        // dd($schedules);
        return view('home.schedules', compact('schedules'));
    }
    public function getInstituitionDetails($id)
    {
        // Buscando o Diagnostico censitário
        $actions = ScheduleAction::all();
        $questionAlternatives = Question::with('alternatives')->get();
        // Buscando Instituição e sues derivados.
        $instituion = $this->institution->find($id);

        return view('home.show_institution', compact('questionAlternatives', 'actions', 'instituion'));
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
