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
            'name' =>'required | min:3 | max:100',
            'fantasy_name' => 'required | min:3 | max:100',
            'activity_branch' => 'required | min:3 | max:100',
            'cnpj' => 'required | min:11 | max:20',
            'county' => 'required | min:3 | max:80',
            'uf' => 'required | min:2 | max:2',
            'address' => 'required | min:5 | max:190',
            'email' => 'required|unique:institutions,id|max:100',
            'phone' => 'required | min:4 | max:20',
            'technical_manager' => 'required | min:3 | max:130',
            'formation' => 'required | min:3 | max:80',
            'phone_two' => 'required | min:4 | max:20',
            'phone_two' => 'required | min:4 | max:20',
            'email_two' => 'required|unique:institutions,id|max:100',
            'company_classification' => 'required | min:18 | max:100',
            'authorization' => 'required | min:3 | max:3',
            'action_plan' => 'required | min:20',
            'partners' => 'required | min:10',
            'methodology' => 'required | min:10',
            'result' => 'required | min:10',
            //Validação dos campos de membros da comissão
            'members_name '  => 'required| min:4 | max:100',
            'members_email ' => 'required|unique:commission_members,id|max:100',
            'members_function ' => 'required| max:60',
            'members_phone ' => 'required| min:4 | max:20',
           // Validação das reposta do diagmóstico censitário
            'alternative_id ' => 'required ',
            // Validação  nivel de atividade dos colaboradores
            'color ' => 'required | max:60 ',
            'human_quantity_activity_level ' => 'required',
            'woman_quantity_activity_level ' => 'required',
            'activity_level ' => 'required',
            // Validação Perfil dos colaboradores
            'profile_color ' => 'required | max:60',
            'human_quantity ' => 'required ',
            'woman_quantity ' => 'required ',
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

    }
}
