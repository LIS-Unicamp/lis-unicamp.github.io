<?php
/*
Template Name: Page With Menu
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        
			<div id="content" class="clearfix row">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

				
					<!-- Sidebar -->
			            	<?php
						   		$entries = get_post_meta( $post->ID, '_cmb_repeat_group', true );
						   		if ($entries){
								echo "<div class='col-sm-12 clearfix' role='main'>";		   		
						   		echo "<div class='col-sm-3 bs-docs-sidenav hidden-xs hidden-sm hidden-md'' role='complementary'>";
			            		echo "<ul class='nav sidebar-nav'>";
			            		echo "<li><a href='#top'>»&nbsp; Introduction</a></li>";
								foreach ( (array) $entries as $key => $entry ) {
								
								    $title = $desc = '';
								
								    if ( isset( $entry['title'] ) )
								        $title = esc_html( $entry['title'] );
								        
								    echo "<li><a href='#". preg_replace('/[\s]/i','',$title) . "'>» &nbsp;" . $title . "</a></li>";
								    // Do something with the data
								}
								echo "</ul>";
				    			echo "</div>";
								echo "<div class='col-sm-9 col-md-offset-3'>";
							}
							else {
								echo "<div id='main'' class='col-sm-12 clearfix' role='main'>";
							}
						   ?>
			            
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" >
							
							<header>
								
								<div class="page-header"><h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1></div>
							
							</header> <!-- end article header -->
						
							<section class="post_content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
								
								
								<div class='details'> 
									
								
								 <?php
				                    $entries = get_post_meta( $post->ID, '_cmb_repeat_group', true );
				                    if ($entries){
										foreach ( (array) $entries as $key => $entry ) {
										
										    $title = $desc = '';
										
										    if ( isset( $entry['title'] ) )
										        $title = esc_html( $entry['title'] );
										        
											if ( isset( $entry['description'] ) )
										        $desc = wpautop( $entry['description'] );
										        
										    echo "<div style='position: relative;' id='". preg_replace('/[\s]/i','',$title) . "'>";
										    echo "<h2 class='title_detail'>" . $title . "</h2>";
											echo  $desc ;
											echo "</div>";
										    // Do something with the data
										}
									}
				                    ?>
				                    
	
				                </div>
						
							</section> <!-- end article section -->
						
							
							<footer>
				
								<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ', ', '</p>'); ?>
								
							</footer> <!-- end article footer -->
						
						</article> <!-- end article -->
						
						
						<?php endwhile; ?>		
						
						<?php else : ?>
						
						<article id="post-not-found">
						    <header>
						    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
						    </header>
						    <section class="post_content">
						    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php endif; ?>
						
					</div>
				</div> <!-- end #main -->

    
			</div> <!-- end #content -->

<?php get_footer(); ?>