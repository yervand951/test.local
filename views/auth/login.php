<?php
 $postData =   "
    <form action='/auth/login' method='post'>
        <input type='email' name='email' placeholder='Emeil'>
        <input type='password' name='password' placeholder='Password'>
        <input type='submit' value='Login'>
    </form>
    <a href='/auth/getsignup'>Sign Up</a>
    
    ";
require_once('../add.php');
