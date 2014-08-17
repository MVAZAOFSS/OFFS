<div>
    <table class="table table-condensed table-striped small">
        <tr><td>Total GPM of Petrol</td><td class="label-warning"><?php if(!$sold_amount||!$sold_litre||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($sold_amount / $sold_litre);
                   $results=$prifit/$petrol_price;
                   
                   echo ($sold_litre * $results);
                }
                ?></td></tr>
        <tr><td>Total Purchased Petrol</td><td class="label-warning"><?php echo ''.$petrol_amount;?></td></tr>
        <tr><td>Total GPM of Diesel</td><td class="label-warning"><?php if(!$sold_amount1||!$sold_litre||!$diesel_price){
                   echo '0';
                }  else {
                   $prifit= $diesel_price- ($sold_amount1 / $sold_litre);
                   $results=$prifit/$diesel_price;
                   
                   echo ($sold_litre * $results);
                }
                ?></td></tr>
        <tr><td>Total purchased Diesel</td><td class="label-warning"><?php echo ''.$diesel_amount;?></td></tr>
        <tr><td>Total GPM of Kerosine</td><td class="label-warning"><?php if(!$sold_amount2||!$sold_litre||!$kerosine_price){
                   echo '0';
                }  else {
                   $prifit= $kerosine_price- ($sold_amount2 / $sold_litre);
                   $results=$prifit/$kerosine_price;
                   
                   echo ($sold_litre * $results);
                }
                ?></td></tr>
        <tr><td>Total purchased Kerosine</td><td class="label-warning"><?php echo ''.$kerosine_amount;?></td></tr>
        <tr><td>Overall Total GPM are</td><td>
            <?php
            if(!$sold_amount||!$sold_amount1||!$sold_amount2||!$sold_litre||!$diesel_price||!$kerosine_price||!$petrol_price){
                   echo '0';
                }  else {
             $prifit1= $petrol_price- ($sold_amount / $sold_litre);
                   $results1=$prifit1/$petrol_price;
              $prifit2= $diesel_price- ($sold_amount1 / $sold_litre);
                   $results2=$prifit2/$diesel_price;
               $prifit3= $kerosine_price- ($sold_amount2 / $sold_litre);
                   $results3=$prifit3/$kerosine_price;
                echo ($sold_litre * $results1)+($sold_litre * $results2)+($sold_litre * $results3);
                }?></td></tr>
        <tr><td>Total expenses used</td><td class="label-warning"><?php echo ''.$cash;?></td></tr>
        <tr><td>Gross Profit</td><td class="label-warning">
        <?php
        if(!$sold_amount||!$sold_amount1||!$sold_amount2||!$sold_litre||!$diesel_price||!$kerosine_price||!$petrol_price){
                   echo '0';
                }  else {
        $prifitmz= $petrol_price- ($sold_amount / $sold_litre);
                   $resultsmz=$prifitmz/$petrol_price;
              $prifitm1z= $diesel_price- ($sold_amount1 / $sold_litre);
                   $resultsm1z=$prifitm1z/$diesel_price;
               $prifitm2z= $kerosine_price- ($sold_amount2 / $sold_litre);
                   $resultsm2z=$prifitm2z/$kerosine_price;
        echo ($sold_amount+$sold_amount1+$sold_amount2)-(($sold_litre * $resultsmz)+($sold_litre * $resultsm1z)+($sold_litre * $resultsm2z));
                }?></td></tr>
        <tr><td>Net profit</td><td class="label-warning">
            <?php 
            if(!$sold_amount||!$sold_amount1||!$sold_amount2||!$sold_litre||!$diesel_price||!$kerosine_price||!$petrol_price){
                   echo '0';
                }  else {
            $prifitm= $petrol_price- ($sold_amount / $sold_litre);
                   $resultsm=$prifitm/$petrol_price;
              $prifitm1= $diesel_price- ($sold_amount1 / $sold_litre);
                   $resultsm1=$prifitm1/$diesel_price;
               $prifitm2= $kerosine_price- ($sold_amount2 / $sold_litre);
                   $resultsm2=$prifitm2/$kerosine_price;
               echo $cash-($sold_litre * $resultsm)+($sold_litre * $resultsm1)+($sold_litre * $resultsm2);
                }?></td></tr>
    </table>
</div>
