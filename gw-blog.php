<?php
/**
 * Template Name: gw-Blog
 *
 * The Template for displaying blog posts.
 *
 * @package Gedankenwerk
 * @subpackage Gedankenwerk.com
 * @since Gedankenwerk.com 1.0
 */

get_header(); ?>

<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=5'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>


		
			
			<div class="png-box ">
				<div class="block-holder2 holder blog">
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
											<?php
											if ( has_post_thumbnail($post->ID)) {
													$thumbnail = get_the_post_thumbnail( $post->ID );
													echo $thumbnail;
												}
											?>
											<?php the_content(); ?>
											<?php
												
												
											?>
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
			
			

			
			
			
<?php endwhile; ?>
			

<?php get_footer(); ?>
