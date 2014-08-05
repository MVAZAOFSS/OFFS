<div class="col-lg-12">
    <table class="table-striped" width="100%">
     <tr>
         <td>
             <label> Select Month</label>
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
     </tr>
</table>
 <div class="olddate"></div>
</div>
<script>
    $('#cyle').change(function(){
        $('.olddate').html('<img src="<?php echo base_url('img/load.gif');?>">');
        var month=document.getElementById('cyle').value;
        var url="<?php echo site_url('accountant_controller/general_month');?>";
          var url2=url+'/'+$.trim(month);
        $.get(url2,function(data){
            setTimeout(function(){
            $('.olddate').html(data);
            },2000);
        });
    });
</script>