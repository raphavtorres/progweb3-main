<?php
    require 'conexao.php';
    require 'jwtclass.php';
    $myjwt = new myJWT();

    $refreshTokenUser = $_POST["txt_refresh"];

    if ($myjwt->validaToken($conn, $refreshTokenUser)){
        echo "Token validado com sucesso!<br>";
    }else{
        echo "Token inválido <br>";
    }
?>