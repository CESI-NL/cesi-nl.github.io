<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'cesi@rsm.nl';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $subject = "New Contact Form Submission from: " . $name;
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($receiving_email_address, $subject, $body, $headers)) {
            echo "Success! Your message has been sent.";
        } else {
            echo "There was an issue with your request. Please try again.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request method.";
}
?>