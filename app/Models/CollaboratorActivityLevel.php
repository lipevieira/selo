<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CollaboratorActivityLevel extends Model
{
    protected $fillable = ['color', 'human_quantity_activity_level', 'woman_quantity_activity_level', 'activity_level', 'institution_id'];

    /**
     * Descrioption: Volta do relacionameto
     * Muitos CollaboratorActivityLevel pertercem a uma Instituição
     * @return Institution
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
    /**
     * Listando o perfil de todos os colaboradores
     *
     * @return Array
     */
    public function getProfileCollaborator()
    {
        return DB::table('institutions')
            ->join('collaborator_activity_levels', 'institutions.id', '=', 'collaborator_activity_levels.institution_id')
            ->selectRaw('collaborator_activity_levels.color, institutions.fantasy_name,
              sum(collaborator_activity_levels.human_quantity_activity_level)  as max_human,
               sum(collaborator_activity_levels.woman_quantity_activity_level) as max_woman')
            ->groupBy('collaborator_activity_levels.color', 'institutions.fantasy_name')
            ->get();
    }
    public function getProfileCollaboratorDetail($id)
    {
        return DB::table('institutions')
            ->join('collaborator_activity_levels', 'institutions.id', '=', 'collaborator_activity_levels.institution_id')
            ->selectRaw('collaborator_activity_levels.color, institutions.fantasy_name,
              sum(collaborator_activity_levels.human_quantity_activity_level)  as max_human,
               sum(collaborator_activity_levels.woman_quantity_activity_level) as max_woman')
            ->groupBy('collaborator_activity_levels.color', 'institutions.fantasy_name')
            ->where('institution_id',$id)
            ->get();
    }
}
