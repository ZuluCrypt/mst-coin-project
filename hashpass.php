<?php 
$hashedPassword = password_hash("adminpassword", PASSWORD_DEFAULT);
echo $hashedPassword;
?>