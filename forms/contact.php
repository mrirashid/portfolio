<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your receiving email address
    $to = "mdislam0996@gmail.com"; 
    $subject = trim($_POST["subject"]);

    // Sender's information
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Email content
    $email_content = "You have received a new message from your website contact form:\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "success"; // Will be used for AJAX success message
    } else {
        echo "error"; // Will be used for AJAX error message
    }
} else {
    echo "error";
}
?>
