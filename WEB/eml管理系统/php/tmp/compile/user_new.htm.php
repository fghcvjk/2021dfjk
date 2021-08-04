<?php echo $this->fetch('head.htm'); ?>
<?php echo $this->fetch('nav.htm'); ?>
<div class="span10">
	  
		  <div class="page-header">
            <h3>新建用户</h3>
          </div>
		  
          <div class="row-fluid">
            <div class="span12">
	  
	  
	  
	  <form class="form-horizontal" method="post" action="?action=user&do=add">
	        <?php $module=mt_rand(100000,999999);?>
			 <input type="hidden" name="module" value="<?php echo $module;?>"/>
			 <input type="hidden" name="timestamp" value="<?php echo time();?>"/>
			 <input type="hidden" name="token" value="<?php echo md5($module.'#$@%!^*'.time());?>"/>
			<div class="control-group">
            <label for="input01" class="control-label">用户名：</label>
            <div class="controls">
              <input type="text" id="input01" class="input-xlarge" name="username">
            </div>
          </div>

			
		<div class="control-group">
            <label for="input01" class="control-label">用户组：</label>
            <div class="controls">
              <select name="roleid">
				<option value ="2">普通用户</option>
				<option value="1">管理员</option>
			  </select>
            </div>
          </div>

          <div class="control-group">
            <label for="input01" class="control-label">密&nbsp;&nbsp;&nbsp;码：</label>
            <div class="controls">
              <input type="password" id="input01" class="input-xlarge" name="password">
            </div>
          </div>

		    <div class="control-group">
            <label for="input01" class="control-label">姓&nbsp;&nbsp;&nbsp;名：</label>
            <div class="controls">
              <input type="text" id="input01" class="input-xlarge" name="name">
            </div>
          </div>

		    <div class="control-group">
            <label for="input01" class="control-label">性&nbsp;&nbsp;&nbsp;别：</label>
           <div class="controls">
              <label class="checkbox inline">
                <input type="radio" checked="checked" name="sex" value="男" /> 男
              </label>
              <label class="checkbox inline">
                <input type="radio" name="sex" value="女" /> 女
              </label>
            </div>
          </div>

		  <div class="control-group">
            <label for="input01" class="control-label">手&nbsp;&nbsp;&nbsp;机：</label>
            <div class="controls">
              <input type="text" id="input01" name="phone" class="input-xlarge" >
            </div>
          </div>

		  <div class="control-group">
            <label for="input01" class="control-label">电&nbsp;&nbsp;&nbsp;话：</label>
            <div class="controls">
              <input type="text" id="input01" name="tel" class="input-xlarge" >
            </div>
          </div>

		  <div class="control-group">
            <label for="input01" class="control-label">邮&nbsp;&nbsp;&nbsp;箱：</label>
            <div class="controls">
              <input type="text" id="input01" name="email" class="input-xlarge">
            </div>
          </div>

		   <div class="control-group">
            <label for="input01" class="control-label">Q&nbsp;&nbsp;&nbsp;Q：</label>
            <div class="controls">
              <input type="text" id="input01" name="qq" class="input-xlarge">
            </div>
          </div>
          
          <div class="control-group">
            <label for="input01" class="control-label">部&nbsp;&nbsp;&nbsp;门：</label>
            <div class="controls">
              <input type="text" id="input01" class="input-xlarge" name="deparyment">
            </div>
          </div>
          
          <div class="control-group">
            <label for="input01" class="control-label">职&nbsp;&nbsp;&nbsp;位：</label>
            <div class="controls">
              <input type="text" id="input01" class="input-xlarge" name="position"> 
            </div>
          </div>
          
          <div class="control-group">
            <label for="input01" class="control-label">住&nbsp;&nbsp;&nbsp;址：</label>
            <div class="controls">
              <textarea rows="3" id="textarea"  class="input-xlarge" name="address"></textarea>
            </div>
          </div>
		  
			<div class="form-actions">
            <button class="btn btn-success" type="submit">保存</button>
			 <a class="btn" href="?action=user"><i class="icon-share"></i> 返回</a>		
          </div>   	
      </form>
		  
		  
	   
            </div>
          </div>
		  
		  
        </div>

		
<?php echo $this->fetch('foot.htm'); ?>