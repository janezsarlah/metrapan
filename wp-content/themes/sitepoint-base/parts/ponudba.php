<?php
$url = $value["image"];
$icon1 = $value["icon1"];
$icon2 = $value["icon2"];
$embed = $value["html"];
?>
<div class="ponudba">
    <div id="embedframe">
        <iframe style="width:70%; margin:auto; height:90%; z-index: 2000;" src="//e.issuu.com/embed.html#29146116/47116818" frameborder="0" allowfullscreen></iframe>
    </div>
    <ul>
        <li class="ponudba-left"><img class="ponudba-icon" src="<?php echo $icon1["url"]; ?>">
            <div class="ponudba-title"><?php echo $value["title"]; ?></div>
            <!--div class="ponudba-file"><a href="<?php echo $value["file_link"]; ?>">Prenesi</a></div-->
            <div class="ponudba-file">Prelistaj katalog<div class="showMore button1 aktualnost-btn ponudba-btn" id="showkat"><a href="#">TUKAJ</a></div></div>
            <img src="<?php echo $url["url"]; ?>"></li>
        <li class="ponudba-right"><img class="ponudba-icon" src="<?php echo $icon2["url"]; ?>">
            <div class="ponudba-title">Potrebujete ponudbo?</div>
            <div class="ponudba-text"><?php echo $value["text"]; ?></div>
            <div class="showMore button1 aktualnost-btn ponudba-btn"><a href="http://meltal.oss-dev.av-studio.si/metrapan/si/pisite-nam/">Kontakt</a></div></li>
    </ul>
</div>

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        var popup = document.getElementById("embedframe");
    
        var trigger = document.getElementById("showkat");

        

        trigger.onclick = function() {
            
            popup.style.display = "block";

        }

        window.onclick = function(event) {
            if (event.target == popup) {
                popup.style.display = "none";
            }
        }    
    }, false);

</script>