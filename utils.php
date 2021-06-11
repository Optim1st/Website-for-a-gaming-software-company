<?php

function connect($link, $post = null, $cookie = null, $head = null, $ref = null, $headers = array('XF-Api-Key: A3i8TiMKz7Sndpe8PB8l091qz9RXA-1z'))
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $link);
    if ($headers !== null){
        if(isset($headers['PUT'])){
             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
             unset($headers['PUT']);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36');
    if ($ref !== null)
        curl_setopt($ch, CURLOPT_REFERER, $ref);
    curl_setopt($ch, CURLOPT_TIMEOUT, 25);
    curl_setopt($ch, CURLOPT_HEADER, $head !== null);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    #SSL VER#
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    #SSL VER#




    if ($cookie !== null)
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    if ($post !== null) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $otvet = curl_exec($ch);
    #var_dump(curl_getinfo( $ch));
    if (!$otvet) {
        
        echo 'Error curl: ' . curl_error($ch);
        
    }
    curl_close($ch);
    return $otvet;
}


class UcZone
{
    private $hash_key = null;
    private static $API_ROOT = 'https://uc.zone/api/';
    private $l_error = '';

    private function check_key(){
        if(empty($this->hash_key)){
            $this->l_error = ('Empty hash');
            return false;
        }
        
        return true;
    }

    function __construct($key) {
        $this->hash_key = $key . ' test';

    }
    public function last_error(){
        return $this->l_error;
    }
    public function register($username, $password, $email){
        if(!$this->check_key()){
            return false;
        }
        $params = array(
            // 'hwid' => $this->hash_key,
            // 'action' => 'register',
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'api_bypass_permissions' => 1,
        );
        $url =  self::$API_ROOT .'users/register'; // 

        
        $res = connect($url, http_build_query($params));
        $json = json_decode($res, true);

        if(isset($json['errors'])){
            $this->l_error = ($json['errors'][0]['message']);
            return false;
        }
        
            
        if(($json['success'])){
            return $json['user'];
        }
        
        return false;
    }

    public function checkSubscribe($username, $password){
    	$params = array(
            'login' => $username,
            'password' => $password,
            'api_bypass_permissions' => 1
        );

        $url = self::$API_ROOT . 'hwid/auth';
        $res = connect($url, http_build_query($params));
        $json = json_decode($res, true);
        
        if(isset($json['errors'])){
            $this->l_error = ($json['errors'][0]['message']);
            return null;
        }
    
            
        if(($json['success'])){
            return $json['user_upgrades']['14']['end_sub'];
        }
        
        return null;

    	https://uc.zone/api/hwid/auth
    }

    public function resetHWID($username, $password){
    	$params = array(
            'login' => $username,
            'password' => $password,
            'api_bypass_permissions' => 1
        );

        $url = self::$API_ROOT . 'hwid/reset';
        $res = connect($url, http_build_query($params));
        $json = json_decode($res, true);

        
        
        if(isset($json['errors'])){
            $this->l_error = ($json['errors'][0]['message']);
            return false;
        }
    
            
        if(($json['success'])){
            return true;
        }
        
        return false;
    }
    
    public function authenticate($username, $password){
        if(!$this->check_key()){
            return false;
        }
        $params = array(
            'login' => $username,
            'password' => $password,
        );
        $url = self::$API_ROOT . 'auth/';
        $res = connect($url, http_build_query($params));
        $json = json_decode($res, true);
        
        if(isset($json['errors'])){
            $this->l_error = ($json['errors'][0]['message']);
            return false;
        }
    
            
        if(($json['success'])){
        	$json['user']['end_sub'] = $this->checkSubscribe($username, $password);
            return $json['user'];
        }
        
        return false;
    }

    public function changePassword($username, $old_password, $new_password){
        $auth_res = $this->authenticate($username, $old_password);
        if(!$auth_res){
            return false;
        }

        $params = array(
            'password' => $new_password,
            'api_bypass_permissions' => 1,
        );
        $url = self::$API_ROOT .'users/' . $auth_res['user_id'] . '/';
        $res = connect($url, http_build_query($params));

        var_dump($res);

        $json = json_decode($res, true);

          if(isset($json['errors'])){
            $this->l_error = ($json['errors'][0]['message']);
            return false;
        }
    
            
        if(($json['success'])){
            return $json['user'];
        }
        
        return false;
    }

     public function upgrade($username, $password, $promocode){
        $params = array(
            'login' => $username,
            'password' => $password,
            'promocode' => $promocode
        );

        $url = self::$API_ROOT . 'users/promocode';
        $res = connect($url, http_build_query($params));
        $json = json_decode($res, true);

        
        
        if(isset($json['errors'])){
            $this->l_error = ($json['errors'][0]['message']);
            return false;
        }
    
            
        if(($json['success'])){
            return true;
        }
        
        return false;
    }


}

// $zone = new UcZone('c3RZci2s-AFD7HbEDZA-X8tLL9C0dac0');



// // $res = $zone->register('1test_kolsha0', 'test_kolsha', '1test_kolsha0@mail.ru');

// // var_dump($res);

// $res = $zone->authenticate('', '');

// var_dump($res);


// $res = $zone->resetHWID('', '');
// var_dump($res);


// $res = $zone->changePassword('1test_kolsha0', 'test_kolsha', 'test_kolsha');
// var_dump($res);
