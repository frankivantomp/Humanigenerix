<?php  
  
// check for form submission - if it doesn't exist then send back to contact form  
if (!isset($_POST["save"]) || $_POST["save"] != "contact") {  
    header("Location: contact-form.php"); exit;  
}  
      
// get the posted data  
$name = $_POST["contact_name"];  
$email_address = $_POST["contact_email"];  
$message = $_POST["contact_message"];  
      
// check that a name was entered  
if (empty ($name))  
    $error = "Vous devez rentrer votre nom";  
// check that an email address was entered  
elseif (empty ($email_address))   
    $error = "Vous devez rentrer votre adresse sinon...";  
// check for a valid email address  
elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email_address))  
    $error = "Une vraie adresse plz. J'Veux pas de vos injections!!";  
// check that a message was entered  
elseif (empty ($message))  
    $error = " Un message est la moindre des choses !!";  
          
// check if an error was found - if there was, send the user back to the form  
if (isset($error)) {  
    header("Location: contact-form.php?e=".urlencode($error)); exit;  
}  
          
// write the email content  
$email_content = "Name: $name\n";  
$email_content .= "Email Address: $email_address\n";  
$email_content .= "Message:\n\n$message";  
      
// send the email  
mail ("nicolas.girard.qc@gmail.com", "Prise de contact", $email_content);  
      
// send the user back to the form  
header("Location: fr.html?s=".urlencode("Merci pour votre message, nous vous repondront bientot")); exit;  
  
?>  