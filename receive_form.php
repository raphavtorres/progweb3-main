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

$idU = $arrayQuery["idUser"];

$dt = date('d-m-Y h:i:s a', time());
$payload = [
    'iss' => 'localhost',
    'nome' => $arrayQuery["nomeUser"],
    'datahora' => $dt

    /* 'email' => $arrayQuery["email"] */
    ];
    print_r($payload);

    echo "<BR>";
    echo "<BR>";
    $token = $myjwt->criaToken($conn, $payload, $idU);
    echo $token;

    echo "<BR>";
    echo "<BR>";
    echo "Token validado com sucesso?<br>";
    if ($myjwt->validaToken($conn, $token, $idU)){
        echo "Sim<Br>";
    }else{
        echo "Não<br>";
    }
 
    // implementar refresh token
    // campo novo no payload -> data e hora de criação ok - mas fuso errado
    // salvar o hash do token no bd -> ok
    // se o token for inválido, excluir todos os tokens, gerar um novo e atualizar bd

    // como funciona a senha secreta ?
    //eyJhbGciOiJTSEEyNTYiLCJ0eXAiOiJKV1QifQ==.eyJpc3MiOiJsb2NhbGhvc3QiLCJub21lIjoiaGVsb2lzYSJ9.DFMoQsa+rQBkbmlaBDBO96ZlBdj4/5tqXMOQYKmEUYs=
?>
