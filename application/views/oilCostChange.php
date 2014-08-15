<?php
$res=$this->db->get_where('oil_update',array('oil_id'=>$oil_cost));
foreach ($res->result() as $row){
?>
<div class="panel panel-default">
    <div class="panel-heading">Change Cost For: <?php echo $row->oil_product;?></div>
    <div class="panel-body">
        <?php
        if(isset($smg)){
            echo '<div class="alert fade in check">'
            . '<a type="button" class="close" data-dismiss="alert">&times;</a>'
                    . ''.$smg
                    
            . '</div>';
        }?>
        <?php echo form_open('admin_controller/oil_cost_insert/'.$row->oil_id ,array('id'=>'oilcheck'));?>
        <table class="table table-striped">
            <tr><td>
                    Cost: <?php echo form_error('osc','<div class="error">','</div>');?><input type="text" name="osc" value="<?php echo $row->oil_cost;?>" class="form-control">
                </td>
            </tr>
            <tr><td>
                    Date of Entry:<?php echo form_error('oildate','<div class="error">','</div>');?><input type="text" name="oildate" value="<?php echo $row->date_update;?>" class="form-control datepicker">
                </td>
            </tr>
            <tr><td>
                    <button class="btn btn-success btn-sm btn-block" name="save">Update cost</button>
                </td>
            </tr>
        </table>
        <?php echo form_close();?>
    </div>
</div>
<?php
}
?>
<script>
    $('.datepicker').datepicker({dateFormat: 'mm-dd-yy'});
    $('#oilcheck').submit(function(e){
        e.preventDefault();
        var formz=$(this).serializeArray();
        var url=$(this).attr('action');
        formz.push({"name": "save","value": ""});
        $.post(url,formz,function(sms){
            $('.costUpdate').html(sms);
            setTimeout(function(){
                location.reload();
            },2000);
            
        });
    });
</script>
