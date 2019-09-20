<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['cnpj_additional', 'institution_id'];

    public  $rules = [
        'cnpj_additional' => 'required|unique:branches',
    ];

    public $messages = [
        'cnpj_additional.required' => 'O campo CNPJ da Filial é  obrigatório',
        'cnpj_additional.unique' => 'Esse CNPJ já está cadastrado',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
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
