<?php
require_once '../DNSPod.php';

//获得来访者IP
if (getenv('HTTP_CLIENT_IP')) 
{
	$ip = getenv('HTTP_CLIENT_IP');
}
elseif (getenv('HTTP_CDN_SRC_IP'))
{
	$ip = getenv('HTTP_CDN_SRC_IP');
}
elseif (getenv('HTTP_X_FORWARDED_FOR'))
{
	$ip = getenv('HTTP_X_FORWARDED_FOR');
}
elseif (getenv('REMOTE_ADDR'))
{
	$ip = getenv('REMOTE_ADDR');
}
else
{
	$ip = '127.0.0.1';
}

$Ddns = new DNSPodDdns();
echo $Ddns->UpdateDdns(123456789, 123456789, $ip); //域名ID，记录ID，IP地址
?>