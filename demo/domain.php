<?php
//查看域名对应ID
require_once '../DNSPod.php';
$Ddns = new DNSPodDdns();
$res = json_decode($Ddns->DomainList(),true);
echo '<pre>';
print_r($res);
echo '</pre>';
/*
下面为输出示例，请记下对应域名(domains->n->name)的域名ID(domains->n->id)

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
            [domain_total] => 2
            [all_total] => 2
            [mine_total] => 2
            [share_total] => 0
            [vip_total] => 1
            [ismark_total] => 0
            [pause_total] => 0
            [error_total] => 0
            [lock_total] => 0
            [spam_total] => 0
            [vip_expire] => 0
            [share_out_total] => 0
        )

    [domains] => Array
        (
            [0] => Array
                (
                    [id] => xxxxxxxx
                    [status] => enable
                    [grade] => DP_Plus
                    [group_id] => 1
                    [searchengine_push] => yes
                    [is_mark] => no
                    [ttl] => 120
                    [cname_speedup] => enable
                    [remark] => 
                    [created_on] => 2020-01-20 12:00:00
                    [updated_on] => 2020-01-20 12:00:00
                    [punycode] => xxx.com
                    [ext_status] => 
                    [src_flag] => DNSPOD
                    [name] => xxx.com
                    [grade_level] => 3
                    [grade_ns] => Array
                        (
                            [0] => ns1.dnsv2.com
                            [1] => ns2.dnsv2.com
                        )

                    [grade_title] => 个人专业版
                    [is_vip] => yes
                    [owner] => xxxxxxxxx@qq.com
                    [records] => 2
                    [vip_start_at] => 2020-01-20 00:00:00
                    [vip_end_at] => 2021-01-20 00:00:00
                    [vip_auto_renew] => default
                )

            [1] => Array
                (
                    [id] => xxxxxxxx
                    [status] => enable
                    [grade] => DP_Free
                    [group_id] => 1
                    [searchengine_push] => no
                    [is_mark] => no
                    [ttl] => 600
                    [cname_speedup] => disable
                    [remark] => 
                    [created_on] => 2020-02-14 00:00:00
                    [updated_on] => 2020-02-14 00:00:00
                    [punycode] => xxxx.com
                    [ext_status] => 
                    [src_flag] => DNSPOD
                    [name] => xxxx.com
                    [grade_level] => 2
                    [grade_ns] => Array
                        (
                            [0] => f1g1ns1.dnspod.net
                            [1] => f1g1ns2.dnspod.net
                        )

                    [grade_title] => 免费版
                    [is_vip] => no
                    [owner] => xxxxxxxxx@qq.com
                    [records] => 2
                )

        )

)
*/
?>