<div id="fndetail" class="col-lg-12">
    <p class="alert alert-info">Oil Month Report</p>
        
    <form id="month">
    <table class="table-striped" width="100%">
     <tr>
         <td>
             <label>Month</label>
         </td>
         <td>
             <select name="datez" class="form-control" placeholder="select Month" required id="cyle">
                 <option></option>
                 <option value="01">Jan</option>
                 <option value="02">Feb</option>
                 <option value="03">March</option>
                 <option value="04">April</option>
                 <option value="05">May</option>
                 <option value="06">June</option>
                 <option value="07">July</option>
                 <option value="08">August</option>
                 <option value="09">Sept</option>
                 <option value="10">Oct</option>
                 <option value="11">Nov</option>
                 <option value="12">Dec</option>
             </select>
         </td>
         <td>
             Year:
         </td>
         <td>
             <input type="text" name="yaerz" value="<?php echo date('Y');?>" class="form-control yearz">
         </td>
         <td>
             <button class="btn btn-success">Go!</button>
         </td>
     </tr>
</table>
        </form>
 <div class="olddate"></div>
</div>
<script>
    $('#month').submit(function(e){
        e.preventDefault();
    $('.olddate').html('<img src="<?php echo base_url('img/load.gif');?>">');
     var month=document.getElementById('cyle').value;
    var url="<?php echo site_url('accountant_controller/check_month3');?>";
    var url2=url+'/'+$.trim(month);
    var url3=url2+'/'+$('.yearz').val();
    $.get(url3,function(data){
        setTimeout(function(){
        $('.olddate').html(data);
        },2000);
    });
    
    });
          
   
</script>