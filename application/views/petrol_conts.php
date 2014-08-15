
 <div class="panel-primary">
            <div class="panel-heading">Available before sales</div>
         </div>  
 <table class="table table-bordered table-condensed">
 <tr><th>Total(L)</th><th>Balance(L)</th><th>Amount(Tshs)</th></tr>
    <tr><td><?php echo ''.$petrol;?></td><td><?php echo ''.$petrol-($sold_litre-$dosold_litre);?></td><td><?php echo ''.$sold_amount-$dosold_amount;?></td</tr>
    </table>
<div class="panel-primary">
            <div class="panel-heading">Available After sales</div>
         </div>
<table class="table table-bordered table-condensed">
    <tr><th>Total(L)</th><th>Balance(L)</th><th>Amount(Tshs)</th></tr>
    <tr><td><?php echo ''.$petrolsold_litre;?></td><td><?php echo ''.$petrol-$sold_litre;?></td><td><?php echo ''.$petrolsold_amount;?></td></tr>
    </table>

<ul class="list-group">
    <li class="list-group-item text-primary">Sales Representative <?php
    foreach ($seller->result() as $row){
        echo ''.$row->seller_name;
    }
    
    ?></li>
</ul>
