<?php
/**
 * Template Name: gw-Works
 *
 * The Template for displaying the portfolio as a list.
 *
 * @package Gedankenwerk
 * @subpackage Gedankenwerk.com
 * @since Gedankenwerk.com 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
			
			<div class="png-box ">
				<div class="block-holder2 holder single workstext">
					<div class="lt"></div>
					<div class="t"></div>
					<div class="rt"></div>
					<div class="c">
						<div class="l"></div>
						<div class="content" style="background: #000;">
			
			
			
						
								
									
									<div class="full-block">
										<div class="entry-title-wrapper">
											
											<h2 class="entry-title"><?php the_title(); ?></h2>
											
										</div>
										
										
										<div class="text-block">
											<p><?php the_content(); ?></p>
										</div>
									</div>
							
			
			
							</div>
						<div class="r"></div>
					</div>
					<div class="lb"></div>
					<div class="b"></div>
					<div class="rb"></div>
				</div>
			</div>
			
			
			
			<div class="block-frame">

			
			
			 <?php
					
				$_walker = new Walker_Portfolio(); 
				wp_list_pages(array('walker' => $_walker,'title_li' => '','depth' => '2','child_of' => $post->ID));

			?>			
			
<?php endwhile; ?>

<?php get_footer(); ?>
