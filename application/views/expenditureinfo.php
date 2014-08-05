<div class="container-fluid hds">
    <?php
    $res=$this->db->get_where('tb_expenditure',array('id'=>$exp),1);
    foreach ($res->result() as $ext){
    ?>
    <p class="alert-info">Expenditure details</p>
    <?php echo form_open('accountant_controller/expupdate/'.$exp,array('id'=>'form'));?>
    <table class="table table-striped table-hover tableborder">
        <tr><td><p class="small">Name<label class="text-success pull-right"><?php echo ''.$ext->data_entry_name;?></label></p></td></tr>
        <tr class="amth"><td><p class="small">Amount<label class="text-success pull-right"><?php echo ''.$ext->cash_used;?></label></p></td></tr>
        <tr class="amt"><td><p class="small">Amount<label class="text-success pull-right"><input type="text" name="cash" value="<?php echo ''.$ext->cash_used;?>" class="form-control input-sm" ></label></p></td></tr>
        <tr class="rsfh"><td><p class="small">Used for</p><p class="small text-success pull-right"><?php echo ''.$ext->reason;?></p></td></tr>
        <tr class="rsf"><td><p class="small">Used for</p>
            <p class="small"><label class="text-success pull-right"><textarea name="rsn" rows="1" class="form-control input-sm"><?php echo ''.$ext->reason;?></textarea></label></p></td></tr>
        <tr class="cash"><td><p class="small">Mode<label class="text-success pull-right"><?php echo ''.$ext->cash_mode;?></label></p></td></tr>
        <tr class="cashr"><td><p class="small">Mode<label class="text-success pull-right"><input type="text" name="md" value="<?php echo ''.$ext->cash_mode;?>" class="form-control input-sm"></label></p></td></tr>
        <?php
        if($ext->checqueNo){
            echo '<tr><td><p class="small">ChacqueNo<label class="text-success pull-right"><input type="text" name="shk" value="'.$ext->checqueNo.'" class="form-control"></label></p></td></tr>';
        }  else {
            echo '';
        }
        ?>
        <tr><td class="dth"><p class="small">Date<label class="text-success pull-right"><?php echo ''.$ext->date_entered;?></label></p></td></tr>
        <tr class="dt"><td><p class="small">Date<label class="text-success pull-right"><input type="text" name="dte" value="<?php echo ''.$ext->date_entered;?>" class="form-control datepicker input-sm"></label></p></td></tr>
        <tr class="ds"><td><button class="btn btn-success btn-sm"><span class="fa fa-save"></span> Save changes</button> <a href="<?php echo site_url('accountant_controller/printexp/'.$exp);?>" class="btn btn-default btn-sm "><span class="fa fa-print"> Print</span></a></td></tr>
        <tr class="ed"><td><a class="btn btn-success btn-sm"><span class="fa fa-share-square"></span> Edit</a> <a href="<?php echo site_url('accountant_controller/printexp/'.$exp);?>" class="btn btn-default btn-sm "><span class="fa fa-print"> Print</span></a></td></tr>
    </table>
    <?php echo form_close();?>
   
<?php
    }
?>
    
</div>
<script>
    $('.datepicker').datepicker({dateFormat: 'mm-dd-yy'});
</script>
<script>
    $('#form').submit(function(e){
        e.preventDefault();
      $('.hds').html('<img src="<?php echo base_url('img/load.gif');?>">');
      var foemz=$(this).serializeArray();
      var url=$(this).attr('action');
      $.post(url,foemz,function(sms){
          setTimeout(function(){
          $('.hds').html(sms).hide(6000);
          },2000);
      });
    });
</script>
<script>
    $('.amt').hide();
    $('.rsf').hide();
    $('.dt').hide();
    $('.ds').hide();
    $('.cashr').hide();
    $('.ed').click(function(){
        $('.amth').hide();
        $('.rsfh').hide();
        $('.dth').hide();
        $('.ed').hide();
        $('.cash').hide();
        $('.amt').show();
    $('.rsf').show();
    $('.dt').show();
    $('.ds').show();
    $('.cashr').show();
    });
</script>
