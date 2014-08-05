<?php include_once 'header2.php';?>
<div id="content">
    <div class="col-lg-9">
        <div class="well well-sm">
            <label class="text text-center text-primary">Present sellers with their respective history&nbsp;<span class="badge pull-right">DIESEL</span></label>
        </div>
        <div class="col-lg-7">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('general_accountant/overviews');?>">Petrol</a></li>
            <li><a href="<?php echo site_url('general_accountant/overviews1');?>">Diesel</a></li>
            <li><a href="<?php echo site_url('general_accountant/overviews2');?>">Kerosene</a></li>
            <li><a href="<?php echo site_url('general_accountant/overviews3');?>">Oil</a></li>
        </ol>
            <table class="table table-condensed table-hover table-striped" id="tcheck">
                <thead><th>option</th><th>Seller name</th><th>Date</th></thead>
            <tbody>
                <?php
                if(isset($petrol)){
                  foreach($petrol->result() as $row){
                      echo '<tr><td><button class="btn btn-success btn-xs" onclick="dieselcheck(\''.$row->id.'\')"><span class="fa fa-share-square-o"></span>view</button>'."&nbsp;".anchor('general_accountant/printoverview1/'.$row->id,'<button class="btn btn-warning btn-xs"><span class="fa fa-print"></span>print</button>').'</td>'
                              . '<td>'.' '.$row->seller_name.'</td><td>'.$row->sold_date.'</td></tr>';   
                  }  
                }
                ?>
            </tbody>
            </table>
        </div>
        <div class="col-lg-5">
            <div class="kat"></div>
        </div>
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
                    <a href="<?php echo site_url('logout');?>" class="list-group-item"><span class="fa fa-unlock-alt"></span> Logout</a>
                </div>
            </ul>
        </div>
    <script>
    function dieselcheck(id){
        $('.kat').html('Loading...');
        var url="<?php echo site_url('general_accountant/diesel');?>";
        var url2=url + '/' +id;
        $.get(url2,function(data){
            setTimeout(function(){
            $('.kat').html(data);
            },700);
        });
    }
    </script>
    </div>
<?php include_once 'footer.php';?>



