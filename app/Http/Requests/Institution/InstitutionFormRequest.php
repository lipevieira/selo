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
            'cnpj' => 'required | max:18',
            'county' => 'required',
            'uf' => 'required | max:2',
            'address' => 'required | min:5 | max:190',
            'email' => 'required|unique:institutions,id|max:100',
            'phone' => 'required | min:4 | max:20',
            'technical_manager' => 'required | min:3 | max:130',
            'formation' => 'required | min:3 | max:80',
            'phone_two' => 'required | min:4 | max:20',
            'institution_activity' => 'required',
            'company_classification' => 'required  | max:100',
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
            'phone.required' => 'O campo Telefone é obrigatório',
            'phone.min' => 'O campo Telefone não pode ser menor que 3 caracteres',
            'technical_manager.required' => 'O campo Responsável técnico é obrigatório',
            'formation.required' => 'O campo Formação é obrigatório',
            'phone_two.required' => 'O campo Telefone é obrigatório',
            'institution_activity.required' => 'O campo Ramo de atividade é obrigatório',
            'company_classification.required' => 'O campo Classificação da Empresa é obrigatório',
            'cnpj_additional.*.distinct' => 'O CNPJ adicional não pode ser repetido'
        ];
    }
    public function rulesMembers()
    {
        return [
            'members_name.*'  => 'required | min:4 | max:100',
            'members_email.*' => 'required|unique:commission_members,id|max:150 | distinct',
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
            'members_email.*.unique' => 'Não permitido E-mail repetido para os membros da comissão',
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
            'color .*' => 'required | max:60',
            'human_quantity_activity_level.*' => 'required | numeric',
            'woman_quantity_activity_level.*' => 'required | numeric',
            'activity_level.*' => 'required',
            'profile_color.*' => 'required | max:60',
            'human_quantity.*' => 'required | numeric',
            'woman_quantity.*' => 'required | numeric',
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
            'human_quantity_activity_level.*.required' => 'Campo Nº HOMEMS é  obrigatório',
            'human_quantity_activity_level.*.numeric' => 'Campo Nº HOMEMS é  deve ser numérico',
            'woman_quantity_activity_level.*.required' => 'Campo Nº MULHERES é  obrigatório',
            'woman_quantity_activity_level.*.numeric' => 'Campo Nº MULHERES deve ser numérico',
            'activity_level.*.required' => 'Campo NIVEL DE ATIVIDADE é  obrigatório',
            'profile_color.required' => 'Campo RAÇA/COR é  obrigatório',
            'human_quantity.*.required' => 'Campo Nº HOMEMS Negros (pretos + pardos) Perfil étnico racial dos colaboradores é  obrigatório',
            'human_quantity.*.numeric' => 'Campo Nº HOMEMS Negros (pretos + pardos) Perfil étnico racial dos colaboradores deve ser numérico',
            'woman_quantity.*.required' => 'Campo Nº MULHERES Demais grupos étnicos-raciais do Perfil étnico racial dos colaboradores é  obrigatório',
            'woman_quantity.*.numeric' => 'Campo Nº MULHERES Demais grupos étnicos-raciais do Perfil étnico racial dos colaboradores deve ser numérico',
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
    public function rulesShedule()
    {
        return [
            'action.*' => 'required',
            'activity.*' => 'required',
            'amount.*' => 'required',
            'deadline.*' => 'required',
            'authorization' => 'required',
        ];
    }
    public function messagesShedule()
    {
        return [
            'action.*.required*' => 'O campo Ações  é  obrigatório',
            'activity.*.required' => 'O campo Atividade  é  obrigatório',
            'amount.*.required*' => 'O campo Quantidade  é  obrigatório',
            'deadline.*.required*' => 'O campo Data Limite  é  obrigatório',
            'authorization.required' => 'O campo Autorização é obrigátorio para o cronograma',
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
            'methodology' => 'required | min:10 | max:7000',
        ];
    }
    public function messageMethodology()
    {
        return [
            'methodology.required' => 'O campo Metodologia é obrigátorio',
            'methodology.max' => 'O campo Metodologia não pode ultrapassar 7000 caracteres',
            'methodology.min' => 'O campo Metodologia pode ser menor que 10 caracteres',
        ];
    }
    public function rulesResult()
    {
        return [
            'result' => 'required | min:10',
            'email' => 'unique:institutions,id',
        ];
    }
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
