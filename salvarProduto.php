<?php
include_once '../clsProduto.php';
include_once '../clsProdutoDAO.php';
include_once '../clsConexao.php';

if( isset($_REQUEST['inserir'])  ){
    
        $produto = new Produto();
        $produto->setNome( $_POST['txtNome'] );
        $vencimento = $_POST['txtVencimento'];
        
        $vencimento->setVencimento( $vencimento );
        $quantidade = $_POST['txtQuantidade'];
        $quantidade = str_replace(",", ".", $quantidade);
        $produto->setQuantidade( $quantidade );
   
        
        $categoria = new Categoria();
        $categoria->setNome( $_POST['categoria']);
        $produto->setCategoria( $categoria ); 
        
        
        
        ProdutoDAO::inserir( $produto );
        
        header("Location: ../produtos.php");
      
}

if( isset($_REQUEST['editar'])){
    
    $id = $_REQUEST['idProduto'];
    $produto = ProdutoDAO::getProdutoById($id);
    
   
    
    $produto->setNome( $_POST['txtNome'] );
    
    $vencimento = $_POST['txtvencimento'];
    
    $vencimento->setVencimento( $vencimento );
    
    $quantidade = $_POST['txtQuantidade'];
    $quantidade = str_replace(",", ".", $quantidade);
    $quantidade->setQuantidade( $quantidade );


    $categoria = new Categoria();
    $categoria->setNome( $_POST['categoria']);
    $produto->setCategoria( $categoria ); 
    
    ProdutoDAO::editar($produto);
    
    header("Location: ../produtos.php");
    
}

if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idProduto'];
    $produto = ProdutoDAO::getProdutoById($id);
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Produto  '
       .$produto->getNome(). '? </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idProduto='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../produtos.php" ><button>NÃO</button></a>';
}

if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idProduto'];
    $produto = ProdutoDAO::getProdutoById($id);
   
    ProdutoDAO::excluir($produto);
    header("Location: ../produtos.php");
}
