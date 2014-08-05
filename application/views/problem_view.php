<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-3"  id="dt">
            <div class="panel-success">
            <div class="panel-heading">
                <p class="fa fa-retweet">System info</p>
            </div>
            <div class="list-group">
                <a href="<?php echo site_url('register_controller');?>" class="list-group-item btn-link">
                    <span class="fa fa-flag-o"></span>    
                    Send notification
                   </a>
                <a href="<?php echo site_url('admin_controller/problem');?>" class="list-group-item">
                    <span class="fa fa-question"></span>    
                    Report problem
                    </a>
                <a href="<?php echo site_url('general_admin/change');?>" class="list-group-item">
                    <span class="fa fa-lock"></span>    
                    Change password
                    </a>
                <a href="<?php echo site_url('admin_controller');?>" class="list-group-item">
                    <span class="fa fa-home"></span>    
                    <span class="badge">Home</span>
                        Home
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="badge"></span>
                        System alerts
                    </a>
                <a href="<?php echo site_url('admin_controller/summary');?>" class="list-group-item">
                    <span class="fa fa-file-text-o"></span>    
                    <span class="badge"></span>
                        Balance of Litres
                    </a>
                    
                   <a href="<?php echo site_url('logout');?>" class="list-group-item" >
                       <span class="fa fa-unlock-alt"></span>
                       Logout</a>
            </div>
            
       </div>
        </div>
        <div class="col-lg-9" id="dt">
            <div class="text-center">
                <ul class="list-group">
                    <li class="list-group-item"><label class="text-info"><b>Whats wrong within it</b></label></li>
                </ul>
                <?php echo form_open('admin_controller/problem');?>
                <ul class="list-group">
                    <li class="panel-heading list-group-item">Declear problem</li>
                    <li class="list-group-item text-justify">
                        Enter the encounted problem*
                        <span><textarea type="text" name="txt" class="form-control" placeholder="write your problem" required></textarea></span><br>
                        To whom you want to declear that problem
                        <span><select name="people" class="form-control" required>
                                <option value=""></option>
                                <option value="seller">Seller</option>
                                <option value="accountant">Accountant</option>
                            </select></span><br>
                            <span class="text-right"><input type="submit" class="btn btn-primary" value="REPORT"></span>
                    </li>
                </ul>
                  <?php if(!empty($sms)){echo $sms;}?>
                <?php echo form_close();?>
            </div>
    </div>
</div>

<?php include_once 'footer.php';?>


