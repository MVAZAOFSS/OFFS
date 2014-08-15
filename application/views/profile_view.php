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
           <ul class=" list-group">
        <li class="dropdown list-group-item">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('username');?> <span class="fa fa-user pull-right"></span></a></li>
           </ul>
          <ul class="list-group">
            <li class="list-group-item"><a href="#">Account Settings <span class="fa fa-cog pull-right"></span></a></li>
            <li class="list-group-item"><a href="#">User status <span class="fa fa-flag-checkered pull-right"></span></a></li>
            <li class="list-group-item"><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="list-group-item"><a href="#">Favourites <span class="fa fa-heart pull-right"></span></a></li>
            <li class="list-group-item"><a href="#">Sign Out <span class="fa fa-sign-out pull-right"></span></a></li>
          </ul>
        </div>
    </div>
</div>

<?php include_once 'footer.php';?>

