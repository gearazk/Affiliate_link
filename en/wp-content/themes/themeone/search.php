<?php get_header(); ?>

<div class="row">
	
	<div class="col-xs-12 col-sm-8">
		
		<div class="row">

		<?php 
		
		if( have_posts() ):
			while( have_posts() ): the_post(); 
		?>
			<header class="entry-header">
			<?php 
			the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' );
			 ?>
			<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a');  ?></small>
	</header>

		<?php		
			endwhile;
			
		endif;
				
		?>
		</div>
	
	</div>
	

	
</div>

<?php get_footer(); ?>