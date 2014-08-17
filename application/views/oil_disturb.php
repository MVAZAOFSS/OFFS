<form id="rep">
<p id="ir" style="border: 1px solid #dd6; padding: 3px; border-left:4px solid #dd7;background-color:#f5f5f5">
 Select:
    <select id="reportfor" style="border: 1px solid #002;padding:2px">
        <option></option>
        <option value="weekly">weekly</option>
        <option value="monthly">monthly</option>
    </select>   
    <span id="weekly" style="display:none">
     start   
    <input id="start" style="width: 90px;border: 1px solid #002;padding:2px" type="text" /> 
     end   
    <input id="end" style="width: 90px;border: 1px solid #002;padding:2px" type="text" />  
    </span>
    <span id="monthly" style="display:none">
    <select id="month" style="border: 1px solid #002;padding:2px">
        <option></option>
        <option value="01">january</option>
        <option value="02">february</option>
        <option value="03">march</option>
        <option value="04">april</option>
        <option value="05">may</option>
        <option value="06">june</option>
        <option value="07">july</option>
        <option value="08">august</option>
        <option value="09">september</option>
        <option value="10">october</option>
        <option value="11">november</option>
        <option value="12">december</option>
    </select>
        <input type="text" placeholder="Year" value="<?php echo date('Y');?>" id="mYear" style="width: 90px;border: 1px solid #002;padding:2px" />  
    </span>
    <button id="go">Go</button>
</p>
</form>
<script type="text/javascript">
$(document).ready(function(){
  $('#date, #start, #end').datepicker({
        dateFormat:"mm-dd-yy",
        changeMonth: true,
        changeYear:true,
        maxDate: 0
    });
$('#reportfor').on('change', function(){
        var rf = $(this).val();
        if(rf ==="weekly"){
           $('#monthly').hide();
            $('#weekly').fadeIn(1000);
        }else if(rf ==="monthly"){
            $('#weekly').hide();
           $('#monthly').fadeIn(1000);
        }
    });
   $('#rep').submit(function(e){
    e.preventDefault();    
     var timely=document.getElementById('reportfor').value;
     if(timely===''){
         alert('Select modal to view');
         return false;
     }else{
         if(timely==='weekly'){
           var start_date=$('#start').val();
           var end_date=$('#end').val();
          var url="<?php echo site_url('accountant_controller/oil_week_disturb');?>";
           var url2="<?php echo $id;?>";
           var url3=url+'/'+url2+'/'+start_date+'/'+end_date;
           $.get(url3,function(data){
             $('.petrol').html(data);
           });
         }if(timely==='monthly'){
            var month=document.getElementById('month').value;
            var date=$('#mYear').val();
            var url="<?php echo site_url('accountant_controller/oil_month_disturb');?>";
            var url2="<?php echo $id;?>";
            var url3=url+'/'+url2+'/'+month+'/'+date;
            $.get(url3,function(data){
                $('.petrol').html(data);
            });
         }
     }
    });
        
});
</script>