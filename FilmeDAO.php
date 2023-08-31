<?php

require_once 'Conexao.php';
require_once 'Filme.php';

class FilmeDAO {

    public function create (Filme $filme) {
        $sql = 'INSERT INTO filme (nome, genero, duracao) VALUES (?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $filme->getNome());
        $stmt->bindValue(2, $filme->getGenero());
        $stmt->bindValue(3, $filme->getDuracao());

        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM filme';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return [];
        }
    }

    public function update(Filme $filme) {
        $sql = 'UPDATE filme SET nome = ?, genero = ?, duracao = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $filme->getNome());
        $stmt->bindValue(2, $filme->getGenero());
        $stmt->bindValue(3, $filme->getDuracao());
        $stmt->bindValue(4, $filme->getId());

        $stmt->execute();
    }

    public function delete($id) {
        $sql = 'DELETE FROM filme WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}