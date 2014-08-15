

<div class="well well-sm">
    <p>Seller records</p>
   <ul class="list-group">
        <li class="list-group-item">Seller name <span class="text-primary pull-right"><?php echo ''.$seller_name;?></span></li>
        <li class="list-group-item">Sold litres<span class="text-primary pull-right"><?php echo ''.$sold_litre;?> L</span></li>
        <li class="list-group-item">Cash collected<span class="text-primary pull-right"><?php echo ''.$sold_amount-$credit_amount;?> Tshs</span></li>
        <li class="list-group-item">Customer name<span class="text-primary pull-right"><?php echo ''.$customer_name;?></span></li>
        <li class="list-group-item">litre sold for credit<span class="text-primary pull-right"><?php echo ''.$credit_litre;?> L</span></li>
        <li class="list-group-item">Credit amount <span class="text-primary pull-right"><?php echo ''.$credit_amount;?> Tshs</span></li>
        <li class="list-group-item">Date<span class="text-primary pull-right"><?php echo ''.$sold_date;?></span></li>
    </ul>
</div>
