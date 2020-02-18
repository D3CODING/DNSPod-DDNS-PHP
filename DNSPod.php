<?php
//DDNS用到的一些API对象封装，更多API帮助请参考官方api文档 https://www.dnspod.cn/docs/index.html
class DNSPodDdns
{
    private $Token = 'id,token';	//请填入自己申请的密钥（格式：id,token）
    private $Ua = 'YourClient/1.0(123456789@qq.com)';	//请填写自己的UA,注意UA中不能有空格，否则POST接口返回403,格式：程序名/版本(邮箱)
	
	public function post($data, $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->Ua);
		$data['login_token'] = $this->Token;
		$data['format'] = 'json';	//返回的数据格式，可选，默认为xml，建议用json
		$data['lang'] = 'cn';	//返回的错误语言，可选，默认为en，建议用cn
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $rst = curl_exec($ch);
        curl_close($ch);
        return $rst;
    }
	
	public function UserDetail()	//获取帐户信息
	{
		$url = 'https://dnsapi.cn/User.Detail';
		$data = array();
        return $this->post($data, $url);
    }
	
	public function UserLog()	//获取用户日志
	{
		$url = 'https://dnsapi.cn/User.Log';
		$data = array();
        return $this->post($data, $url);
    }
	
	public function DomainList()	//获取域名列表
	{
		$url = 'https://dnsapi.cn/Domain.List';
		$data = array();
        return $this->post($data, $url);
    }
	
	public function RecordList($domain_id)	//记录列表
	{
		$url = 'https://dnsapi.cn/Record.List';
		$data['domain_id'] = $domain_id;
        return $this->post($data, $url);
    }
	
	public function RecordInfo($domain_id, $record_id)	//获取记录信息
	{
		$url = 'https://dnsapi.cn/Record.Info';
		$data['domain_id'] = $domain_id;
		$data['record_id'] = $record_id;
        return $this->post($data, $url);
    }
	
	public function RecordRemark($domain_id, $record_id, $remark)	//设置记录备注
	{
		$url = 'https://dnsapi.cn/Record.Remark';
		$data['domain_id'] = $domain_id;
		$data['record_id'] = $record_id;
		$data['remark'] = $remark;
        return $this->post($data, $url);
    }
	
	public function RecordDdns($domain_id, $record_id, $sub_domain, $ip)	//更新动态DNS记录
	{
		$url = 'https://dnsapi.cn/Record.Ddns';
		$data['record_line'] = '默认';	//线路
		$data['domain_id'] = $domain_id;
		$data['record_id'] = $record_id;
		$data['sub_domain'] = $sub_domain;
		$data['record_id'] = $record_id;
		$data['value'] = $ip;
        return $this->post($data, $url);
    }
	
	/*
	上面的方法都是调用DNSPod的官方API
	但是官方限制5次更新DDNS如果IP不变则锁定
	故下面的方法会手动检测变动，IP未变动则不更新记录
	*/
	public function UpdateDdns($domain_id, $record_id, $ip)
	{
		date_default_timezone_set('Asia/Shanghai');	//设置时区
		$this->RecordRemark($domain_id, $record_id, date('Y-m-d H:i:s'));	//更新备注为当前时间
		$res = $this->RecordInfo($domain_id, $record_id);	//	获取记录
		$arr = json_decode($res, true);	//返回json转为数组
		if ($arr['record']['value'] == '' || $arr['record']['sub_domain'] == '')
		{
			$res = '请求失败！';
		}
		else
		{
			if ($arr['record']['value'] == $ip)
			{
				$res = 'IP未变动，备注已经更新！';
			}
			else
			{
				$this->RecordDdns($domain_id, $record_id, $arr['record']['sub_domain'], $ip);
				$res = $arr['record']['sub_domain'] . '->' . $ip;	//子域名重新指向结果
			}
		}
        return $res;
    }
}
?>
