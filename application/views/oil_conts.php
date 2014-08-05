<div class="panel-primary">
            <div class="panel-heading">Available before sales</div>
         </div>  
 <table class="table table-bordered table-condensed">
 <tr><th>Total(l)</th><th>Balance(l)</th><th>Amount(Tshs)</th></tr>
    <tr><td><?php echo ''.$oil;?></td><td><?php echo ''.$oil-($sold_litre3-$dosold_litre3);?></td><td><?php echo ''.$sold_amount3-$dosold_amount3;?></td></tr>
    </table>

 

    
        <div class="panel-primary">
            <div class="panel-heading">Available after sales</div>
         </div>
<table class="table table-bordered table-condensed">
    <tr><th>Total(l)</th><th>Balance(l)</th><th>Amount(Tshs)</th></tr>
    <tr><td><?php echo ''.$oilsold_litre;?></td><td><?php echo ''.$oil-$sold_litre3;?></td><td><?php echo ''.$oilsold_amount;?></td></tr>
    </table>

<ul class="list-group">
    <li class="list-group-item text-primary">Sales Representative <?php
    foreach ($seller->result() as $row){
        echo ''.$row->seller_name;
    }
    
    ?></li>
</ul>
