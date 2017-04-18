<?php
    
    $productHeaders = $value["produkti_header"];


    $count = 0;
    if (count($value["produkti_header"]) > 0) {
        foreach ($value["produkti_header"] as $key => $produkt) {
            $count = $count + 1;
            if ($count == 1){
                $title = $produkt -> post_title;
                $link = $produkt -> guid;
                $text = get_post_field('post_content', $produkt -> ID);
                $id = $produkt -> ID;
            }
            
            if ($count == 2){
                $title2 = $produkt -> post_title;
                $link2 = $produkt -> guid;
                $text2 = get_post_field('post_content', $produkt -> ID);
                $id2 = $produkt -> ID;
            }
            
            if ($count == 3){
                $title3 = $produkt -> post_title;
                $link3 = $produkt -> guid;
                $text3 = get_post_field('post_content', $produkt -> ID);
                $id3 = $produkt -> ID;
            }
            
            if ($count == 4){
                $title4 = $produkt -> post_title;
                $link4 = $produkt -> guid;
                $text4 = get_post_field('post_content', $produkt -> ID);
                $id4 = $produkt -> ID;
            }
             
            ?>
            
        <?php
        }    
    }
    
    $count = 0;
?>


<div class="produkt" style="background-image: url('http://meltal.oss-dev.av-studio.si/metrapan/wp-content/uploads/2017/03/bg2.png')">
    <div class="produkt-left">
        <div class="produkt-container">
            <div class="produkt-container-title">
                <span>Strešne kritine in fasadni paneli</span> 
                <span class="plus">+</span>
            </div>
            <ul class="podkategorija " id="dropdownmenu">

                <?php 

                    $args = array( 
                        'post_type' => 'products',
                        'posts_per_page' => -1,
                        'post_status' => 'any'
                    );

                    $productsCategoryes = getPostCategorys( $args );
                ?>

                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <?php foreach ( $productsCategoryes as $cat ) : ?>
                        <li data-posttype="products" data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat ); ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>

            </ul>
        </div>
        <div class="produkt-container">
            <div class="produkt-container-title">
                <span>Krovsko kleparski izdelki</span>
                <span class="plus">+</span>
            </div>
            <ul class="podkategorija seenone">

                <?php 

                    $args = array( 
                        'post_type' => 'products2',
                        'posts_per_page' => -1,
                        'post_status' => 'any'
                    );

                    $productsCategoryes = getPostCategorys( $args );
                    $counter = 0;
                ?>

                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <?php foreach ( $productsCategoryes as $cat ) : ?>
                        <li data-posttype="products2" data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat ); ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>

            </ul>
        </div>
        <div style="text-decoration: none;">
            <div class="produkt-container buttoncommon">
                <div class="produkt-container-title">
                    <span>Pritrdilni materiali in ostali izdelki</span>
                </div>
            </div>
        </div>
        <div style="text-decoration: none;">
            <div class="produkt-container buttoncommon">
                <div class="produkt-container-title">
                   <span>Nosilne trapezne pločevine</span>
                </div>
            </div>
        </div>
    
   
	
    </div>
    

    <div id="container-right-1" class="produkt-right">
        <div class="emptyheightblock"> </div>
        <div class="produkt-detail">
            <div class="line"></div>
            <div class="produkt-detail-title"><?php echo $title; ?></div><br>
            <div class="produkt-detail-text"><?php echo $text; ?></div><br>
            <!--button class="btn btn-default button1 produkt-detail-btn">Več</button-->
        </div>
    </div>
    
    <div id="container-right-2" class="produkt-right">
        <div class="emptyheightblock"> </div>
        <div class="produkt-detail">
            <div class="line"></div>
            <div class="produkt-detail-title"><?php echo $title2; ?></div><br>
            <div class="produkt-detail-text"><?php echo $text2; ?></div><br>
            <!--button class="btn btn-default button1 produkt-detail-btn">Več</button-->
        </div>
    </div>
    
    <div id="container-right-3" class="produkt-right">
        <div class="emptyheightblock"> </div>
        <div class="produkt-detail">
            <div class="line"></div>
            <div class="produkt-detail-title"><?php echo $title3; ?></div><br>
            <div class="produkt-detail-text"><?php echo $text3; ?></div><br>
            <!--button class="btn btn-default button1 produkt-detail-btn">Več</button-->
        </div>
    </div>
    
    <div id="container-right-4" class="produkt-right">
        <div class="emptyheightblock"> </div>
        <div class="produkt-detail">
            <div class="line"></div>
            <div class="produkt-detail-title"><?php echo $title4; ?></div><br>
            <div class="produkt-detail-text"><?php echo $text4; ?></div><br>
            <!--button class="btn btn-default button1 produkt-detail-btn">Več</button-->
        </div>
    </div>

    <div class="clearfix"></div>    

    <script>
        //hide all category details on initialization
        
        document.getElementById("container-right-1").style.display = "block";
        document.getElementById("container-right-2").style.display = "none";
        document.getElementById("container-right-3").style.display = "none";
        document.getElementById("container-right-4").style.display = "none";
    </script>
</div>


 <script type="text/javascript">
    (function($) {

        var categoryes = $('.produkt-left');

        // Trigger ajax call
        categoryes.find('.podkategorija li').on('click', function() {
            var cat_slug = $(this).data('catslug');
            var post_type = $(this).data('posttype');
            console.log(cat_slug);
            testAjax(post_type, cat_slug);
        });

        categoryes.find('.produkt-container').on('click', function() {

            var _ = $(this);

            if ( _.find('.podkategorija').length > 0 ) {
                _.parent().addClass('open');
                categoryes.find('.produkt-container').removeClass('active');
                _.addClass('active');
            } else {
                console.log(123);
                _.parent().removeClass('open');

            }

        });

    })(jQuery)
</script>