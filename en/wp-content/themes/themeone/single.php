<?php get_header(); ?>

<div class="row">
	
		
		<?php 
		
		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					
					<?php if( has_post_thumbnail() ): ?>
						
					<?php the_post_thumbnail('banner-image',array('class'=>'center-block')); ?>
						
					<?php endif; ?>
					
					<?php the_title('<h1 class="entry-title text-capitalize">','</h1>' ); ?>

					<div class = 'text-success item_sale'>
					<?php
			            $sale = get_post_meta( $post->ID, 'sale', true );
			             
			            if( $sale ) { 
			                echo 'Sale : ' . $sale . '</br>';
			            }
			        ?>
			        </div>

			        <div class = 'item_price bg-primary'>

					<?php
			            $price = get_post_meta( $post->ID, 'price', true );
			             
			            if( $price ) { 
			                echo 'Giá : ' . $price . '</br>';
			            }
			        ?>
			        </div>
					<?php the_content(); ?>
					
					<hr>
					
					<div class="row">
						<div class="col-xs-6 text-left lead"><?php previous_post_link(); ?></div>
						<div class="col-xs-6 text-right lead"><?php next_post_link(); ?></div>
					</div>
					
				
				</article>

			<?php endwhile;
			
		endif;
				
		?>
	
	
	
	
</div>

<?php get_footer(); ?>