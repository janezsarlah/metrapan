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
					$title = $post -> post_title;
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
                        <ul>
                            <li>
						<div class="singleproduct-imgcontainer">
							<!---<img class="singleproduct-img" src="<?php //echo $img; ?>">--->
                            <?php include( get_stylesheet_directory() . '/parts/content.php'); ?>
						</div>
                                
                            </li>
                            <li>
						<div class="singleproduct-icons">
                            <ul>
							<?php
								foreach ($icons as $icon){
									$icontitle = get_the_title($icon->ID);
									$icontext = get_post_field("post_content", $icon->ID);
									$iconsrc = get_field("icon", $icon->ID);
									?>
									<li>
									<div class="singleproduct-iconcontainer">
										<img class="singleproduct-icon" src="<?php echo $iconsrc["url"]; ?>">
										<div class="singleproduct-icontitle"><?php echo $icontitle; ?></div>
									</div>
									</li>
									<?php
								}
							?>
                            </ul>
						</div>
                            </li>
                        </ul>
					</div>
					
			
					<div class="singleproduct-right">
						<div class="singleproduct-title"><?php echo $title; ?></div>
						<div class="singleproduct-text"><?php echo $text; ?></div>
						<div class="singleproduct-opis"><?php echo $opis; ?></div>
						<hr class="singleproduct-seperator">
						<div class="singleproduct-title">TEHNIČNI PODATKI:</div><br>
						<!--div class="singleproduct-text">Pokrivna širina panela: <?php //echo $data1; ?></div>
						<div class="singleproduct-text">Debelina izolaacije: <?php //echo $data2; ?></div>
						<div class="singleproduct-text">Nanos cinka: <?php //echo $data3; ?></div><br-->
                        <br>
						<div class="singleproduct-text">Če potrebujete več informacij (velikosti, namestitve, dolžina, teža), prenesete naslednje dokumente</div>
                        <div class="singleproduct-file"><a href="<?php echo $file; ?>">Prenesi dokumentacijo</a></div>
						<hr class="singleproduct-seperator">
						<div class="singleproduct-title">Sorodni izdelki:</div><br>
						<div class="dodatki">
						<?php
							$col = 0;
							foreach ($dodatki as $dodatek)
							{
								if ($col == 0)
								{
									echo "<ul>";
								}
								$dodatektitle = get_the_title($dodatek->ID);
								$dodatektext = get_post_field("post_content", $icon->ID);
								$dodatekimg = wp_get_attachment_image_src(get_post_thumbnail_id( $dodatek->ID),"large" )[0];
								$col = $col + 1;
                                $dodateklink = $dodatek -> guid;
								?>
								<a href="<?php echo $dodateklink; ?>">
								<li>
								<img class="dodatki-img" src="<?php echo $dodatekimg; ?>">
								<div class="dodatki-title"><?php echo $dodatektitle; ?></div>
								<div class="dodatki-text"><?php echo $dodatektext; ?></div>
								</li>
                                </a>
								<?php
								if ($col == 3){
									echo "</ul>";
									$col = 0;
								}
							}
						?>
						</div>
					</div>
					<!--div class="barve">
						<div class="singleproduct-title">Barve:</div><br>
							<ul>
                                <li><div class="barve-blacktext barve-container">Standard</div></li>
								<?php
                                 /*foreach ($barve as $barva){
                                     $code = get_field("barva", $barva->ID);
                                     $barva_title = get_the_title($barva -> ID);
                                     echo "<li><div class='barve-container' style='background-color:".$code.";'>".$barva_title."</div></li>";
                                 }
                                ?>
							</ul>
							<ul>
                                <li><div class="barve-blacktext barve-container">Standard plus</div></li>
								<?php
                                 foreach ($barvep as $barvap){
                                     $codep = get_field("barva", $barvap->ID);
                                     $barvap_title = get_the_title($barvap -> ID);
                                     echo "<li><div class='barve-container' style='background-color:".$codep.";'>".$barvap_title."</div></li>";
                                 }*/
                                ?>
							</ul> 
							<div class="singleproduct-text barve-x">*Ostale barve po naročilu</div>
						</div-->
										
					<?php the_posts_pagination( 'nav-below' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div> <!-- /.grid-70 -->
			<?php get_sidebar(); ?>

	</div> <!-- /#primary.grid-container.site-content -->
</div> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>