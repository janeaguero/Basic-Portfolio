<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];
  
  $email_from = "$visitor_email \r\n";
  
  $to = "jane.m.aguero@gmail.com";
  
  $headers = "From: $visitor_email \r\n";
  $headers .= "Reply-To: $visitor_email \r\n";
  $email_subject = "A Message For You";
  
  $email_body = "You have received a message from a visitor to your site $name.\n".   	  "Here's what they said:\n $message";

  mail($to,$email_subject,$email_body,$headers);

  header('Location:thank-you.html');


function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
                
    $inject = join('|', $injections);
    $inject = "/$inject/i";
     
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}
 
if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>