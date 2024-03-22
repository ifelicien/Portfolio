<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Process the data, like sending an email or storing it in a database
    // For example, here's how you might send an email:

    $to = 'felicien.irwin@gmail.com'; // Replace with your email address
    $subject = 'New Contact Form Submission';
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $email_content = "Name: " . $name . "\n";
    $email_content .= "Email: " . $email . "\n\n";
    $email_content .= "Message:\n" . $message . "\n";

    // Use mail() function to send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo 'Thank you for your message!';
    } else {
        echo 'Sorry, there was an error sending your message. Please try again later.';
    }
}
?>