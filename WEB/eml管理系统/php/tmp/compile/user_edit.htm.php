<?php echo $this->fetch('head.htm'); ?>
<?php echo $this->fetch('nav.htm'); ?>
<div class="span10">
	  
		  <div class="page-header">
            <h3>更新个人信息</h3>
          </div>
		  
          <div class="row-fluid">
            <div class="span12">
	  
	  
	  
	  <form class="form-horizontal" method="post" action="?action=user&do=updata">
	  
	       <input type="text" name="id" value="<?php echo $this->_var['row']['id']; ?>" style="display:none;">
			<div class="control-group">
            <label for="input01" class="control-label">用户名：</label>
            <div class="controls">
              <input type="text" id="username" class="input-xlarge" name="username" value="<?php echo $this->_var['row']['username']; ?>" readonly>
            </div>
          </div>

			<div class="control-group">
            <label for="input01" class="control-label">姓&nbsp;&nbsp;&nbsp;&nbsp;名：</label>
            <div class="controls">
              <input type="text" id="name" class="input-xlarge" name="name" value="<?php echo $this->_var['row']['name']; ?>">
            </div>
          </div>


          <div class="control-group">
            <label for="input01" class="control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
            <div class="controls">
              <input type="password" id="password" class="input-xlarge" name="password" value="<?php echo $this->_var['row']['password']; ?>">
            </div>
          </div>
		  
		  <div class="control-group">
            <label for="input01" class="control-label">性&nbsp;&nbsp;&nbsp;&nbsp;别：</label>
           <div class="controls">
             <label class="checkbox inline">
                <input type="radio"   id="sex" name="sex" value="男" <?php if ($this->_var['row']['sex'] == "男"): ?>checked<?php endif; ?>	/> 男
              </label>
				<label class="checkbox inline">
                 <input type="radio"  id="sex" name="sex" value="女" <?php if ($this->_var['row']['sex'] == "女"): ?>checked<?php endif; ?>	/> 女
              </label>
			  
            </div>
          </div>
          
          
		<div class="control-group">
            <label for="input01" class="control-label">手&nbsp;&nbsp;&nbsp;&nbsp;机：</label>
            <div class="controls">
              <input type="text" id="input01" name="phone" class="input-xlarge" value="<?php echo $this->_var['row']['phone']; ?>" >
            </div>
          </div>

		  <div class="control-group">
            <label for="input01" class="control-label">电&nbsp;&nbsp;&nbsp;&nbsp;话：</label>
            <div class="controls">
              <input type="text" id="input01" name="tel" class="input-xlarge" value="<?php echo $this->_var['row']['tel']; ?>" >
            </div>
          </div>

		  <div class="control-group">
            <label for="input01" class="control-label">邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</label>
            <div class="controls">
              <input type="text" id="input01" name="email" class="input-xlarge" value="<?php echo $this->_var['row']['email']; ?>" >
            </div>
          </div>

		   <div class="control-group">
            <label for="input01" class="control-label">Q&nbsp;&nbsp;&nbsp;&nbsp;Q：</label>
            <div class="controls">
              <input type="text" id="input01" name="qq" class="input-xlarge" value="<?php echo $this->_var['row']['qq']; ?>" >
            </div>
          </div>
          
          <div class="control-group">
            <label for="input01" class="control-label">部&nbsp;&nbsp;&nbsp;&nbsp;门：</label>
            <div class="controls">
              <input type="text" id="input01" class="input-xlarge" name="deparyment" value="<?php echo $this->_var['row']['deparyment']; ?>" >
            </div>
          </div>
          
          <div class="control-group">
            <label for="input01" class="control-label">职&nbsp;&nbsp;&nbsp;位：</label>
            <div class="controls">
              <input type="text" id="input01" class="input-xlarge" name="position" value="<?php echo $this->_var['row']['position']; ?>" > 
            </div>
          </div>
          
          <div class="control-group">
            <label for="input01" class="control-label">住&nbsp;&nbsp;&nbsp;&nbsp;址：</label>
            <div class="controls">
              <textarea rows="3" id="textarea"  class="input-xlarge" name="address"><?php echo $this->_var['row']['address']; ?></textarea>
            </div>
          </div>
			

			<div class="form-actions">
            <button class="btn btn-success" type="submit" >保存</button>
			   <a class="btn" href="?action=user"><i class="icon-share"></i> 返回</a>		
          </div>   	
      </form>
		  
		  
	   
            </div>
          </div>
		  
		  
        </div>

		
<?php echo $this->fetch('foot.htm'); ?>