<?php include_once 'header2.php';?>
<div id="content">
    <ul class=" breadcrumb">
        <li><a href="<?php echo site_url('accountant_controller');?>"> <span class="fa fa-home"></span>Home</a></li>
        <li><a href="#"> Oil <span class=" fa fa-caret-down"></span></a>
        </li>
    </ul>
    <div class=" col-lg-9">
        <div class=" col-md-6">
            <table class="table" id="oilreport">
                <thead><tr><th>Oil categories</th><th>Extra</th></tr></thead>
                <tbody>
        <?php
        $resoil=$this->db->get_where('oil_update',array('stat_rolez'=>$this->session->userdata('role_station')));
        if($resoil->num_rows()>0){
        foreach ($resoil->result() as $rowz){
            echo '<tr><td>'.$rowz->oil_product.'</td><td><div class="btn-group btn-xs"><button class="btn btn-success btn-xs" data-toggle="dropdown">view <span class="fa fa-caret-down"></span></button>'
                    . '<ul class="dropdown-menu" role="menu">'
                    . '<li><a href="#" onclick="dayOilReport(\''.$rowz->oil_id.'\')">Day oil report</a></li>'
                    . '<li><a href="#" onclick="weekOilReport(\''.$rowz->oil_id.'\')">Week oil report</a></li>'
                    . '<li><a href="#" onclick="monthOilReport(\''.$rowz->oil_id.'\')">Month oil report</a></li>'
                    . '</ul>'
                    . '</div></td></tr>';
        }
        }
        ?>  
                </tbody>
            </table>
            
        </div>
        <div class=" col-md-6">
            <div class="allreport"></div>
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
    function dayPetrolReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/dayPetrol');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function weekPetrolReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/weekPetrol');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function monthPetrolReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/monthPetrol');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function quarterPetrolReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/quarterPetrol');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function semiPetrolReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/semiPetrol');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function yearPetrolReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/yearPetrol');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function dayDieselReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/dayDiesel');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function weekDieselReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/weekDiesel');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function monthDieselReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/monthDiesel');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function quarterDieselReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/quarterDiesel');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function semiDieselReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/semiDiesel');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function yearDieselReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/yearDiesel');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function dayKerosineReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/dayKerosine');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function weekKerosineReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/weekKerosine');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function monthKerosineReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/monthKerosine');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function quarterKerosineReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/quarterKerosine');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function semiKerosineReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/semiKerosine');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function yearKerosineReport(){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/yearKerosine');?>" ;
      $.get(url,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function dayOilReport(id){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/dayOil');?>" ;
      var url2=url+'/'+id;
      $.get(url2,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function weekOilReport(id){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/weekOil');?>" ;
      var url2=url+'/'+id;
      $.get(url2,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
    function monthOilReport(id){
        $('.allreport').html('<img src="<?php echo base_url('img/load.gif');?>">  <span>Loading please wait..</span>');
      var url="<?php echo site_url('accountant_controller/monthOil');?>" ;
      var url2=url+'/'+id;
      $.get(url2,function(data){
          setTimeout(function(){
          $('.allreport').html(data);
          },2000);
      });
    }
</script>
<?php include_once 'footer.php';?>