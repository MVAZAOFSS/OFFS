<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-4"  id="dt">
            <div class="panel-success">
            <div class="panel-heading">
                <p>System info</p>
            </div>
            <div class="list-group">
                <a href="<?php echo site_url('dashbord_problem');?>" class="list-group-item">
                       <span class="fa fa-question-circle"></span> 
                       Report problem
                   </a>
                <a href="<?php echo site_url('general_setup/change');?>" class="list-group-item">
                    <span class="fa fa-key"></span>    
                    Change password
                    </a>
                <a href="<?php echo site_url('dashbord/count');?>" class="list-group-item">
                    <span class="fa fa-flag-o"></span>
                        <span class="badge">
                        <?php
                        $res1=$this->db->get_where('tb_problem',array('receiver'=>'seller','status'=>'unchecked','stat_role'=>$this->session->userdata('role_station')));
                        if($res1->num_rows()>0){
                            echo'<blink>'. $this->db->count_all_results().'</blink>';
                         } else {
                            echo '0';
                         }
                            ?>
                        </span>
                        Notification
                    </a>
                <a href="<?php echo site_url('dashbord/view');?>" class="list-group-item">
                        <span class="fa fa-file"></span>
                        Balance of Litres
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="fa fa-book fa-fw"></span>
                        View summary 
                    
                    </a>
                     
                <a href="<?php echo site_url('logout');?>" class="list-group-item" >
                    <span class=" fa fa-unlock-alt"></span>
                    Logout</a>
        </div>
         </div>
        </div>
        <div class="col-lg-7" id="dt">
            <div class="panel panel-default well-sm">
           <div class="panel-body">
           <ul class=" list-group">
        <li class="dropdown list-group-item">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4>KEROSINE</h4></a></li>
           </ul>
          <ul class="list-group">
              <?php
              $rez=$this->db->get('tb_update');
              foreach ($rez->result() as $row){
              ?>
             <div class="form-group">
            <li class="list-group-item">Kerosine cost Today
                <li class="list-group-item"><a href="#">Kerosine cost  <span class="badge pull-right"><?php echo $row->kerosine;?></span></a></li>
            </li>
              </div>
          </ul>
            <?php
              }
              ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php';?>

