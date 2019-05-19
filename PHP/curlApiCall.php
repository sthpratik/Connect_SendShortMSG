<?php 
    // Defining API URL & KEY
    define("apiUrl", "http://sendshortmsg.com/");
    define("apikey", "RmNnTUpPYkJrRUx3QnAzK3Q2blF");
    function retreiveData($url)
    {
        // create curl resource
        $ch = curl_init();
        // set url 
        curl_setopt($ch, CURLOPT_URL, $url);
        // $output contains the output json
        $output = curl_exec($ch);
        // close curl resource to free up system resources 
        curl_close($ch);
        return $output;
    }
    /*
        This gives to all the messages that is on new status which means its on database but not send to the user yet
    */
    function retrievePendingMessages()
    {
        $url=apiUrl."retrieveMessage/".apikey;
        var_dump(json_decode(retreiveData($url),true));
    }
    //retrievePendingMessages();

    /*
        This gives to all the messages that is sent for the API user
        Call This function 
        retrieveAllMessages();
    */
    function retrieveAllMessages()
    {
        $url=apiUrl."retrieveAllMessages/".apikey;
        var_dump(json_decode(retreiveData($url),true));
    }
    /*
        This gives add Message in the Queue to pick by app to send message to intended user
        Call this to send message
        SendMessage("1234567890","SendMessage API Call");
    */
    function SendMessage($phone_no,$message)
    {
        $url=apiUrl."syncMessage/".$phone_no."/".$message."/".apikey;
        var_dump(retreiveData($url));
    }

    /*
        SendMessage("1234567890","SendMessage API Call");
        retrievePendingMessages();
    */
   
?>