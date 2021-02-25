<?php 
class SalaAula { 
    private $time; 
    private $alunos;
    private $professor; 
    
    public function __construct($professor) { 
        $this->professor = $professor; 
        $this->time = date('Y-m-d H:i:s'); 
        $this->alunos = array(); 
    } 
    
    public function addAluno( Aluno $aluno ) { 
        $this->alunos[] = $aluno; 
    } 
    
    public function getAlunos() { 
        return $this->alunos; 
    } 

    public function getProfessor() { 
        return $this->professor; 
    } 
    
    public function getTime() { 
        return $this->time; 
    } 
} 