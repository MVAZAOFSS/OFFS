<div id="fndetail" class="col-lg-12">
    <div class="well-sm">Oil Year Report</div>
    <table class="table">
        <tr>
            <td class="warning">
                Purchase price per Litre:
            </td>
            <td class="active">
                <?php if(!$sold_amount3||!$sold_litre3){
                   echo 'Nothing has been sold';
                }  else {
                    echo $sold_amount3 / $sold_litre3;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="success">
                Profit per Litre per Year:
            </td>
            <td class="active">
                <?php if(!$sold_amount3||!$sold_litre3||!$petrol_price){
                   echo '0';
                }  else {
                   echo 365*($petrol_price- ($sold_amount3 / $sold_litre3));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per Year:
            </td>
            <td class="active">
                <?php if(!$sold_amount3||!$sold_litre3||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($sold_amount3 / $sold_litre3);
                   echo 365*($sold_litre3 * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
</div>