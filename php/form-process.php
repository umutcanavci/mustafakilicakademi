<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "İsim gereklidir* ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email gereklidir*";
} else {
    $email = $_POST["email"];
}

// SUBJECT
if (empty($_POST["subject"])) {
    $errorMSG .= "Konu gereklidir* ";
} else {
    $subject = $_POST["subject"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Mesaj gereklidir* ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "emailaddress@test.com";
$Subject = $subject;

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Basarili";
}else{
    if($errorMSG == ""){
        echo "Bir şeyker yanlış gitti :(";
    } else {
        echo $errorMSG;
    }
}

?>