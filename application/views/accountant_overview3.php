<?php include_once 'header2.php';?>
<div id="content">
    <div class="col-lg-9">
        <div class="well well-sm">
            <label class="text text-center text-primary">Present sellers with their respective history&nbsp;<span class="badge pull-right">OIL</span></label>
        </div>
        <div class="col-lg-7">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('general_accountant/overviews');?>">Petrol</a></li>
            <li><a href="<?php echo site_url('general_accountant/overviews1');?>">Diesel</a></li>
            <li><a href="<?php echo site_url('general_accountant/overviews2');?>">Kerosene</a></li>
            <li><div class="btn-group"><a href="<?php echo site_url('general_accountant/overviews3');?>"  data-toggle="dropdown"> Oil <span class="fa fa-caret-down"></span></a>
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
        </ol>
            <div class="tloads"></div>
        </div>
        <div class="col-lg-5">
            <div class="kat"></div>
        </div>
     </div>
    
    <div class="col-lg-3 pull-right">
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
    
    <script>
    function oilcheck(id){
        $('.kat').html('Loading...');
        var url="<?php echo site_url('general_accountant/oil');?>";
        var url2=url + '/' +id;
        $.get(url2,function(data){
            setTimeout(function(){
            $('.kat').html(data);
            },700);
        });
    }
    function oilProductz(id){
        $('.tloads').html('<img src="<?php echo base_url('img/load.gif');?>">');
        var url="<?php echo site_url('general_accountant/oil_loads');?>";
        var url2=url+'/'+id;
        $.get(url2,function(data){
            setTimeout(function(){
                $('.tloads').html(data);
            },2000);
        });
    } 
    </script>
    </div>
<?php include_once 'footer.php';?>



