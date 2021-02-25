<?php 
require_once 'classes/SalaAula.php'; 
require_once 'classes/Aluno.php'; 
require_once 'classes/Professor.php'; 

$orlando = new Professor('Orlando Saraiva Jr','professor A1');
$sala = new SalaAula($orlando); 

$aluno1 = new Aluno('José', 'da Silva', '005929');
$aluno2 = new Aluno('Paulo', 'da Silva', '564826');
$aluno3 = new Aluno('John', 'Doe', '784512');

$sala->addAluno( $aluno1 ); 
$sala->addAluno( $aluno2 ); 
$sala->addAluno( $aluno3 ); 

# print  'Professor da sala: ' . $sala->getProfessor()->nome . "<br>\n"; 
foreach ($sala->getAlunos() as $aluno) 
{ 
    print 'Aluno: ' . $aluno->getNome() . "<br>\n"; 
} 