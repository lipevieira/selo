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
            'cnpj' => 'required | min:18 | max:18',
            'county' => 'required | min:3 | max:80',
            'uf' => 'required | max:2',
            'address' => 'required | min:5 | max:190',
            'email' => 'required|unique:institutions,id|max:100',
            'phone' => 'required | min:4 | max:20',
            'technical_manager' => 'required | min:3 | max:130',
            'formation' => 'required | min:3 | max:80',
            'phone_two' => 'required | min:4 | max:20',
            'institution_activity' => 'required',
            'company_classification' => 'required | min:18 | max:100',
            'authorization' => 'required',
            'action_plan' => 'required | min:20',
            'partners' => 'required | min:10|max:2000',
            'methodology' => 'required | min:10',
            'result' => 'required | min:10',
            'members_name.*'  => 'required | min:4 | max:100',
            'members_email.*' => 'required|unique:commission_members,id|max:150',
            'members_function.*' => 'required | max:60',
            'members_phone.*' => 'required | min:4 | max:20',
            // Validação das reposta do diagnóstico censitário
            'alternative_id.*' => 'required ',
            // Validação  nivel de atividade dos colaboradores
            'color .*' => 'required | max:60 ',
            'human_quantity_activity_level.*' => 'required',
            'woman_quantity_activity_level.*' => 'required',
            'activity_level.*' => 'required',
            //Validação Perfil dos colaboradores
            'profile_color .*' => 'required | max:60',
            'human_quantity.*' => 'required ',
            'woman_quantity .* ' => 'required ',
            // Validação do cronograma
            'action ' => 'required',
            'activity ' => 'required',
            'amount ' => 'required ',
            'deadline ' => 'required ',
        ];
    }
    // TO-DE FAZER: Memssagens para validação de campos no back end
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
            'email.unique' => 'Esse E-mail já está cadastrado',
            'email.required' => 'O campo E-mail é obrigatório',
            'phone.required' => 'O campo Telefone é obrigatório',
            'phone.min' => 'O campo Telefone não pode ser menor que 3 caracteres',
            'technical_manager.required' => 'O campo Responsável técnico é obrigatório',
            'formation.required' => 'O campo Formação é obrigatório',
            'phone_two.required' => 'O campo Telefone é obrigatório',
            'institution_activity.required' => 'O campo Ramo de atividade é obrigatório',
            'company_classification.required' => 'O campo Classificação da Empresa é obrigatório',
            'authorization.required' => 'O campo Autorização é obrigátorio para o cronograma',
            'action_plan.required' => 'O campo Plano de ação é obrigátorio',
            'action_plan.max' => 'O campo Plano de ação  não pode ultrapassar 3000 caracteres',
            'action_plan.min' => 'O campo Plano de ação  não pode ser menor que 20 caracteres',
            'partners.required' => 'O campo Plano de ação é obrigátorio',
            'partners.max' => 'O campo Plano de ação pode ultrapassar 2000 caracteres',
            'partners.min' => 'O campo Plano de ação pode ser menor que 10 caracteres',

            'methodology.required' => 'O campo Metodologia é obrigátorio',
            'methodology.max' => 'O campo Metodologia ultrapassar 2000 caracteres',
            'methodology.min' => 'O campo Metodologia pode ser menor que 10 caracteres',

            'result.required' => 'O campo Resultado é obrigátorio',
            'result.max' => 'O campo Resultado não pode ultrapassar 3000 caracteres',
            'result.min' => 'O campo Resultado não  pode ser menor que 10 caracteres',
            'members_name.*.required ' => 'É obrigátorio informa o nome do membros da comissão',
            'members_email.*.unique ' => 'Esse E-mail já está cadastrado',
            'members_function.*.required ' => 'É obrigatório informar o email do membro da comissão',
            'members_phone.*.required ' => 'É obrigatório informar o telefone do membro da comissão',
            // Messagem  diagnóstico censitário alternative_id
            'alternative_id.*.required ' => ' É obrigatório responder todas as questões do diagnóstico censitário',
           // Messagem para nivel de atividade dos colaboradores
            // 'color.required' => 'RAÇA/COR é  obrigatório',
            'human_quantity_activity_level.required' => 'Campo Nº HOMEMS é  obrigatório',
            'woman_quantity_activity_level.required' => 'Campo Nº MULHERES é  obrigatório',
            'activity_level.required' => 'Campo NIVEL DE ATIVIDADE é  obrigatório',
             // Messagem Validação Perfil dos colaboradores
            'profile_color.required' => 'Campo RAÇA/COR é  obrigatório',
            'human_quantity.required' => 'Campo Nº HOMEMS é  obrigatório',
            'woman_quantity.required' => 'Campo Nº MULHERES é  obrigatório',
            // // Messagem para o cronograma
            'action.required' => 'O campo Ações  é  obrigatório',
            'activity.required' => 'O campo Atividade  é  obrigatório',
            'amount.required' => 'O campo Quantidade  é  obrigatório',
            'deadline.required' => 'O campo Data Limite  é  obrigatório',
        ];
    }
}
