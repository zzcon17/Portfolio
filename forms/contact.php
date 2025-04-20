<?php

// Set your real receiving email address here
$receiving_email_address = 'zircon.silva27@gmail.com';

// Include the PHP Email Form library
$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';
if (file_exists($php_email_form)) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Create a new form object
$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Optional: Use SMTP (recommended if you want better deliverability)
$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'zircon.silva27@gmail.com',
  'password' => 'your-app-password-here',
  'port' => '587',
  'encryption' => 'tls'
);

// Add form message details
$contact->add_message($_POST['name'], 'Name');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Send the email
echo $contact->send();
?>
