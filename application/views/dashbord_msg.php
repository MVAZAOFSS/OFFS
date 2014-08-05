<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-3"  id="dt">
            <div class="panel-success">
            <div class="panel-heading">
                <p class="fa fa-list-ul">System info</p>
            </div>
            <div class="list-group">
                <a href="<?php echo site_url('dashbord_problem');?>" class="list-group-item">
                    <span class="fa fa-question-circle"></span>    
                    Report problem
                   </a>
                <a href="<?php echo site_url('general_setup/change');?>" class="list-group-item">
                    <span class="fa fa-lock fa-fw"></span>    
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
                        Notification
                    </a>
                <a href="<?php echo site_url('dashbord/view');?>" class="list-group-item">
                    <span class="fa fa-file-o"></span>    
                    <span class="badge"></span>
                        Balance of Litres
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
            <div class="text-center text-info"><legend><label class="text-primary">Delivered messages</label></legend></div>
            <table class="table table-hover">
                <?php if(isset($msg1)){ echo $msg1;}?>
                <?php if(isset($msg)){
                 echo '<tr><th>SENDER NAME</th><th>DATE OF DELIVERY</th><th>ACTION<b class="caret"></b></th></tr>';
                  foreach ($msg->result() as $row){
                      echo '<tr><td>'.$row->reporter.'</td><td>'.$row->date.'</td><td>'.anchor('dashbord/msg_view/'.$row->id,'<span class="badge">view</span>').'</td></tr>';
                  }
                }?>
            </table>
        </div>
    </div>
</div>

<?php include_once 'footer.php';?>


