<div class="container-fluid">
    <p class="alert-info">Expenditure description</p>
    <div class="loads">
    <?php echo form_open('accountant_controller/expenditure_submit',array('id'=>'jux'));?>
    <table class="table table-condensed table-striped">
        <tr><td class="small"><label>Used for:</label><textarea class="form-control" name="wrs" required></textarea></td></tr>
        <tr><td><label class="small">Amount</label><input type="text" name="cmt" class="form-control" required></td></tr>
        <tr><td><label class="small">Mode</label><select name="mdc" class="form-control" required>
                    <option class="csh">Cash</option>
                    <option class="cqe">Cheque</option>
                </select><input type="text" name="chks" class="form-control dtz" placeholder="chacque No"></td></tr>
        <tr><td><label class="small">Date</label><input type="text" name="dt" class="form-control" id="datepicks" required></td></tr>
        <tr><td><button class="btn btn-info btn-xs pull-right">Save</button></td></tr>
    </table>
    <?php echo form_close();?>
        </div>
</div>
<script>
$(document).ready(function(){
    $('.dtz').hide();
    $('.cqe').click(function(){
        $('.dtz').show();
    });
    $('.csh').click(function(){
        $('.dtz').hide();
    });
   $('#datepicks').datepicker({dateFormat: 'mm-dd-yy'});
  
});
</script>
<script>
    $('#jux').submit(function(e){
      $('.loads').html('<label class="label label-warning">Submitting...</label>');
      var dataz=$(this).serializeArray();
      var url=$(this).attr('action');
      $.post(url,dataz,function(sms){
         if(sms==='true'){
          setTimeout(function(){
              $('#jux').hide();
              $('.loads').html(sms);
          },2000);
          
       }else{
        setTimeout(function(){
              $('.loads').html(sms);
              ('#jux').show();
          },2000);  
      }
      
      });
      e.preventDefault();
  });
  
</script>
