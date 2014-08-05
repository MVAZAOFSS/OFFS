<div class="infom">
    <div class="succ" style="padding-top:0px; margin-left: 20px;"></div>
   <?php
    $res=$this->db->get_where('tb_petrol',array('id'=>$customer));
    if($res->num_rows()===1){
        foreach ($res->result() as $row){
           ?> 
    <ul class="list-group">
        <li class="list-group-item">Customer name<span class="pull-right"><?php echo ''.$row->customer_credit_name;?></span></li>
        <li class="list-group-item">Seller name<span class="pull-right"><?php echo ''.$row->seller_name;?></span></li>
        <li class="list-group-item">Date of purchasing<span class="pull-right"><?php echo ''.$row->sold_date;?></span></li>
        <li class="list-group-item">Total litre of petrol taken<span class="pull-right"><?php echo ''.$row->credit_litre;?></span></li>
        <li class="list-group-item">Total amount to be payed<span class="pull-right"><?php echo ''.$row->credit_amount;?></span></li>
        <li class="list-group-item">Amount remained<span class="pull-right alert-danger"><?php echo ''.$row->credit_amount-$row->payed;?></span></li>
    </ul>
    <?php echo form_open('accountant_controller/payed/'.$row->id,array('class'=>'form-horizontal asyn'));?>
    <ul class="list-group">
        <li class="list-group-item">
            <div class="input-group">
                <div class="col-lg-4">
                    <div class="input-group">
                <label>Amount</label><input type="text" name="csh" class="form-control input-sm" required placeholder="<?php echo ''.$row->payed;?>">
                </div>
                </div>
                <div class="col-lg-5">
                    <div class="input-group form-inline">
                    <label>Date</label>
                    <input type="text" name="dtc" class="form-control input-sm datepicker">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="input-group">
                        <label>Payment</label>
                    <select name="check">
                        <option class="cash">Cash</option>
                        <option class="chq">Check</option>
                    </select>
                    </div>
                </div>
               </div>
            <div class="input-group ch text-center">
                        <label>ChequeNo</label>
                        <input type="text" name="checque" class="form-control">
                    </div>
            <script>
            $(document).ready(function(){
                $('.ch').hide();
                $('.chq').click(function(){
                    $('.ch').show();
                });
                $('.cash').click(function(){
                    $('.ch').hide();
                });
            });
            </script>
            </li>
    </ul>
    <button type="submit" name="edit" class="btn btn btn-info btn-sm pull-right">Save changes</button>
    <?php echo form_close();?>
 <?php
        }  
    }
    ?>
    <script>
    $('.asyn').submit(function(e){
        $('.succ').html('<label class=" label label-warning">Loading....</label>');
        var forms=$(this).serializeArray();
        var url=$(this).attr('action');
        $.post(url,forms,function(data){
            setTimeout(function(){
                $('.succ').html(data);
                location.reload();
            },2000);
        });
        e.preventDefault();
    });
    </script>
</div>
<script>
    $('.datepicker').datepicker({dateFormat: 'mm-dd-yy'});
</script>
