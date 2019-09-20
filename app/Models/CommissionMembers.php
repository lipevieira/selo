<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionMembers extends Model
{
    protected $fillable = ['members_name', 'members_email', 'members_function', 'members_phone', 'institution_id'];

    public function rules($id)
    {
        return [
            'members_name'  => 'required| max:100',
            'members_email' => 'required|max:150|unique:commission_members,members_email,' . $id,
            'members_function' => 'required | max:60',
            'members_phone' => 'required | min:4 | max:20',
        ];
    } 
    public function messages()
    {
      return [
            'members_name.required' => 'O campo nome é obrigatório',
            'members_email.required' => 'O campo E-mail é obrigatório',
            'members_email.unique' => 'Não permitido E-mail repetido para os membros da comissão',
            'members_function.required' => 'O campo Função/Setor é obrigatório',
            'members_phone.required' => 'O campo obrigatório Telefone',
            'members_phone.min' => 'Não é permitido menos de três caracteres para o telefone',
        ];  
    } 
    /**
     * Descrioption: Volta do relacionameto
     * Muitos Menbro da comissão pertercem a uma Instituição
     * @return Institution
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
