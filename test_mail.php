<?php
$to = "vitorgab2005@gmail.com";
$subject = "Teste de envio de e-mail";
$message = "Este é um teste para verificar se a função mail() está funcionando.";
$headers = "From: vitorgab2005@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "E-mail enviado com sucesso.";
} else {
    echo "Falha no envio do e-mail.";
}
?>
