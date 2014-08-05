<?php
$res=$this->db->get_where('oil_update',array('oil_id'=>$name,'stat_rolez'=>$this->session->userdata('role_station')));
foreach ($res->result() as $row){
?>
<div class="text text-center text-info text-justify"><label><?php echo $row->oil_product;?></label></div>
                        <ul class="nav nav-tabs nav-pills">
                            <li class="<?php if(isset($active11)){ echo'active';}?>"><a data-target=".present" data-toggle="tab">Cash sales</a></li>
                            <li class="<?php if(isset($active12)){ echo'active';}?>"><a data-target=".billed" data-toggle="tab">Credit sales</a></li>
                        </ul>
                        <div class="tab-content" style="display: block">
                         <div class="present in tab-pane <?php if(isset($active11)){ echo'active';}?>">
                             <div class=" panel panel-default">
                                 <div class=" panel-heading"><?php echo $row->oil_product;?> sells</div>
                                 <div class=" panel-body">
                        <?php echo form_open('dashbord/oil/'.$row->oil_id,array('id'=>'oil_cash'));?>
                        <table class="table table-condensed">
                            <tr><td><label>Total no item</label></td><td><?php echo form_error('nlitre6','<div class="error">','</div>');?><input type="text" name="nlitre6" class="form-control input-sm"></td></tr>
                            <tr><td><label>Amount (Tshs)</label></td><td><?php echo form_error('cost6','<div class="error">','</div>');?><input type="text" name="cost6" class="form-control input-sm"></td></tr>
                            <tr><td><label>Due date</label></td><td><?php echo form_error('issue6','<div class="error">','</div>');?><input type="text" name="issue6" class="form-control datepicker input-sm"></td></tr>
                          <tr><td></td><td><button class="btn btn-primary pull-right">Save</button></td></tr>
                           </table>
                        <?php echo form_close();?>
                                <?php if(!empty($smg6)){echo'<div class="example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg6.'</strong>
                        </div>
                       </div>';}?>
                            </div>
                             </div>
                         </div>
                            <div class="billed in tab-pane <?php if(isset($active12)){ echo'active';}?>">
                                <div class=" panel panel-default">
                                    <div class=" panel-heading"><?php echo $row->oil_product;?> sells at credit</div>
                                    <div class=" panel-body">
                        <?php echo form_open('dashbord/oil_credit/'.$row->oil_id ,array('id'=>'oil_credit'));?>
                        <table class="table table-condensed">
                            <tr><td><label>Total no.item</label></td><td><?php echo form_error('nlitre7','<div class="error">','</div>');?><input type="text" name="nlitre7" class="form-control input-sm"></td></tr>
                            <tr><td><label>Amount (Tshs)</label></td><td><?php echo form_error('cost7','<div class="error">','</div>');?><input type="text" name="cost7" class="form-control input-sm"></td></tr>
                            <tr><td><label>Customer name</label></td><td><?php echo form_error('ncost7','<div class="error">','</div>');?><input type="text" name="ncost7" class="form-control input-sm"></td></tr>
                            <tr><td><label>Due date</label></td><td><?php echo form_error('issue7','<div class="error">','</div>');?><input type="text" name="issue7" class="form-control datepicker input-sm"></td></tr>
                          <tr><td></td><td><button class="btn btn-primary pull-right" name="">Save</button></td></tr>
                           </table>
                        <?php echo form_close();?>
                       <?php if(!empty($smg7)){echo'<div class="example" style="padding-top:20px;">
                       <div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <strong style="margin-left:50px">'.$smg7.'</strong>
                        </div>
                       </div>';}?>
                            </div>
                            </div>
                            </div>
                        </div>
<?php
}?>
<script>
    $('.datepicker').datepicker({dateFormat: 'mm-dd-yy'});
    $('#oil_cash').submit(function(e){
        e.preventDefault();
        var formz=$(this).serializeArray();
        var url=$(this).attr('action');
        formz.push({"name": "save","value":""});
        $.post(url,formz,function(data){
            $('.oildump').html(data);
        });
    });
    $('#oil_credit').submit(function(e){
        e.preventDefault();
        var formc=$(this).serializeArray();
        var url=$(this).attr('action');
        formc.push({"name": "save","value":""});
        $.post(url,formc,function(sms){
            $('.oildump').html(sms);
        });
    });
    window.setTimeout(function(){
        $('.example').fadeTo(500,0).slideUp(500,function(){
            $(this).remove();
        });
    },2000);
</script>