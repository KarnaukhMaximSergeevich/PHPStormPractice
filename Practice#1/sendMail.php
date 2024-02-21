<?php

$_text1 = "My name is Max. ";
$_text2 = "I'm from Ukraine ";
$_text3 = "and I'm a student of Kharkiv aerospace university.";

$_to = "Maximaximus18@gmail.com";
$_subject = "I'M A STUDENT";
$_message = $_text1 . $_text2;
$_message .= $_text3;
$_headers = 'From: student.528st.m.s.karnaukh@student.khai.edu';


mail(
    $_to,
    $_subject,
    $_message,
    $_headers

)

?>