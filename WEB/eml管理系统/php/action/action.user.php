<?php
if(!defined('CORE'))exit("error!"); 




//角色页面权限
function checkbox_area_action($areaid,$row_action){
	$action=explode(',',$row_action);
	$i=1;
	foreach($areaid as $key=>$val){
		if($key!="0"){
		if(in_array($key,$action)){
		$cbox .="<span style=\"float:left;width:150px\"><input name=\"areaid[]\" type=\"checkbox\" value=\"$key\" checked=\"checked\" />$val</span>\n";
		}else{
		$cbox .= "<span style=\"float:left;width:150px\"><input name=\"areaid[]\" type=\"checkbox\" value=\"$key\" />$val</span>\n";
		}
		}
		if($i==8){$cbox .="";}
		$i++;
	}
	return $cbox;
}


//验证登录
if($do=="loginok"){
	// 服务器根目录有个 /hint.txt
	exit("暂不开放");
}


//登录	
if($do=="login"){
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('web_name',$web_name);
	$smt->assign('title',"登录");
	$smt->display('user_login.htm');
	exit;
}

//注册
if($do=="reg"){
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('web_name',$web_name);
	$smt->assign('title',"注册");
	$smt->display('user_reg.htm');
	exit;
}


//退出	
if($do=="logout"){
	$_SESSION = array();
	session_destroy();
	exit($lang_cn['rabc_logout']);
}

//列表	
if($do==""){
	If_rabc($action,$do); //检测权限
	is_admin($action,$do); //检测权限
	$kewords = _RunMagicQuotes($_POST['kewords']);
	if($kewords){$search .= " and username like '%".strip_tags($kewords)."%'";}			
	if($_POST['time_start']!="" && $_POST['time_over']!=""){
		$search .= " and `created_at` >  '".strtotime($_POST[time_start]." 00:00:00")."' AND  `created_at` <  '".strtotime($_POST[time_over] ." 23:59:59")."'";
	}
	
	//设置分页
	$numPerPage="10";
	$pageNum=0*$numPerPage;

	$num=mysql_query("SELECT * FROM eml_user where 1=1 $search");//当前频道条数
	$total=mysql_num_rows($num);//总条数	
	$page=new page(array('total'=>$total,'perpage'=>$numPerPage));

	//查询
	$sql="SELECT * FROM eml_user  where 1=1 $search order by id desc LIMIT $pageNum,$numPerPage";
	
	$db->query($sql);
	$list=$db->fetchAll();	
	
 	
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
	$smt->assign('pageNum',$_GET[pageNum]); //当前页数
	$smt->assign('total',$total);  //总条数
	$smt->assign ('page',$page->show());
	$smt->assign('title',"用户管理");
	$smt->display('user_list.htm');
	exit;
	
}


//新建	
if($do=="new"){	
	If_rabc($action,$do); //检测权限
	is_admin($action,$do); //检测权限
	//角色数组
	$sql="select id FROM `eml_user`";
	$db->query($sql);
	$list=$db->fetchAll();
	
	//格式化角色数据
	foreach($list as $key=>$val){
		$role_cn[$list[$key][id]]=$list[$key][title];		
	}
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('select_role_cn',select($role_cn,"roleid","","选择角色","required"));
	$smt->assign('checkbox_area_action',checkbox_area_action($areaid));
	$smt->assign('title',"新建用户");
	$smt->display('user_new.htm');
	exit;
}


//写入
if($do=="add"){
    
	exit("暂不开放！");
}


//编辑	
if($do=="edit"){	
	If_rabc($action,$do); //检测权限
	$smt = new smarty();smarty_cfg($smt);
	//查询
	$sql=" SELECT * FROM eml_user where id='{$id}' LIMIT 1";
	$db->query($sql);
	$row=$db->fetchRow();
	
	//模版
	$smt->assign('row',$row);
	$smt->assign('title',"编辑用户");
	$smt->display('user_edit.htm');
	exit;
}


//更新
if($do=="updata"){
	If_rabc($action,$do); //检测权限	
	$id = _RunMagicQuotes($_POST[id]);
	$name = _RunMagicQuotes($_POST[name]);
	$sex = _RunMagicQuotes($_POST[sex]);
	$tel = _RunMagicQuotes($_POST[tel]);
	$phone = _RunMagicQuotes($_POST[phone]);
	$email = _RunMagicQuotes($_POST[email]);
	$qq = _RunMagicQuotes($_POST[qq]);
	$deparyment = _RunMagicQuotes($_POST[deparyment]);
	$position = _RunMagicQuotes($_POST[position]);
	$address = _RunMagicQuotes($_POST[address]);
	if(!$id){echo error($msg);exit;}
	$updated_at= time();
	$sql="UPDATE eml_user SET 
	`name` = '$name',
	`sex` = '$sex',
	`deparyment` = '$deparyment',
	`position` = '$position',
	`phone` = '$phone',
	`tel` = '$tel',
	`email` = '$email',
	`qq` = '$qq',
	`address` = '$address',
	`updated_at` = '$updated_at' WHERE `id` ='$id' LIMIT 1 ;";
	
	if($db->query($sql)){echo success($msg,"?action=user");}else{echo error($msg);}	
	exit;
}


//删除
if($do=="del"){
	If_rabc($action,$do); //检测权限	
	is_admin($action,$do); //检测权限
	$sql="delete from `eml_user` where `id`=$id limit 1";
	if($db->query($sql)){echo success($msg,"?action=user");}else{echo error($msg);}	
	exit;
}


//修改密码	
if($do=="editpass"){	
	If_rabc($action,$do); //检测权限
	$smt = new smarty();smarty_cfg($smt);
	//查询
	$sql=" SELECT * FROM eml_user where id='{$id}' LIMIT 1";
	echo $id;
	$db->query($sql);
	$row=$db->fetchRow();
	//模版
	$smt->assign('row',$row);
	$smt->assign('title',"修改密码");
	$smt->display('user_edit_pass.htm');
	exit;
}


//执行更新密码
if($do=="updatapass"){
	If_rabc($action,$do); //检测权限
	$updated_at=time();
	$id=$_SESSION['userid'];
	if($_POST[password]){
		$password=md5($_POST[password]);
	}
	$sql="UPDATE `eml_user` SET `password`='{$password}',`updated_at` = '$updated_at' WHERE `eml_user`.`id` ={$id} LIMIT 1 ;";	
	if($db->query($sql)){echo success($msg,"index.php");}else{echo error($msg);}
	exit;
}
?>