<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-3"  id="dt">
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
        <div class="col-lg-9" id="dt">
            <div class=" col-md-7">
           <table class="table table-striped" id="updtezoil">
               <thead><tr><th>Oil Product</th><th>Cost</th></tr></thead>
           <tbody>
            <?php
            $resz=$this->db->get_where('oil_update',array('stat_rolez'=>$this->session->userdata('role_station')));
            if($resz->num_rows()>0){
                foreach ($resz->result() as $row){
            ?>
           <tr><td><?php echo $row->oil_product;?></td><td><?php echo $row->oil_cost;?><button class="btn btn-success btn-xs pull-right" onclick="EditOilCost('<?php echo $row->oil_id;?>')">Edit cost</button></td></tr>
            <?php
               }
               }
            ?>
            </tbody></table>
            </div>
            <div class=" col-md-5">
                <div class="costUpdate"></div>
            </div>
            </div>
            </div>
        </div>
<script>
    function EditOilCost(id){
        var url="<?php echo site_url('admin_controller/costOilUpdates');?>";
        var url2=url+'/'+id;
        $.get(url2,function(data){
            $('.costUpdate').html(data);
        });
    }
</script>
<?php include_once 'footer.php';?>

