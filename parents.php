<?php
/*
Template Name: Parents
*/
?>

<?php get_header(); ?>

<section id="main">
	<div class="container">
		<div class="row">
			<?php 
				if ( is_user_logged_in() ) {
					include('includes/parents_table.php');
				}	else {
					include('includes/login_msg.php');
				}
			?>			
		</div>
	</div>
</section>

<?php get_footer(); ?>