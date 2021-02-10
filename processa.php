<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
		$mensagem = $_POST['message'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "paramundivps@gmail.com");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "paramundivps@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Paramundi_>SSH, <br><br>Nova Solicitação de Teste <br>
        <br>Nome:     <b>$nome      </b>     <br> 
        Email:        <b>$email     </b>     <br> 
        Telefone:     <b>$phone     </b>     <br>
        Mensagem:     <b>$mensagem  </b> ");
       
       

        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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
        ';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
        header("Location:http://www.paramundi.com.br:81");
		
        ?>
    </body>
</html>
