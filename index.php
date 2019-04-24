<?php
error_reporting(0);

if($_POST['add']=='1'){
	$yourname = $_POST['name'];//姓名
	$tel = $_POST['tel'];
	$qq = $_POST['qq'];
	$email = $_POST['email'];//学习部

	$message = $_POST['message'];
    $Subject = $yourname."-进才中学学生部门反馈";
	date_default_timezone_set('Asia/Shanghai');
	$time = date("Y-m-d H:i:s",time());
	//内容
    $Body = '姓名：'.$yourname.'<br>电话：'.$tel.'<br>QQ：'.$qq.'<br>提交时间：'.$time.'<br>内容：'.$message;


    $FromName = "反馈系统";//设置发件人昵称
    $Username = "jcxmtb@163.com";//smtp登录的账号
    $Password = "135790hy";//smtp登录的密码 使用生成的授权码
    $From = "jcxmtb@163.com" ;//发件人邮箱地址 同登录账号
    $addAddress = $email;//收件人地址

    $status = phpmalier($FromName,$Username,$Password,$From,$addAddress,$Subject,$Body);

    if($status){
        echo '<script>alert("提交成功！感谢你的反馈。");history.go(-1);</script>';
    }else{
        echo '<script>alert("提交失败了！");history.go(-1);</script>';
    }



}
?>

<?php

function phpmalier($FromName,$Username,$Password,$From,$addAddress,$Subject,$Body){
    // 引入PHPMailer的核心文件
    require_once("PHPMailer/class.phpmailer.php");
    require_once("PHPMailer/class.smtp.php");
    // 实例化PHPMailer核心类
    $mail = new PHPMailer();
// 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    $mail->SMTPDebug = 1;
// 使用smtp鉴权方式发送邮件
    $mail->isSMTP();
// smtp需要鉴权 这个必须是true
    $mail->SMTPAuth = true;
// 链接qq域名邮箱的服务器地址
    $mail->Host = 'smtp.163.com';
// 设置使用ssl加密方式登录鉴权
   $mail->SMTPSecure ="ssl";

   $mail->Port=465;
// 设置ssl连接smtp服务器的远程服务器端口号
// 设置发送的邮件的编码
    $mail->CharSet = 'UTF-8';
// 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->FromName = $FromName;
// smtp登录的账号 QQ邮箱即可
    $mail->Username = $Username;//'jcxmtb@163.com';
// smtp登录的密码 使用生成的授权码
    $mail->Password = $Password;//'135790hy';
// 设置发件人邮箱地址 同登录账号
    $mail->From = $From;// 'jcxmtb@163.com';
// 邮件正文是否为html编码 注意此处是一个方法
    $mail->isHTML(true);
// 设置收件人邮箱地址
    $mail->addAddress($addAddress);
// 添加多个收件人 则多次调用方法即可
// 添加该邮件的主题
    $mail->Subject =$Subject;
// 添加邮件正文
    $mail->Body = $Body;

// 发送邮件 返回状态
    return $mail->Send();

}

?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言反馈 - By 新媒体部</title>
<style>
body{font-size:14px; font-family:tahoma;}
a{color:#000;}
a:hover{color:#f60;}
.red{color:#F00;}
#header,#content,#footer{width:760px; margin:0 auto;}
#header h1{ font-size:36px; color:#075CB1; float:left; margin-bottom:10px; overflow:hidden;}
#header{border-bottom:3px solid #075CB1;margin-bottom:10px;}

#header .gg{ float:right;text-align:right; font-size:12px; width:386px; margin:10px 10px 0 0; color:#999;}

#content{margin-bottom:10px;}
#content .title{width:176px; border:1px solid #b1c1e2; border-bottom:0; font-weight:bold; background:#ecedf8; text-align:center; position:relative; bottom:-1px; line-height:2em; z-index:9;}
#content .main{border:1px solid #b1c1e2; background:#ecedf8; position:relative;}

#content form{margin:8px; background:#fff; padding:10px 0;}

#content .tip{font-size:12px; color:#666;}
#footer{border-top:3px solid #075CB1; position:relative; background:#f5f5f5; padding-top:8px; text-align:center; font-size:12px; color:#999; margin-bottom:10px;}
#footer a{ color:#666}

</style>
<script type="text/javascript">
function G(id){
   return document.getElementById(id);	
}
function ck(){
   if(G('yourname').value == ''){
	alert("姓名不能为空！");
	G('yourname').focus();
	return false;
   }
   if(G('message').value == ''){
	alert("内容不能为空！");
	G('message').focus();
	return false;
   }
}
</script>

</head>

<body>
&nbsp;
<div id="header">
	<h1>
		进才学生部门反馈系统
</h1>
</div>
    <div class="gg">

</div>
	<div class="title"><strong>&nbsp;进才学生部门反馈系统</strong></div>
<div id="content">

	<div class="main">

		<form action="" method="post" onsubmit="return ck();">

			<table width="100%" cellspacing="0" cellpadding="5" border="0">
				<tbody>
				<tr valign="top">
					<td width="22%" align="right" valign="middle" class="field">姓名:</td>
					<td valign="middle">
						<input type="text" maxlength="40" size="26" id="yourname" name="name" /> 
						<font color="red">*</font>
						<span class="tip">姓名或昵称</span>
                    </td>
                </tr>
                <tr valign="top">
                    <td valign="middle" align="right" class="field">部门:</td>
                    <td>
                    	<!-- 选择哪个部门 -->
						<select name="email">
							<option value="q77889966@yeah.net">学习部</option>
							<option value="">党团校部</option>
							<option value="">广电部</option>
							<option value="jcjilvzhongcaibu@163.com">纪律仲裁部</option>
							<option value="2410286496@qq.com">权益保障部</option>
							<option value="">生活互助部</option>
							<option value="jczxshijianbu@163.com">实践部</option>
							<option value="jczxstglb@outlook.com">社团管理部</option>
							<option value="">体育部</option>
							<option value="jczxwlb@163.com">外联部</option>
							<option value="">文艺部</option>
							<option value="">宣传部</option>
							<option value="">心理部</option>
							<option value="2304144391@qq.com">新媒体部</option>
							<option value="jctwzuzhibu@163.com">组织部</option>
							<option value="1442915432@qq.com">秘书处</option>
						</select>
						<font color="red">*</font> 
						<span class="tip">选择哪个部门</span>
                    </td>
                </tr>
                <tr valign="top">
                    <td valign="middle" align="right" class="field">班级:</td>
                    <td>
						<input type="text" name="" name="class">
						<font color="red">*</font>
						<span class="tip">填写哪个班级</span>
                    </td>
                </tr>
                <tr valign="top">
                    <td valign="middle" align="right" class="field">邮箱:</td>
                    <td>
						<input type="text" maxlength="40" size="26" id="email"  />  
						<span class="tip">您的Email地址（建议填写）</span>
                    </td>
                </tr>
                
				<tr valign="top">
					<td valign="middle" align="right" class="field">QQ号码:</td>
					<td>
						<input type="text" maxlength="40" size="26" id="qq" name="qq" /> 
						<span class="tip">您的QQ号码</span>
					</td>
				</tr>
                
				<tr valign="top">
					<td valign="middle" align="right" class="field">联系电话:</td>
					<td>
						<input type="text" maxlength="15" size="26" id="tel" name="tel" /> 
						<span class="tip">电话或手机号</span>
					</td>
				</tr>
                
				<tr valign="top">
					<td valign="middle" align="right" class="field">内容:</td>
					<td>
						<textarea name="message" id="message" cols="60" rows="7"></textarea> <font color="red">*</font>
                    </td>
                </tr>
                
                <tr valign="top">
					<td class="field"></td>
					<td><input name="add" type="hidden" value="1" />
						<input type="submit" value="提 交" /> <footer color="red"><?php echo $ok; ?></footer>
					</td>
                </tr>
                </tbody>
			</table>
		</form>
	</div>
</div>



</span>
</body>
<div></div>
</html>
