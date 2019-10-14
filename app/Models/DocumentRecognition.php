<?php

namespace App\Models;

use App\Http\Controllers\Institution\InstitutionController;
use Illuminate\Database\Eloquent\Model;

class DocumentRecognition extends Model
{
    protected $fillable = ['doc_name',];
    protected $dates = [
        'created_id',
        'created_at',
    ];
    /**
     * Voltar do Relacionamento N - 1
     *
     * @return InstitutionRecognition
     */
    public function institutionRecognition()
    {
        return $this->belongsTo(InstitutionRecognition::class);
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
