<?php

class Produto {
    private $id, $nome, $vencimento, $categoria, $quantidade;
    
    function __construct(){
    }
    
  function getId() {
        return $this->id;
    }
    
     function setId($id) {
        $this->id = $id;
    }

    function getNome() {
        return $this->nome;
    }
    
     function setNome($nome) {
        $this->nome = $nome;
    }

     function getVencimento() {
        return $this->vencimento;
    }
    
    function setVencimento($vencimento) {
        $this->vencimento = $vencimento;
    }
    
      function getCategoria() {
        return $this->categoria;
    }
    
    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
       function getQuantidade() {
        return $this->quantidade;
    }
    
    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
    
}
    