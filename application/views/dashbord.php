<?php include_once 'header2.php';?>
<div id="content">
    <div class="col-lg-8">
        <ul class="nav nav-tabs  nav-justified nav-pills">
            <li class="<?php if(isset($activef)){ echo 'active';}?>"><a href="#feeds" data-toggle="tab">Sales</a></li>
            <li class="<?php if(isset($activef1)){ echo 'active';}?> disabled"><a href="#resource" data-toggle="tabs">New feeds</a></li>
            <li class="<?php if(isset($activef2)){ echo 'active';}?> disabled"><a href="#expenses" data-toggle="tabs">Expenses</a></li>
        </ul>
        <div class="tab-content" style="display: block" id="myTabContent">
             <div class="in tab-pane <?php if(isset($activef)){ echo 'active';}?>" id="feeds">
                 <p class="alert-info"><span class=" badge fa fa-align-center" style=" margin-left: 40px;"> <?php
echo "The time is " . date("h:i:sa d-m-Y");
?></span></p>
                <div class="tabcordion tabs-left tabbable">
                <ul class="nav nav-tabs nav-pills">
                    <li class="<?php if(isset($active)){ echo'active';}?>"><a data-target=".petrol" data-toggle="tab">Petrol</a></li>
                    <li class="<?php if(isset($active1)){ echo'active';}?>"><a data-target=".diesel" data-toggle="tab">Diesel</a></li>
                    <li class="<?php if(isset($active2)){ echo'active';}?>"><a data-target=".kerosine" data-toggle="tab">Kerosene</a></li>
                    <li><div class="btn-group"><a data-toggle="dropdown" class="btn btn-default"> Oil  <span class=" fa fa-caret-down"></span></a>
                        <ul class="dropdown-menu" role="menu" id="oil">    
                        <?php 
                            $res=$this->db->get_where('oil_update',array('stat_rolez'=>$this->session->userdata('role_station')));
                            if($res->num_rows()>0){
                                foreach ($res->result() as $row){
                            ?>
                            <li class="<?php if(isset($active3)){ echo'active';}?>"><a data-target=".oil" data-toggle="tab" href="#" onclick="oilDump('<?php echo $row->oil_id;?>')"><?php echo $row->oil_product;?></a></li>
                             <?php
                            }
                            }else{
                             ?>
                            <li><a href="#">Nothing</a></li>
                            <?php
                             }
                             ?>   
                            </ul>
                            
                        </div></li>
                    <li class="<?php if(isset($active4)){ echo'active';}?>"><a data-target=".total" data-toggle="tab">Summary</a></li>
                </ul>
                    <div class="tab-content" style="display: block">
                    <div class="petrol in tab-pane <?php if(isset($active)){ echo'active';}?>">
                        <div class="text text-center text-info text-justify"><label>PETROL</label></div>
                        <ul class="nav nav-tabs nav-pills">
                            <li class="<?php if(isset($active5)){ echo'active';}?>"><a data-target=".present" data-toggle="tab">Cash sales</a></li>
                            <li class="<?php if(isset($active6)){ echo'active';}?>"><a data-target=".billed" data-toggle="tab">Credit sales</a></li>
                        </ul>
                        <div class="tab-content" style="display: block">
                         <div class="present in tab-pane <?php if(isset($active5)){ echo'active';}?>">
                             <div class=" panel panel-default">
                                 <div class=" panel-heading">Petrol sells</div>
                                 <div class="panel-body">
                        <?php echo form_open('dashbord/petrol');?>
                        <table class="table table-condensed ">
                            <tr><td><label>Number of litres</label></td><td><?php echo form_error('nlitre','<div class="error">','</div>');?><input type="text" name="nlitre" class="form-control input-sm" id="inpuSmall"></td></tr>
                            <tr><td><label>Amount ($ orTshs)</label></td><td><?php echo form_error('cost','<div class="error">','</div>');?><input type="text" name="cost" class="form-control input-sm"></td></tr>
                            <tr><td><label>Due date</label></td><td><?php echo form_error('issue','<div class="error">','</div>');?><input type="text" name="issue" class="form-control datepicker input-sm"></td></tr>
                            <tr><td></td><td><button class="btn btn-primary pull-right">Save</button></td></tr>
                           </table>
                              <?php echo form_close();?>
                               <?php if(!empty($smg)){echo'<div class="example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg.'</strong>
                        </div>
                       </div>';}?>
                            </div>
                             </div>
                         </div>
                            <div class="billed in tab-pane <?php if(isset($active6)){ echo'active';}?>">
                                <div class=" panel panel-default">
                                 <div class=" panel-heading">Petrol sells at credit</div>
                                 <div class="panel-body">
                        <?php echo form_open('dashbord/petrol_credit');?>
                        <table class="table table-condensed">
                            <tr><td><label>Number of litres</label></td><td><?php echo form_error('nlitre1','<div class="error">','</div>');?><input type="text" name="nlitre1" class="form-control input-sm"></td></tr>
                            <tr><td><label>Amount ($ or Tshs)</label></td><td><?php echo form_error('cost1','<div class="error">','</div>');?><input type="text" name="cost1" class="form-control input-sm"></td></tr>
                            <tr><td><label>Customer name</label></td><td><?php echo form_error('ncost1','<div class="error">','</div>');?><input type="text" name="ncost1" class="form-control input-sm"></td></tr>
                            <tr><td><label>Due date</label></td><td><?php echo form_error('issue1','<div class="error">','</div>');?><input type="text" name="issue1" class="form-control datepicker input-sm"></td></tr>
                            <tr><td></td><td><button class="btn btn-primary pull-right">Save</button></td></tr>
                           </table>
                                <?php if(!empty($smg1)){echo'<div class="example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg1.'</strong>
                        </div>
                       </div>';}?>
                        <?php echo form_close();?>
                            </div>
                                </div>
                            </div>
                            </div>
                    </div>
                        <div class="diesel in tab-pane <?php if(isset($active1)){ echo'active';}?>">
                            <div class="text text-center text-info text-justify"><label>DIESEL</label></div>
                        <ul class="nav nav-tabs nav-pills">
                            <li class="<?php if(isset($active7)){ echo'active';}?>"><a data-target=".present" data-toggle="tab">Cash sales</a></li>
                            <li class="<?php if(isset($active8)){ echo'active';}?>"><a data-target=".billed" data-toggle="tab">Credit sales</a></li>
                        </ul>
                        <div class="tab-content" style="display: block">
                         <div class="present in tab-pane <?php if(isset($active7)){ echo'active';}?>">
                             <div class=" panel panel-default">
                                 <div class=" panel-heading">Diesel sells</div>
                                 <div class="panel-body">
                        <?php echo form_open('dashbord/diesel');?>
                        <table class="table table-condensed">
                            <tr><td><label>Number of litres</label></td><td><?php echo form_error('nlitre2','<div class="error">','</div>');?><input type="text" name="nlitre2" class="form-control input-sm"></td></tr>
                            <tr><td><label>Amount ($ or Tshs)</label></td><td><?php echo form_error('cost2','<div class="error">','</div>');?><input type="text" name="cost2" class="form-control input-sm" id="inputSmall"></td></tr>
                            <tr><td><label>Due date</label></td><td><?php echo form_error('issue2','<div class="error">','</div>');?><input type="text" name="issue2" class="form-control datepicker input-sm"></td></tr>
                          <tr><td></td><td><button class="btn btn-primary pull-right">Save</button></td></tr>
                           </table>
                        <?php echo form_close();?>
                                <?php if(!empty($smg2)){echo'<div class="example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg2.'</strong>
                        </div>
                       </div>';}?>
                            </div>
                             </div>
                         </div>
                            <div class="billed in tab-pane <?php if(isset($active8)){ echo'active';}?>">
                                <div class=" panel panel-default">
                                    <div class=" panel-heading">Diesel sells at credit</div>
                                    <div class=" panel-body">
                        <?php echo form_open('dashbord/diesel_credit');?>
                        <table class="table table-condensed">
                            <tr><td><label>Number of litres</label></td><td><?php echo form_error('nlitre3','<div class="error">','</div>');?><input type="text" name="nlitre3" class="form-control input-sm"></td></tr>
                            <tr><td><label>Amount ($ or Tshs)</label></td><td><?php echo form_error('cost3','<div class="error">','</div>');?><input type="text" name="cost3" class="form-control input-sm"></td></tr>
                            <tr><td><label>Customer name</label></td><td><?php echo form_error('ncost3','<div class="error">','</div>');?><input type="text" name="ncost3" class="form-control input-sm"></td></tr>
                            <tr><td><label>Due date</label></td><td><?php echo form_error('issue3','<div class="error">','</div>');?><input type="text" name="issue3" class="form-control datepicker input-sm"></td></tr>
                          <tr><td></td><td><button class="btn btn-primary pull-right">Save</button></td></tr>
                           </table>
                        <?php echo form_close();?>
                                <?php if(!empty($smg3)){echo'<div class="example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg3.'</strong>
                        </div>
                       </div>';}?>
                            </div>
                                </div>
                            </div>
                            </div>
                    </div>
                        <div class="kerosine in tab-pane <?php if(isset($active2)){ echo'active';}?>">
                            <div class="text text-center text-info text-justify"><label>KEROSENE</label></div>
                        <ul class="nav nav-tabs nav-pills">
                            <li class="<?php if(isset($active9)){ echo'active';}?>"><a data-target=".present" data-toggle="tab">Cash sales</a></li>
                            <li class="<?php if(isset($active10)){ echo'active';}?>"><a data-target=".billed" data-toggle="tab">Credit sales</a></li>
                        </ul>
                        <div class="tab-content" style="display: block">
                         <div class="present in tab-pane <?php if(isset($active9)){ echo'active';}?>">
                             <div class=" panel panel-default">
                                 <div class=" panel-heading">Kerosine sells</div>
                                 <div class=" panel-body">
                        <?php echo form_open('dashbord/kerosine');?>
                        <table class="table table-condensed">
                            <tr><td><label>Number of litres</label></td><td><?php echo form_error('nlitre4','<div class="error">','</div>');?></font><input type="text" name="nlitre4" class="form-control input-sm"></td></tr>
                            <tr><td><label>Amount ($ or Tshs)</label></td><td><?php echo form_error('cost4','<div class="error">','</div>');?></font><input type="text" name="cost4" class="form-control input-sm"></td></tr>
                            <tr><td><label>Due date</label></td><td><?php echo form_error('issue4','<div class="error">','</div>');?></font><input type="text" name="issue4" class="form-control datepicker input-sm"></td></tr>
                           <tr><td></td><td><button class="btn btn-primary pull-right">Save</button></td></tr>
                           </table>
                        <?php echo form_close();?>
                                <?php if(!empty($smg4)){echo'<div class="example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg4.'</strong>
                        </div>
                       </div>';}?>
                            </div>
                             </div>
                         </div>
                        <div class="billed in tab-pane <?php if(isset($active10)){ echo'active';}?>">
                            <div class=" panel panel-default">
                                <div class=" panel-heading">Kerosine sells at credit</div>
                                <div class=" panel-body">
                        <?php echo form_open('dashbord/kerosine_credit');?>
                        <table class="table table-condensed">
                            <tr><td><label>Number of litres</label></td><td><?php echo form_error('nlitre5','<div class="error">','</div>');?><input type="text" name="nlitre5" class="form-control input-sm"></td></tr>
                        <tr><td><label>Amount($ or Tshs)</label></td><td><?php echo form_error('cost5','<div class="error">','</div>');?><input type="text" name="cost5" class="form-control input-sm"></td></tr>
                        <tr><td><label>Customer name</label></td><td><?php echo form_error('ncost5','<div class="error">','</div>');?><input type="text" name="ncost5" class="form-control input-sm"></td></tr>
                        <tr><td><label>Due date</label></td><td><?php echo form_error('issue5','<div class="error">','</div>');?><input type="text" name="issue5" class="form-control datepicker input-sm"></td></tr>
                          <tr><td></td><td><button class="btn btn-primary pull-right">Save</button></td></tr>
                           </table>
                        <?php echo form_close();?>
                                <?php if(!empty($smg5)){echo'<div class="example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg5.'</strong>
                        </div>
                       </div>';}?>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                        <div class="oil in tab-pane <?php if(isset($active3)){ echo'active';}?>">
                            <div class="oildump">
                                
                            </div>
                        </div>
                        <div class="total in tab-pane <?php if(isset($active4)){ echo 'active';}?>">
                                <ul class="nav nav-tabs nav-pills nav-justified">
      <li class="<?php if(isset($activetr)){ echo 'active';}?>"><a data-target=".to" data-toggle="tab">Petrol</a></li>
      <li class="<?php if(isset($activetr1)){ echo 'active';}?>"><a data-target=".to1" data-toggle="tab">Diesel</a></li>
      <li class="<?php if(isset($activetr2)){ echo 'active';}?>"><a data-target=".to2" data-toggle="tab">Kerosene</a></li>
      <li class="<?php if(isset($activetr3)){ echo 'active';}?>"><a data-target=".to3" data-toggle="tab">OIl</a></li>
                                </ul>
                            <div class="tab-content" style="display:block; padding-top: 30px;">
                                <div class="to in tab-pane <?php if(isset($activetr)){ echo 'active';}?>">
                                    <ul class=" list-group">
      <li class=" list-group-item"><span class="badge"><?php echo ''.$seller_name;?></span>Seller name</li>
      <li class=" list-group-item"><span class="badge"><?php echo ''.$sold_litre;?></span>Amount of litre sold</li>
      <li class="  list-group-item"><span class=" badge"><?php echo ''.$sold_amountd;?></span>Cash collected</li>
                                    </ul>
                                    </div>
                                <div class="to1 in tab-pane <?php if(isset($activetr1)){ echo 'active';}?>">
                                    <ul class=" list-group">
                                        <li class=" list-group-item"><span class="badge"><?php echo ''.$seller_name1;?></span>Seller name</li>
                                        <li class=" list-group-item"><span class="badge"><?php echo ''.$sold_litre1;?></span>Amount of litre sold</li>
                                        <li class="  list-group-item"><span class=" badge"><?php echo ''.$sold_amountd1;?></span>Cash collected</li>
                                    </ul>
                                </div>
                                <div class="to2 in tab-pane <?php if(isset($activetr2)){ echo 'active';}?>">
                                    <ul class=" list-group">
                                        <li class=" list-group-item"><span class=" badge"><?php echo ''.$seller_name2;?></span>Seller name</li>
                                        <li class=" list-group-item"><span class=" badge"><?php echo ''.$sold_litre2;?></span>Amount of litre sold</li>
                                        <li class="  list-group-item"><span class=" badge"><?php echo ''.$sold_amountd2;?></span>Cash collected</li>
                                    </ul>
                                </div>
                                <div class="to3 in tab-pane <?php if(isset($activetr3)){ echo 'active';}?>">
                                    <ul class=" list-group">
                                        <li class=" list-group-item"><span class=" badge"><?php echo ''.$seller_name3;?></span>Seller name</li>
     <li class=" list-group-item"><span class=" badge"><?php echo ''.$sold_litre3;?></span>Amount of litre sold</li>
                                        <li class="  list-group-item"><span class=" badge"><?php echo ''.$sold_amountd3;?></span>Cash collected</li>
                                    </ul>
                                </div>
                                <div class="btn-group pull-right">
                                    <a class="btn btn-default btn-sm clk" href="#">
                                    <i class="fa fa-cog"></i> Options</a>
                                    </div>
                                   <div class="pr" style="margin-top: 10px; margin-left: 360px;">
                                       <a href="<?php echo site_url('dashbord/dashbord_summary');?>" class=" text-right" title="You can print this before leaving."><span class="fa fa-print fa-1x"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
        </div>
            <div class="in tab-pane fade <?php if(isset($activef1)){ echo 'active';}?>" id="resource">
                <ul class="list-group">
                   <li class="list-group-item-heading text-info">For Petrol</li>
                    <li class="list-group-item">
                        <span class="badge"><?php echo ''.$number_litre-$sold_litres;?> Litres</span>
                    Remained Litres of petrol
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?php echo ''.$purchased_amount;?> Tshs</span>
                    Purchased amount
                  </li>
                   <li class="list-group-item-heading text-info">For diesel    </li>
                   <li class="list-group-item">
                        <span class="badge"><?php echo ''.$number_litre1-$sold_litres1;?> Litres</span>
                    Remained Litres of diesel
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?php echo ''.$purchased_amount1;?> Tshs</span>
                    Purchased amount
                    </li>
                    <li class="list-group-item-heading text-info">For Kerosine    </li>
                   <li class="list-group-item">
                        <span class="badge"><?php echo ''.$number_litre2-$sold_litres2;?> Litres</span>
                    Remained Litres of kerosine
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?php echo ''.$purchased_amount2;?> Tshs</span>
                    Purchased amount
                    </li>
                </ul>
            </div>
            <div class="in tab-pane <?php if(isset($activef2)){echo 'active';}?>" id="expenses" disabled>
                <div class="ajax">
                <div class=" text-center"><label class="text text-primary text-center" style=" padding-top: 30px;">Todays expenditure</label></div>
                <?php echo form_open('dashbord/expenditures',array('id'=>'exp'));?>
                <ul class=" list-group">
                    <li class=" list-group-item">Amount used <input type="text" name="cmt" class=" form-control input-sm" disabled></li>
                    <li class=" list-group-item">Used for <textarea  name="wrs" class="form-control" disabled></textarea></li>
                    <li class=" list-group-item">Due date <input type="text" name="dt" class=" form-control input-sm datepicker " disabled></li>
                </ul>
                <input type="submit" class="btn btn-primary btn-xs pull-right" disabled value="submit">
                <?php echo form_close();?>
                </div>
                <div class="loading" style=" padding-top: 40px;"></div>
            </div>
            </div>
       </div>
       <div class="col-lg-4">
        <div class="panel-success">
            <div class="panel-heading">
                <p>System info</p>
            </div>
            <div class="list-group">
                <a href="<?php echo site_url('dashbord_problem');?>" class="list-group-item">
                       <span class="fa fa-question-circle"></span> 
                       Report problem
                   </a>
                <a href="<?php echo site_url('general_setup/change');?>" class="list-group-item">
                    <span class="fa fa-key"></span>    
                    Change password
                    </a>
                <a href="<?php echo site_url('dashbord/count');?>" class="list-group-item">
                    <span class="fa fa-flag-o"></span>
                        <span class="badge">
                        <?php
                        $res1=$this->db->get_where('tb_problem',array('receiver'=>'seller','status'=>'unchecked','stat_role'=>$this->session->userdata('role_station')));
                        if($res1->num_rows()>0){
                            echo'<blink>'. $this->db->count_all_results().'</blink>';
                         } else {
                            echo '0';
                         }
                            ?>
                        </span>
                        Notification
                    </a>
                <a href="<?php echo site_url('dashbord/view');?>" class="list-group-item">
                        <span class="fa fa-file"></span>
                        Balance of Litres
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="fa fa-book fa-fw"></span>
                        View summary 
                    
                    </a>
                     
                <a href="<?php echo site_url('logout');?>" class="list-group-item" >
                    <span class=" fa fa-unlock-alt"></span>
                    Logout</a>
        </div>
         </div>
        </div>
<script>
        $(document).ready(function(){
            $('.pr').hide();
            $('.clk').click(function(){
                $('.pr').show();
            });
          });
          function oilDump(id){
              $('.oildump').html('<img src="<?php echo base_url('img/load.gif');?>">');
              var ulr="<?php echo site_url('dashbord/oil_dump');?>";
              var ulr2=ulr+'/'+id;
              $.get(ulr2,function(sms){
                  setTimeout(function(){
                  $('.oildump').html(sms);
                  },2000);
              });
          }
          window.setTimeout(function(){
        $('.example').fadeTo(500,0).slideUp(500,function(){
            $(this).remove();
        });
    },2000);
    </script>
    
</div>
<script>
    $('.datepicker').datepicker({dateFormat: 'mm-dd-yy'});
</script>
<?php include_once 'footer.php';?>

