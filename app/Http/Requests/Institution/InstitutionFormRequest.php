<?php

namespace App\Http\Requests\Institution;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required | min:3 | max:100',
            'fantasy_name' => 'required | min:3 | max:100',
            'activity_branch' => 'required | min:3 | max:100',
            'cnpj' => 'required|unique:institutions|max:18',
            'county' => 'required',
            'uf' => 'required | max:2',
            'address' => 'required | min:5 | max:190',
            'email' => 'required|unique:institutions|max:100',
            'phone' => 'required | min:4 | max:20',
            'technical_manager' => 'required | min:3 | max:130',
            'formation' => 'required | min:3 | max:80',
            'phone_two' => 'required | min:4 | max:20',
            'institution_activity' => 'required',
            'company_classification' => 'required  | exists:company_classifications,id',
            'cnpj_additional.*' => 'distinct',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatorio',
            'fantasy_name.required' => 'O campo nome fantasia  é obrigatorio',
            'activity_branch.required' => 'O campo nivel de atividade  é obrigatorio',
            'cnpj.required' => 'O campo CNPJ é obrigatorio',
            'county.required' => 'O campo Municipio é obrigatorio',
            'uf.required' => 'O campo Estado é obrigatorio',
            'address.required' => 'O campo Endeço é obrigatorio',
            'address.max' => 'O campo não pode ser maior que 190 caracteres',
            'email.required' => 'O campo E-mail é obrigatório',
            'email.unique' => 'O E-mail informado para a instituição, já foi cadastrado ',
            'phone.required' => 'O campo Telefone é obrigatório',
            'phone.min' => 'O campo Telefone não pode ser menor que 3 caracteres',
            'technical_manager.required' => 'O campo Responsável técnico é obrigatório',
            'formation.required' => 'O campo Formação é obrigatório',
            'phone_two.required' => 'O campo Telefone é obrigatório',
            'institution_activity.required' => 'O campo Ramo de atividade é obrigatório',
            'company_classification.required' => 'O campo Classificação da Empresa é obrigatório',
            'company_classification.exists' => 'O valor selecionado para o campo Classificação da Empresa é inválido.',
            'cnpj_additional.*.distinct' => 'O CNPJ adicional não pode ser repetido'
        ];
    }
    public function rulesMembers()
    {
        return [
            'members_name.*'  => 'required | min:4 | max:100',
            'members_email.*' => 'required|max:150 | distinct',
            'members_email' => 'unique:commission_members',
            'members_function.*' => 'required | max:60',
            'members_phone.*' => 'required | min:4 | max:20',
        ];
    }
    public function messageMembers()
    {
        return [
            'members_name.0.required' => 'É obrigatório informa o nome do primeiro  membros da comissão',
            'members_name.1.required' => 'É obrigatório informa o nome do segundo membros da comissão',
            'members_name.2.required' => 'É obrigatório informa o nome do terceiro  membros da comissão',
            'members_email.0.required' => 'É obrigatório informa o E-mail do primeiro membros da comissão',
            'members_email.1.required' => 'É obrigatório informa o E-mail do segundo membros da comissão',
            'members_email.2.required' => 'É obrigatório informa o E-mail do terceiro  membros da comissão',
            'members_email.unique' => 'O E-mail do Membros da comissão já esta cadastrando. Por favor informe um e-mail diferente',
            'members_function.0.required' => 'É obrigatório informa a Função/Setor do primeiro  membros da comissão',
            'members_function.1.required' => 'É obrigatório informa a Função/Setor segundo membros da comissão',
            'members_function.2.required' => 'É obrigatório informa a Função/Setor do terceiro  membros da comissão',
            'members_phone.0.required' => 'É obrigatório informa o Telefone do primeiro  membros da comissão',
            'members_phone.1.required' => 'É obrigatório informa o Telefone do segundo membros da comissão',
            'members_phone.2.required' => 'É obrigatório informa o Telefone o nome do terceiro  membros da comissão',
            'members_email.*.distinct' => 'Os e-mails dos membros  membros da comissão devem ser todos diferentes',

        ];
    }
    public function rulesDiagnosticoCencitario()
    {
        return [
            'alternative_id.*' => 'required',
        ];
    }
    public function messagesDiagnosticoCencitario()
    {
        return [
            'alternative_id.0.required' => 'É obrigatório responder a questões 01 do diagnóstico censitário',
            'alternative_id.1.required' => 'É obrigatório responder a questões 02 questões do diagnóstico censitário',
            'alternative_id.2.required' => 'É obrigatório responder a questões 03 questões do diagnóstico censitário',
            'alternative_id.3.required' => 'É obrigatório responder a questões 04 do diagnóstico censitário',
            'alternative_id.4.required' => 'É obrigatório responder a questões 05 do diagnóstico censitário',
            'alternative_id.5.required' => 'É obrigatório responder a questões 06 do diagnóstico censitário',
            'alternative_id.6.required' => 'É obrigatório responder a questões 07 questões do diagnóstico censitário',
            'alternative_id.7.required' => 'É obrigatório responder a questões 08 questões do diagnóstico censitário',
            'alternative_id.8.required' => 'É obrigatório responder a questões 09 questões do diagnóstico censitário',
            'alternative_id.9.required' => 'É obrigatório responder a questões 10 questões do diagnóstico censitário',
        ];
    }
    public function rulesPlainAction()
    {
        return [
            'action_plan' => 'required | min:10 | max:3000',
        ];
    }
    public function messagesPlainAction()
    {
        return [
            'action_plan.required' => 'O campo Plano de ação é obrigátorio',
            'action_plan.max' => 'O campo Plano de ação  não pode ultrapassar 3000 caracteres',
            'action_plan.min' => 'O campo Plano de ação  não pode ser menor que 10 caracteres',
        ];
    }
    public function rulesSchedule()
    {
        return [
            'schedule_action_id.*' => 'required',
            'activity.*' => 'required',
            'amount.*' => 'required',
            'deadline.*' => 'required|date',
        ];
    }
    public function messagesSchedule()
    {
        return [
            'schedule_action_id.*.required' => 'O campo Ação obrigatório',
            'activity.*.required' => 'O campo Atividade obrigatório',
            'amount.*.required' => 'O campo Quantidade obrigatório ',
            'deadline.*.required' => 'O campo Data Limite obrigatório',
        ];
    }


    public function rulesPartners()
    {
        return [
            'partners' => 'required | min:10|max:2000',
        ];
    }
    public function messagesPartners()
    {
        return [
            'partners.required' => 'O campo Parceiras não pode ser vazio',
            'partners.max' => 'O campo Parceiras pode ultrapassar 2000 caracteres',
            'partners.min' => 'O campo Parceiras pode ser menor que 10 caracteres',
        ];
    }
    public function rulesMethodology()
    {
        return [
            'methodology' => 'max:7000',
        ];
    }
    public function messageMethodology()
    {
        return [
            'methodology.max' => 'O campo Metodologia não pode ultrapassar 7000 caracteres',
        ];
    }
    public function rulesResult()
    {
        return [
            'result' => 'required | min:10',
        ];
    }
    public function messageResul()
    {
        return [
            'result.required' => 'O campo Resultado é obrigátorio',
            'result.max' => 'O campo Resultado não pode ultrapassar 3000 caracteres',
            'result.min' => 'O campo Resultado não  pode ser menor que 10 caracteres',
        ];
    }
}
