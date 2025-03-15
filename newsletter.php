<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'takaoka@rsm.nl';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $subject = "New Subscription: " . $email;
        $message = "You have a new subscription request from: " . $email;
        $headers = "From: " . $email;

        if (mail($receiving_email_address, $subject, $message, $headers)) {
            echo "Success! Your request to subscribe has been sent.";
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

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
