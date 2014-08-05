<?php include_once 'header.php';?>
<div id="content1">
    <div class="col-lg-10">
        <div class="cst">
            <div class="panel-success " style="margin-left: 250px;">
            <div class="panel-heading"><label>Forgot password</label></div>
            <div class="well-sm">
            <?php echo form_open('register_first/forgot_password',array('class'=>'form-horizontal'));?>
                <label class=" label label-info">Please enter your Email or username to retrieve password*</label>
            <div class="control-group">
                <label class="control-label" for="InputEmail"><b>Email or Username</b></label>
                <div class="controls">
                    <font color="red"><?php echo form_error('us');?></font>
                   <div class="input-group margin-bottom-sm">
                   <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                   <input class="form-control" type="text" placeholder="Email address or Username" name="us" value="<?php echo set_value('us');?>">
                   </div>
                </div>
            </div>
                
            <div class="text text-center"><br>
                <?php if(!empty($data)){
                  echo '<font color="red">'.$data.'</font>';
                   }?>  
                <button type="submit" class="btn bg-primary">submit</button></div>
             </div>
             </div>
            <?php echo form_close();?>
            <ul class="nav nav-pills" style="margin-left: 250px;">
                <li><a href="<?php echo site_url('login');?>">
                        Login<span class="badge"></span>
                   </a></li>
                   <li class=""><a href="<?php echo site_url('');?>">
                        Failed to Login.?<span class="badge"></span>
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
   
    </div>
<?php include_once 'footer.php';?>



