<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $primaryKey = 'idVenda';
    protected $table = 'tbvenda';    
    protected $fillable = ['idCliente','tpVenda','dtVenda','dtEntrega','status','idFPagamento','totalVenda'];
    public $timestamps = false;

    public function itensDeCarrinho()
    {
        return $this->hasMany(Carrinho::class, 'idVenda', 'idVenda');
    }
    
}
