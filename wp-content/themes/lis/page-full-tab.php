<?php
/*
Template Name: Page With Tabs
*/
?>

<?php get_header(); ?>
			<div id="content" class="clearfix row">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

				<div id="main" class="col-sm-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" >
						
						<header>
							
							<div class="page-header"><h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1></div>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							
							
							<div class='bs-docs-example'> 
								
							<ul class='nav nav-tabs' id='myTab'>
							 <?php
			                    $entries = get_post_meta( $post->ID, '_cmb_repeat_group', true );
									foreach ( (array) $entries as $key => $entry ) {
									
									    $title = '';
									
									    if ( isset( $entry['title'] ) )
									        $title = esc_html( $entry['title'] );
										
									    echo "<li><a data-toggle='tab' href='#". preg_replace('/[\s]/i','',$title) . "'>" . $title . "</a></li>";
									
									    // Do something with the data
									}
			                    ?>
			                    </ul>
			                    <div class="tab-content" id="myTabContent">
							 <?php
			                    $entries = get_post_meta( $post->ID, '_cmb_repeat_group', true );
									foreach ( (array) $entries as $key => $entry ) {
									
									    $picture = $desc = '';
									
									    if ( isset( $entry['title'] ) )
									        $title = esc_html( $entry['title'] );
									
									    if ( isset( $entry['description'] ) )
									        $desc = wpautop( $entry['description'] );
										
									    echo "<div id='" . preg_replace('/[\s]/i','',$title) . "' class='tab-pane'>";
									    echo  $desc ;
									    echo "</div>";
									
									    // Do something with the data
									}
			                    ?>
			                    </div>

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
			
				</div> <!-- end #main -->

    
			</div> <!-- end #content -->

<?php get_footer(); ?>