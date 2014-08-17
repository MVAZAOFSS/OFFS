<div class="col-lg-12">
    <label class="text-center text-info">Oil Report</label>
    <table class="table-striped" width="100%">
     <tr>
         <td>
             <label>From</label>
         </td>
         <td>
          <input type="text" name="datez" class="form-control datepicker" placeholder="select date" required>
         </td>
     </tr>
</table>
 <div class="olddate"></div>
</div>
<script>
    $('.datepicker').datepicker({
        dateFormat: 'mm-dd-yy',
        defaultDate: '-1w',
        changeMonth: true,
        maxDate: 0,
        rangeSelect: true,
        changeYear: true,
        showButtonPanel: true,
        showWeek: true,
        onSelect: function(date,instance){
            $('.olddate').html('<img src="<?php echo base_url('img/load.gif');?>">');
           var url="<?php echo site_url('accountant_controller/day_oil');?>";
           var url3="<?php echo $id;?>";
           var url4=url+'/'+url3+'/'+$(this).val();
           $.get(url4,function(data){
               setTimeout(function(){
               $('.olddate').html(data);
               },2000);
           });
        }
    });
</script>