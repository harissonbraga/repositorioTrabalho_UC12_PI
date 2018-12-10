<?php
    include_once '../clsProduto.php';
include_once '../clsProdutoDAO.php';
include_once '../clsConexao.php';

 session_start();
    
    $nome = "";
    $vencimento = "";
    $quantidade = "";
    
    if( isset($_REQUEST['editar']) ){
        $id = $_REQUEST['idProduto'];
        $produto = ProdutoDAO::getProdutoById($id);
        $nome = $produto->getNome();
        $vencimento = $produto->getVencimento();
        $quantidade = $produto->getQuantidade();
        
        
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de produto</title>
    </head>
    <body>
        <?php
        require_once '';
        ?>
        
         <h1 align="center">Cadastro de produto</h1>
        
        <br><br><br>
        
         <form action="/salvarProduto.php?<?php echo $action; ?>" method="POST" 
              enctype="multipart/form-data">
             
              <label>Nome: </label>
            <input type="text" name="txtNome" value="<?php echo $nome; ?>" required maxlength="100" /> <br><br>
            <label>Vencimento: </label>
            <input type="text" name="txtVencimento" value="<?php echo $vencimento; ?>" maxlength="30" /> <br><br>
            <label>Quantidade: </label>
            <input type="text" name="txtQuantidade" value="<?php echo $quantidade; ?>" required /> <br><br>
                       <label>Categoria: </label>
            <input type="text" name="txtCategoria" value="<?php echo $categoria; ?>" required /> <br><br>
           </form>
    </body>
</html>
