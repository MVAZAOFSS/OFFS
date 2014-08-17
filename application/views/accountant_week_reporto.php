<div class="col-lg-12">
    <label class="text-center text-info">Oil report</label>
    <form id="form">
    <table class="table-striped" width="100%">
     <tr>
         <td>
             <label>From</label>
         </td>
         <td>
          <input type="text" name="datez" class="form-control datepicker" placeholder="select date" required>
         </td>
         <td>
             <label>To</label>
         </td>
         <td>
          <input type="text" name="datez" class="form-control datepicker1" placeholder="select date" required>
         </td>
         <td>
             <button class="btn btn-success" name="save">Go!</button>
         </td>
     </tr>
</table>
    </form>
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
        showWeek: true});
    $('.datepicker1').datepicker({
        dateFormat: 'mm-dd-yy',
        defaultDate: '-1w',
        changeMonth: true,
        maxDate: 0,
        rangeSelect: true,
        changeYear: true,
        showButtonPanel: true,
        showWeek: true});
    $('#form').submit(function(e){
        e.preventDefault();
            $('.olddate').html('<img src="<?php echo base_url('img/load.gif');?>">');
           var url="<?php echo site_url('accountant_controller/week_oil');?>";
           var url0="<?php echo $id;?>";
           var url2=url+'/'+url0+'/'+$('.datepicker').val();
           var url3=url2+'/'+$('.datepicker1').val();
           $.get(url3,function(data){
               setTimeout(function(){
               $('.olddate').html(data);
               },2000);
           });
        });
   
</script>