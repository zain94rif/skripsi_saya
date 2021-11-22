<?php
require_once('src/Registration.php');
 
$debug = false;
$username = "";  
$code = ""; // Received Verification Code
 
if(empty($username)){
echo "Mobile Number can't be Empty";
exit(0);
}
if (!preg_match('!^\d+$!', $username))
{
  echo "Wrong number. Do NOT use '+' or '00' before your number\n";
  exit(0);
}
 
$identityExists = file_exists("src/wadata/id.$username.dat");
 
$w = new Registration($username, $debug);
 
if (!$identityExists)
{
echo "Identity Doesn't Exists";
}
else
{
 
  try {
    $result = $w->codeRegister($code);
    echo "Your username is: ".$result->login."<BR>";
    echo "Your password is: ".$result->pw."<BR>";
  } catch(Exception $e) {
    echo $e->getMessage();
    exit(0);
  }
  
}
?>