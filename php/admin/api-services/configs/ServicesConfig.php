<?php 
class ServicesConfig { 

    public static function post($url, $post_data) {
        // POST URL
        $post_url = ConstantsConfig::$api_base_url . $url;

        //url-ify the data for the POST
        $fields_string = http_build_query($post_data);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $post_url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $result = curl_exec($ch);

        // close connection
        curl_close($ch);
        
        return json_decode($result);
    }
    
    public static function get($url) {
        // GET URL
        $get_url = ConstantsConfig::$api_base_url . $url;

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $get_url);

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

        //execute get
        $result = curl_exec($ch);

        // close connection
        curl_close($ch);

        return json_decode($result);
    }
}