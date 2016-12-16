<?php
/**
*获取客户端真实ip
*/   
function GetIP(){ 
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")){
		$ip = getenv("HTTP_CLIENT_IP");
	} else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")){
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	} else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")){
		$ip = getenv("REMOTE_ADDR");
	} else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")){
		$ip = $_SERVER['REMOTE_ADDR']; 
	} else {
	 	$ip = "unknown";
	}
	return $ip;
}

/**
 * 生成验证码
 */

function verify(){
	$Verify = new \Think\Verify();
	$Verify->fontSize = 18;
	$Verify->length   = 4;
	$Verify->useNoise = false;
	$Verify->imageW = 130;
	$Verify->imageH = 50;
	//$Verify->useImgBg = true;
	//$Verify->useZh = true;
	$Verify->entry();
}

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}
