<script>
    
</script>
<?php
            $num_items = count($value["produktlist"]);
			$absolute_products = 0;
            $absolute_rows = 0;
            $active_page = 1;
            $max_col = 3;
			$col = 0; 
			$rows = 0;
            $page = 1;
			foreach ($value["produktlist"] as $key => $produktlistitem){
                
				if ($col == 0){
                    if ($rows == 0){
                        echo "<div class='grid-container produktlist' id='page-".$page."'>";
                    }
					echo "<ul>";
				}
				$title = $produktlistitem -> post_title;
				$text = get_post_field('post_content', $produktlistitem -> ID);
				$img = wp_get_attachment_image_src(get_post_thumbnail_id( $produktlistitem->ID),"large" )[0];
				$link = $produktlistitem -> guid;
				
				$col = $col + 1;
                $absolute_products = $absolute_products + 1;
				?>
				<li>
				<div class="produktlist-text"><?php echo $text; ?></div>
				<div class="produktlist-title"><?php echo $title; ?></div>
				<img class="produktlist-image" src="<?php echo $img; ?>">
				<button class="btn btn-default button1 produktlist-btn" onclick="location.href='<?php echo $link; ?>';">Več</button>
				</li>
				<?php
				if ($col == 3){
                    //did you write 3 columns?
					echo "</ul>";
					$col = 0;
                    $rows = $rows + 1;
                    $absolute_rows = $absolute_rows + 1;
				}
                if ($rows == 3)
                {
                    //did you write 3 rows?
                    echo "</div>";
                    $rows = 0;
                    $page = $page + 1;
                }
                
                if ($num_items == $absolute_products){
                //is it the last in the array?
                    if($col != 3){
                        echo "</ul>";
                    }
                    
                    if($rows != 3){
                        echo "</div>";
                    }
                }
			}
            
                ?><script>
                    var page = "<?php echo $page; ?>";
                    var active_page = "<?php echo $active_page; ?>";
                    for (i = 1; i <= page; i++){
                        document.getElementById("page-"+i).style.display = "none";
                        
                        if (active_page == i)
                            {
                                document.getElementById("page-"+i).style.display = "block";
                            }
                    }
                    
                    function set_active(x){
                        active = x;
                        
                    }
                    function check_page(){
                       var page = "<?php echo $page; ?>";
                       var active_page = active ;
                    for (i = 1; i <= page; i++){
                        document.getElementById("page-"+i).style.display = "none";
                        
                        if (active_page == i)
                            {
                                document.getElementById("page-"+i).style.display = "block";
                            }
                    }
                    }
                </script><?php
echo "<div class='pagination'><ul>";            
for ($xx = 1; $xx <= $page; $xx++){
   echo "<li><a onclick='set_active(".$xx."); check_page();'><div class='pagination-navbtn'>".$xx."</div></a></li>";
}
echo "</ul></div>";  

		?>


<hr class="seperator">