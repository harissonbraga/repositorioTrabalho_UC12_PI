<?php
    include_once '../clsProduto.php';
include_once '../clsProdutoDAO.php';
include_once '../clsConexao.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Estoque</title>
    </head>
    <body>
        <?php
         require_once '';
        ?>
        
          <h1 align="center">Estoque</h1>
        
        <br><br><br>
        
         <?php
            if( isset( $_SESSION['admin']) && $_SESSION['admin'] ){
        ?>
                <a href="frmProduto.php">
                    <button>Cadastrar novo Produto</button></a>
                <br><br>
                
                  <?php
            }
            
            $lista = ProdutoDAO::getProdutos();
            
            if( $lista->count() == 0 ){
                echo '<h3><b>Nenhum Produto cadastrado!</b></h3>';
            } else {
              
        ?>
                      <table border="1">
            <tr>
                <th>Código</th>
                <th>Vencimento</th>
                
                <th>Nome do Produto</th>
                
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Excluir</th>
                
            </tr>
            
            <?php
                    foreach ($lista as $pro){
                        echo '<tr> ';
                        echo '   <td>'.$pro->getId().'</td>';
                        
                        echo '   <td>'.$pro->getNome().'</td>';
                        
                        $vencimento= str_replace(".", ",",$pro->getVencimento() );
                        echo '   <td> '.$vencimento.'</td>';
                        
                        $quantidade = str_replace(".", ",",$pro->getQuantidade() );
                        echo '   <td>'.$quantidade.'</td>';
                        
                        echo '   <td>'.$pro->getCategoria()->getNome().'</td>';
                        
                        $desabilita = "";
                        if( !isset( $_SESSION['admin']) || !$_SESSION['admin']  ){
                            $desabilita = " disabled ";
                        }
                        
                        echo '   <td><a href="frmProduto.php?editar&idProduto='.$pro->getId().'" ><button '.$desabilita.' >Editar</button></a></td>';
                        
                
                        
                        echo '</tr>';
                        
                    }                
                    
            ?>
            
        </table>
        <?php
        
            }
            
        ?>
            
            
    </body>
</html>
