<?php get_header();
/*
	Template Name: Items
*/
 ?>
 <div class="row">
<?php
	$argv = array('post_type'=>'item_pro','post_per_page'=>3);
	$loop = new WP_Query($argv);
	if ($loop->have_posts()):

		while($loop->have_posts()): $loop->the_post();?>

		<div class="col-sm-4">
			<?php the_post_thumbnail(array('class'=>'thumb_img')) ?>

			<div class="item_info">
				
				<a href='<?php
				echo get_post_permalink($post->ID,false,false);
				?>'> <h2 class='text-primary item_title'><?php the_title(); ?></h2> </a>

				<div class = 'text-success item_sale'>
				<?php
		            $sale = get_post_meta( $post->ID, 'sale', true );
		             
		            if( $sale ) { 
		                echo 'Sale : ' . $sale . '</br>';
		            }
		        ?>
		        </div>
				<!-- <h4>Posted on <?php the_time('F j,y'); ?> at <?php the_time('g:i a'); ?></h4> -->
				<!-- <p><?php the_content(); ?></p> -->
				<div class = 'item_price bg-primary'>

				<?php
		            $price = get_post_meta( $post->ID, 'price', true );
		             
		            if( $price ) { 
		                echo 'Giá : ' . $price . '</br>';
		            }
		        ?>
				<hr>

		        </div>
	        </div>
        </div>

		<?php
		endwhile;
	endif;
?>
</div>
<?php get_footer(); ?>

