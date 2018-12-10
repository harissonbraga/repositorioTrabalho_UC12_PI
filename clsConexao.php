<?php

class Conexao {
    
    private static function abrir(){
        $banco = "m171_06_Prisma";
        $servidor = "senacinfo-db";
        $usuario = "inf_m171";
        $senha = "senacrs";
        
        $conn = mysqli_connect($servidor, $usuario, $senha, $banco);
        
        if ( $conn )
            return $conn;
        else 
            return NULL;
        
    }
    
     private static function fechar( $conn ){
        mysqli_close( $conn );
    }
    
    public static function executar( $sql ){
        $conn = self::abrir();
        if( $conn ){
            mysqli_query($conn, $sql);
            self::fechar( $conn );
        }
    } 
    
     public static function executarComRetornoId( $sql ){
        $conn = self::abrir();
        $id = 0;
        if( $conn ){
            mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            self::fechar( $conn );
        }
        return $id;
    }  

        public static function consultar( $sql ){
        $conn = self::abrir();
        if( $conn ){
            $result = mysqli_query($conn, $sql);
            self::fechar( $conn );
            return $result;
        } else {
            return NULL;
        }
    } 
    
}
