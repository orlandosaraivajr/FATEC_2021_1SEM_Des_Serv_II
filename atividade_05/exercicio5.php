<?php  
require_once 'classes/Pessoa.php'; 

$pessoa1 = new Pessoa('José', 17, 3, 1990);
$pessoa2 = new Pessoa('Paulo', 25, 1, 1994);
$pessoa3 = new Pessoa('John', 26, 6, 1992);

print($pessoa1->aniversario());
echo'<br>';
if ($pessoa1->aniversariante()){
    print('Parabéns '.$pessoa1->getNome());
    # print('Idade '.$pessoa1->idade());
}
if ($pessoa2->aniversariante()){
    print('Parabéns '.$pessoa2->getNome());
}
if ($pessoa3->aniversariante()){
    print('Parabéns '.$pessoa3->getNome());
}