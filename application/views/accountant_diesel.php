<?php include_once 'header2.php';?>
<div id="content">
    <ul class=" breadcrumb">
            <li class="active"><a href="<?php echo site_url('accountant_controller/detailed');?>">Petrol info</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/diesel');?>">Diesel info</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/kerosine');?>">Kerosene info</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/oil');?>">Oil info</a></li>
            <li><a href="<?php echo site_url('accountant_controller/credit_entry');?>">Credit Entry</a></li>
            <li class="pull-right"><a href="<?php echo site_url('accountant_controller');?>">Home</a></li>
            </ul>
        <div class="col-lg-9">
            <ul class="list-group"> 
              <li class="list-group-item">
             <div class="col-lg-6">  
             <?php
             $results=$this->db->get_where('tb_diesel',array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>$this->session->userdata('role_station')));
             if($results->num_rows()>0){
                 echo '<table class="table table-condensed table-striped table-hover">';
                 echo '<thead><tr><th>Date</th><th>Name</th><th class="text-center">Action <b class="caret"></b></th></tr></thead>';
                 foreach ($results->result() as $row){
                 echo '<tbody><tr><td>'.$row->sold_date.'</td><td class="text-primary">'.$row->seller_name.'</td><td>'. '<button class="btn btn-success btn-xs" onclick="dieselcheck(\''.$row->id.'\')" data-target=".display" data-toggle="modal"><span class="fa fa-share-square"></span> view'
                         . '</button>'.' '.anchor('accountant_controller/dieselsellsprint/'.$row->id,'<button class="btn btn-warning btn-sm"><span class="fa fa-print"> print</span></button>').'</td></tr></tbody>';     
                 }
                  echo '</table>';
             }  else {
                 echo '<p class="text-warning">No records found for today</p>';    
             }
            ?>
            </div>
           <div class="modal fade display" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                         <div class="modal-content">
                          <div class="modal-body">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <div class="modal-header"><label class="text-center text-primary">Details</label></div>
                       <div class="conts"></div>
                          
                        </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button></div>
                         
                           </div>
                           </div>
                      </div>
                  <div class="input-group">
            <ul class="list-group">
                <li class="list-group-item">Diesel creditor(s) List</li>
            </ul>
            <table class="table" id="customer">
                <thead><tr><th>Seller name</th><th>Customer name</th><th>Litre(s)</th><th>Amount to be payed</th><th>Action</th></tr></thead>
                <tbody>
                    <?php 
                    $res=$this->db->get_where('tb_diesel',array('status'=>'credit','stat_role'=>$this->session->userdata('role_station')));
                    if($res->num_rows()>0){
                        foreach ($res->result() as $row){
                            echo '<tr><td>'.$row->seller_name.'</td><td>'.$row->customer_credit_name.'</td><td>'.$row->credit_litre.'</td><td>'.$row->credit_amount.'</td><td><button class="btn btn-success btn-xs" onclick="editprograme(\''.$row->id.'\')" data-target=".displayz" data-toggle="modal"><span class="fa fa-share-square">Pay</span></button></td></tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
                  </div>
                  <div class="modal fade displayz" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                         <div class="modal-content">
                          <div class="modal-body">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <div class="modal-header"><label class="text-center text-primary">Details</label></div>
                       <div class="info"></div>
                          
                        </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button></div>
                         
                           </div>
                           </div>
                      </div>
        </div>
        <div class="col-lg-3">
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
        <script>
    function dieselcheck(id){
       var url="<?php echo site_url('accountant_controller/dieselconts');?>";
        var url2=url + '/' +id;
        $.get(url2,function(data){
            $('.conts').html(data);
        }); 
    }
    
    </script>
    </div>
<script>
function editprograme(id) {
        var url = "<?php echo site_url('accountant_controller/ajaxload1');?>";
        var url2 = url + '/' + id;
        $.get(url2, function(data) {
           $('.info').html(data);
        });
    }
    </script>

<?php include_once 'footer.php';?>

