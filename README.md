//阿里提供 $accessKeyId=''; $accessKeySecret='';


/**

$code 短信验证码
$iphone 手机号
$sign_name 短信签名
$template_code 模板code
*/

$data=AliyunSms::Send($accessKeyId,$accessKeySecret)->to($code,$iphone,$sign_name,$template_code);

if($data['Code']='OK'){ echo '发送成功'; }else{ echo '错误消息为'.$data['Message']; }


var_dump($data);


