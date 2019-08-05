<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Console\Scheduling\Schedule;

class Institution extends Model
{
    protected $fillable = ['name', 'fantasy_name', 'activity_branch', 'cnpj', 'county',
        'uf', 'address', 'email', 'phone', 'technical_manager', 'formation', 'phone_two',
        'email_two', 'company_classification', 'action_plan', 'partners', 'methodology',
        'result','authorization', 'institution_activity'
    ];
    /**
     * @description:  Uma instuição tem muitas filiais
     * Relacionameto 1 - N
     * @return Branch
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
    /**
     * @description: Uma Uma instuição tem muitos cronogramas
     * Relacionameto 1 - N
     * @return Schedule
     */
    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule','institution_id', 'id');
    }
    /**
     * @description: Uma Uma instuição tem muitos Menbros de comiisão
     * Relacionameto 1 - N
     * @return CommissionMembers
     */
    public function commissionMembers()
    {
        return $this->hasMany(CommissionMembers::class);
    }
    /**
     * @description: Uma Uma instuição tem muitos Menbros de comiisão
     * Relacionameto 1 - N
     * @return ProfileCollaborator
     */
    public function profileCollaborators()
    {
        return $this->hasMany(ProfileCollaborator::class);
    }
    /**
     * @description: Uma Uma instuição tem muitos Respotas
     * Relacionameto 1 - N
     * @return ProfileCollaborator
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    /***
     * @description: Uma instuição tem muitos CollaboratorActivityLevel 
     * Relacionamento 1 - N
     */
    public function collaboratorActivityLevels()
    {
        return $this->hasMany(CollaboratorActivityLevel::class);
    }
}
