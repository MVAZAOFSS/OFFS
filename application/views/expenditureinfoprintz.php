<div class="container-fluid hds">
    <?php
    $res=$this->db->get_where('tb_expenditure',array('id'=>$exp),1);
    foreach ($res->result() as $ext){
    ?>
    <p class="alert-info">DETAILS FOR EXPENDITURE</p>
    <table border="" width="100%">
        <tr><td><p class="small">Name<label class="text-success pull-right"></label></p></td><td><?php echo ''.$ext->data_entry_name;?></td></tr>
        <tr class="amt"><td><p class="small">Amount<label class="text-success pull-right"></label></p></td><td><?php echo ''.$ext->cash_used;?></td></tr>
        <tr class="rsf"><td><p class="small">User for</p><p class="small"><label class="text-success pull-right"></label></p></td><td><?php echo ''.$ext->reason;?></td></tr>
        <tr><td><p class="small">Mode<label class="text-success pull-right"></label></p></td><td><?php echo ''.$ext->cash_mode;?></td></tr>
        <?php
        if($ext->checqueNo){
            echo '<tr><td><p class="small">ChacqueNo<label class="text-success pull-right"></label></p></td><td>'.$ext->checqueNo.'</td></tr>';
        }  else {
            echo '';
        }
        ?>
        <tr class="dt"><td><p class="small">Date<label class="text-success pull-right"></label></p></td><td><?php echo ''.$ext->date_entered;?></td></tr>
    </table>
    
   
<?php
    }
?>
    
</div>
