<?php

namespace POGOApiPHP\Helpers;

use POGOProtos\Networking\Envelopes\AuthTicket;
use POGOProtos\Networking\Envelopes\RequestEnvelope;
use POGOProtos\Networking\Envelopes\RequestEnvelope_AuthInfo;
use POGOProtos\Networking\Envelopes\RequestEnvelope_AuthInfo_JWT;
use POGOProtos\Networking\Requests\Request;

class RequestBuilder {
    
    /**
     * @var string 
     */
    private $authToken;
    
    /**
     * @var string
     */
    private $authType;
    
    /**
     * @var double
     */
    private $latitude;
    
    /**
     * @var double
     */
    private $longitude;
    
    /**
     * @var double
     */
    private $altitude;
    
    /**
     * @var AuthTicket
     */
    private $authTicket;
    
    public function __construct($authToken, $authType, $latitude, $longitude, $altitude, AuthTicket $authTicket = null){
        $this->authToken = $authToken;
        $this->authType = $authType;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
        $this->authTicket = $authTicket;
    }
    
    /**
     * @param Request[] $requests
     * @return RequestEnvelope
     */
    public function getRequestEnvelope(array $requests){
        $envelope = new RequestEnvelope();
        $envelope->setStatusCode(2);
        $envelope->setRequestId(1469378659230941192);
        $envelope->addRequests($requests);
        $envelope->setLatitude($this->latitude);
        $envelope->setLongitude($this->longitude);
        $envelope->setAltitude($this->altitude);
        $envelope->setAuthTicket($this->authTicket);
        $envelope->setUnknown12(989);
        return $envelope;
    }
    
    /**
     * 
     * @param Request[] $requests
     * @return RequestEnvelope
     */
    public function getInitialRequestEnvelope(array $requests){
        $envelope = new RequestEnvelope();
        $envelope->setStatusCode(2);
        $envelope->setRequestId(1469378659230941192);
        $envelope->addRequests($requests);
        $envelope->setLatitude($this->latitude);
        $envelope->setLongitude($this->longitude);
        $envelope->setAltitude($this->altitude);
        $envelope->setAuthTicket($this->authTicket);
        $authInfo = new RequestEnvelope_AuthInfo();
        $jwt = new RequestEnvelope_AuthInfo_JWT();
        $jwt->setContents($this->authToken);
        $jwt->setUnknown2(14);
        $authInfo->setProvider($this->authType);
        $authInfo->setToken($jwt);
        $envelope->setUnknown12(989);
        return $envelope;        
    }    
    
}