<?php
$res=$this->db->get_where('tb_oil',array('id'=>$pet),1);
foreach ($res->result() as $row){
?>
<?php echo form_open('admin_controller/tableupdateoil/'.$pet,array('id'=>'upd'));?>
<table class="table table-bordered table-striped">
    <tr id="tedit1"><td><input type="text" name="lp" class="form-control" value="<?php echo $row->prod_qnty;?>" >
        </td><td><input type="text" name="pma" class="form-control" value="<?php echo $row->purchased_amount;?>"></td>
        <td><input type="text" name="exma" class="form-control"  value="<?php echo $row->prod_name;?>"></td>
        <td><input type="text" name="edate" class="form-control datepicker" value="<?php echo $row->entray_date;?>"></td>
 <td><button class="btn btn-success btn-xs edit"><span class="fa fa-save"></span> Update</button></td></tr>

</table>
<?php echo form_close();?>
<?php
}
?>
<script>
        $('#upd').submit(function(e){
            var fomxp=$(this).serializeArray();
            var urlp="<?php echo site_url('admin_controller/tableupdateoil');?>";
            $.post(urlp,fomxp,function(data){
                location.reload();
            });
        });
</script>
<script>
    $('.datepicker').datepicker({dateFormat: 'mm-dd-yy'});
</script>