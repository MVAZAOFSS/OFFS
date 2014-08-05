<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-4"  id="dt">
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
                    <a href="<?php echo site_url('admin_controller/notify_view');?>" class="list-group-item">
                        <span class="fa fa-flag-checkered"></span>
                        <span class="badge">
                           <?php 
                           $res=$this->db->get_where('tb_problem',array('receiver'=>'admin','status'=>'unchecked','stat_role'=>$this->session->userdata('role_station')));
                           if($res->num_rows()>0){
                               echo '<blink>'.$this->db->count_all_results().'</blink>';
                           }  else {
                               echo '0';    
                           }
                            ?>
                        </span>
                        System alerts
                    </a>
                    <a href="<?php echo site_url('admin_controller/summary');?>" class="list-group-item">
                        <span class="fa fa-file-text-o"></span>
                        <span class="badge">View</span>
                        Balance of Litres
                    </a>
                <a href="<?php echo site_url('admin_controller');?>" class="list-group-item">
                    <span class="fa fa-files-o"></span>    
                    View summary 
                    
                    </a>
                   <a href="<?php echo site_url('logout');?>" class="list-group-item" >
                       <span class="fa fa-unlock-alt"></span>
                       Logout</a>
            </div>
            
       </div>
        </div>
        <div class="col-lg-7" id="dt">
            <div class="panel-success dt1">
                <div class="panel-heading"><label>Add an account</label></div>
                <div class="well bs-component">
                    <?php if(!empty($smg)){echo'<label class="label-success" style="margin-left:50px;">'. $smg.'</label>';}?>
                    <?php echo form_open('register_controller/register_form',array('class'=>'form-horizontal panel-body'));?>
                    <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">First name</label>
                        <div class="col-lg-8">
                            <font color="red" class="f1"><?php echo form_error('fn');?></font>
                            <input type="text" name="fn" class="form-control fs" placeholder="First name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="secondname" class="col-lg-4 control-label">Second name</label>
                        <div class="col-lg-8">
                            <font color="red" class="f2"><?php echo form_error('sn');?></font>
                            <input type="text" name="sn" class="form-control fs2" placeholder="Second name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Username" class="col-lg-4 control-label">Username</label>
                        <div class="col-lg-8">
                            <font color="red" class="f3"><?php echo form_error('us');?></font>
                            <input type="text" name="us" class="form-control fs3" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Email" class="col-lg-4 control-label">Email</label>
                        <div class="col-lg-8">
                            <font color="red" class="f4"><?php echo form_error('em');?></font>
                            <input type="text" name="em" class="form-control fs4" placeholder="example@gmail.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="occupation" class="col-lg-4 control-label">Position</label>
                        <div class="col-lg-8">
                            <select name="position" class="form-control" required>
                                <option value=""></option>
                                <option value="seller">Seller</option>
                                <option value="admin">Administrator</option>
                                <option value="accountant">Accountant</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Password</label>
                        <div class="col-lg-8">
                            <font color="red" class="f5"><?php echo form_error('pd');?></font>
                            <input type="password" name="pd" class="form-control fs5" placeholder="password">
                        </div>
                    </div>
                    <div class="text-right"><button type="submit" class="btn btn-primary sng">Sign up</button></div>
                    <?php echo form_close();?>
                </div>
            </div>
            <div class="load"></div>
        </div>
    </div>
</div>

<?php include_once 'footer.php';?>

