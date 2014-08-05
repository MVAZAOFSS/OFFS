<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-3"  id="dt">
            <div class="panel-primary">
            <div class="panel-heading">
                <p class="fa fa-list"> System info</p>
            </div>
            <div class="list-group">
                <a href="<?php echo site_url('dashbord_problem');?>" class="list-group-item">
                    <span class="fa fa-question"></span>    
                    Report problem
                   </a>
                <a href="<?php echo site_url('general_setup/change');?>" class="list-group-item">
                    <span class="fa fa-lock"></span>    
                    Change password
                    </a>
                <a href="<?php echo site_url('dashbord/count');?>" class="list-group-item">
                    <span class="fa fa-flag-checkered"></span>    
                    <span class="badge">
                            <?php
                        $res1=$this->db->get_where('tb_problem',array('receiver'=>'seller','status'=>'unchecked','stat_role'=>$this->session->userdata('role_station')));
                        if($res1->num_rows()>0){
                            echo'<blink>'. $this->db->count_all_results().'</blink>';
                        }  else {
                            echo '0'; 
                         }
                            ?>
                        </span>
                        System notification
                    </a>
                <a href="<?php echo site_url('dashbord/view');?>" class="list-group-item">
                    <span class="fa fa-file-o"></span>    
                    <span class="badge"></span>
                        Balance of Litres
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="fa fa-files-o"></span>
                        View summary 
                    
                    </a>
                     
                <a href="<?php echo site_url('logout');?>" class="list-group-item" >
                    <span class="fa fa-unlock"></span>
                    Logout</a>
            </div>
            
       </div>
        </div>
        <div class="col-lg-9" id="dt">
            <div class="text-center">
                <ul class="list-group">
                    <li class="list-group-item"><label class="text-info"><b>Express the fact</b></label></li>
                </ul>
                 </div>
            <div class="col-lg-10" style="margin-left: 80px;">
                   <?php echo form_open('dashbord_problem');?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label class="text-justify">Report problem</label>
                            <span><textarea type="text" name="ustxt" class="form-control" required placeholder="Type something.!"></textarea></span>
                            <br>
                            <label class="text-justify">To whom you are reporting</label>
                            <span><select name="usr" class="form-control" required>
                                    <option value=""></option>
                                    <option value="admin">Admininstrator</option>
                                    <option value="accountant">Accountant</option>
                                </select></span><br>
                                <div class="text-right"><button class="btn btn-primary">REPORT</button></div>
                        </li>
                    </ul>
                     <?php echo form_close();?>
                <div class="list-group">
                    <?php if(!empty($data)){ echo $data;}?>
                </div>
                </div>
          </div>
          </div>

<?php include_once 'footer.php';?>



