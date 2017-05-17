<?php
    $productHeaders = $value["produkti_header"];

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

                //$productsCategoryes = getPostCategorys( $args );
                $tax = 'kategorijeproduktov';
                $productsCategoryes = getPostCategorysByTaxonomy($tax);

            ?>
            <div class="produkt-container <?php echo count( $productsCategoryes ) > 0 ? "filter" : ""; ?>" data-tax="kategorijeproduktov" data-posttype="products" data-rightcontent="1">

                <div class="produkt-container-title">
                    <span class="title">Strešne kritine in fasadni paneli</span> 
                    <div class="pluscontainer"><div class="plusicon"></div></div>
                </div>

                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <ul class="podkategorija <?php echo count( $productsCategoryes ) > 5 ? "flex" : ""; ?>">
                        <?php foreach ( $productsCategoryes as $cat ) : ?>
                            <li data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat, $tax ); ?></li>
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

                //$productsCategoryes = getPostCategorys( $args );
                $productsCategoryes = [];
                $tax = 'cateoryproducts2';
                $productsCategoryes = getPostCategorysByTaxonomy($tax);
                $counter = 0;
            ?>
            <div class="produkt-container <?php echo count( $productsCategoryes ) > 0 ? "filter" : ""; ?>" data-tax="cateoryproducts2" data-posttype="products2" data-rightcontent="2">
       

                <div class="produkt-container-title">
                    <span class="title">Krovsko kleparski izdelki</span>
                    <div class="pluscontainer"><div class="plusicon"></div></div>

                </div>

                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <ul class="podkategorija <?php echo count( $productsCategoryes ) > 5 ? "flex" : ""; ?>">
                        <?php foreach ( $productsCategoryes as $cat ) : ?>
                            <?php $singlePost = getNumberOfProductsByCat( 'products2', $cat, $tax ); ?>

                            <?php if ( $singlePost ) : ?>
                                <li class="buttoncommon podkategorija-line"><a href="<?php echo get_permalink( $singlePost->ID ); ?>"><?php echo getCategoryName( $cat, $tax ); ?></a></li>
                            <?php else : ?>
                                <li data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat, $tax ); ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </div>

            <?php 

                $args = array( 
                    'post_type' => 'products3',
                    'posts_per_page' => -1,
                    'post_status' => 'any',
                );

                //$productsCategoryes = getPostCategorys( $args );
                //debug($productsCategoryes);
                $tax = 'cateoryproducts3';
                $productsCategoryes = getPostCategorysByTaxonomy($tax);
                $counter = 0;
            ?>

            <div class="produkt-container <?php echo count( $productsCategoryes ) > 0 ? "filter" : ""; ?>" data-tax="<?php echo $tax; ?>" data-posttype="products3" data-rightcontent="3">            
                <div class="produkt-container-title">
                    <span class="title">Pritrdilni materiali in ostali izdelki</span>
                    <div class="pluscontainer"><div class="plusicon"></div></div>

                </div>

                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <ul class="podkategorija <?php echo count( $productsCategoryes ) > 5 ? "flex" : ""; ?>">
                        <?php foreach ( $productsCategoryes as $cat ) : ?>
                            <?php $singlePost = getNumberOfProductsByCat( 'products3', $cat, $tax ); ?>

                            <?php if ( $singlePost ) : ?>
                                <li class="buttoncommon podkategorija-line"><a href="<?php echo get_permalink( $singlePost->ID ); ?>"><?php echo getCategoryName( $cat, $tax ); ?></a></li>
                            <?php else : ?>
                                <li data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat, $tax ); ?></li>
                            <?php endif; ?>
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

                //$productsCategoryes = getPostCategorys( $args );
                $tax = 'cateoryproducts4';
                $productsCategoryes = getPostCategorysByTaxonomy($tax);

                $counter = 0;
            ?>

            <div class="produkt-container <?php echo count( $productsCategoryes ) > 0 ? "filter" : ""; ?>" data-tax="<?php echo $tax; ?>" data-posttype="products4" data-rightcontent="4">
            

                <div class="produkt-container-title">
                    <span class="title">Nosilne trapezne pločevine</span>
                    <div class="pluscontainer"><div class="plusicon"></div></div>
                    
                </div>
      
                <?php if ( count( $productsCategoryes ) > 0 ) : ?>
                    <ul class="podkategorija <?php echo count( $productsCategoryes ) > 5 ? "flex" : ""; ?>">
                        <?php foreach ( $productsCategoryes as $cat ) : ?>
                            <?php $singlePost = getNumberOfProductsByCat( 'products4', $cat, $tax ); ?>

                            <?php if ( $singlePost ) : ?>
                                <li class="buttoncommon podkategorija-line"><a href="<?php echo get_permalink( $singlePost->ID ); ?>"><?php echo getCategoryName( $cat, $tax ); ?></a></li>
                            <?php else : ?>
                                <li data-catslug="<?php echo $cat ?>" class="buttoncommon podkategorija-line"><?php echo getCategoryName( $cat, $tax ); ?></li>
                            <?php endif; ?>
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

        var type = window.location.hash.substr(1);
        if ( type !== '' ) {
            var pTitle = $('[data-posttype="' + type + '"].produkt-container').find('.title').text();
            $('[data-posttype="' + type + '"].produkt-container').addClass('active');
            $('.dinamic-title span').html(pTitle);
            testAjax(type, '');
        }

        $(document).on({
            mouseenter: function () {
               whiteIcon($(this));
            },
            mouseleave: function () {
               redIcon();
            }
        }, '.produkticons-iconcontainer');

        function whiteIcon(_) {
            _.find('img').attr('src', _.find('img').data('iconwhite'));
        }

        function redIcon() {
            produkticons.find('.produkticons-iconcontainer').each(function() {
                $(this).find('img').attr('src', $(this).find('img').data('icon'));
            });
        }

        // Trigger ajax if no sub filter
        categoryes.find('.produkt-container').on('click', function() {
            var _ = $(this); 
            var post_type = _.data('posttype');
            var datacontent = _.data('rightcontent');

            rightContent.find('.produkt-right').removeClass('active');
            rightContent.find('#container-right-' + datacontent).addClass('active');

            if ( _.find('.podkategorija li').length > 0 ) return;
            
            produkticons.text('');

            var productTitle = _.find('.title').text();
            $('.dinamic-title span').html(productTitle);

            categoryes.find('.produkt-container ').removeClass('active');
            _.addClass('active');

            testAjax(post_type, '');
        });

        // Ajax for all products under parent cateory
        categoryes.find('.produkt-container-title').on('click', function() {
            var _ = $(this); 
            var post_type = _.parent().data('posttype');
            var datacontent = _.parent().data('rightcontent');
            var productTitle = _.find('.title').text();

            window.location.hash = post_type;

            rightContent.find('.produkt-right').removeClass('active');
            rightContent.find('#container-right-' + datacontent).addClass('active');
            categoryes.find('.podkategorija li').removeClass('active');


            produkticons.text('');

            $('.dinamic-title span').html(productTitle);

            categoryes.find('.produkt-container ').removeClass('active');
            _.parent().addClass('active');

            testAjax(post_type, '');
        });

        // Trigger ajax call
        categoryes.find('.podkategorija li').on('click', function() {
            var _ = $(this);
            var cat_slug = _.data('catslug');
            var post_type = _.parents().eq(1).data('posttype');
            var tax = _.parents().eq(1).data('tax');
            var productTitle = _.text();

            window.location.hash = post_type;

            categoryes.find('.podkategorija li').removeClass('active');
            categoryes.find('.produkt-container ').removeClass('active');
            _.parents().eq(1).addClass('active');
            _.addClass('active');

            if ( cat_slug === undefined ) return;
             
            $('.dinamic-title span').html(productTitle);

            testAjax(post_type, cat_slug);
            ajaxSubFilter(post_type, cat_slug, tax);
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
            produkticons.find('.produkticons-iconcontainer').removeClass('active');
            _.addClass('active');
            testAjax(post_type, cat_slug);
        });

        function ajaxSubFilter(postType, slug, tax) {
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: myAjax.ajaxurl,
                data: {
                    'action': "getSecondFilter", 
                    'catSlug': slug,
                    'postType': postType,
                    'tax': tax
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