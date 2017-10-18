<?php

    date_default_timezone_set('Europe/Moscow');
    // User settings
    $to = "limonchik82@mail.ru";

    $subject = "Сообщение с сайта";

    $post_data = $_POST;

    $email = $post_data[email]; // e-mail откуда письмо
    $dt = date("d F Y, H:i:s"); // дата и время

    $fnm = $post_data[fname];
    $lnm = $post_data[lname];
    $fnm = htmlspecialchars($fnm); // обрабатываем
    $phone = $post_data[phone];
    $messages = $post_data[textarea];

    $mess.="Имя: $fnm\n";
    $mess.="Фамилия: $lnm\n";
    $mess.="Телефон: $phone\n";
    $mess.="Почта: $email\n";
    $mess.="Сообщение: $messages\n";

    $mess .= "\n\nIP: " . $_SERVER["REMOTE_ADDR"];
    $mess .= "\n\nUSER AGENT: " . $_SERVER["HTTP_USER_AGENT"];

    $headers = "From: $email\n";
    $headers .= "X-Mailer: PHP/SimpleModalContactForm\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/plain; charset=utf-8\n";
    $headers .= "Content-Transfer-Encoding: quoted-printable\n";
    mail($to, $subject, $mess, $headers); // отправляем

?>
