<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileCollaborator extends Model
{
    protected $fillable = ['profile_color', 'human_quantity', 'woman_quantity', 'institution_id'];
    /**
     * Descrioption: Volta do relacionameto
     * Muitos Menbro da comissão pertercem a uma Instituição
     * @return Institution
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
