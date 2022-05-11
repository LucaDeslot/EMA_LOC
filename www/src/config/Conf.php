<?php

class Conf {

      static private $databases = array(
        'database' => 'db',
        'login' => 'root',
        'password' => 'emaloc'
    );

      static public function getLogin() {
        return self::$databases['login'];
    }

     static public function getDatabase() {
        return self::$databases['database'];
     }
     
     static public function getPassword() {
        return self::$databases['password'];
     }

    static private $debug = True; 
    
    static public function getDebug() {
        return self::$debug;
    }


}
?>