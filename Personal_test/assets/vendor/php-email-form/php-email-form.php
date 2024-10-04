<?php
// Configuration
$to_email = 'swapnilkamble27012000@gmail.com'; // Replace with your email address
$subject = 'Contact Form Submission '; // Replace with your email subject

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Send email
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        mail($to_email, $subject, $message, $headers);

        // Display success message
        echo 'Thank you for contacting us!';
    } else {
        // Display error message
        echo 'Invalid email address';
    }
}
?>

<!-- HTML Form -->
<!-- <form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="message">Message:</label>
    <textarea name="message" required></textarea>

    <input type="submit" value="Send">
</form> -->