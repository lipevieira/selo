<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\CollaboratorActivityLevel;
use App\Models\ProfileCollaborator;

class HomeController extends Controller
{
    private $institution;
    private $collaboratorActivitylevel;
    private $profileCollaborator;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Institution $institution, CollaboratorActivityLevel $collaboratorActivitylevel, ProfileCollaborator $profileCollaborator)
    {
        $this->institution = $institution;
        $this->collaboratorActivitylevel = $collaboratorActivitylevel;
        $this->profileCollaborator = $profileCollaborator;
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
    public function profileCollaborator()
    {
        return view('home.profile_collaborator');
    }
    // TO-DE FAZER LISTAGEM DE COLABORADORES...
    public function getCollaboratorActivitylevel()
    {
        // $collaboratorActivity = $this->collaboratorActivitylevel->all();

        return view('home.profile_collaborator');
    }
}
