
<?php include_once 'header2.php';?>
<div id="content">
    <ul class="breadcrumb well-sm">
       <li><a href="<?php echo site_url('accountant_controller');?>"> <span class="fa fa-home"></span> Home</a></li>
                    <li><a href="<?php echo site_url('accountant_controller/credit_entry');?>"> <span class="fa fa-caret-square-o-left"></span> Petrol</a></li>
                    <li><a href="<?php echo site_url('accountant_controller/diesel_entry');?>"> <span class="fa fa-caret-square-o-left"></span> Diesel</a></li>
                    <li><a href="<?php echo site_url('accountant_controller/kerosine_entry');?>"> <span class="fa fa-caret-square-o-left"></span> Kerosene</a></li>
                    <li><a href="<?php echo site_url('accountant_controller/oil_entry');?>"> <span class="fa fa-caret-square-o-left"></span> Oil</a></li>
    </ul>
    <div class="col-lg-9">
      <div class="col-md-5 well-sm">
              <table class="table table-bordered table-condensed" id="record">
                    <thead><tr><th>Petrol creditor(s) List(s)</th></tr></thead>
                    <tbody>
                        <?php
                        $array=array('status'=>'credit','stat_role'=>$this->session->userdata('role_station'));
                        $res=$this->db->from('tb_petrol')->where($array)->get();
                        if($res->num_rows()>0){
                            foreach ($res->result() as $row){
                                echo '<tr><td>'.$row->customer_credit_name.'<button class="btn btn-success btn-xs pull-right"  onclick="editprograme(\''.$row->id.'\')">
                                    <span class="fa fa-share-square-o"></span> Pay
                                    </button></td></tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        <div class="col-md-7">
          <div id="info"></div>
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
    function editprograme(id) {
        $('#info').html('loading...');
        var url = "<?php echo site_url('accountant_controller/ajaxload');?>";
        var url2 = url + '/' + id;
        $.get(url2, function(data) {
            setTimeout(function(){
            $('#info').html(data);
            },700);
        });
    }
</script>
</div>


<?php include_once 'footer.php';?>
