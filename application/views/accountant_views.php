<?php include_once 'header2.php';?>
<div id="content">
    <div class="col-lg-9">
            <ul class="list-inline well well-sm">
                <li><a href="#" class="btn btn-primary btn-sm">SALES</a></li>
                <li><a href="<?php echo site_url('accountant_controller/credit_entry');?>" class="btn btn-primary btn-sm">RETURN PAYMENT</a></li>
                <li><a href="<?php echo site_url('accountant_controller/expenditure');?>" class="btn btn-primary btn-sm">EXPENDITURE</a></li>
                <li><div class="btn-group btn-group-sm"><a href="#" class="btn btn-primary btn-sm" data-toggle="dropdown">REPORT <span class="fa fa-caret-down"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo site_url('accountant_controller/report');?>">Daily report</a></li>
                            <li><a href="<?php echo site_url('accountant_controller/margin_report');?>">Margin report</a></li>
                        </ul>
                    </div></li>
            </ul>
        <div class="input-group">
        <div class="col-lg-8">
        <ul class="list-group panel-info">
            <li class="list-group-item">Today date <?php echo date('m.d.Y');?> sales summary</li>
         </ul>  
        </div>
        <div class="col-lg-4">
         <a href="<?php echo site_url('accountant_controller/detailed');?>" class="btn btn-success">DETAILED SSB</a>
        </div>
        </div>
        <div class=" col-lg-3">
            <table class="table table-condensed table-striped table-bordered">
            <p class="text-center well well-sm">Petrol</p>
            <thead><th>Litre</th><th>Amount</th></thead>
            <tbody><tr><td><?php echo $Tsold;?></td><td><?php echo $Tamount;?></td></tr> </tbody>  
            </table>
            
        </div>
         <div class=" col-lg-3">
            <p class="text-center well well-sm">Diesel</p>
                <table class="table table-condensed table-striped table-bordered">
                    <thead><th>Litre</th><th>Amount</th></thead>
            <tbody><tr><td><?php echo $Tsold1;?></td><td><?php echo $Tamount1;?></td></tr> </tbody> 
                </table>
        </div>
         <div class=" col-lg-3">
            <p class="text-center well well-sm">Kerosene</p>
                <table class="table table-condensed table-striped table-bordered">
                    <thead><th>Litre</th><th>Amount</th></thead>
            <tbody><tr><td><?php echo $Tsold2;?></td><td><?php echo $Tamount2;?></td></tr> </tbody> 
                </table>
        </div>
         <div class=" col-lg-3">
         <ul class="breadcrumb well-sm">
         <li><div class="btn-group "><a href="#" data-toggle="dropdown">OIL(Choose)<span class="caret"></span></a>
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
             <div class="cargo"></div>
        </div>
        <label><strong>Total</strong> =  <span class="badge"><?php echo ''.$dosold_litre+$dosold_litre1+$dosold_litre2;?> Litres</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong> Amount </strong> =  <span class="badge"><?php echo ''.$dosold_amount+$dosold_amount1+$dosold_amount2+$dosold_amount3;?> Tshs</span></label>
        
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
                    <a href="#" class="list-group-item">
                        <span class="fa fa-dollar"></span>
                        <span class="badge"><?php $total1=$sold_amount+$sold_amount2+$sold_amount3+$sold_amount4;
                                $totally=$expected_amount+$expected_amount1+$expected_amount2;
                          echo ''.$totally-$total1;
                       ?> Tshs</span>
                        Outstanding profit 
                    </a>
                   <a href="#" class="list-group-item">
                       <span class="fa fa-eye-slash"></span>
                       <span class="badge"><?php $total=$expected_amount+$expected_amount1+$expected_amount2;
                        echo ''.$total;
                       
                        ?> Tshs</span>
                        Expected Total profit 
                    </a>
                    <a href="<?php echo site_url('logout');?>" class="list-group-item"><span class="fa fa-unlock-alt"></span> Logout</a>
                </div>
            </ul>
        </div>
    </div>
<script>
    function oilProductz(id){
        $('.cargo').html('<img src="<?php echo base_url('img/load.gif');?>">');
        var path="<?php echo site_url('accountant_controller/oil_cargo');?>";
        var path1=path+'/'+id;
        $.get(path1,function(data){
            setTimeout(function(){
                $('.cargo').html(data);
            },2000);
        });
    }
</script>

<?php include_once 'footer.php';?>
