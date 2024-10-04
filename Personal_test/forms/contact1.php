<?php

require __DIR__ . '/vendor/autoload.php';

$resend = Resend::client('re_FiYDmL7b_LTosZ6nz2QcFcbXoLLR6QXeg');

try {

  $resend->emails->send([
    'from' => 'Acme <onboarding@resend.dev>',
    'to' => ['swapnilkamble27012000@gmail.com'],
    'subject' => 'hello world',
    'html' => '<strong>it works!</strong>',
  ]);

} catch (\Exception $e) {

  exit('Error: ' . $e->getMessage());
}

?>