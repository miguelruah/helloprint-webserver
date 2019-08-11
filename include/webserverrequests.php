<?php
class webserverrequests{

    public function login($username, $password){
        // create resource
        $ch = curl_init();

        // set and encode params as a json string
        $params = [ 'login', $username, $password ];
        $jsonParams = json_encode($params);

        // set destination and params
        curl_setopt($ch, CURLOPT_URL, $GLOBALS['producer']); // set destination *** in real life, this should start with https:// ***
        curl_setopt($ch, CURLOPT_POST, 1);                   // set POST (not GET)
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonParams);   // set params with json string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);      // don't output the result => set a var with it
    
        // run
        $result = curl_exec($ch);

        // close resource
        curl_close($ch);

        // array $result includes boolean key 'result'
        //and then is converted to associative array
        return json_decode($result, true);
    }

    public function forgot($username){
        // create resource
        $ch = curl_init();

        // set and encode params as a json string
        $params = [ 'forgot', $username ];
        $jsonParams = json_encode($params);

        // set destination and params
        curl_setopt($ch, CURLOPT_URL, $GLOBALS['producer']); // set destination *** in real life, to play safe, this should be https://producer.local ***
        curl_setopt($ch, CURLOPT_POST, 1);                   // set POST (not GET)
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonParams);   // set params with json string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);      // don't output the result => set a var with it
    
        // run
        $result = curl_exec($ch);

        // close resource
        curl_close($ch);

        // array $result includes boolean key 'result'
        //and then is converted to associative array
        return json_decode($result, true);
    }
}
    
    
?>