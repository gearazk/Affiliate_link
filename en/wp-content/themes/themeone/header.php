<!DOCTYPE html>
<html>
<head>
	<title>Theme ONE-- Me_</title>
	<?php wp_head();?>


	<?php
		if(is_home()):
			$body_classes = array('home_page','class');
		else:
			$body_classes = array('not_home_page','class','some_page_else');
		endif;

	?>
</head>
<body  <?php body_class($body_classes);?> >

<div class="container">
		
			<div class="row">
				
				<div class="col-xs-12">
					
					<nav class="navbar navbar-default"> 
					  <div class="container-fluid">

					    <div class="navbar-header">

					      	<a class="navbar-brand" href="#">Theme One</a>
							<?php get_search_form(); ?>

					    </div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<?php 
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'container' => false,
									'menu_class' => 'nav navbar-nav navbar-right'
									)
								);
							?>
						</div>
					  </div><!-- /.container-fluid -->
					</nav>
				
				</div>
				
			</div>
			
			<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
