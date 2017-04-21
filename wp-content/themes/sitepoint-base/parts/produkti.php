<?php
    $productHeaders = $value["produkti_header"];

    //debug(get_term_by('slug',  'ravne', 'kategorijeproduktov'));


?>

<div class="produkt" style="background-image: url('http://meltal.oss-dev.av-studio.si/metrapan/wp-content/uploads/2017/03/bg2.png')">
    <div class="produkt-left">
        <div class="produkt-left-container">
            <?php 

                $args = array( 
                    'post_type' => 'products',
                    'posts_per_page' => -1,
                    'post_status' => 'any'
                );

                $productsCategoryes = getPostCategorys( $args );
            ?>
            <div class="produkt-container <?php echo count( $productsCategoryes ) > 0 ? "filter" : ""; ?>" data-posttype="products" data-rightcontent="1">

                <div class="produkt-container-title">
                    <span class="title">Strešne kritine in fasadni paneli</span> 
                </div>

                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <ul class="podkategorija <?php echo count( $productsCategoryes ) > 5 ? "flex" : ""; ?>">
                        <?php foreach ( $productsCategoryes as $cat ) : ?>
                            <li data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </div>

            <?php 

                $args = array( 
                    'post_type' => 'products2',
                    'posts_per_page' => -1,
                    'orderby'     => 'menu_order',
                    'order'       => 'ASC',
                    'post_status' => 'any'
                );

                $productsCategoryes = getPostCategorys( $args );
                $counter = 0;
            ?>
            <div class="produkt-container <?php echo count( $productsCategoryes ) > 0 ? "filter" : ""; ?>" data-posttype="products2" data-rightcontent="2">
       

                <div class="produkt-container-title">
                    <span class="title">Krovsko kleparski izdelki</span>
                </div>

                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <ul class="podkategorija <?php echo count( $productsCategoryes ) > 5 ? "flex" : ""; ?>">
                        <?php foreach ( $productsCategoryes as $cat ) : ?>
                            <?php $singlePost = getNumberOfProductsByCat( 'products2', $cat ); ?>

                            <?php if ( $singlePost ) : ?>
                                <li class="buttoncommon podkategorija-line"><a href="<?php echo get_permalink( $singlePost->ID ); ?>"><?php echo getCategoryName( $cat ); ?></a></li>
                            <?php else : ?>
                                <li data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat ); ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </div>

            <?php 

                $args = array( 
                    'post_type' => 'products3',
                    'posts_per_page' => -1,
                    'post_status' => 'any'
                );

                $productsCategoryes = getPostCategorys( $args );
                $counter = 0;
            ?>

            <div class="produkt-container <?php echo count( $productsCategoryes ) > 0 ? "filter" : ""; ?>" data-posttype="products3" data-rightcontent="3">            
                <div class="produkt-container-title">
                    <span class="title">Pritrdilni materiali in ostali izdelki</span>
                </div>

                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <ul class="podkategorija <?php echo count( $productsCategoryes ) > 5 ? "flex" : ""; ?>">
                        <?php foreach ( $productsCategoryes as $cat ) : ?>
                            <?php if ( getNumbAssociatedposts($cat) > 1 ) ?>
                            <li data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>


            <?php 

                $args = array( 
                    'post_type' => 'products4',
                    'posts_per_page' => -1,
                    'post_status' => 'any'
                );

                $productsCategoryes = getPostCategorys( $args );
                $counter = 0;
            ?>

            <div class="produkt-container <?php echo count( $productsCategoryes ) > 0 ? "filter" : ""; ?>" data-posttype="products4" data-rightcontent="4">
            

                <div class="produkt-container-title">
                    <span class="title">Nosilne trapezne pločevine</span>
                </div>
      
                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <ul class="podkategorija <?php echo count( $productsCategoryes ) > 5 ? "flex" : ""; ?>">
                        <?php foreach ( $productsCategoryes as $cat ) : ?>
                            <li data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
    

    <?php if ( count($productHeaders) > 0 ) : ?>
        <?php $count = 0; ?>
        <?php foreach ( $productHeaders as $pheader ) : ?>
            <?php $count++; ?>
            <div id="container-right-<?php echo $count; ?>" class="produkt-right <?php echo $count === 1 ? "active" : ""; ?>">
                <div class="emptyheightblock"> </div>
                <div class="produkt-detail">
                    <div class="line"></div>
                    <div class="produkt-detail-title"><?php echo $pheader->post_title; ?></div>
                    <div class="produkt-detail-text"><?php echo get_post_field('post_content', $pheader->ID); ?></div><br>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>


    <div class="clearfix"></div>    

</div>

<div id="secondFilter" class="grid-container produkticons"></div>

<div class="dinamic-title">
    <span></span>
</div>

<div class="content-preloader hide">
    <img src="<?php echo get_template_directory_uri() . '/img/ajax-loader.gif'?>">
</div>

 <script type="text/javascript">
    (function($) {

        var categoryes = $('.produkt-left');
        var rightContent = $('.produkt');
        var produkticons = $('.produkticons');

        // Trigger ajax if no sub filter
        categoryes.find('.produkt-container').on('click', function() {
            var _ = $(this); 
            var post_type = _.data('posttype');
            var datacontent = _.data('rightcontent');

            rightContent.find('.produkt-right').removeClass('active');
            rightContent.find('#container-right-' + datacontent).addClass('active');

            if ( _.find('.podkategorija li').length > 0 ) return;
            
            var productTitle = _.find('.title').text();
            $('.dinamic-title span').html(productTitle);

            categoryes.find('.produkt-container ').removeClass('active');
            _.addClass('active');

            testAjax(post_type, '');
        });

        // Trigger ajax call
        categoryes.find('.podkategorija li').on('click', function() {
            var _ = $(this);
            var cat_slug = _.data('catslug');
            var post_type = _.parents().eq(1).data('posttype');
            var productTitle = _.text();

            categoryes.find('.podkategorija li').removeClass('active');
            categoryes.find('.produkt-container ').removeClass('active');
            _.parents().eq(1).addClass('active');
            _.addClass('active');

            if ( cat_slug === undefined ) return;
             
            $('.dinamic-title span').html(productTitle);

            testAjax(post_type, cat_slug);
            ajaxSubFilter(post_type, cat_slug);
        });

        categoryes.find('.produkt-container')
            .mouseenter(function() {
                if ( $(this).find('li').length > 0 ) categoryes.find('.produkt-left-container').addClass('open');
            })
            .mouseleave(function() {
                categoryes.find('.produkt-left-container').removeClass('open');
                
            });

        produkticons.delegate('.produkticons-iconcontainer', 'click', function() {
            var _ = $(this);
            var post_type = _.data('posttype');
            var cat_slug = _.data('catslug');
            testAjax(post_type, cat_slug);
        });

        function ajaxSubFilter(postType, slug) {
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: myAjax.ajaxurl,
                data: {
                    'action': "getSecondFilter", 
                    'catSlug': slug,
                    'postType': postType
                },
                beforeSend: function(){
                    $('.content-preloader').removeClass('hide');
                    $('#list').addClass('hide');
                },
                success: function( response ) {
                    $('.content-preloader').addClass('hide');
                    $('#list').removeClass('hide');
                    if (!response.error) {
                        $("#secondFilter").html(response.data.html);
                    }
                },
                error: function() {
                    $('.content-preloader').addClass('hide');
                    $('#list').removeClass('hide');
                    console.log( 'Ne najdem podatkov. Prosimo poiskusite ponovno!' );
                }
            });
        }
    

        function testAjax(postType, neki) {
            x = neki;

                jQuery.ajax({
                 type : "get",
                 dataType : "json",
                 url : myAjax.ajaxurl,
                 data : {action: "my_user_test",
                         value: x,post_type: postType},//, post_id : post_id, nonce: nonce},
                beforeSend: function(){
                    $('.content-preloader').removeClass('hide');
                    $('#list').addClass('hide');
                },
                 success: function(response) {
                     //console.log("response", response);
                     //console.log("just html", response.data.btnvalue);
                    $('.content-preloader').addClass('hide');
                    $('#list').removeClass('hide');
                     if (!response){
                         //server error, return
                         console.log("Napaka streznika");
                         return;
                     }
                    
                    if (response.error === true)
                    { 
                        alert(response.errorMessage);
                        return; 
                    }
                        
                    if (!response.data)
                    { 
                        alert("ni podatkov"); 
                        return;
                    }
                    

                    if(response.error === false) {
                       jQuery("#list").html(response.data.html)
                    }
                    else {
                       alert("Your vote could not be added")
                    }
                 }
              });
            
            return;

        }


    })(jQuery)

        
</script>