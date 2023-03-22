<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $guarded = ['id'];  
    protected $table = 'chamado';

    use HasFactory;
}
