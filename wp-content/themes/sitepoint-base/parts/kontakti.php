<div class="kontakti grid-container">
<?php
    $kontakti = get_field("contacts", 26);
    
    echo "<ul class='kontakti-wrapper'>";
    foreach($kontakti as $kontakt){
        $text = $kontakt["contact"];
        echo "<li class='kontakti-container'>".$text."</li>";
    }
    echo "</ul>";
?>
</div> 