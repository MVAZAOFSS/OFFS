<?php include_once 'header2.php';?>
<div id="content">
    <div class="col-lg-9">
        <ul class="nav nav-tabs  nav-justified nav-pills">
            <li class="<?php if(isset($activef)){ echo 'active';}?>"><a href="#feeds" data-toggle="tab">Ordering</a></li>
            <li class="<?php if(isset($activef1)){ echo 'active';}?>"><a href="#resource" data-toggle="tab">Order(s) review</a></li>
            <li class="<?php if(isset($activef2)){ echo 'active';}?>"><a href="#expenses" data-toggle="tab">Manage user</a></li>
        </ul>
        <div class="tab-content" style="display: block" id="myTabContent">
            <div class="in tab-pane <?php if(isset($activef)){ echo 'active';}?>" id="feeds">
            <div class="tabcordion tabs-left tabbable">
                <ul class="nav nav-tabs nav-pills">
                    <li class="<?php if(isset($active)){ echo 'active';}?>"><a data-target=".petrol" data-toggle="tab">Petrol</a></li>
                    <li class="<?php if(isset($active1)){ echo 'active';}?>"><a data-target=".diesel" data-toggle="tab">Diesel</a></li>
            <li class="<?php if(isset($active2)){ echo 'active';}?>"><a data-target=".kerosine" data-toggle="tab">Kerosine</a></li>
                    <li class="<?php if(isset($active3)){ echo 'active';}?>"><a data-target=".oil" data-toggle="tab">Oil</a></li>
                </ul>
            <div class="tab-content" style="display: block">
                <div class="petrol in tab-pane <?php if(isset($active)){echo'active';}?>">
                    <div class="panel panel-default">
                        <div class=" panel-heading"><label>PETROL</label></div>
                        <div class=" panel-body">
                            <?php echo form_open('admin_controller/petrol',array('id'=>'petrol'));?>
                            <table class="table table-condensed table-striped">
                                <tr><td><label>Number of litres</label></td><td><?php echo form_error('nl','<div class="error">','</div>');?><input type="text" name="nl" class="form-control input-sm"></td></tr>
                                <tr><td><label>Amount ($ or Tshs)</label></td><td><?php echo form_error('amnt','<div class="error">','</div>');?><input type="text" name="amnt" class="form-control input-sm"></td></tr>
                                <tr><td><label>Expected amount</label></td><td><?php echo form_error('exp','<div class="error">','</div>');?><input type="text" name="exp" class="form-control input-sm"></td></tr>
                                <tr><td><label>Due date</label></td><td><?php echo form_error('date','<div class="error">','</div>');?><input type="text" name="date" class="form-control datepicker input-sm"></td></tr>
                                <tr><td></td><td><button class="btn btn-primary btn-sm pull-right" name="save"><span class=" fa fa-save"></span> Save</button> <span class="loadp pull-right"></span></td></tr>
                            </table>
                           <?php echo form_close();?>
                            <div class="whisk">
                            <?php if(!empty($smg)){echo'<div class="bs-docs-example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg.'</strong>
                        </div>
                       </div>';}?>
                                </div>
                        </div>
                    </div>
                </div>
                     <div class="diesel in tab-pane <?php if(isset($active1)){ echo 'active';}?>">
                         <div class="panel panel-default">
                             <div class=" panel-heading"><label>DIESEL</label></div>
                             <div class="panel-body">
                            <?php echo form_open('admin_controller/diesel',array('id'=>'diesel'));?>
                            <table class="table table-condensed table-striped">
                                <tr><td><label>Number of litres</label></td><td><?php echo form_error('nl1','<div class="error">','</div>');?><input type="text" name="nl1" class="form-control input-sm"></td></tr>
                                <tr><td><label>Price (Tshs)</label></td><td><?php echo form_error('amnt1','<div class="error">','</div>');?><input type="text" name="amnt1" class="form-control input-sm"></td></tr>
                                <tr><td><label>Expected price</label></td><td><?php echo form_error('exp1','<div class="error">','</div>');?><input type="text" name="exp1" class="form-control input-sm"></td></tr>
                                <tr><td><label>Due date</label></td><td><?php echo form_error('date1','<div class="error">','</div>');?><input type="text" name="date1" class="form-control input-sm datepicker"></td></tr>
                            <tr><td></td><td><button class="btn btn-primary btn-sm pull-right"><span class=" fa fa-save"></span> Save</button></td></tr>
                            </table>
                            <?php echo form_close();?>
                            <div class="resd"></div>
                            <?php if(!empty($smg1)){echo'<div class="bs-docs-example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg1.'</strong>
                        </div>
                       </div>';}?>
                    </div>
                         </div>
                     </div>
                        <div class="kerosine in tab-pane <?php if(isset($active2)){ echo 'active';}?>">
                            <div class=" panel panel-default">
                                <div class="panel-heading"><label>KEROSENE</label></div>
                                <div class=" panel-body">
                            <?php echo form_open('admin_controller/kerosine',array('id'=>'kerosine'));?>
                            <table class="table table-condensed table-striped">
                                <tr><td><label>Number of litres</label></td><td><?php echo form_error('nl2','<div class="error">','</div>');?><input type="text" name="nl2" class="form-control input-sm"></td></tr>
                                <tr><td><label>Price (Tshs)</label></td><td><?php echo form_error('amnt2','<div class="error">','</div>');?><input type="text" name="amnt2" class="form-control input-sm"></td></tr>
                                <tr><td><label>Expected price</label></td><td><?php echo form_error('exp2','<div class="error">','</div>');?><input type="text" name="exp2" class="form-control input-sm"></td></tr>
                                <tr><td><label>Due date</label></td><td><?php echo form_error('date2','<div class="error">','</div>');?><input type="text" name="date2" class="form-control datepicker input-sm"></td></tr>
                            <tr><td></td><td><button class="btn btn-primary btn-sm pull-right"><span class=" fa fa-save"></span> Save</button></td></tr>
                            </table>
                            <?php echo form_close();?>
                            <div class="resk"></div>
                               <?php if(!empty($smg2)){echo'<div class="bs-docs-example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg2.'</strong>
                        </div>
                       </div>';}?>
                        </div>
                            </div>
                        </div>
                        <div class="oil in tab-pane <?php if(isset($active3)){ echo 'active';}?>">
                            <div class=" panel panel-default">
                                <div class=" panel-heading"><label>OIL</label></div>
                                <div class=" panel-body">
                            <?php echo form_open('admin_controller/oil',array('id'=>'oil'));?>
                            <table class="table table-condensed table-striped">
                                <tr class="pure"><td><label>Name of Oil</label></td><td><select name="nl3" class="form-control" required>
                                            <option></option>
                                            <option>MAGIC ENGINE OIL T5</option>
                                            <option>2T OIL WATER</option>
                                            <option>ACID WATER</option>
                                            <option>AFT T1</option>
                                            <option>ATF II PIMA HYDRAULIC</option>
                                            <option>ATF P.MIN T1/2</option>
                                            <option>B/FLUID 1/4 LTRS</option>
                                            <option>B/FLUID 1/2 LTRS</option>
                                            <option>DELLO T5</option>
                                            <option>DISTILLED WATER</option>
                                            <option>GREASE 1/2</option>
                                            <option>GREASE 15KG</option>
                                            <option>HENKEL T5 NO.140</option>
                                            <option>LUBEX OIL DIEZEL 1LTR</option>
                                            <option>LUBEX DIEZEL T5</option>
                                            <option>LUBEX PETROL T4</option>
                                            <option>MAGIC DIEZEL OIL T20 NO.140</option>
                                            <option>MD COOLANT</option>
                                            <option>OIL NO.40 PIMA</option>
                                            <option>OIL T20 NO.140</option>
                                            <option>ORYX SUPER T1</option>
                                            <option>RAPID NO 40 T5</option>
                                            <option>TOTAL RABIA 5T5</option>
                                            <option>RUBEX SUPER 1 LTR</option>
                                        </select></td></tr>
                                <tr><td><label>No.Oil product(Quantity)</label></td><td><?php echo form_error('qnty','<div class="error">','</div>');?><input type="text" name="qnty" class="form-control input-sm"></td></tr>
                                <tr><td><label>Price(Tshs)</label></td><td><?php echo form_error('amnt3','<div class="error">','</div>');?><input type="text" name="amnt3" class="form-control input-sm"></td></tr>
                                <tr><td><label>Due date</label></td><td><?php echo form_error('date3','<div class="error">','</div>');?><input type="text" name="date3" class="form-control datepicker input-sm"></td></tr>
                                <tr><td></td><td><button class="btn btn-primary btn-sm pull-right"><span class="fa fa-save"></span> Save</button></td></tr>
                                </table>
                             <?php echo form_close();?>
                            <div class="reso"></div>
                            <?php if(!empty($smg3)){echo'<div class="bs-docs-example" style="padding-top:20px;">
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
            </div>
            <div class="in tab-pane <?php if(isset($activef1)){ echo 'active';}?>" id="resource">
                <div class=" tabcordion tabs-left tabbable">
                    <ul class=" nav nav-tabs nav-pills">
                        <li class="<?php if(isset($activep)){ echo 'active';}?>"><a data-target=".p1" data-toggle="tab">Petrol</a></li>
                        <li class="<?php if(isset($actived)){ echo 'active';}?>"><a data-target=".d1" data-toggle="tab">Diesel</a></li>
                        <li class="<?php if(isset($activek)){ echo 'active';}?>"><a data-target=".k1" data-toggle="tab">Kerosine</a></li>
                        <li class="<?php if(isset($activeo)){ echo 'active';}?>"><a data-target=".o1" data-toggle="tab">OIL</a></li>
                    </ul>
                    <div class=" tab-content" style="display:block">
                        <div class="p1 in tab-pane <?php if(isset($activep)){ echo 'active';}?>">
                            <ul class=" list-group" style="margin-top: 20px;">
                                <li class=" text-justify text-muted">Petrol summary</li>
                                </ul>
                            <table class="table-condensed table-striped table-bordered" id="mytaz">
                            <thead class="alert alert-success"><tr><th>Litres(L)</th><th>Purchased price(Tsh)</th><th>Exp price(Tsh)</th><th>Entered date</th><th>Action</th></tr></thead>
                            <tbody>
                                <?php if(isset($petrol)){
                                 foreach ($petrol->result() as $p){
                                     if($p->entray_date===date('m-d-Y')){
                                      echo '<tr class="tkwanza"><td>'.$p->Litre_petrol.'</td><td>'.$p->purchased_amount.'</td><td>'.$p->expected_amount.'</td><td>'.$p->entray_date.'</td><td><a class="btn btn-success btn-xs" onclick="petrolUpdate(\''.$p->id.'\')" data-target=".display" data-toggle="modal"><span class="fa fa-plus"></span> manage</a></td></tr>';   
                                     }else{
                                 echo '<tr><td>'.$p->Litre_petrol.'</td><td>'.$p->purchased_amount.'</td><td>'.$p->expected_amount.'</td><td>'.$p->entray_date.'</td><td><button class="btn btn-warning btn-xs disabled"><span class="fa fa-exclamation-circle"></span> cant edit</button></td></tr>';
                                 
                                     }
                                     }
                                }?>
                                </tbody>
                            </table>
                        <div class="modal fade display" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                         <div class="modal-content">
                          <div class="modal-body">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <div class="modal-header"><label class="text-center text-primary">Details</label></div>
                       <div class="contz"></div>
                          
                        </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button></div>
                         
                           </div>
                           </div>
                      </div>
                        </div>
                        <div class="d1 in tab-pane <?php if(isset($actived)){ echo 'active';}?>">
                            <ul class=" list-group" style="margin-top: 20px;">
                                <li class=" text-justify text-muted">Diesel summary</li>
                                </ul>
                            <form id="updes">
                            <table class="table-condensed table-bordered table-striped" id="mytablez">
                               <thead class="alert alert-success"><tr><th>Litres(L)</th><th>Purchased price(Tsh)</th><th>Exp price(Tsh)</th><th>Entrance date</th><th>Action</th></tr></thead>
                               <tbody>
                                <?php if(isset($diesel)){
                             foreach ($diesel->result() as $p){
                                 if(($p->entray_date)===date('m-d-Y')){
                                 echo '<tr class="tkwanza1"><td>'.$p->Litre_diesel.'</td><td>'.$p->purchased_amount.'</td><td>'.$p->expected_amount.'</td><td>'.$p->entray_date.'</td><td><a class="btn btn-success btn-xs" onclick="dieselUpdate(\''.$p->id.'\')" data-target=".displayz" data-toggle="modal"><span class="fa fa-plus"></span> manage</a></td></tr>';    
                                 }else{
                                 echo '<tr><td>'.$p->Litre_diesel.'</td><td>'.$p->purchased_amount.'</td><td>'.$p->expected_amount.'</td><td>'.$p->entray_date.'</td><td><button class="btn btn-warning btn-xs disabled"><span class="fa fa-exclamation-circle"></span> cant edit</button></td></tr>';
                             }
                             }
                                }?>
                               </tbody>
                            </table>
                         <div class="modal fade displayz" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                         <div class="modal-content">
                          <div class="modal-body">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <div class="modal-header"><label class="text-center text-primary">Details</label></div>
                       <div class="contd"></div>
                          
                        </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button></div>
                         
                           </div>
                           </div>
                      </div>
                        </div>
                        <div class="k1 in tab-pane <?php if(isset($activek)){ echo 'active';}?>">
                            <ul class=" list-group" style="margin-top: 20px;">
                                <li class=" text-justify text-muted">Kerosene summary</li>
                                </ul>
                            <table class="table-striped table-condensed table-bordered table-striped" id="mytable2">
                                <thead class="alert alert-success"><tr><th>Litres(L)</th><th>Purchased price(Tsh)</th><th>Exp price(Tsh)</th><th>Entrance date</th><th>Action</th></tr></thead>
                                <tbody>
                                 <?php if(isset($kerosine)){
                                 foreach ($kerosine->result() as $p){
                                if(($p->entray_date)===date('m-d-Y')){
                                echo '<tr class="tkwanza1"><td>'.$p->Litre_kerosine.'</td><td>'.$p->purchased_amount.'</td><td>'.$p->expected_amount.'</td><td>'.$p->entray_date.'</td><td><a class="btn btn-success btn-xs" onclick="kerosineUpdate(\''.$p->id.'\')" data-target=".displayk" data-toggle="modal"><span class="fa fa-plus"></span> manage</a></td></tr>';   
                                }else{
                                 echo '<tr><td>'.$p->Litre_kerosine.'</td><td>'.$p->purchased_amount.'</td><td>'.$p->expected_amount.'</td><td>'.$p->entray_date.'</td><td><button class="btn btn-warning btn-xs disabled"><span class="fa fa-exclamation-circle"></span> cant edit</button></td></tr>';
                             }
                             }
                                }?>
                                </tbody>
                            </table>
                           <div class="modal fade displayk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                         <div class="modal-content">
                          <div class="modal-body">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <div class="modal-header"><label class="text-center text-primary">Details</label></div>
                       <div class="contk"></div>
                          
                        </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button></div>
                         
                           </div>
                           </div>
                      </div>
                        </div>
                        <div class="o1 in tab-pane <?php if(isset($activeo)){ echo 'active';}?>">
                            <ul class=" list-group" style="margin-top: 20px;">
                                <li class=" text-justify text-muted">Oil summary</li>
                                </ul>
                            <table class=" table table-striped table-condensed table-bordered table-striped" id="mytable3">
                                <thead class="alert alert-success"><tr><th>Oil Type(Oil Name)</th><th>Oil Qnty</th><th>Price(Tsh)</th><th>date</th><th>Action</th></tr></thead>
                                <tbody>
                              <?php if(isset($oil)){
                             foreach ($oil->result() as $p){
                                if(($p->entray_date)===date('m-d-Y')){
                                 echo '<tr class="tkwanza3"><td>'.$p->prod_qnty.'</td><td>'.$p->prod_name.'</td><td>'.$p->purchased_amount.'</td><td>'.$p->entray_date.'</td><td><a class="btn btn-success btn-xs" onclick="oilUpdate(\''.$p->id.'\')" data-target=".displayo" data-toggle="modal"><span class="fa fa-plus"></span> manage</a></td></tr>';    
                                }else{
                                 echo '<tr><td>'.$p->prod_qnty.'</td><td>'.$p->prod_name.'</td><td>'.$p->purchased_amount.'</td><td>'.$p->entray_date.'</td><td><button class="btn btn-warning btn-xs disabled"><span class="fa fa-exclamation-circle"></span> cant edit</button></td></tr>';
                             }
                             }
                                }?>
                                </tbody>
                            </table>
                            <div class="modal fade displayo" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                         <div class="modal-content">
                          <div class="modal-body">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <div class="modal-header"><label class="text-center text-primary">Details</label></div>
                       <div class="conto"></div>
                          
                        </div>
                         <div class="modal-footer">
                         <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button></div>
                         
                           </div>
                           </div>
                      </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="in tab-pane <?php if(isset($activef2)){ echo 'active';}?>" id="expenses">
            <div class="det"></div>
                <table class="table table-striped table-bordered" id="tablesdata">
                    <thead class="alert alert-success"><th>First name</th><th>Last name</th><th>Email</th><th>Position</th><th>Action</th><th></th><th></th></thead>
                <tbody>
                    <?php
                    if(isset($results)){
                        foreach ($results->result() as $data){
                            echo '<tr><td>'.$data->first_name.'</td>'
                                  . '<td>'.$data->sec_name.'</td>'
                                    . '<td>'.$data->email.'</td>'
                                    . '<td><span class="badge">'.$data->position.'</span></td>'
                                    . '<td>'.anchor('admin_controller/delete/'.$data->id,'<button class="btn btn-danger btn-xs"><span class="fa fa-trash-o"></span>delete</button>',array('onclick'=>"return confirm('Are sure you want to delete this person.?')")).'</td>'
                                    . '<td> '.anchor('admin_controller/update/'.$data->id,'<button class="btn btn-success btn-xs"><span class="fa fa-pencil-square-o up"></span> Update</button>').'</td>'
                                    . '<td> '.anchor('admin_controller/diactivate/'.$data->id,'<button class="btn btn-info btn-xs"><span class="fa fa-wrench"></span> '.$data->status.'</button>',array('onclick'=>"return confirm('Are you sure you want to diactivate this person.?')")).'</td>'
                                    . '</tr>';
                        }
                    }
                    ?>
                </tbody>
                </table>
                <?php if(!empty($delete)){    echo '<label class="text-danger">'.$delete.'</label>';}?>
            </div>  
                </div>
        <script>
            $('#tablesdata').dataTable();
        </script>
        </div>
    <div class="col-lg-3">
        <div class="panel-success">
            <div class="panel-heading">
                <p> <span class="fa fa-list-alt"></span> System info</p>
            </div>
            <div class="list-group">
                <a href="<?php echo site_url('register_controller');?>" class="list-group-item btn-link">
                    <span class="fa fa-users "></span>   
                    Add new user
                   </a>
                <a href="<?php echo site_url('general_admin/change');?>" class="list-group-item">
                    <span class="fa fa-lock"></span>    
                    Change password
                    </a>
                <a href="<?php echo site_url('admin_controller/summary');?>" class="list-group-item">
                    <span class="fa fa-flag-o "></span>    
                    <span class="badge">
                   <?php if(($Litre_petrol-$sold_litre)<=4000){
                         echo '<blink>Petrol danger zone click.!</blink>';
                        }elseif (($Litre_kerosine-$sold_litre2)<=4000){
                            echo '<blink>Kerosine danger zone click.!</blink>';
                        }elseif (($Litre_diesel-$sold_litre1)<=4000){
                            echo '<blink>Diesel danger zone click.!</blink>';
                        }else{
                            echo '<blin
     k><b>Ok</b></blink>';
                        }
                        ?>
                        </span>
                        Notification
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
                        Balance of litres
                    </a>
                     <a href="#" class="list-group-item">
                         <span class="fa fa-files-o"></span>
                         View summary 
                    
                    </a>
                    
                   <a href="<?php echo site_url('logout');?>" class="list-group-item" >
                       <span class="fa fa-unlock-alt"></span>
                       Logout</a>
            </div>
        
       </div>
<script>
$(document).ready(function(e){
    var url="<?php echo site_url('admin_controller/delete');?>";
    var url2=url+'/'+id;
    $.get(url2,function(data){
        $('.det').html(data);
    });
    e.preventDefault();
});
        </script>
        </div>
    
    <script>
    var furl="<?php echo site_url('admin_controller/update');?>";
    var url2=furl+'/'+id;
    $.get(url2,function(sms){
    location.reload();
     });
    </script>
    <script>
        function petrolUpdate(id){
            var url="<?php echo site_url('admin_controller/petrolCheck');?>";
            var url2=url+'/'+id;
            $.get(url2,function(data){
               $('.contz').html(data); 
            });
        }
        function dieselUpdate(id){
            var url="<?php echo site_url('admin_controller/dieselCheck');?>";
            var url2=url+'/'+id;
            $.get(url2,function(data){
               $('.contd').html(data); 
            });
        }
        function kerosineUpdate(id){
            var url="<?php echo site_url('admin_controller/kerosineCheck');?>";
            var url2=url+'/'+id;
            $.get(url2,function(data){
               $('.contk').html(data); 
            });
        }
        function oilUpdate(id){
            var url="<?php echo site_url('admin_controller/oilCheck');?>";
            var url2=url+'/'+id;
            $.get(url2,function(data){
               $('.conto').html(data); 
            });
        }
        
             window.setTimeout(function(){
                    $('.whisk').fadeTo(500,0).slideUp(500,function(){
                        $(this).remove();
                    });
                   
                },2000);
           
    </script>
<?php include_once 'footer.php';?>



