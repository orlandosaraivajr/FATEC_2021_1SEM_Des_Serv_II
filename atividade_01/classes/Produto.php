<?php 
class Produto 
{ 
	private $descricao; 
	private $estoque; 
	private $preco;
	 
	public function __construct($descricao, $estoque, $preco) 
	{ 
            $this->descricao = $descricao; 
            $this->estoque = $estoque; 
            $this->preco = $preco;  
	} 
	 
	public function getDescricao() 
	{ 
	    return $this->descricao; 
	}
	
	public function getPreco() 
	{ 
	    return $this->preco; 
	}
} 
