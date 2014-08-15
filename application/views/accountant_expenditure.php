<?php include_once 'header2.php';?>
<div id="content">
   <ul class=" breadcrumb">
            <li class="pull-left"><a href="<?php echo site_url('accountant_controller');?>">Home</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/detailed');?>">Petrol info</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/diesel');?>">Diesel info</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/kerosine');?>">Kerosene info</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/oil');?>">Oil info</a></li>
            <li><a href="<?php echo site_url('accountant_controller/credit_entry');?>">Credit Entry</a></li>
            
            </ul>
    <div class="col-lg-9">
        <div class="ajax"></div>
        <div class="col-md-6">
            <div class="well well-sm">
                <label>Add expenditure ></label>
                <button class="btn btn-success btn-xs pull-right" onclick="loadexpenditure()"><span class="fa fa-pencil">Expenditure</span></button>
            </div>
            <table class="table table-bordered table-condensed table-responsive table-hover" id="tabzx">
                <thead><tr><th>Name</th><th>Date</th></tr></thead>
                <tbody>
               <?php
                $res=$this->db->get_where('tb_expenditure',array('stat_role'=>$this->session->userdata('role_station')));
                if($res->num_rows()>0){
                    foreach ($res->result() as $row){
                        echo '<tr><td>'.$row->data_entry_name.'</td><td>'.$row->date_entered.'<button class="btn btn-success btn-xs pull-right" onclick="viewdetails(\''.$row->id.'\')"> <span class="fa fa-edit"></span>Details</button></td></tr>';
                    }
                }
                ?>
                    </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <div class="conf"></div>
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
        function viewdetails(id){
            $('.conf').html('Loading....');
            var url="<?php echo site_url('general_accountant/expenditure');?>";
            var url2=url+'/'+id;
            $.get(url2,function(data){
                setTimeout(function(){
                    $('.conf').html(data);
                },500);
            });
        }
       function loadexpenditure(){
         $('.conf').html('Loading....');
            var url="<?php echo site_url('general_accountant/expendits_cash');?>"; 
            $.get(url,function(data){
                setTimeout(function(){
                    $('.conf').html(data);
                },500);
           });
       }
    </script>
    </div>
<script>
$('#tabzx').dataTable();
</script>
<?php include_once 'footer.php';?>
