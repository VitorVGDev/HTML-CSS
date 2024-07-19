<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Validação dos campos
    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Por favor, preencha todos os campos corretamente.";
        exit;
    }

    // Definir para quem o e-mail será enviado
    $recipient = "vitorgab2005@gmail.com";

    // Assunto do e-mail
    $subject = "Nova mensagem de contato de $name";

    // Conteúdo do e-mail
    $email_content = "Nome: $name\n";
    $email_content = "E-mail: $email\n\n";
    $email_content = "Mensagem:\n$message\n";

    // Cabeçalhos do e-mail
    $email_headers = "De: $name <$email>";

    // Enviar o e-mail
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Obrigado! Sua mensagem foi enviada.";
    } else {
        http_response_code(500);
        echo "Ocorreu um problema ao enviar sua mensagem. Tente novamente.";
    }
} else {
    http_response_code(403);
    echo "Este formulário só pode ser enviado pelo método POST.";
}
?>
