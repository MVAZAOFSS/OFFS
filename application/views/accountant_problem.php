<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-8" id="dt">
            <div class="text-center">
                <ul class="list-group">
                    <li class="list-group-item"><label class="text-info"><b>Express the fact</b></label></li>
                </ul>
                 </div>
            <div class="col-lg-10" style="margin-left: 80px;">
                   <?php echo form_open('general_accountant/burger');?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label class="text-justify">Report problem</label>
                            <span><textarea type="text" name="txt" class="form-control" required placeholder="Type something.!"></textarea></span>
                            <br>
                            <label class="text-justify">To whom you are reporting</label>
                            <span><select name="people" class="form-control" required>
                                    <option value=""></option>
                                    <option value="admin">Admininstrator</option>
                                    <option value="seller">seller</option>
                                </select></span><br>
                                <div class="text-right"><button class="btn btn-primary">REPORT</button></div>
                        </li>
                    </ul>
                     <?php echo form_close();?>
                <div class="list-group">
                    <?php if(!empty($sms)){ echo $sms;}?>
                </div>
                </div>
          </div>
        <br>
        <div class="col-lg-4">
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
          </div>

<?php include_once 'footer.php';?>



