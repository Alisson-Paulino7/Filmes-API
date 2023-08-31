<?php

require_once "Filme.php";
require_once "FilmeDAO.php";
require_once "Conexao.php";

$filme = new Filme();
//$filme->setId(3);
$filme->setNome("Pânico VI");
$filme->setDuracao(120);
$filme->setGenero("Terror");

$filmeDAO = new FilmeDAO();
//$filmeDAO->create($filme);
$filmeDAO->delete(3);
$filmeDAO->read();
foreach($filmeDAO->read() as $filme){
    echo $filme['nome']."<br>".$filme["genero"]."<br>".$filme['duracao']."<br>";
}


//echo "O filme ".$filme->getNome()." pertence ao gênero ".$filme->getGenero()." e possui a duração de ".$filme->getDuracao()."m \n";