<div id="fndetail" class="col-lg-12">
    <div class="well-sm"> Report</div>
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
                Profit per Litre:
            </td>
            <td class="active">
                <?php if(!$sold_amount||!$sold_litre||!$diesel_price){
                   echo '0';
                }  else {
                   echo ($diesel_price- ($sold_amount / $sold_litre));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="warning">
               Gross Profit Margin per Litre:
            </td>
            <td class="active">
                <?php if(!$sold_amount||!$sold_litre||!$diesel_price){
                   echo '0';
                }  else {
                   $prifit= $diesel_price- ($sold_amount / $sold_litre);
                   $results=$prifit/$diesel_price;
                   echo $results;
                }
                ?>
            </td>
            </tr>
            <tr>
            <td class="success">
              Total Gross Profit Margin :
            </td>
            <td class="active">
                <?php if(!$sold_amount||!$sold_litre||!$diesel_price){
                   echo '0';
                }  else {
                   $prifit= $diesel_price- ($sold_amount / $sold_litre);
                   $results=$prifit/$diesel_price;
                   
                   echo ($sold_litre * $results);
                }
                ?>
            </td>
        </tr>
    </table>
</div>