<?php

class myJWT {
   private $senha = "SenhaSecreta";
   public function criaToken($conn, $payload, $idU){ // payload é um array
      $header = [
         'alg' => 'SHA256',
         'typ' => 'JWT'
      ];
      
      $header = json_encode($header); // transforma o vetor em JSON
      $header = base64_encode($header); // tranforma o JSON em base 64 (problemas de compatibilidade)
      
      $payload = json_encode($payload);
      $payload = base64_encode($payload);
      
      $signature = hash_hmac('sha256', "$header.$payload", $this->senha, true); // cria a assinatura
      $signature = base64_encode($signature);

      $token = "$header.$payload.$signature";
      
      return $token;
   }

   public function validaToken($conn, $rtk){
      //dividindo token e colocando partes em indices array

      $arrayPartesToken = explode(".", $rtk);
      $headerRt = $arrayPartesToken[0];
      $payloadRt = $arrayPartesToken[1];
      $signatureRt = $arrayPartesToken[2];
     
      $signatureCheckRt = hash_hmac('sha256', "$headerRt.$payloadRt", $this->senha, true);
      $signatureCheckRt = base64_encode($signatureCheckRt);
     
      $payloadRt = base64_decode($payloadRt);
      $payloadRt = json_decode($payloadRt, true);
      $idU = $payloadRt['idU'];
      $dtExp = $payloadRt['dtexp'];
      $ctg = $payloadRt['categoria'];
      if ($ctg == 'refresh') {
         if($dtExp >= time() && $signatureRt == $signatureCheckRt){ // data de expiração válida
            $retorno = true;
         }else {
            $retorno = false;
            $sql = "delete from token where idUser = ". $idU;
            $resultadoQuery = mysqli_query($conn, $sql);
            /* $refresh = $this->criaToken($conn, $payloadRt, $idU);
            $access = $this->criaToken($conn, $payloadAccess, $idU);
            $sql = "insert into token (accessToken, refreshToken, idUser) values ('". $access ."','". $refresh ."','". $idU ."')"; 
            $resultadoQuery = mysqli_query($conn, $sql);*/
         }
         return $retorno;
      }else{
         echo 'Insira um refreshToken!';
      }
      
      
   }
}
?>
