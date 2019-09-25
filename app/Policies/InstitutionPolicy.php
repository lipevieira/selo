<?php

namespace App\Policies;

use App\Models\Schedule;
use App\Models\Client;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstitutionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function updateInstitution( Schedule $schedule, Client $client)
    {
        // TO-DE: Fazer Permissão para acessar cronograma de quem está logado
        // return $schedule->institution->id == $client->institution->id;
    }
}
