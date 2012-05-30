<?php
/**
 * Template Name: gw-Works-Detail
 *
 * The Template for displaying a portfolio entry.
 *
 * @package Gedankenwerk
 * @subpackage Gedankenwerk.com
 * @since Gedankenwerk.com 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


			 <div class="png-box">
				<div class="holder">
					<div class="lt"></div>
					<div class="t"></div>
					<div class="rt"></div>
					<div class="c">
						<div class="l"></div>
						<div class="content" style="background: #000;">
							
							<?php
							$custom = get_post_custom($post->ID);  
   		 					$featureType = $custom["featureType"][0];
   		 					
   		 					
   		 					if ($featureType == "slidedeck") {
   		 						$sdId = $custom["slideDeckId"][0];
   		 					?>
   		 					
   		 						<div class="slideshow gw-slidedeck">
   		 					<?php
   		 						slidedeck( $sdId, array( 'width' => '959px', 'height' => '550px' ) );
   		 					?>
   		 						</div>
   		 					<?php
   		 					}
   		 					
   		 					if ($featureType == "slideshow") {
   		 					
							
								$attachments = attachments_get_attachments();
								$total_attachments = count($attachments);
								?>
								<?php if( $total_attachments > 0 ) : ?>
								
								<div class="slideshow">
									<div class="items">
										<?php for ($i=0; $i < $total_attachments; $i++) : ?>
											<div><img width="960" height="550" src="<?=$attachments[$i]['location']?>" title="<?=$attachments[$i]['title']?>" /></div>
										<?php endfor ?>
								    </div>
								</div>
								<a class="prev browse left"></a>
								<a class="next browse right"></a>
							
							<?php endif ?>
							<?php
							}
							
							if ($featureType == "flashvideo") { 
								$netConnectionUrl = $custom["netConnectionUrl"][0]; 
   		 						$playerKey = $custom["playerKey"][0]; 
   		 						$streamUrl = $custom["streamUrl"][0]; 
   		 						$iOSVideoUrl = $custom["iOSVideoUrl"][0]; 
   		 						
							?>
							
								<a    
								 style="display:block;width:959px;height:554px"  
								 id="player" class="feature">
								 </a> 
	
								
								<script>
									
									$f("player", "<?php bloginfo('template_url'); ?>/swf/flowplayer.commercial-3.2.5.swf", {
										key: '<?=$playerKey; ?>',
										plugins: {
											influxis: {
												url: '<?php bloginfo('template_url'); ?>/swf/flowplayer.rtmp-3.2.3.swf',
												netConnectionUrl: '<?=$netConnectionUrl; ?>'
											}
										},
										clip: {
											url: '<?=$streamUrl; ?>',
											provider: 'influxis',
											ipadUrl: "<?=$iOSVideoUrl; ?>"
										}
									
										
									}).ipad();
								
								</script>
							<?php
							}
							?>						
						</div>
						<div class="r"></div>
					</div>
					<div class="lb"></div>
					<div class="b"></div>
					<div class="rb"></div>
				</div>
			</div>
			
			
			<div class="png-box sub-box">
				<div class="block-holder2 holder">
					<div class="lt"></div>
					<div class="t"></div>
					<div class="rt"></div>
					<div class="c">
						<div class="l"></div>
						<div class="content" style="background: #000;">
			
			
			
						
								
									
									<div class="full-block">
										<div class="entry-title-wrapper">
											<a class="details-back back" href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">back</a>
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
			
			
			
			
<?php endwhile; ?>
			

<?php get_footer(); ?>
