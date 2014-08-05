<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-3"  id="dt">
            <div class="panel-primary">
            <div class="panel-heading">
                <p class="fa fa-retweet">System info</p>
            </div>
            <div class="list-group">
                <a href="<?php echo site_url('dashbord_problem');?>" class="list-group-item">
                    <span class="fa fa-question-circle"></span>    
                    Report problem
                   </a>
                <a href="<?php echo site_url('general_setup/change');?>" class="list-group-item">
                    <span class="fa fa-lock"></span>    
                    Change password
                    </a>
                <a href="<?php echo site_url('dashbord/count');?>" class="list-group-item">
                    <span class="fa fa-flag-checkered"></span>    
                    <span class="badge">
                            <?php
                        $res1=$this->db->get_where('tb_problem',array('receiver'=>'seller','status'=>'unchecked','stat_role'=>$this->session->userdata('role_station')));
                        if($res1->num_rows()>0){
                            echo'<blink>'. $this->db->count_all_results().'</blink>';
                        }  else {
                            echo '0'; 
                         }
                            ?>
                        </span>
                        System notification
                    </a>
                <a href="<?php echo site_url('dashbord/view');?>" class="list-group-item">
                    <span class="fa fa-file-o"></span>    
                    <span class="badge"></span>
                        Balance in Litres
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="fa fa-files-o"></span>
                        View summary 
                    
                    </a>
                     
                <a href="<?php echo site_url('logout');?>" class="list-group-item" >
                    <span class="fa fa-unlock-alt"></span> 
                    Logout</a>
            </div>
            
       </div>
        </div>
        <div class="col-lg-9" id="dt">
         <div class="text-center text-info"><legend><label class="text-primary">messages Details</label></legend></div>
         <div class="col-lg-11">
             <ul class="list-group">
                 <li class="list-group-item-info">Message</li>
                 <li class="list-group-item">
                  <?php echo ''.$problem;?>
                  <?php echo anchor('dashbord/delete/'.$id,'<span class="badge" style="margin-left:75px;">Delete</span>');?>
                  </li>
             </ul>
          </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php';?>



