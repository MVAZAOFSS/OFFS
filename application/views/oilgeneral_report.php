<?php
        $resoil=$this->db->get_where('oil_update',array('oil_id'=>$id,'stat_rolez'=>$this->session->userdata('role_station')));
        if($resoil->num_rows()>0){
        foreach ($resoil->result() as $rowz){
            ?>
  <div>
    <table class="table table-condensed table-striped small">
        <tr><td>Total GPM of <?php echo $rowz->oil_product;?></td><td class="label-warning">
            <?php if(!$sold_amount3||!$sold_litre||!$oil_price){
                   echo '0';
                }  else {
                   $prifit= $oil_price- ($sold_amount3 / $sold_litre);
                   $results=$prifit/$oil_price;
                   
                   echo ($sold_litre * $results);
                }
                ?></td></tr>
        <tr><td>Total purchased <?php echo $rowz->oil_product;?></td><td class="label-warning"><?php echo ''.$oil_amount;?></td></tr>
    </table>
</div>
<?php
}
}?>