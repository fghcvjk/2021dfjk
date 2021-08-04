<?php echo $this->fetch('head.htm'); ?>
<?php echo $this->fetch('nav.htm'); ?>
<div class="span11">

		  <div class="row-fluid">
            <h3><?php echo $this->_var['title']; ?></h3>
          </div>

			<form class="form-search" action="" method="post">
			<?php if ($_SESSION['roleid'] == "1"): ?>	
			<a href="?action=address&do=new" class="btn btn-primary pull-right" ><i class="icon-pencil icon-white" ></i> 新建</a>
			<?php else: ?>
		     
		    <?php endif; ?>		
			
			<input type="text" name="kewords" class="input-small" value="<?php echo $_REQUEST['kewords']; ?>"  placeholder="请输入关键词">	
			<?php echo $this->_var['select_userlist']; ?>	
			<input class="hidden-phone" type="text" name="time_start" value="<?php echo $_REQUEST['time_start']; ?>"  id="datepicker" placeholder="开始时间" class="input-small"/>
			- <input class="hidden-phone" type="text" name="time_over" value="<?php echo $_REQUEST['time_over']; ?>"  id="datepicker2" placeholder="结束时间" class="input-small"/>
			<button type="submit" class="btn"><i class="icon-search"></i> 查询</button>
            <a href="" class="btn hidden-phone"><i class="icon-th-list"></i> 全部</a>
			<button type="reset" class="btn"><i class="icon-repeat"></i> 重置</button>
			</form> 
		
		<form action="?action=address&do=del_all" method="post"  onload="changecolor()">
          <div class="row-fluid">
            <div class="span12">
	
			<table class="table table-bordered table-striped">
				<tr>
						<th>选项</th>
						<th>姓名</th>
						<th class="hidden-phone">性别</th>
						<th class="hidden-phone">部门</th>
						<th class="hidden-phone">职位</th>
						<th class="hidden-phone">手机</th>
						<th>电话</th>
						<th class="hidden-phone">邮箱</th>
						<th class="hidden-phone">住址</th>
						<th class="hidden-phone">创建时间</th>
						<?php if ($_SESSION['roleid'] == "1"): ?>
						<th>操作</th>
						<?php else: ?>
						<th class="hidden-phone">操作</th>
					    <?php endif; ?>	
						</tr>	
    <tbody id="tbs">
    <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
				<tr>
					<td> <input type='checkbox' value='<?php echo $this->_var['row']['id']; ?>' name='item[]' class='ck' /></td>
					<td><?php echo $this->_var['row']['name']; ?></td>
					<td class="hidden-phone"><?php echo $this->_var['row']['sex']; ?></td>
					<td class="hidden-phone"><?php echo empty($this->_var['row']['deparyment']) ? '无' : $this->_var['row']['deparyment']; ?></td>
					<td class="hidden-phone"><?php echo empty($this->_var['row']['position']) ? '无' : $this->_var['row']['position']; ?></td>
					<td>
						<a href="tel:<?php echo $this->_var['row']['phone']; ?>"><?php echo $this->_var['row']['phone']; ?></a>
					</td>
					<td class="hidden-phone">
						<a href="tel:<?php echo $this->_var['row']['tel']; ?>"><?php echo $this->_var['row']['tel']; ?></a>
					</td>
					<td class="hidden-phone"><?php echo $this->_var['row']['email']; ?></td>
					<td class="hidden-phone"><?php echo $this->_var['row']['address']; ?></td>
					<td class="hidden-phone"><?php echo date("Y-m-d H:i:s",$this->_var['row']['created_at']); ?></td>
					
		<?php if ($_SESSION['roleid'] == "1"): ?>	
		<td>
		<a class="btn btn-small" href="?action=address&do=edit&id=<?php echo $this->_var['row']['id']; ?>">
			<i class="icon-edit"></i>编辑</a>	
		<a class="btn btn-small" href="?action=address&do=del&id=<?php echo $this->_var['row']['id']; ?>" onclick="if(!confirm( '确认要删除吗? ')){return false;}"><i class="icon-trash"></i>
		删除</a>
					</td><?php else: ?><td class="hidden-phone">无权限</td><?php endif; ?>		
				 </tr>			
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
</table>
<?php if ($_SESSION['roleid'] == "1"): ?>
				    <input type="submit" value="批量删除"/>
					<?php endif; ?>	
				  </form>
				<div class="pagination pagination-centered">
					  <ul class="">
						<li><span class="btn">共<?php echo $this->_var['total']; ?>条</span></li>
						<?php echo $this->_var['page']; ?>
					 </ul>
				</div>
	  
            </div>
          </div>
		  
		  
        </div>

<?php echo $this->fetch('foot.htm'); ?>