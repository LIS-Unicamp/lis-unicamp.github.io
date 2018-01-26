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
							<div class="member page">
							
								<img class="perfil" src='
								<?php $meta = get_post_meta($post->ID, '_cmb_member_picture', true);
								    if ($meta == '') {
								        echo bloginfo('template_directory') .'/library/img/user.png';
								    } else {
								    	$imgmeta = str_replace('.jpg', '-150x150.jpg' , $meta);
								        echo $imgmeta ;
								      }
								?>
								'/>
								<?php the_content(); ?>
								<?php the_excerpt(); ?>
								<!-- call email -->
								<?php $meta = get_post_meta( $post->ID, "_cmb_email", true );
								    if ($meta == '') {
								        echo '&nbsp;';
								    } else {
								    	echo '<div class="info">';
								        echo '<i class="fa fa-envelope"></i> ' ;
								        echo hide_email($meta);
								        echo '</div>';
								      }
								?>
								
								<!-- call url -->
								<?php $meta = get_post_meta( $post->ID, "_cmb_url", true );
								    if ($meta == '') {
								        echo '&nbsp;';
								    } else {
								    	echo '<div class="info">';
								        echo '<i class="fa fa-link"></i> <a href="' . $meta . '">';
								        $urlcut = str_replace('http://', '' , $meta);
								        $meta = str_replace('www.', '' , $urlcut);
								        echo $meta;
								        echo '</a></div>';
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
			
				</div> <!-- end #main -->

    
			</div> <!-- end #content -->

<?php get_footer(); ?>