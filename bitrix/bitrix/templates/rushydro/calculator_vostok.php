<?php
    if (RhdHandler::isEnglish()) {
        $ordinarySharesLabel = 'Number of ordinary shares of RAO EAST';
        $privilegedSharesLabel = 'Number of preferred shares of RAO EAST';
        $buttonLabel = 'Calculate';
        $rushydroSharesLabel = 'Resulting number of ordinary shares of RusHydro';
        $exchargeLabel = 'Amount of monetary compensation in case of non-integral amount of shares (RUB)';
        $orLabel = 'or';
        $totalValueLabel = 'Total value (RUB)';
    } else {
        $ordinarySharesLabel = 'Количество обыкновенных акций РАО ЭС Востока';
        $privilegedSharesLabel = 'Количество привилегированных акций  РАО ЭС Востока';
        $buttonLabel = 'Рассчитать';
        $rushydroSharesLabel = 'Количество получаемых обыкновенных акций РусГидро';
        $exchargeLabel = 'Сумма возможной доплаты в случае получаемого дробного числа акций (руб.)';
        $orLabel = 'или';
        $totalValueLabel = 'Общая стоимость (руб.)';
    }
?>

<script type="text/javascript">
    $(document).ready(function () {
        var ordinaryVostokToRushydro = 0.6068,
            privilegedVostokToRushydro = 0.3814,
            ordinaryVostokValue = 0.3500,
            privilegedVostokValue = 0.2200,
            rushydroValue = 0.5768;

        function getInteger(element)
        {
            var integerNumber = parseInt(($(element).val() + '').replace(/ /g, ''));

            if (isNaN(integerNumber) ) {
                integerNumber = 0;
            }

            if (integerNumber < 0) {
                integerNumber = 0;
            }

            return integerNumber;
        }

        // http://stackoverflow.com/questions/1685680/how-to-avoid-scientific-notation-for-large-numbers-in-javascript
        function scientificToNormal(x)
        {
            if (Math.abs(x) < 1.0) {
                var e = parseInt(x.toString().split('e-')[1]);
                if (e) {
                    x *= Math.pow(10,e-1);
                    x = '0.' + (new Array(e)).join('0') + x.toString().substring(2);
                }
            } else {
                var e = parseInt(x.toString().split('+')[1]);
                if (e > 20) {
                    e -= 20;
                    x /= Math.pow(10,e);
                    x += (new Array(e+1)).join('0');
                }
            }

            return x;
        }

        function formatFloat(floatNumber, prescision)
        {
            floatNumber = floatNumber.toFixed(prescision);

            return floatNumber;
        }

        function formatNumber(number)
        {
            return String(number).replace(/(\d)(?=(\d{3})+(\.|$))/g, '$1 ');
        }

        $("#calc-vostok-shares").click(function () {
            var ordinaryVostokShares = getInteger('#ordinary-vostok-shares'),
                privilegedVostokShares = getInteger('#privileged-vostok-shares'),

                rushydroSharesFloat = null,
                rushydroShares = null,
                excharge = null,
                totalValue = null;

            rushydroSharesFloat = ordinaryVostokShares * ordinaryVostokToRushydro + privilegedVostokShares * privilegedVostokToRushydro;
            rushydroShares = Math.floor(rushydroSharesFloat);

            excharge = (rushydroSharesFloat - rushydroShares) * rushydroValue;

            totalValue = ordinaryVostokShares * ordinaryVostokValue + privilegedVostokShares * privilegedVostokValue;

            $('.js-rushydro-shares').html(formatNumber(scientificToNormal(rushydroShares)) || '0');
            $('.js-excharge').html(formatNumber(scientificToNormal(formatFloat(excharge, 2))) || '0');
            $('.js-total-value').html(formatNumber(scientificToNormal(formatFloat(totalValue, 2))) || '0');
        });
    });
</script>

<div style="color:#333; text-align:justify; line-height:1.1em;"><?php echo $ordinarySharesLabel; ?></div>
<div style="width:100px; margin:8px 0 20px 0;" class="form_feedback"><div class="inp"><i></i><i class="lft"></i><input type="text" size="30" id="ordinary-vostok-shares" class="inputtext" /></div></div>

<div style="color:#333; text-align:justify; line-height:1.1em;"><?php echo $privilegedSharesLabel; ?></div>
<div style="width:100px; margin:8px 0 20px 0;" class="form_feedback"><div class="inp"><i></i><i class="lft"></i><input type="text" size="30" id="privileged-vostok-shares" class="inputtext" /></div></div>

<div style="margin-left:0px;" class="btn_sbmt" id="calc-vostok-shares"><i></i><span><?php echo $buttonLabel; ?></span></div>
<div class="clear"></div>

<div style="padding-top:20px; margin-top: 20px; border-top: 1px solid #efefef;">

    <div style="margin-bottom: 5px;"><?php echo $rushydroSharesLabel; ?> - <span class="js-rushydro-shares" style="font-weight:bold; color:#E66A25;">0</span></div>

    <div><?php echo $exchargeLabel; ?> - <span class="js-excharge" style="font-weight:bold; color:#E66A25;">0.00</span></div>

    <br/>
    <?php echo $orLabel; ?>
    <br/>
    <br/>

    <div><?php echo $totalValueLabel; ?> - <span class="js-total-value" style="font-weight:bold; color:#E66A25;">0.00</span></div>
</div>
