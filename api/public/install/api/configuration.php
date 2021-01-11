<?php
include_once 'common.php';
/**
 * 项目配置
 */
$contents='';
$booleanArr=['app_debug','mail_switch','miniweixin_subscription_information_switch','wechat_mini_program_switch','wechat_official_account_switch','wechat_payment_sandbox','wechat_subscription_information_switch'];
$post=json_decode(file_get_contents("php://input"));
foreach ($post as $key=>$value){
    if(in_array($key,$booleanArr)){
        $contents.=strtoupper($key).'='.($value ? 'true' : 'false').PHP_EOL;
    }else{
        $contents.=strtoupper($key).'='.$value.PHP_EOL;
    }
}
file_put_contents("../../../.env",$contents);
resReturn('ok');