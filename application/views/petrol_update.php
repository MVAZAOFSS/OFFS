<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-4"  id="dt">
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
        <div class="col-lg-7" id="dt">
            <div class="panel panel-default well-sm">
                <div class="panel-body">
                <?php echo form_open('admin_controller/petrol_cost_insert');?>
           <ul class=" list-group">
        <li class="dropdown list-group-item">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4>PETROL</h4></a></li>
           </ul>
          <ul class="list-group">
              <li class="list-group-item"><div class="btn-group btn-group-xs"><a href="#" class="btn btn-success btn-xs" data-toggle="dropdown">Petrol cost <span class="fa fa-caret-down"></span></a>
                      <table class="dropdown-menu table table-striped table-bordered" role="menu">
                          <thead><tr><th>Cost</th><th>Update date</th></tr></thead>
                          <tbody>
                        <?php
                        $rez=$this->db->get_where('tb_update',array('stat_role'=>$this->session->userdata('role_station')));
                        foreach ($rez->result() as $row){
                            if(!$row->petrol==''){
                        ?>
                          
                              <tr><td><?php echo $row->petrol;?></td><td><?php echo $row->updated_date;?></td></tr>
                         
                            <?php
                             }
                        }
                             ?>
                               </tbody>
                      </table> 
                  
                 </div></li>
              
              <div class="form-group">
            <li class="list-group-item">Petrol cost Today
                <?php echo form_error('psc','<div class="alert-danger">','</div>');?>
                <input type="text" name="psc" class="form-control" value="<?php echo set_value('psc');?>">
            </li>
            <li class="list-group-item">Date Updated
                <?php echo form_error('update','<div class="alert-danger">','</div>');?>
                <input type="text" name="update" class="form-control datepicker">
            </li>
              </div>
          </ul>
                <button class="btn btn-success btn-sm pull-right">update changes</button>
                <?php echo form_close();?>
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
</div>

<?php include_once 'footer.php';?>

