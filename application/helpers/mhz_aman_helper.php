<?php

function getSignedInData($field = NULL)
{
    
    if(isset($_SESSION['auth'])){

        $signedInData = ($field) ? $_SESSION['auth']->$field : $_SESSION['auth'];
        // json($signedInData, true);
        return $signedInData;
    }else{
        return false;
    }
    
}

function _getUserInfo($param = null){
	$ci =& get_instance();
	if($param == null){
		return $ci->session->userdata();
	}else{
		return $ci->session->userdata($param);
	}
}

function _isLoggedin(){
	$ci =& get_instance();
	$isLoggedin = $ci->session->userdata('isLoggedin');
	if($isLoggedin == FALSE){
		redirect('auths/signin');
	}
}

function _isAdmin(){
	$ci =& get_instance();
	$isAdmin = $ci->session->userdata('isAdmin');
	if($isAdmin != "admin"){
		redirect('auths/forbidden');
	}
}

function _isAjax(){
    $ci =& get_instance();
    if(!$ci->input->is_ajax_request()){
        redirect('auths/forbidden');
    }
}

function _encrypt_str($str){
	$ci =& get_instance();
	$ci->load->library('encryption');
	$encrypted_str =  $ci->encryption->encrypt($str);
	return $encrypted_str;
}

function _decrypt_str($str){
	$ci =& get_instance();
	$ci->load->library('encryption');
	$decrypted_str =  $ci->encryption->decrypt($str);
	return $decrypted_str;
}

function _encode($data) {
	// 'base64url' variant encoding
  	return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function _decode($data) {
	// 'base64url' variant decoding
  	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

function generate_random_string($length){
	$characters = '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)]; 
	}
	return $randomString;
}