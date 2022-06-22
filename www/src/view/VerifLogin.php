<?php

if(isset($_POST['username']) && isset($_POST['password'])){
    
    $username = $_POST['username']; 
    $password = $_POST['password'];
    
    if(array_values(ModelLogin::selectUsernameAndPasswordCount($username, $password)[0])[0] == 1){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    }
    
}


?>