<?php
//查看解析记录对应ID
require_once '../DNSPod.php';
$Ddns = new DNSPodDdns();
$res = json_decode($Ddns->RecordList(123456789),true);	//此处123456789填写domain.php中获得的域名ID
echo '<pre>';
print_r($res);
echo '</pre>';
/*
下面为输出示例，请记下对应记录(records->n->name)的记录ID(records->n->id)

Array
(
    [status] => Array
        (
            [code] => 1
            [message] => Action completed successful
            [created_at] => 2020-02-16 12:00:00
        )

    [domain] => Array
        (
            [id] => 123456789
            [name] => xxx.com
            [punycode] => xxx.com
            [grade] => DP_Plus
            [owner] => xxxxxxxxx@qq.com
            [ext_status] => 
            [ttl] => 120
            [min_ttl] => 120
            [dnspod_ns] => Array
                (
                    [0] => ns1.dnsv2.com
                    [1] => ns2.dnsv2.com
                )

            [status] => enable
        )

    [info] => Array
        (
            [sub_domains] => 3
            [record_total] => 3
            [records_num] => 3
        )

    [records] => Array
        (
            [0] => Array
                (
                    [id] => 123456789
                    [ttl] => 120
                    [value] => ns1.dnsv2.com.
                    [enabled] => 1
                    [status] => enable
                    [updated_on] => 2020-02-16 12:00:00
                    [name] => @
                    [line] => 默认
                    [line_id] => 0
                    [type] => NS
                    [weight] => 
                    [monitor_status] => 
                    [remark] => 
                    [use_aqb] => no
                    [mx] => 0
                    [hold] => hold
                )

            [1] => Array
                (
                    [id] => 123456789
                    [ttl] => 120
                    [value] => ns2.dnsv2.com.
                    [enabled] => 1
                    [status] => enable
                    [updated_on] => 2020-02-16 12:00:00
                    [name] => @
                    [line] => 默认
                    [line_id] => 0
                    [type] => NS
                    [weight] => 
                    [monitor_status] => 
                    [remark] => 
                    [use_aqb] => no
                    [mx] => 0
                    [hold] => hold
                )

            [2] => Array
                (
                    [id] => 123456789
                    [ttl] => 10
                    [value] => 1.1.1.1
                    [enabled] => 1
                    [status] => enable
                    [updated_on] => 2020-02-16 12:00:00
                    [name] => abc
                    [line] => 默认
                    [line_id] => 0
                    [type] => A
                    [weight] => 
                    [monitor_status] => 
                    [remark] => 2020-02-16 13:00:00
                    [use_aqb] => no
                    [mx] => 0
                )

        )

)

*/
?>