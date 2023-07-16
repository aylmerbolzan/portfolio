<?php

// Email que receberá a mensagem
$receiving_email_address = 'aylmer.bolzan@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Não foi possivel carregar a biblioteca "PHP Email Form"!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Credenciais SMTP

$contact->smtp = array(
  'host' => 'sandbox.smtp.mailtrap.io',
  'username' => 'a59d75b9a91dd2',
  'password' => 'e3c4437e6efd52',
  'port' => '587'
);

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
