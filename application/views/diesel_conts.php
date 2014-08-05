
 <div class="panel-primary">
            <div class="panel-heading">Available before sales</div>
         </div>  
 <table class="table table-bordered table-condensed">
 <tr><th>Total(l)</th><th>Balance(Ltr)</th><th>Amount(Tshs)</th></tr>
    <tr><td><?php echo ''.$diesel;?></td><td><?php echo ''.$diesel-($sold_litre1-$dosold_litre1);?></td><td><?php echo ''.$sold_amount1-$dosold_amount1;?></td></tr>
    </table>

 

    
        <div class="panel-primary">
            <div class="panel-heading">Available After sales</div>
         </div>
<table class="table table-bordered table-condensed">
    <tr><th>Total(Ltr)</th><th>Balance(Ltr)</th><th>Amount(Tshs)</th></tr>
    <tr><td><?php echo ''.$dieselsold_litre;?></td><td><?php echo ''.$diesel-$sold_litre1;?></td><td><?php echo ''.$dieselsold_amount;?></td></tr>
    </table>

<ul class="list-group">
    <li class="list-group-item text-primary">Sales Representative <?php
    foreach ($seller->result() as $row){
        echo ''.$row->seller_name;
    }
    
    ?></li>
</ul>
