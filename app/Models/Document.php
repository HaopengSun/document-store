<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
