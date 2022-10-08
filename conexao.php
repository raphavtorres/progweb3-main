<?php

$user = "adminprogweb";
$pass = "ProgWeb3";
$db = "progweb3";
$conn = mysqli_connect("localhost", $user, $pass, $db); /* 127.0.0.1 ou  192.168.1.6*/
if ($conn->connect_errno){
    die("Erro de conexão" . $conn->connect_error);
} 

?>