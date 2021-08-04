<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>eml通讯录管理系统经典版</title>
<link rel='stylesheet' href='./css/login.css' type='text/css' />
</head>
<body>

<div id="login">
<h1><a href="http://bbs.emlsoft.com" target="_blank" title="">eml企业通讯录管理系统</a></h1> 
<form accept-charset="utf-8" action="?action=user&do=loginok" method="post">
	<p>
		<label>帐号：<?php echo $this->_var['hello']; ?></label>
		<input class="input" name="username" size="20" type="text" />
	</p>
	<p>
		<label>密码：</label>
		<input class="input" name="password" size="20" type="password" />
	</p>
	<p class="submit">
		<input class="button-primary" name="commit" type="submit" value="登录" />
		<input class="button-primary" name="commit" type="button" value="注册" onclick="javascript:window.location.href='?action=user&do=reg' "/>
	</p>
</form>

</div>
<div align="center">&nbsp;&nbsp; Powered by <a href="http://bbs.emlsoft.com/" target="_blank">emlSoft</a> <?php echo $this->_var['cfg']['version']; ?> 2013-2019 Some rights reserved</div>
</body>
</html>


