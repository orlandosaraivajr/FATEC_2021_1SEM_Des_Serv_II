<?php 
class Aluno { 
	private $nome; 
	private $sobrenome; 
	private $ra;
	 
	public function __construct($nome, $sobrenome, $ra) { 
            $this->nome = $nome; 
            $this->sobrenome = $sobrenome; 
            $this->ra = $ra;  
	} 
	 
	public function getNome() { 
	    return $this->nome; 
	}
	
	public function getRA() { 
	    return $this->ra; 
	}
} 
