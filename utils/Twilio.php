<?php
 
namespace Utils;
 
class Twilio {
 
    private $sid = "AC5628044ae6dac9cf04c2ddfeec38e567"; // Your Account SID from www.twilio.com/console
    private $token = "d6bf0a93ed7dccc805b2a83dcdb3a8e3"; // Your Auth Token from www.twilio.com/console
 
    private $client;
 
    public function __construct() {
        $this->client = new \Twilio\Rest\Client($this->sid, $this->token);
    }

    public function sendSMS($from, $body, $to) {
        $message = $this->client->messages->create(
            $to, // Text this number
            array(
              'from' => $from, // From a valid Twilio number
              'body' => $body
            )
        );
        return $message->sid;
    }
    
}

// $from = 'Aqualine';
//     $body = 'Bonjour';
//     $to = '22508474872';