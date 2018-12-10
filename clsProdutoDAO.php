<?php

class ProdutoDAO {
    
    public static function inserir($produto){
        $sql = "INSERT INTO produtos "
                . " ( id, nome, vencimento, categoria, quantidade ) VALUES "
                . " ( '".$produto->getId()."' , "
                . "   '".$produto->getNome()."' , "
                . "    ".$produto->getVencimento()." , "
                . "    ".$produto->getCategoria()." , "
                . "    ".$produto->getQuantidade()." , "
                . "  ); ";
        
        Conexao::executar( $sql );
    }
    
 
     public static function editar($produto){
        $sql = "UPDATE produtos SET " 
                . " nome =      '".$produto->getNome()."' , "
                . " vencimento =      '".$produto->getVencimento()."' , "
                . " categoria =      ".$produto->getCategoria()." , "
                . " quantidade = ".$produto->getQuantidade()." , "
                . " WHERE id = ".$produto->getId();
        
        Conexao::executar( $sql );
    }
    
    public static function excluir($produto){
        $sql = "DELETE FROM produtos "
             . " WHERE id =  ".$produto->getId();
        
        Conexao::executar( $sql );
    }
    
    public static function getProdutos(){
        $sql = " SELECT p.id, p.nome, p.vencimento, p.categoria, p.quantidade "
             . " FROM produtos p "
           
             . " ORDER BY p.nome ";
        
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        while( list( $id, $nome, $vencimento, $categoria, $quantidade, $nomeCat) = mysqli_fetch_row($result) ){
            $categoria = new Categoria();
           
            $categoria->setNome( $nomeCat);
            
            $produto = new Produto();
            $produto->setId($id);
            $produto->setNome($nome);
            $produto->setVencimento($vencimento);
            $produto->setCategoria($categoria);
            $produto->setQuantidade($quantidade);
            
           
  
            $lista->append($produto);
        }
        
        return $lista;
    }
    
     public static function getProdutoById( $id ){
         $sql = " SELECT p.id, p.nome, p.vencimento, p.categoria, p.quantidade"
             . " FROM produtos p "
             
             . " WHERE p.id = ".$id ;
        
        $result = Conexao::consultar($sql);
      
        list( $id, $nome, $vencimento, $categoria, $quantidade, $nomeCat) = mysqli_fetch_row($result);
            $categoria = new Categoria();
           
            $categoria->setNome( $nomeCat);
            
            $produto = new Produto();
            $produto->setId($id);
            $produto->setNome($nome);
            $produto->setVencimento($vencimento);
            $produto->setCategoria($categoria);
            $produto->setQuantidade($quantidade);
            
            
        return $produto;
    }
    
}