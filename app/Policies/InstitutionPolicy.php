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
    /**
     *Politica de acesso para visualização do cronograma da instituição logada
     *
     * @param Client $client
     * @param Schedule $schedule
     * @return void
     */
    public function updateInstitution(Client $client, Schedule $schedule)
    {
        return  $client->institution->id   ==  $schedule->institution_id;
    }
}
