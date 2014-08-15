<?php include_once 'header.php';?>
<div id="content1">
    <div class="col-lg-10">
        <div class="cst">
            <div class="panel-success " style="margin-left: 250px;">
            <div class="panel-heading"><label>Update password</label></div>
            <div class="well-sm">
                <div id="load"><?php if(!empty($data1)){ echo $data1;}?></div>
                <div class="hd">
            <?php echo form_open('register_first/password_retrival',array('class'=>'form-horizontal'));?>
            <div class="control-group">
                <label class="control-label" for="InputEmail"><b>Email or Username</b></label>
                <div class="controls">
                    <input type="text" class="form-control" placeholder="<?php if(!empty($data)){ echo $data;};?>" disabled>
                </div>
            </div>
                <div class="control-group">
                <label class="control-label" for="InputEmail"><b>Password</b></label>
                <div class="controls">
                    <font color="red"><?php echo form_error('pd');?></font>
                    <input type="password" class="form-control" name="pd">
                </div>
            </div>
                <div class="control-group">
                <label class="control-label" for="InputEmail"><b>Confirm password</b></label>
                <div class="controls">
                    <font color="red"><?php echo form_error('confpd');?></font>
                    <input type="password" class="form-control" name="confpd">
                </div>
            </div>
                
            <div class="text text-left"><br> 
                <button type="submit" class="btn btn-primary upd">update</button></div>
             </div>
             </div>
            <?php echo form_close();?>
            </div>
            <div class="text text-center">
            <ul class="nav nav-pills" style="margin-left: 250px;">
                <li><a href="<?php echo site_url('login');?>">
                        Login<span class="badge"></span>
                   </a></li>
                   <li><a href="<?php echo site_url('register_first/forgot_password');?>">
                        Forgot password<span class="badge"></span>
                     </a>
                   </li>
                   <li><a href="<?php echo site_url('');?>">
                        Help<span class="badge">0</span>
                     </a>
                   </li>
            </ul>
            </div>
            </div>
            </div>
            
        </div>
<?php include_once 'footer.php';?>


