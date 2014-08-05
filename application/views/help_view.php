<?php include_once 'header.php';?>
<div id="content1">
    <div class="col-lg-10">
          <div class="cst">
           
            <div class="control-group">
                <label class="control-label" for="InputEmail"><b>Email or Username</b></label>
                <div class="controls">
                    <font color="red"><?php echo form_error('us');?></font>
                    <div class="input-group margin-bottom-sm">
                   <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                   <input class="form-control" type="text" placeholder="Email address or Username" name="us">
                   </div>
                </div>
            </div>
            
            </div>
        </div>
              <ul class="nav nav-pills" style="margin-left: 250px;">
                <li><a href="<?php echo site_url('register_controller/forgot_password');?>">
                        Forgot password<span class="badge"></span>
                     </a>
                   </li>
                   
            </ul>
            
            </div>
    </div>
   
    </div>
<?php include_once 'footer.php';?>

