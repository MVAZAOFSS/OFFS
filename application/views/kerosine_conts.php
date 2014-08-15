 <div class="panel-primary">
            <div class="panel-heading">Available before sales</div>
         </div>  
 <table class="table table-bordered table-condensed">
 <tr><th>Total(l)</th><th>Balance(l)</th><th>Amount(Tshs)</th></tr>
    <tr><td><?php echo ''.$kerosine;?></td><td><?php echo ''.$kerosine-($sold_litre2-$dosold_litre2);?></td><td><?php echo ''.$sold_amount2-$dosold_amount2;?></td></tr>
    </table>

 

    
        <div class="panel-primary">
            <div class="panel-heading">Available After sales</div>
         </div>
<table class="table table-condensed table-bordered">
    <tr><th>Total(l)</th><th>Balance(l)</th><th>Amount(Tshs)</th></tr>
    <tr><td><?php echo ''.$kerosinesold_litre;?></td><td><?php echo ''.$kerosine-$sold_litre2;?></td><td><?php echo ''.$kerosinesold_amount;?></td></tr>
    </table>

<ul class="list-group">
    <li class="list-group-item text-primary">Sales Representative <?php
    foreach ($seller->result() as $row){
        echo ''.$row->seller_name;
    }
    
    ?></li>
</ul>
