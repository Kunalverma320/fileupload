<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $table='documents';

    use HasFactory;
    protected $fillable = ['document_name', 'content'];
}
