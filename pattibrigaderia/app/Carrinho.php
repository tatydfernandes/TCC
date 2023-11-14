<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Carrinho extends Model
    {    
        protected $primaryKey = 'idCarrinho';
        protected $table = 'tbcarrinho';    
        protected $fillable = ['idCarrinho','idVenda','idProduto','qtd','valor_unitario','valor_total'];
        public $timestamps = false;

        public function venda()
        {
            return $this->belongsTo(Venda::class, 'idVenda', 'idVenda');
        }

       
    }
