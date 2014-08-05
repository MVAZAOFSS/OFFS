
<div class="well">
   <?php
    $res=$this->db->get_where('tb_kerosine',array('id'=>$hist,'seller_status'=>'yes'));
    if($res->num_rows()===1){
        foreach ($res->result() as $row){
    ?>
    <p class="text-primary">Kerosene history</p>
   <ul class="list-group">
       <li class="list-group-item">Total sales of Kerosine<span class="text-primary pull-right"><?php echo ''.$row->sold_amount;?> Tshs</span></li>
       <li class="list-group-item">Amount of Litres<span class="text-primary pull-right"><?php echo ''.$row->sold_litre;?> Litres</span></li>
       <li class="list-group-item">Cash collected<span class="text-primary pull-right"><?php echo ''.$row->sold_amount-$row->credit_amount;?> Tshs</span></li>
       <li class="list-group-item">Customer name<span class="text-primary pull-right"><?php echo ''.$row->customer_credit_name;?></span></li>
       <li class="list-group-item">Sold litre for credit<span class="text-primary pull-right"><?php echo ''.$row->credit_litre;?> Litres</span></li>
       <li class="list-group-item">Credit amount <span class="text-primary pull-right"><?php echo ''.$row->credit_amount;?> Tshs</span></li>
    </ul>
</div>
<?php
}
}
?>
