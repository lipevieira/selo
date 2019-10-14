<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionRecognition extends Model
{
    protected $fillable = [
        'name', 'fantasy_name', 'activity_branch', 'cnpj', 'county',
        'address', 'email','phone','technical_manager', 'formation', 'phone_two',
        'email_two', 'company_classification','institution_activity'
    ];
    /**
     * Relacionamento 1 - N
     *
     * @return DocumentRecognition
     */
    public function documents()
    {
        return $this->hasMany(DocumentRecognition::class);
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
            'cnpj' => 'required|max:18|unique:institution_recognitions,cnpj,',
            'county' => 'required',
            'uf' => 'required | max:2',
            'address' => 'required | min:5 | max:190',
            'email' => 'required|max:100|unique:institution_recognitions,email,',
            'phone' => 'required | min:4 | max:20',
            'technical_manager' => 'required | min:3 | max:130',
            'formation' => 'required | min:3 | max:80',
            'institution_activity' => 'required',
            'company_classification' => 'required  | max:100| exists:company_classifications,id',
            'doc_name' => 'required',
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
            'institution_activity.required' => 'O campo Ramo de atividade é obrigatório',
            'company_classification.required' => 'O campo Classificação da Empresa é obrigatório',
            'company_classification.exists' => 'O valor selecionado para o campo Classificação da Empresa é inválido.',
            'doc_name.required' => 'O campo Anexo é obrigatório! Baixe o modelo preenchar e nos Enviei',
        ];
    }
}
