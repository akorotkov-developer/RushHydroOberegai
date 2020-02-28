<?

$counter_code = 38342385;
    
$arSites = array(
    'www.rgits.rushydro.ru' => 45795579,
    'www.international-eng.rushydro.ru' => 39247015,//www.international.rushydro.ru
    'www.tk.rushydro.ru' => 39247425,
);
if(array_key_exists($_SERVER["SERVER_NAME"],$arSites))
    $counter_code = $arSites[$_SERVER["SERVER_NAME"]];
?>
<?php
/*
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter<?=$counter_code?> = new Ya.Metrika({
                    id:<?=$counter_code?>,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/<?=$counter_code?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
 */?>