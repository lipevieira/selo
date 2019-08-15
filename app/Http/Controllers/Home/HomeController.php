<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\CollaboratorActivityLevel;
use App\Models\ProfileCollaborator;
use App\Models\CommissionMembers;
use App\Models\Schedule;

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
    public function __construct(Institution $institution, CollaboratorActivityLevel $collaboratorActivitylevel,
            ProfileCollaborator $profileCollaborator, CommissionMembers $commissionMembers,Schedule $schedule)
    {
        $this->institution = $institution;
        $this->collaboratorActivitylevel = $collaboratorActivitylevel;
        $this->profileCollaborator = $profileCollaborator;
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

        return view('home.home',compact('instituions') );
    }
    /**
     * Undocumented function
     * @Description:  Nivel de atividade dos colaboradores:
     * @return CollaboratorActivityLevel
     */
    public function getProfileCollaborator()
    {
        $collaboratorActivitylevels = $this->collaboratorActivitylevel->all();

        $profileCollaborators = $this->profileCollaborator->all();
       
        return view('home.profile_collaborator', compact('collaboratorActivitylevels', 'profileCollaborators'));
    }
    /**
     * Undocumented function
     *@description: Listando os membros da comissão
     * @return MembrersComiission
     */
    public function getCommissionMembers()
    {
        $membrers = $this->commissionMembers->all();

        return view('home.commission_members',compact('membrers'));
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
   
}
