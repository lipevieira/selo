<?php

namespace App\Http\Requests\Institution;

use Illuminate\Foundation\Http\FormRequest;

class MembresFormRequest extends FormRequest
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
            'members_name.*'  => 'required | min:4 | max:100',
            'members_email.*' => 'required|unique:commission_members,id|max:150',
            'members_function.*' => 'required | max:60',
            'members_phone.*' => 'required | min:4 | max:20',
        ];
    }
    public function messages()
    {
        return [
            'members_name.*.required ' => 'É obrigátorio informa o nome do membros da comissão',
            'members_email.*.unique ' => 'Esse E-mail já está cadastrado',
            'members_function.*.required ' => 'É obrigatório informar o email do membro da comissão',
            'members_phone.*.required ' => 'É obrigatório informar o telefone do membro da comissão',
        ];
    }
}
