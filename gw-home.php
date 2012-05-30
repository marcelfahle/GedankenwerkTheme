<?php
/**
 * Template Name: gw-Home
 *
 * The Template for displaying the home page.
 *
 * @package Gedankenwerk
 * @subpackage Gedankenwerk.com
 * @since Gedankenwerk.com 1.0
 */

get_header(); ?>

		<div class="png-box">
				<div class="holder">
					<div class="lt"></div>
					<div class="t"></div>
					<div class="rt"></div>
					<div class="c">
						<div class="l"></div>
						<div class="content">
							<div class="slideshow gw-slidedeck">
							<?php
								$custom = get_post_custom($post->ID);  
	   		 					$featureType = $custom["featureType"][0]; 
							?>
							<?php  slidedeck( 1033, array( 'width' => '960px', 'height' => '550px' ) ); ?>
						
							
													
							
							</div>
							
						</div>
						<div class="r"></div>
					</div>
					<div class="lb"></div>
					<div class="b"></div>
					<div class="rb"></div>
				</div>
			</div>
			<div class="block-holder">
	
			<?php
				
				if (isset($custom["featuredPages"][0]) && strlen($custom["featuredPages"][0]) >= 1) {
				
					$featuredPages = $custom["featuredPages"][0]; 
					
					$pageIds = explode(",", $featuredPages);
					
					for ($i=0; $i<count($pageIds); $i++) {
					
						$post = get_post($pageIds[$i]); 
						$postCustom = get_post_custom($pageIds[$i]);
						$teaserText = $postCustom["teaser"][0]; 
						$teaserImageId = $postCustom["teaserImageId"][0]; 
			?>
			
			
					<div class="block">
						<h2><?=$post->post_title; ?></h2>
						<div class="image homeimage">
							<?php if (isset($postCustom["teaserLink"][0]) && $postCustom["teaserLink"][0] == "true") { ?><a href="<?=get_permalink($pageIds[$i]); ?>"><?php } ?>
								<? //get_the_post_thumbnail($pageIds[$i], 'full', array('class' => 'homeFeatureThumb')  ); 
									echo wp_get_attachment_image( $teaserImageId, 'full', false, array('class' => 'homeFeatureThumb') );
								?>
							<?php if (isset($postCustom["teaserLink"][0]) && $postCustom["teaserLink"][0] == "true") { ?></a><?php } ?>

						</div>
						<div class="text-block">
							<p><?=$teaserText; ?> <?php if (isset($postCustom["teaserLink"][0]) && $postCustom["teaserLink"][0] == "true") { ?><a class="more" href="<?=get_permalink($pageIds[$i]); ?>">more</a><?php } ?> </p>
						</div>
					</div>
					
			<?php
					}
				}
			?>
			</div>


<?php get_footer(); ?>
