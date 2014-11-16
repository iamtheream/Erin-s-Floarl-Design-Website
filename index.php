<?php
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ){
  if (isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['content'])) {
    $to = 'iamtheream@gmail.com';

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);

    $sent = email($to, $email, $name, $content);
    if ($sent) {
      echo 'Message sent!';
    } else {
      echo 'Message couldn\'t sent!';
    }
  }
  else {
    echo 'All Fields are required';
  }
  return;
}

/**
 * Email send with headers
 *
 * @return bool | void
 **/
function email($to, $email, $name, $content){
  $header = array();
  $header[] = "From: Erin's Website";
  $header[] = "Here is the message:\n $content";
  if( mail($to, $content, implode("\r\n", $header)) ) return true; 
}
?> 