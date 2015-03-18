<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>发送状态</title>
	</head>
	<body>
		<?php

			require_once "email.class.php";
			//SMTP服务器
			$smtpserver = "smtp.163.com";
			//SMTP端口号?
			$smtpserverport = 25;
			//SMTP发邮件的邮箱
			$smtpusermail = "cqc@163.com";
			//发给谁
			$smtpemailto = $_POST['toemail'];
			//SMTP用户名，不加@163.com
			$smtpuser = "cqc";
			//SMTP用户密码
			$smtppass = "wtf";
			//主题
			$mailtitle = $_POST['topic'];
			//构建内容
			$mailcontent = "TA的名字 ".$_POST['name']."<br>内容: ".$_POST['content'];
			//邮件内容为HTML格式
			$mailtype = "HTML";
			//实例化对象
			$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
			//关闭调试信息
			$smtp->debug = false;
			//发送邮件
			$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
			//检查发送状态
			if($state==""){
				echo "邮件发送失败，请检查密码或其他设置";
			}else if(strlen($state)!=0){
			//发送成功
				echo "邮件发送成功";
			}else{
				echo "未知错误";
			}

		?>
	</body>
</html>


