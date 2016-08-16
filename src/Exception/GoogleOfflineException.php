<?php

namespace POGOApiPHP\Exceptions;

use Exception;

class GoogleOfflineException extends Exception{
    
    public function __construct($message){
        parent::__construct($message);
    }
    
}