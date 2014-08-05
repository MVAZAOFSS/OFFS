<?php include_once 'header2.php';?>
<div id="content">
    <ul class="nav nav-tabs">
        <li></li>
    </ul>
    <div class="tab-content" style="display: block">
        <div class="col-lg-4"  id="dt">
            <div class="panel-success">
            <div class="panel-heading">
                <p>System info</p>
            </div>
            <div class="list-group">
                <a href="<?php echo site_url('register_controller');?>" class="list-group-item btn-link">
                    <span class="fa fa-flag-o"></span>    
                    Send notification
                   </a>
                    <a href="#" class="list-group-item">
                        <span class="fa fa-question"></span>
                        Report problem
                    </a>
                <a href="<?php echo site_url('general_admin/change');?>" class="list-group-item">
                    <span class="fa fa-lock"></span>    
                    Change password
                    </a>
                <a href="<?php echo site_url('admin_controller');?>" class="list-group-item">
                    <span class="fa fa-home"></span>    
                    <span class="badge">home</span>
                        Back to manage product
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="fa fa-flag-checkered"></span> <span class="badge">view</span>
                        System alerts
                    </a>
                    <a href="<?php echo site_url('admin_controller/summary');?>" class="list-group-item">
                        <span class="fa fa-file-text"></span><span class="badge">View</span>
                        Balance of Litres
                    </a>
                <a href="<?php echo site_url('admin_controller/user');?>" class="list-group-item">
                    <span class="fa fa-users"></span>    
                    View user's 
                    
                    </a>
                   <a href="<?php echo site_url('logout');?>" class="list-group-item" >
                       <span class="fa fa-unlock-alt"></span>
                       Logout</a>
            </div>
            
       </div>
        </div>
        <div class="col-lg-6" id="dt">
            <div class="panel-success dt1">
                <div class="panel-heading"><label>Update user account</label></div>
                <div class="well">
                    <?php echo form_open('',array('class'=>'form-horizontal'));?>
                    <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">First name</label>
                        <div class="col-lg-8">
                            <table class="table table-condensed table-responsive"><tr><td><?php echo ''.$firstname;?></td></tr></table>
                        </div>
                    <div class="form-group">
                        <label for="secondname" class="col-lg-4 control-label">Second name</label>
                        <div class="col-lg-8">
                            <table class="table table-condensed table-responsive"><tr><td><?php echo ''.$lastname;?></td></tr></table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Username" class="col-lg-4 control-label">Username</label>
                        <div class="col-lg-8">
                            <table class="table table-condensed table-responsive"><tr><td><?php echo ''.$username;?></td></tr></table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Email" class="col-lg-4 control-label">Email</label>
                        <div class="col-lg-8">
                            <table class="table table-condensed table-responsive"><tr><td><?php echo ''.$email;?></td></tr></table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="position" class="col-lg-4 control-label">Position</label>
                        <div class="col-lg-8">
                            <table class="table table-condensed table-responsive"><tr><td><?php echo ''.$position;?></td><td class="menu"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><img src="<?php echo base_url('img/39.png');?>">Edit</button>
                                    </td></tr></table>
                           <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-sm">
                         <div class="modal-content">
                          <div class="modal-body">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <div class="modal-header"><label class="text-center text-primary">Update user position</label></div>
                        <br> 
                        <?php echo form_close();?>
                        <div class="success"><?php if(!empty($success)){ echo $success;}?></div>
                        <?php echo form_open('admin_controller/edit/'.$id,array('id'=>'ajax'));?>
                        <div class="form-group">
                        <label for="occupation" class="col-lg-4 control-label">Position</label>
                        <div class="col-lg-8">
                            <select name="position" class="form-control" required>
                                <option value=""></option>
                                <option value="user">Seller</option>
                                <option value="admin">Administrator</option>
                                <option value="accountant">Accountant</option>
                            </select>
                        </div>
                         </div>
                        </div>
                         <div class="modal-footer">
                         <button type="submit" name="edit" class="btn btn btn-info btn-sm">Save changes</button>
                         <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button></div>
                         <?php echo form_close();?>
                           </div>
                           </div>
                           </div>
                                     </div>
                                     </div>
                </div>
            </div>
            <div class="load"></div>
        </div>
        </div>
        </div>
        
   <script>
   $('#ajax').submit(function(e){
       e.preventDefault();
       var formdata=$(this).serializeArray();
       var formurl="<?php echo site_url('admin_controller/edit/'.$id);?>";
       $.post(formurl,formdata,function(data){
           $('.success').html(data);
       });
   });
</script>
<?php include_once 'footer.php';?>

