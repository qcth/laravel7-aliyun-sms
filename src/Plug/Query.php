<?php
/*
 * 此文件用于验证短信服务API接口，供开发时参考
 * 执行验证前请确保文件为utf-8编码，并替换相应参数为您自己的信息，并取消相关调用的注释
 * 建议验证前先执行Test.php验证PHP环境
 *
 * 2017/11/30
 */

namespace Qcth\AliyunSms\Plug;

use Qcth\AliyunSms\Library\SignatureHelper;

/**
 * 短信发送记录查询
 */

class Query{

    // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
    private $accessKeyId;
    private $accessKeySecret;

    //密钥初始化
    public function __construct($accessKeyId=null,$accessKeySecret=null){
       $this->accessKeyId=$accessKeyId;
       $this->accessKeySecret=$accessKeySecret;
    }
    function querySendDetails($iphone,$date_str="20170710",$page=10,$current_page=1) {

        // fixme 必填: 短信接收号码
        $params["PhoneNumber"] = $iphone;
    
        // fixme 必填: 短信发送日期，格式Ymd，支持近30天记录查询
        $params["SendDate"] = $date_str;
    
        // fixme 必填: 分页大小
        $params["PageSize"] = $page;
    
        // fixme 必填: 当前页码
        $params["CurrentPage"] = $current_page;
    
        // fixme 可选: 设置发送短信流水号
       // $params["BizId"] = "yourBizId";
    
        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        
        //默认值,无须更改
        $params['RegionId']="cn-hangzhou";
        $params['Action']="QuerySendDetails";
        $params['Version']="2017-05-25";

        // 短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();
    
        // 此处可能会抛出异常，注意catch
        $content = $helper->request($this->accessKeyId,$this->accessKeySecret,$domain,$params);
            
    
        return $content;
    }
}
