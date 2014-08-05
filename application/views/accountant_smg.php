<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        
        <div class="col-lg-9" id="dt">
            <div class="text-center text-info"><legend><label class="text-primary">Delivered messages</label></legend></div>
            <table class="table table-hover">
                <?php if(isset($msg1)){ echo $msg1;}?>
                <?php if(isset($msg)){
                 echo '<tr><th>SENDER NAME</th><th>DATE OF DELIVERY</th><th>ACTION<b class="caret"></b></th></tr>';
                  foreach ($msg->result() as $row){
                      echo '<tr><td>'.$row->reporter.'</td><td>'.$row->date.'</td><td>'.anchor('general_accountant/msg_view/'.$row->id,'<span class="badge">view</span>').'</td></tr>';
                  }
                }?>
            </table>
        </div>
       <div class="col-lg-3">
            <ul class="list-group">
                <div class="panel-success">
                    <div class="panel-heading">
                        System info
                    </div>
                    <a href="<?php echo site_url('accountant_controller');?>" class="list-group-item"><span class="fa fa-home"></span> Home</a>
                    <a href="<?php echo site_url('general_accountant/change');?>" class="list-group-item"><span class="fa fa-key"></span> Change password</a>
                    <a href="<?php echo site_url('general_accountant/overviews');?>" class="list-group-item"><span class="fa fa-flag-checkered"></span> Bussines overviews</a>
                    <a href="<?php echo site_url('general_accountant/count');?>" class="list-group-item"><span class="fa fa-flag-o"></span> System alerts <span class="badge">
                        <?php
                        $res1=$this->db->get_where('tb_problem',array('receiver'=>'accountant','status'=>'unchecked','stat_role'=>$this->session->userdata('role_station')));
                        if($res1->num_rows()>0){
                            echo'<blink>'. $this->db->count_all_results().'</blink>';
                        }  else {
                            echo '0'; 
                         }
                            ?>
                        </span></a>
                    <a href="<?php echo site_url('general_accountant/burger');?>" class="list-group-item"><span class="fa fa-question-circle"></span> Report problem</a>
                    <a href="<?php echo site_url('logout');?>" class="list-group-item"><span class="fa fa-unlock-alt"></span> Logout</a>
                </div>
            </ul>
        </div>
    </div>
</div>

<?php include_once 'footer.php';?>


