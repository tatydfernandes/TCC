<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $primaryKey = 'idVenda';
    protected $table = 'tbvenda';    
    protected $fillable = ['idVenda','idCliente','idProduto','qtdProduto','valorTotalProduto','tpVenda','dtVenda','dtEntrega','status','idFPagamento'];
    public $timestamps = false;
}
