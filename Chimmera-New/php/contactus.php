<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "roopak.burman@gmail.com";
     
    $email_subject = "Query from NEW Chimmera.com";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first-name']) ||
        !isset($_POST['last-name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['project-name']) ||
        !isset($_POST['description'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $fname = $_POST['first-name']; // required
    $lname = $_POST['last-name']; // required
    $email_from = $_POST['email']; // required
    $project_name = $_POST['project-name']; // required
    $message = $_POST['description']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(strlen($project_name) < 2) {
    $error_message .= 'The Project Name you entered do not appear to be valid.<br />';
  }
  if(strlen($message) < 2) {
    $error_message .= 'The requirements you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($fname)."\n";
    $email_message .= "Name: ".clean_string($lname)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Project: ".clean_string($project_name)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
 header('Location: index.html#contact');

?>
 
<!-- place your own success html below 
 
Thank you for contacting us. We will be in touch with you very soon.
 -->
 
 
<?php
}
die();
?>