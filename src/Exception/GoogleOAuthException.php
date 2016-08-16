<?php

namespace POGOApiPHP\Exceptions;

use Exception;

class GoogleOAuthException extends Exception{
    
    public function __construct($message){
        parent::__construct($message);
    }
    
}