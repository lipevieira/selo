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
    public  function validateCnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{
            12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{
            13} == ($resto < 2 ? 0 : 11 - $resto);
    }
}
