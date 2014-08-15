<?php include_once 'header.php';?>
<div id="content1">
    <div class="col-lg-10">
          <div class="cst">
            <div class="panel-success " style="margin-left: 250px;">
                <div class="panel-heading"><label>Login<span class="fa fa-sign-in pull-right"></span></label>
                    <span class="fa fa-users pull-right"></span>
                </div>
            <div class="well-sm">
                <?php if(!empty($records)){
                       echo $records;
                       }elseif (!empty ($info)){
                       echo $info;
                       }elseif(!empty($info1)) {
                       echo $info1;
                      }
                        ?>
            <?php echo form_open('login',array('class'=>'form-horizontal'));?>
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
            <div class="control-group">
                <label class="control-label"><b>Password</b></label>
                <div class="controls">
                    <font color="red"><?php echo form_error('pd');?></font>
                   <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
               <input class="form-control" type="password" placeholder="Password" name="pd">
                  </div>
                </div>
            </div>
                 <div class="control-group">
                    <div class="controls">
                    <label class="checkbox">
                    <input type="checkbox"> Remember me
                    </label>
                        
                    <button type="submit" class="btn bg-primary">Sign in</button>
                    </div>
                    </div>
            <?php echo form_close();?>
            </div>
        </div>
              <ul class="nav nav-pills" style="margin-left: 250px;">
                <li><a href="<?php echo site_url('register_first/forgot_password');?>">
                        Forgot password<span class="badge"></span>
                     </a>
                   </li>
                   <li><a href="<?php echo site_url('');?>">
                        Help<span class="badge"></span>
                     </a>
                   </li>
            </ul>
            
            </div>
    </div>
   
    </div>
<?php include_once 'footer.php';?>

