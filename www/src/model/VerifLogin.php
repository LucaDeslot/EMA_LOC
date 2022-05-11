<?php

session_start();

require_once dirname(__FILE__) . '/ModelLogin.php';


if(isset($_POST['username']) && isset($_POST['password'])){
    
    $username = $_POST['username']; 
    $password = $_POST['password'];
    //print_r(ModelLogin::selectUsernameAndPasswordCount($username, $password));
    if(array_values(ModelLogin::selectUsernameAndPasswordCount($username, $password)[0])[0] == 1){
        $SESSION['username'] = $username;
        echo "bonjour vous êtes l'user : ". $SESSION['username']; 
    } else {
        echo "mdp incorrect"; 
    }
}


?>