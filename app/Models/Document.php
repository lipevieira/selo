<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    protected $fillable = ['doc_name', 'description',];
    protected $dates = [
        'created_id',
        'created_at',
    ];
    /**
     * Relacionamento de morphTo
     *
     * @return Institution
     * @return InstitutionRecognition
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
    
    public function downloandAnexoOne()
    {
        return response()->download(storage_path("app/public/models/anexo01.doc"));
    }
    /**
     * Baixando o modelo do Anexo 06
     *
     * @return void
     */
    public function downloandAnexoSix()
    {
        return response()->download(storage_path("app/public/models/anexo06.doc"));
    }
    /**
     * Baixando o modelo do Anexo 07
     * @return void
     */
    public function downloandAnexoServen()
    {
        return response()->download(storage_path("app/public/models/anexo07.doc"));
    }
   
}
