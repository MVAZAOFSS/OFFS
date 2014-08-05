<div id="fndetail" class="col-lg-12">
    <div class="well-sm">Petrol 6 months Report</div>
    <table class="table">
        <tr>
            <td class="success">
                Profit per Litre per semi year(6 moths):
            </td>
            <td class="active">
                <?php if(!$sold_amount||!$sold_litre||!$petrol_price){
                   echo '0';
                }  else {
                   echo 186*($petrol_price- ($sold_amount / $sold_litre));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per 6 Months:
            </td>
            <td class="active">
                <?php if(!$sold_amount||!$sold_litre||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($sold_amount / $sold_litre);
                   echo 186*($sold_litre * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
    <div class="well-sm">Diesel 6 months Report</div>
    <table class="table">
        <tr>
            <td class="success">
                Profit per Litre per semi year(6 moths):
            </td>
            <td class="active">
                <?php if(!$sold_amount1||!$sold_litre1||!$petrol_price){
                    echo '0';
                } else {
                    echo 186 * ($petrol_price - ($sold_amount1 / $sold_litre1));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per 6 Months:
            </td>
            <td class="active">
                <?php if(!$sold_amount1||!$sold_litre1||!$petrol_price){
                    echo '0';
                } else {
                    $prifit = $petrol_price - ($sold_amount1 / $sold_litre1);
                    echo 186 * ($sold_litre1 * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
    <div class="well-sm">Kerosine 6 months Report</div>
    <table class="table">
        <tr>
            <td class="success">
                Profit per Litre per semi year(6 moths):
            </td>
            <td class="active">
                <?php if(!$sold_amount2||!$sold_litre2||!$petrol_price){
                   echo '0';
                }  else {
                   echo 186*($petrol_price- ($sold_amount2 / $sold_litre2));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per 6 Months:
            </td>
            <td class="active">
                <?php if(!$sold_amount2||!$sold_litre2||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($sold_amount2 / $sold_litre2);
                   echo 186*($sold_litre2 * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
    <div class="well-sm">Oil 6 months Report</div>
    <table class="table">
        <tr>
            <td class="success">
                Profit per Litre per semi year(6 moths):
            </td>
            <td class="active">
               <?php if(!$sold_amount3||!$sold_litre3||!$petrol_price){
                   echo '0';
                }  else {
                   echo 186*($petrol_price- ($sold_amount3 / $sold_litre3));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per 6 Months:
            </td>
            <td class="active">
                <?php if(!$sold_amount3||!$sold_litre3||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($sold_amount3 / $sold_litre3);
                   echo 186*($sold_litre3 * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
</div>