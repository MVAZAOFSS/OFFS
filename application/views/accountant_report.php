<?php include_once 'header2.php';?>
<div id="content">
    <ul class=" breadcrumb">
        <li><a href="<?php echo site_url('accountant_controller');?>"> <span class="fa fa-home"></span>Home</a></li>
        <li><a href="<?php echo site_url('accountant_controller/report');?>"> Petrol</a></li>
        <li><a href="<?php echo site_url('accountant_controller/report1');?>"> Diesel</a></li>
        <li><a href="<?php echo site_url('accountant_controller/report2');?>"> Kerosene</a></li>
        <li><a href="<?php echo site_url('accountant_controller/report3');?>"> Oil</a>
    </ul>
    <div class="col-lg-9">
           <div class="well well-sm">
            <label class="text text-center text-primary"> Frequently report of <span class="badge"> petrol</span>
            <div class="btn-group pull-right" style="margin-left: 360px;">
             <a class="btn btn-default btn-xs clk" href="#">
            <i class="fa fa-cog"></i> Options <b class=" fa fa-caret-right"></b></a>
            </div>
            </label>
               <a href="<?php echo site_url('accountant_controller/printz');?>" title="Print general report" class="ckl btn btn-default btn-sm"><span class="fa fa-print pull-right"></span></a>
               <button title="view general report" class="btn btn-default btn-xs pull-right ckl1" onclick="general()">view</button>
        </div>
        <script>
            $(document).tooltip();
        </script>
        <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class=" text-primary">
                 search by:<span class="fa fa-search-plus pull-right" ></span>
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
            <?php
            $res=$this->db->get_where('tb_petrol',array('seller_status'=>'yes','stat_role'=>$this->session->userdata('role_station')));
            if($res->num_rows()>0){
                echo '<table class="table table-striped table-bordered table-condensed" id="seach">';
                echo '<thead><tr><th>date</th><th>option</th></tr></thead>';
                echo '<tbody>';
                foreach ($res->result() as $row){
                     echo '<tr>'
                           . '<td>'.$row->sold_date.' </td><td class="pull-right">'.'<button class="btn btn-success btn-xs" onclick="showpetrolhistory(\''.$row->id.'\')"><span class="fa fa-search"></span></button>'.anchor('accountant_controller/reportprint/'.$row->id,'<button class="btn btn-warning btn-xs"><span class="fa fa-print"></span></button>').'</td>'
                           . '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            }else {
                echo '<ul class="list-group">'
                           . '<li class="list-group-item text-warning"><a href="#">No records</a></li>'
                           . '</ul>';
                 }
            
            ?>
            </div>
          </div>
        </div>
        </div>
        <div class="col-lg-8">
        <div class="petrol"></div>
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
        $(document).ready(function(){
            $('#seach').dataTable();
        });
    </script>
    <script>
        function general(){
            $('.petrol').html('Loading...');
            var url="<?php echo site_url('accountant_controller/general_report');?>";
            $.get(url,function(data){
                setTimeout(function(){
                    $('.petrol').html(data);
                },2000);
            });
        }
     </script>
      <script>
    function showpetrolhistory(id){
        $('.petrol').html('Loading....');
        var url="<?php echo site_url('accountant_controller/petrolreport');?>";
        var url2=url + '/' +id;
        $.get(url2,function(data){
            setTimeout(function(){
            $('.petrol').html(data);
            },2000);
        });
    }
    </script>
    </div>
<script>
    $(document).ready(function(){
        $('.ckl').hide();
        $('.ckl1').hide();
        $('.clk').click(function(){
            $('.ckl').show();
            $('.ckl1').show();
        });
        
    });
</script>
<?php include_once 'footer.php';?>