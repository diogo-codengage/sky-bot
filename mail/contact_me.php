<?php
# Try running this locally.
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('93f2fb5379e64e3b81e1bf314d6c26e4-3939b93a-a5430d69');
$domain = "sandbox395bf250df824cfb8c69a0479ac70f63.mailgun.org";

// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Nenhum argumento fornecido!";
   return false;
   }

   echo "Nenhum argumento fornecido!";
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

# Make the call to the client.
$result = $mgClient->sendMessage($domain,
  array('from'    => $email_address,
        'to'      => $to,
        'subject' => "Formulário de contato do site:  $name",
        'text'    => "Você recebeu uma nova mensagem do formulário de contato do seu site.\n\n"."Veja os detalhes:\n\nNome: $name\n\nEmail: $email_address\n\nTelefonee: $phone\n\nMensagem:\n$message"));       
?>
