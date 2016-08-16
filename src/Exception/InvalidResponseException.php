<?php

namespace POGOApiPHP\Exceptions;

use Exception;

class InvalidResponseException extends Exception {
    
    public function __construct($message = NULL){
        parent::__construct($message);
    }
    
}