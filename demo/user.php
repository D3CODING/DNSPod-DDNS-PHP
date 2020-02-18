<?php
//获取用户信息，主要是查看用户API请求限制
require_once '../DNSPod.php';
$Ddns = new DNSPodDdns();
$res = json_decode($Ddns->UserDetail(),true);
echo '<pre>';
print_r($res);
echo '</pre>';
/*
下面为输出示例，其中和API调用相关的字段是用户等级"user_grade"

用户账号等级 => API限频（单位：次/小时）。
D_Free = 3000,
D_Plus = 5000,
D_Extra = 40000,
D_Expert = 50000,
D_Ultra = 99999,
DP_Free = 3600,
DP_Plus = 50000,
DP_Extra = 40000,
DP_Ultra = 99999,
DP_Local = 40000,


Array
(
    [status] => Array
        (
            [code] => 1
            [message] => Action completed successful
            [created_at] => 2020-02-16 12:00:00
        )

    [info] => Array
        (
            [user] => Array
                (
                    [weixin_binded] => yes
                    [agent_pending] => 
                    [nick] => 
                    [balance] => 0
                    [smsbalance] => 0
                    [is_dtoken_on] => 
                    [id] => xxxxxx
                    [email] => xxxxxxxxx@qq.com
                    [qq] => xxxxxxxxx
                    [status] => enabled
                    [telephone] => xxxxxxxxxxx
                    [email_verified] => yes
                    [telephone_verified] => yes
                    [user_grade] => DP_Plus
                    [real_name] => 
                    [user_type] => personal
                    [im] => 
                )

            [user_id] => xxxxxx
            [avatar_id] => x
            [avatar] => https://imgcache.qq.com/open_proj/proj_qcloud_v2/tc-console/dnspod/console/css/img/user-img/user-1.png
            [uin] => xxxxxxxxx
        )

)
*/
?>