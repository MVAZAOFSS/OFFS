<div id="fndetail" class="col-lg-12">
    <div class="well-sm">Petrol 3 Months Report</div>
    <table class="table">
        <tr>
            <td class="success">
                Profit per Litre per 3 Months:
            </td>
            <td class="active">
                <?php if(!$petrol_amount||!$petrol||!$petrol_price){
                   echo '0';
                }  else {
                   echo 93*($petrol_price- ($petrol_amount / $petrol));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per 3 Months:
            </td>
            <td class="active">
                <?php if(!$petrol_amount||!$petrol||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($petrol_amount / $petrol);
                   echo 93*($sold_litre * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
    <div class="well-sm">Diesel 3 Months Report</div>
    <table class="table">
        <tr>
            <td class="success">
                Profit per Litre per 3 Months:
            </td>
            <td class="active">
                <?php if(!$diesel_amount||!$diesel||!$petrol_price){
                   echo '0';
                }  else {
                   echo 93*($petrol_price- ($diesel_amount / $diesel));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per 3 Months:
            </td>
            <td class="active">
                <?php if(!$diesel_amount||!$diesel||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($diesel_amount / $diesel);
                   echo 93*($sold_litre1 * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
    <div class="well-sm">Kerosine 3 Months Report</div>
    <table class="table">
        <tr>
            <td class="success">
                Profit per Litre per 3 Months:
            </td>
            <td class="active">
                <?php if(!$kerosine_amount||!$kerosine||!$petrol_price){
                   echo '0';
                }  else {
                   echo 93*($petrol_price- ($kerosine_amount / $kerosine));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per 3 Months:
            </td>
            <td class="active">
                <?php if(!$kerosine_amount||!$kerosine||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($kerosine_amount / $kerosine);
                   echo 93*($sold_litre2 * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
    <div class="well-sm">Oil 3 Months Report</div>
    <table class="table">
        <tr>
            <td class="success">
                Profit per Litre per 3 Months:
            </td>
            <td class="active">
                <?php if(!$oil_amount||!$oil||!$petrol_price){
                   echo '0';
                }  else {
                   echo 93*($petrol_price- ($oil_amount / $oil));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per 3 Months:
            </td>
            <td class="active">
                <?php if(!$oil_amount||!$oil||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($oil_amount / $oil);
                   echo 93*($sold_litre3 * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
</div>