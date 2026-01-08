<?php
// CONFIGURATION
$recipient = "info@rumm-impexcon.com";
$subject = "New Contact Form Submission - Rumm Impex Consultancy";

// SANITIZE INPUT
$name    = htmlspecialchars(trim($_POST['name']));
$email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$phone   = htmlspecialchars(trim($_POST['phone']));
$message = htmlspecialchars(trim($_POST['message']));

// VALIDATE EMAIL
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// BUILD EMAIL BODY
$body = "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Phone: $phone\n\n";
$body .= "Message:\n$message\n";

// HEADERS
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

// SEND EMAIL
if (mail($recipient, $subject, $body, $headers)) {
    echo "Thank you! Your message has been sent.";
} else {
    echo "Sorry, there was an error sending your message.";
}
?>
