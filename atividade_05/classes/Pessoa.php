<?php 
class Pessoa { 
	private $nome; 
	private $data_aniversario; 
	 
	public function __construct($nome, $dia, $mes, $ano) 
	{ 
		$this->nome = $nome; 
		$data = mktime(0, 0, 0, $mes, $dia, $ano);
        $this->data_aniversario = $data;  
	} 

	public function getNome()
	{
		return $this->nome;
	}

	public function aniversario() 
	{ 
	    return date("d-m-Y", $this->data_aniversario);
	}
	
	public function aniversariante() 
	{ 
		$hoje = time();
	    if (date("d", $this->data_aniversario) == date("d", $hoje)){
			if (date("m", $this->data_aniversario) == date("m", $hoje)){
				return True;
			}
		} 
		return False;
	}

}
?>
