<?php
/*
Template Name: Members Page
*/

function image_member_url($meta) {
	if ($meta == '') {
        echo bloginfo('template_directory') .'/library/img/user.png';
    } else {
    	$imgmeta = str_replace(substr($meta, -4), '-150x150' .substr($meta, -4), $meta);
    	$file_headers = @get_headers($imgmeta);
    	if(!strpos($file_headers[0], "404")) {
    		return $imgmeta; 
    	} else {
    		return $meta;
    	}
	}
}
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
						
						
						 	<!-- displayng all members -->
							<?php
							//for a given post type, return all
							$post_type = 'members';
							$tax = 'group';
							$tax_terms = get_terms($tax);
							if ($tax_terms) {
							  foreach ($tax_terms  as $tax_term) {						  	
								    $args=array(
								      'post_type' => $post_type,
								      "$tax" => $tax_term->slug,
								      'post_status' => 'publish',
								      'posts_per_page' => -1,
								      'caller_get_posts'=> 1,
									  'parent' => '',
								    );
									
								    $my_query = null;
								    $my_query = new WP_Query($args);
								    if( $my_query->have_posts() ) {
								      echo '<div class="members panel panel-default clearfix"><div class="panel-heading"><h3>'. $tax_term->name . '</h3></div>';
								      while ($my_query->have_posts()) : $my_query->the_post(); ?>
								      
								      <?php 
										    echo '<div class="member col-sm-3">';
								      		echo '<div class="panel-body small"><h4>';
											echo the_title();
											echo '</h4>';
											
											
											
											echo '<div class="member-thumb"><img class="member-picture" src="';
											$meta = get_post_meta($post->ID, '_cmb_member_picture', true);
											echo image_member_url($meta); 
											echo '"/></div>';
											
											// call description
											echo '<div class="member-description">';
											echo the_excerpt();
											echo '</div>';
											
											// call email
											$meta = get_post_meta( $post->ID, "_cmb_email", true );
											    if ($meta == '') {
											        echo '<div class="info" style="opacity: 0;">&nbsp;</div>';
											    } else {
											    	echo '<div class="info">';
											        echo '<i class="fa fa-envelope"></i> ' ;
											        echo hide_email($meta);
											        echo '</div>';
											      }
											
											// call url
											$meta = get_post_meta( $post->ID, "_cmb_url", true );
											    if ($meta == '') {
											        echo '<div class="info" style="opacity: 0;">&nbsp;</div>';
											    } else {
											    	echo '<div class="info">';
											        echo '<i class="fa fa-link"></i> <a href="' . $meta . '">';
											        $urlcut = str_replace('http://', '' , $meta);
											        $meta = str_replace('www.', '' , $urlcut);
											        echo $meta;
											        echo '</a></div>';
											      }
											echo '</div></div>';
										
										?>
								      
								    <?php endwhile;
								    }
								echo '</div><hr>';
							    wp_reset_query();
							  }
							}
							?>

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