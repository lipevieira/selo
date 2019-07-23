<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
