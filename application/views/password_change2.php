<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-8" id="dt">
            <div class="panel-success dt1">
                <div class="panel-heading"><label>change password</label></div>
                <div class="well bs-component">
                    <?php if(!empty($smg)){echo'<label class=" text-center label-success" style="margin-left:100px;">'. $smg.'</label>';}?>
                    <?php if(!empty($smg1)){echo'<label class=" text-center label-success" style="margin-left:100px;">'. $smg1.'</label>';}?>
                    <?php if(!empty($smg2)){echo'<label class=" text-center label-danger" style="margin-left:100px;">'. $smg2.'</label>';}?>
                    <?php echo form_open('general_accountant/change',array('class'=>'form-horizontal panel-body'));?>
                    <div class="form-group">
                        <label for="current password" class="col-lg-4 control-label">Current password</label>
                        <div class="col-lg-8">
                            <font color="red" class="f1"><?php echo form_error('pd');?></font>
                            <input type="password" name="pd" class="form-control fs" placeholder="currrent password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new password" class="col-lg-4 control-label">New password</label>
                        <div class="col-lg-8">
                            <font color="red" class="f2"><?php echo form_error('npd');?></font>
                            <input type="password" name="npd" class="form-control fs2" placeholder="New password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Username" class="col-lg-4 control-label">Confirm Password</label>
                        <div class="col-lg-8">
                            <font color="red" class="f3"><?php echo form_error('confpd');?></font>
                            <input type="password" name="confpd" class="form-control fs3" placeholder="confirm password">
                        </div>
                    </div>
                    <div class="text-right"><button type="submit" class="btn bg-primary sng">change password</button></div>
                    <?php echo form_close();?>
                </div>
            </div>
            <div class="load"></div>
        </div>
        <br>
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
                        $res1=$this->db->get_where('tb_problem',array('receiver'=>'accountant','status'=>'unchecked'));
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

