        <!-- Resend php code -->
<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


require __DIR__ . '/vendor/autoload.php';



$resend = Resend::client('re_FiYDmL7b_LTosZ6nz2QcFcbXoLLR6QXeg');



  $resend->emails->send([
    'from' => 'Contact_Feedback <onboarding@resend.dev>',
    'to' => ['swapnilkamble27012000@gmail.com'],
    'subject' => "$subject",
    'html' => "<br>Name:- $name</br>Email:- $email</br>Message:- $message",
  ]);



?>
        
        <!-- /Resend php code -->