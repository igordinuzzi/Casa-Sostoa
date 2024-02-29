<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign form fields to variables
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // Check if any field is empty and redirect back with an error message
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        // Optionally, use a session variable to pass error message back
        header("Location: index.html?formerror=1");
        exit;
    }

    // Recipient email address
    $to = "replytoigor@gmail.com";

    // Subject
    $subject = "New contact from $name";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email message
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a thank-you page or back to the form with a success message
        header("Location: index.html?formsent=1");
    } else {
        // Redirect back to form with an error message
        header("Location: index.html?formerror=1");
    }
} else {
    // Not a POST request, redirect to the form
    header("Location: index.html");
}
?>
