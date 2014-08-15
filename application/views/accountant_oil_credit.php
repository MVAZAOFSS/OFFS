<?php include_once 'header2.php';?>
<div id="content">
    <ul class="breadcrumb well-sm">
       <li><a href="<?php echo site_url('accountant_controller');?>"> <span class="fa fa-home"></span> Home</a></li>
                    <li><a href="<?php echo site_url('accountant_controller/credit_entry');?>">  Petrol</a></li>
                    <li><a href="<?php echo site_url('accountant_controller/diesel_entry');?>">  Diesel</a></li>
                    <li><a href="<?php echo site_url('accountant_controller/kerosine_entry');?>"> Kerosene</a></li>
                    <li><div class="btn-group"><a href="<?php echo site_url('accountant_controller/oil_entry');?>"  data-toggle="dropdown"> Oil <span class="fa fa-caret-down"></span></a>
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
    </ul>
    <div class="col-lg-9">
      <div class="col-md-6">        
          <div class="oil_credit"></div>
                     </div>
                    <div class="col-md-6">
        
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
    function creditviewz(id) {
        $('#info').html('Loading....');
        var url = "<?php echo site_url('accountant_controller/ajaxload3');?>";
        var url2 = url + '/' + id;
        $.get(url2, function(data) {
            setTimeout(function(){
            $('#info').html(data);
            },2000);
        });
    }
    function oilProductz(id){
        $('.oil_credit').html('<img src="<?php echo base_url('img/load.gif');?>">');
        var path="<?php echo site_url('accountant_controller/oil_credit_entry');?>";
        var path1=path+'/'+id;
        $.get(path1,function(data){
            setTimeout(function(){
                $('.oil_credit').html(data);
            },2000);
        });
    }
</script>
</div>


<?php include_once 'footer.php';?>
