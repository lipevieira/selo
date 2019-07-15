<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Console\Scheduling\Schedule;

class Institution extends Model
{
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
        return $this->hasMany(Schedule::class);
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
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
