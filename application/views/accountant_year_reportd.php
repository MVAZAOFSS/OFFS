<div id="fndetail" class="col-lg-12">
    <div class="well-sm">Diesel Year Report</div>
    <table class="table">
        <tr>
            <td class="warning">
                Purchase price per Litre:
            </td>
            <td class="active">
                <?php if(!$sold_amount1||!$sold_litre1){
                   echo 'Nothing has been sold';
                }  else {
                    echo $sold_amount1 / $sold_litre1;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="success">
                Profit per Litre per Year:
            </td>
            <td class="active">
                <?php if(!$sold_amount1||!$sold_litre1||!$petrol_price){
                   echo '0';
                }  else {
                   echo 365*($petrol_price- ($sold_amount1 / $sold_litre1));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per Year:
            </td>
            <td class="active">
                <?php if(!$sold_amount1||!$sold_litre1||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($sold_amount1 / $sold_litre1);
                   echo 365*($sold_litre1 * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
</div>