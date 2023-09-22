<?php
$name = $_POST['name']
$Visitor_email = $_POST['email']
$Subject = $_POST['subject']
$Message = $_POST['Message']

$email_from = 'info@yourwebsite.com';

$email_subject = 'New Form Submission';

$email_body = "User Name: $name.\n".
               "User Name: $Visitor_email.\n".
                "Subject: $Subject.\n".
                "User Name: $$Message.\n";

$to = 'BAKALBY@gmail.com';

$headers = "From: $email_from \r\n";

$headers .= "Replay-To: $Visitor_email \r\n";


mail($to,$email_subject,$email_body,$headers);

header("Location: Contact.html");
?>