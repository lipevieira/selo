<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['doc_name', 'description', 'institution_id' ];
    protected $dates = [
        'created_id',
        'created_at',
    ];
    /**
     * Descrioption: Volta do relacionameto
     * Muitos Documentos pertercem a uma Instituição
     * @return Institution
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
