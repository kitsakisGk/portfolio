<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set recipient email address
    $toEmail = "kitsakisgk@gmail.com"; // Change this to your email address

    // Construct email headers
    $mailHeaders = "From: $name <$email>" . "\r\n";
    $mailHeaders .= "Reply-To: $email" . "\r\n";
    $mailHeaders .= "MIME-Version: 1.0" . "\r\n";
    $mailHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Construct email content
    $emailContent = "<h2>New Message from Contact Form</h2>";
    $emailContent .= "<p><strong>Name:</strong> $name</p>";
    $emailContent .= "<p><strong>Email:</strong> $email</p>";
    $emailContent .= "<p><strong>Subject:</strong> $subject</p>";
    $emailContent .= "<p><strong>Message:</strong> $message</p>";

    // Send email
    if (mail($toEmail, $subject, $emailContent, $mailHeaders)) {
        // Email sent successfully
        $message = "Your contact information is received successfully.";
    } else {
        // Failed to send email
        $message = "Unable to send message. Please try again later.";
    }

    // Output the result
    echo json_encode(array('status' => 'success', 'message' => $message));
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: ../contact.html");
    exit;
}
?>