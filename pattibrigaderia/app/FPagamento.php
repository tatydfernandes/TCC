<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FPagamento extends Model
{    
    protected $table = 'tbfpagamento';    
    protected $fillable = ['idFPagamento','fPagamento'];
    public $timestamps = false;
}
