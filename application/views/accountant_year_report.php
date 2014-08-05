<div id="fndetail" class="col-lg-12">
    <div class="well-sm">Petrol Year Report</div>
    <table class="table">
        <tr>
            <td class="warning">
                Purchase price per Litre:
            </td>
            <td class="active">
                <?php if(!$sold_amount||!$sold_litre){
                   echo 'Nothing has been sold';
                }  else {
                    echo $sold_amount / $sold_litre;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="success">
                Profit per Litre per Year:
            </td>
            <td class="active">
                <?php if(!$sold_amount||!$sold_litre||!$petrol_price){
                   echo '0';
                }  else {
                   echo 365*($petrol_price- ($sold_amount / $sold_litre));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
                Profit Margin per Year:
            </td>
            <td class="active">
                <?php if(!$sold_amount||!$sold_litre||!$petrol_price){
                   echo '0';
                }  else {
                   $prifit= $petrol_price- ($sold_amount / $sold_litre);
                   echo 365*($sold_litre * $prifit);
                }
                ?>
            </td>
        </tr>
    </table>
</div>