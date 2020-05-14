<?php
/**
 * 整合阿里短信接口,方便composer安装
 */

namespace Qcth\AliyunSms\Plug;

use Qcth\AliyunSms\Library\SignatureHelper;
/**
 * 发送短信
 */
class Send{
    
    //请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
    private $accessKeyId ;
    private $accessKeySecret;
    // 短信API产品域名
    private $domain="dysmsapi.aliyuncs.com";
    //参数
    private $params=array(
        'RegionId'=>"cn-hangzhou",
        'Action'=>'SendSms',
        'Version'=>'2017-05-25'
    );
    //密钥初始化
    public function __construct($accessKeyId=null,$accessKeySecret=null){
        $this->accessKeyId=$accessKeyId;
        $this->accessKeySecret=$accessKeySecret;
    }

    /**
     * $code  短信验证码
     * $iphone 手机号
     * $sign_name 短信签名
     * $template_code  模板code
     */
    public function to($code='1234',$iphone='13088888888',$sign_name='米椒互动',$template_code='SMS_99205063') {

        // fixme 必填: 短信接收号码
        $params["PhoneNumbers"] = $iphone;

        // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
        $params["SignName"] = $sign_name;

        // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = $template_code;

        // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
        $params['TemplateParam'] = json_encode(Array ("code" => $code,),JSON_UNESCAPED_UNICODE);
   
        
        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        
        $content = $helper->request($this->accessKeyId,$this->accessKeySecret,$this->domain, array_merge($params,$this->params) );
        
        //返出数组结果
        return json_decode(json_encode($content),true);
    }
}
