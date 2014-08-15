<?php include_once 'header2.php';?>
<div id="content">
   <ul class=" breadcrumb">
            <li class="pull-left"><a href="<?php echo site_url('accountant_controller');?>">Home</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/detailed');?>">Petrol info</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/diesel');?>">Diesel info</a></li>
            <li class="active"><a href="<?php echo site_url('accountant_controller/kerosine');?>">Kerosene info</a></li>
            <li><div class="btn-group"><a href="<?php echo site_url('accountant_controller/oil');?>"  data-toggle="dropdown"> Oil <span class="fa fa-caret-down"></span></a>
        <ul class="dropdown-menu" role="menu">
         <?php
        $resoil=$this->db->get_where('oil_update',array('stat_rolez'=>$this->session->userdata('role_station')));
        if($resoil->num_rows()>0){
            foreach ($resoil->result() as $rowz){
          
        ?>
        <li><a href="#" onclick="oilProductz('<?php echo $rowz->oil_id;?>')"><?php echo $rowz->oil_product;?></a></li>
        <?php
        }
        }  else {
        ?>
        <li><a href="#">No oil product</a></li>
        <?php   
        }
        ?>
        </ul>
    </div></li>
            <li><a href="<?php echo site_url('accountant_controller/credit_entry');?>">Credit Entry</a></li>
           
            </ul>
        <div class="col-lg-9">
            <ul class="list-group"> 
              <li class="list-group-item">
             <div class="col-lg-6">  
             
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
            
                      <div class="oil_ok"></div>
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
    </div>
    <script>
    function oilcheck(id){
       var url="<?php echo site_url('accountant_controller/oilconts');?>";
        var url2=url + '/' +id;
        $.get(url2,function(data){
            $('.conts').html(data);
        }); 
    }
    function oilProductz(id){
        $('.oil_ok').html('<img src="<?php echo base_url('img/load.gif');?>">');
        var path="<?php echo site_url('accountant_controller/oil_check');?>";
        var path2=path+'/'+id;
        $.get(path2,function(sms){
            setTimeout(function(){
                $('.oil_ok').html(sms);
            },2000);
        });
    }
    </script>
<script>
function editprograme(id) {
        var url = "<?php echo site_url('accountant_controller/ajaxload3');?>";
        var url2 = url + '/' + id;
        $.get(url2, function(data) {
           $('.info').html(data);
        });
    }
    </script>

<?php include_once 'footer.php';?>


