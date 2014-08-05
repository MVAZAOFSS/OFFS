<html>
    <head>
    </head>
    <body>
        <P>Printed Date <?php echo date('D-m-Y');?></P>
        <hr color="red"></hr>
        <div class="well well-sm">
            <p class="label label-info">Name of seller: <span class="pull-left"><?php echo $this->session->userdata('username');?></span></p>
        </div>
 <hr color="red"></hr>
        
 <fieldset>
<legend>General summary</legend>
<table  border="" width="100%">
<tr><td>Total litres of petrol sold</td><td><?php echo ''.$sold_litre;?></td></tr>
<tr><td>Amount collected</td><td><?php echo ''.$sold_amountd;?></td></tr>
<tr><td><hr color="red"></hr></td></tr>
 <tr><td>Total litres of Diesel sold</td><td><?php echo ''.$sold_litre1;?></td></tr>
<tr><td>Amount collected</td><td><?php echo ''.$sold_amountd1;?></td></tr>
<tr><td><hr color="red"></hr></td></tr>
<tr><td>Total litres of kerosine sold</td><td><?php echo ''.$sold_litre2;?></td></tr>
<tr><td>Amount collected</td><td><?php echo ''.$sold_amountd2;?></td></tr>
<tr><td><hr color="red"></hr></td></tr>
<tr><td>Total litres of oil sold</td><td><?php echo ''.$sold_litre3;?></td></tr>
<tr><td>Amount collected</td><td><?php echo ''.$sold_amountd3;?></td></tr>
<tr><td><hr color="red"></hr></td></tr>
</table>
</fieldset>
    </body>
    
</html>

