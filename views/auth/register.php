<?php
$postData = "
<form action='/auth/signup' method='post'>
    <input type='test' name='name' placeholder='Name'>
    <input type='email' name='email' placeholder='Emeil''>
    <input type='password' name='password' placeholder='Password'>
    <input type='password' name='rpassword' placeholder='Reqovery Password'>
    <input type='submit' value='Sign Up'>
</form>
    <a href='/auth/getlogin'>Log In</a>
";
require_once('../add.php');