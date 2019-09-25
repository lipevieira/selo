<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Notifications\Notifiable;
use App\Models\Client;

class Institution extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'fantasy_name', 'activity_branch', 'cnpj', 'county',
        'uf', 'address', 'email', 'phone', 'technical_manager', 'formation', 'phone_two',
        'email_two', 'company_classification', 'action_plan', 'partners', 'methodology',
        'result', 'authorization', 'institution_activity'
    ];
    /**
     *Relacionamento de 1 - 1 
     *Uma isntituição tem um e único login
     *
     * @return Client
     */
    public function client()
    {
        return $this->hasOne(Client::class);
    }
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
        return $this->hasMany('App\Models\Schedule', 'institution_id', 'id');
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($id)
    {
        return [
            'name' => 'required | min:3 | max:100',
            'fantasy_name' => 'required | min:3 | max:100',
            'activity_branch' => 'required | min:3 | max:100',
            'cnpj' => 'required|max:18|unique:institutions,cnpj,' . $id,
            'county' => 'required',
            'uf' => 'required | max:2',
            'address' => 'required | min:5 | max:190',
            'email' => 'required|max:100|unique:institutions,email,' . $id,
            'phone' => 'required | min:4 | max:20',
            'technical_manager' => 'required | min:3 | max:130',
            'formation' => 'required | min:3 | max:80',
            'phone_two' => 'required | min:4 | max:20',
            'institution_activity' => 'required',
            'company_classification' => 'required  | max:100',
            // 'cnpj_additional.*' => 'distinct',
        ];
    }
    /**
     * Messagem de error para request
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatorio',
            'fantasy_name.required' => 'O campo nome fantasia  é obrigatorio',
            'activity_branch.required' => 'O campo nivel de atividade  é obrigatorio',
            'cnpj.required' => 'O campo CNPJ é obrigatorio',
            'cnpj.unique' => 'Esse CNPJ já foi cadastrado',
            'county.required' => 'O campo Municipio é obrigatorio',
            'uf.required' => 'O campo Estado é obrigatorio',
            'address.required' => 'O campo Endeço é obrigatorio',
            'address.max' => 'O campo não pode ser maior que 190 caracteres',
            'email.required' => 'O campo E-mail é obrigatório',
            'email.unique' => 'Esse E-mail já foi cadastrado',
            'phone.required' => 'O campo Telefone é obrigatório',
            'phone.min' => 'O campo Telefone não pode ser menor que 3 caracteres',
            'technical_manager.required' => 'O campo Responsável técnico é obrigatório',
            'formation.required' => 'O campo Formação é obrigatório',
            'phone_two.required' => 'O campo Telefone é obrigatório',
            'institution_activity.required' => 'O campo Ramo de atividade é obrigatório',
            'company_classification.required' => 'O campo Classificação da Empresa é obrigatório',
            // 'cnpj_additional.*.distinct' => 'O CNPJ adicional não pode ser repetido'
        ];
    }
    /**
     * Validação do plano de trabaçho da instituição
     *
     * @return Array
     */
    public function rulesPlainAction()
    {
        return [
            'action_plan' => 'required | min:10 | max:3000',
        ];
    }
    /**
     * Messagens de error para etapa 2 do formulario
     *
     * @return Array
     */
    public function messagesPlainAction()
    {
        return [
            'action_plan.required' => 'O campo Plano de ação é obrigátorio',
            'action_plan.max' => 'O campo Plano de ação  não pode ultrapassar 3000 caracteres',
            'action_plan.min' => 'O campo Plano de ação  não pode ser menor que 10 caracteres',
        ];
    }
    /**
     * Validação de error para a etapa 3 do formulario 
     *
     * @return Array
     */
    public function rulesPartners()
    {
        return [
            'partners' => 'required | min:10|max:2000',
        ];
    }
    /**
     *  Messagens de error para etapa 3 do formulario
     *
     * @return Array
     */
    public function messagesPartners()
    {
        return [
            'partners.required' => 'O campo Parceiras não pode ser vazio',
            'partners.max' => 'O campo Parceiras pode ultrapassar 2000 caracteres',
            'partners.min' => 'O campo Parceiras pode ser menor que 10 caracteres',
        ];
    }
    /**
     * Validação de error para a etapa 4 do formulario 
     *
     * @return Array
     */
    public function rulesResult()
    {
        return [
            'result' => 'required | min:10',
        ];
    }
    /**
     *  Messagens de error para etapa 4 do formulario
     *
     * @return Array
     */
    public function messageResul()
    {
        return [
            'result.required' => 'O campo Resultado é obrigátorio',
            'result.max' => 'O campo Resultado não pode ultrapassar 3000 caracteres',
            'result.min' => 'O campo Resultado não  pode ser menor que 10 caracteres',
            'email.unique' => 'Esse E-mail já está cadastrado',
        ];
    }
}
