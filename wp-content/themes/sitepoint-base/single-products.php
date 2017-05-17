<?php
/**
 * The Template for displaying single products
 *
 * 
 */

get_header(); ?>
<div id="maincontentcontainer">
	<div id="primary" class="grid-container site-content singleproduct" role="main">
        <hr class="singleproduct-line">
			<div class="grid-100 tablet-grid-100">
			
				<?php while ( have_posts() ) : the_post(); ?>

					<?php //get_template_part( 'content', get_post_format() ); ?>
					<?php
					$title = $post->post_title;
					$img = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID),"large" )[0];
					$text = get_post_field('post_content', $post->ID);
					$opis = get_field("opis", $post->ID);
					$data1 = get_field("pokrivna_sirina", $post->ID);
					$data2 = get_field("debelina_izolacije", $post->ID);
					$data3 = get_field("nanos_cinka", $post->ID);
					$icons = get_field("icons", $post->ID);
					$dodatki = get_field("dodatki", $post->ID);
                    $file = get_field("file", $post->ID);
					$barve = get_field("barve", $post->ID);
                    $barvep = get_field("barvep", $post->ID);
					?>

                   
					<div class="singleproduct-left">
                  
						<div class="singleproduct-imgcontainer">
                            <?php include( get_stylesheet_directory() . '/parts/content.php'); ?>
						</div>
                         
						<div class="singleproduct-icons">
                        
				     	<?php if ( count($icons) > 0 && $icons != null ) : ?>
							<?php foreach ($icons as $icon) : ?>
								<?php
									$icontitle = get_the_title($icon->ID);
									$icontext = get_post_field("post_content", $icon->ID);
									$iconsrc = get_field("icon", $icon->ID);
								?>
								<div class="singleproduct-iconcontainer">
									<div class="singleproduct-iconcontainer-table">
										<img class="singleproduct-icon" src="<?php echo $iconsrc["url"]; ?>">
										<div class="singleproduct-icontitle"><?php echo $icontitle; ?></div>
										<?php if ( $icontext ) : ?>
											<div class="singleproduct-tip hide"><?php echo $icontext; ?></div>
										<?php endif; ?>
									</div>
								</div>
								
							<?php endforeach; ?>
						<?php endif; ?>
                  
						</div>

						<div class="barve">
							<?php if ( $barve && $barvep ) : ?>
								<div class="singleproduct-title sub">Barve:</div>
							<?php endif; ?>
							
							<?php if ( $barve ) : ?>
						
		                        <div class="colors-title">Standardne barve</div>
	                            
								<ul class="flex">
									<?php
										foreach ($barve as $barva){
										    $code = get_field("barva", $barva->ID);
										    $barva_title = get_the_title($barva->ID);
										    $textColor = get_field("barva_text_color", $barva->ID);
										    echo "<li><div class='barve-container' style='background-color:".$code."; color: " . $textColor . ";'>".$barva_title."</div></li>";
											
											
										}
		                            ?>
								</ul>
							<?php endif; ?>

							<?php if ( $barvep ) : ?>
								<div class="colors-title">Standard plus</div>
								<ul class="flex"> 
									<?php
										foreach ($barvep as $barvap){
			                                $codep = get_field("barva", $barvap->ID);
			                                $barvap_title = get_the_title($barvap->ID);
										    $textColor = get_field("barva_text_color", $barvap->ID);
			                                echo "<li><div class='barve-container' style='background-color:".$codep."; color: " . $textColor . ";'>".$barvap_title."</div></li>";
			                            }
		                            ?>
								</ul> 
							<?php endif; ?>
				

							<?php if ( $barve ) : ?>
								<div class="singleproduct-text barve-x">*Ostale RAL barve prosimo preverite preko spodnjega <span class="hidden-form-trigger">obrazca</span>!</div>
								<div class="hidden-form">
									<?php echo do_shortcode( '[caldera_form id="CF591c2324303fc"]' ); ?>
								</div>

								<script type="text/javascript">
									jQuery(document).ready(function() {

										//jQuery('.color_dropdown .form-control option').data('class', 'avatar');
										//jQuery('.color_dropdown .form-control option').data('style', "background-image: url(&apos;http://www.gravatar.com/avatar/b3e04a46e85ad3e165d66f5d927eb609?d=monsterid&amp;r=g&amp;s=16&apos;);");


										jQuery('.hidden-form-trigger').on('click', function() {
											jQuery('.hidden-form').slideToggle();
											jQuery('.product_name').val(jQuery('.singleproduct-right .singleproduct-title.main').text());

										});

										jQuery('.color-pick').on('click', function() {
											jQuery('.color-image-con').slideToggle('slow');
										});

									});
								</script>

							<?php endif; ?>
						</div>
               
					</div>
					
			
					<div class="singleproduct-right">
						<div class="singleproduct-title main"><?php echo $title; ?></div>
						<div class="singleproduct-text"><?php //echo $text; ?></div>
						<div class="singleproduct-opis"><?php echo $opis; ?></div>
						<hr class="singleproduct-seperator">
						<div class="singleproduct-title sub">TEHNIČNI PODATKI:</div>
						<?php if ( $data1 ) : ?>
							<div class="singleproduct-text data"><span>Pokrivna širina panela:</span> <?php echo $data1; ?></div>
						<?php endif; ?>

						<?php if ( $data2 ) : ?>
							<div class="singleproduct-text data"><span>Debelina izolaacije:</span> <?php echo $data2; ?></div>
						<?php endif; ?>

						<?php if ( $data3 ) : ?>
							<div class="singleproduct-text data"><span>Nanos cinka:</span> <?php echo $data3; ?></div>
                		<?php endif; ?>
                
						<div class="seperator-space"></div>

						<div class="singleproduct-text">Če potrebujete več informacij (velikosti, namestitve, dolžina, teža), prenesete naslednje dokumente</div>
                        <?php if ( $file ) : ?>
                        	<div class="singleproduct-file"><a href="<?php echo $file; ?>"><img src="<?php echo get_template_directory_uri() . '/img/file.png'; ?>">Prenesi dokumentacijo</a></div>
						<?php endif; ?>

						<?php if ( $dodatki ) : ?>
							<hr class="singleproduct-seperator">
							<div class="singleproduct-title">DODATKI:</div><br>
							<div class="dodatki">
							
								<?php foreach ( $dodatki as $dodatek ) : ?>
									<?php			
										$dodatektitle = get_the_title($dodatek->ID);
										$dodatektext = get_post_field("post_content", $dodatek->ID);
										$dodateklink = get_post_permalink($dodatek->ID);
										$dodatekimg = wp_get_attachment_image_src(get_post_thumbnail_id( $dodatek->ID),"large" )[0];
									?>
									
									<div class="dodatki-item">
										<img class="dodatki-img" src="<?php echo $dodatekimg; ?>">
										<div class="dodatki-title"><a href="<?php echo $dodateklink; ?>"><?php echo $dodatektitle; ?></a></div>
										<div class="dodatki-text"><?php //echo $dodatektext; ?></div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif ?>


					</div>
					
										
					<?php the_posts_pagination( 'nav-below' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div> <!-- /.grid-70 -->
			<?php get_sidebar(); ?>

	</div> <!-- /#primary.grid-container.site-content -->
</div> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>