<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-4"  id="dt">
            <ul class="list-group">
                <div class="panel-success">
                    <div class="panel-heading">
                        System info
                    </div>
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
        <div class="col-lg-7" id="dt">
            <div class="panel panel-default well-sm">
           <div class="panel-body">
           <ul class=" list-group">
        <li class="dropdown list-group-item">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4>OIL</h4></a></li>
           </ul>
          <ul class="list-group">
              <table class="table table-condensed table-striped" id="cost">
                  <thead><tr><th>Name of Oil</th><th>Cost</th><th>Date Updated</th></tr></thead>
                  <tbody>
               <?php
              $res=$this->db->get_where('oil_update',array('stat_rolez'=>$this->session->userdata('role_station')));
              if($res->num_rows()>0){
                  foreach ($res->result() as $row){
              ?>
              <tr><td><?php echo $row->oil_product;?></td><td><?php echo $row->oil_cost;?></td><td><?php echo $row->date_update;?></td></tr>
              <?php
              }
              }
              ?>
              </tbody>
              </table>
          </ul>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php';?>

