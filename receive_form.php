<?php
    require 'conexao.php';
    require 'jwtclass.php';
    $myjwt = new myJWT();

    $nomeUsuario = $_POST["usuario"];
    $senhaUsuario = $_POST["senha"];
    $sql = "select * from usuario where nomeUser = '". $nomeUsuario ."' and senhaUser = '". $senhaUsuario ."'"; 
    $resultadoQuery = mysqli_query($conn, $sql);
    if ($resultadoQuery->num_rows == 0 ){
        die("usuário ou senha inválidos");
    }

    $arrayQuery = $resultadoQuery->fetch_assoc();
    echo "<BR>";
    echo "usuário digitado: " . $arrayQuery["idUser"];
    echo "<BR>";
    echo "<BR>";
    echo "senha digitada: " . $arrayQuery["senhaUser"];
    echo "<BR>";

    $idU = $arrayQuery["idUser"];

    $payloadAccess = [
        'idU'=> $idU,
        'iss' => 'localhost',
        'nome' => $arrayQuery["nomeUser"],
        'dtexp' => time() + 300,
        'categoria' => 'access'

        /* 'email' => $arrayQuery["email"] */
    ];

    $payloadRefresh = [
        'idU'=> $idU,
        'dtexp' => time() + 3600,
        'categoria' => 'refresh'
    ];

    print_r($payloadAccess);
    echo "<BR>";
    echo "<BR>";
    
    $access = $myjwt->criaToken($conn, $payloadAccess, $idU);
    $refresh = $myjwt->criaToken($conn, $payloadRefresh, $idU);

    $sql = "insert into token (accessToken, refreshToken, idUser) values ('". $access ."','". $refresh ."','". $idU ."')";
    $resultadoQuery = mysqli_query($conn, $sql); 
    
    echo "Access Token: " . $access;
    echo "<BR>";
    echo "<BR>";
    echo "Refresh Token: " . $refresh;
    echo "<BR>";
    echo "<BR>";
    echo "Token validado com sucesso?: <br>";
?>
