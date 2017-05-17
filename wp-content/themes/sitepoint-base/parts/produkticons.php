<script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $(".buttoncommon").click(function() {
                    $('#produkticons').addClass('seesome').removeClass('seenone');
                });
            });
        })(jQuery);
</script>
<div id="produkticons" class="grid-container produkticons seenone">
    <ul>
        <?php
            foreach ($value["produkticons"] as $key => $produkticon){
                $icon = get_field("icon", $produkticon->ID);
                $title = $produkticon -> post_title;
                $link = $produkt -> guid;
                $text = get_post_field('post_content', $produkt -> ID);

        ?>
            <li>
                <div class="produkticons-iconcontainer"><img src="<?php echo $icon["url"]; ?>" class="produkticons-icon">
                <div class="produkticons-title"><?php echo $title; ?></div></div>

            </li>
        <?php
            }
        ?>
    </ul>
</div>
<script>
    
</script>