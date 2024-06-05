<?php
// Get and sanitize form input values
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$visitor_email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Validate email
if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit();
}

// Set email details
$email_from = 'info@iot.com';
$email_subject = 'New Form Submission';

// Construct the email body
$email_body = "User Name: $name.\n".
              "User Email: $visitor_email.\n".
              "Subject: $subject.\n".
              "User Message: $message.\n";

// Recipient email
$to = 'asrithpotnuru@gmail.com';

// Set headers
$headers = "From: $email_from\r\n";

// Send the email
if (mail($to, $email_subject, $email_body, $headers)) {
    // Redirect to contact.html on success
    header("Location: contact.html");
    exit();
} else {
    // Print an error message on failure
    echo "Email sending failed.";
}
?>
