<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
				
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
				
	</head>
	
	<body <?php body_class(); ?> data-spy="scroll">
	  <div class="wrapper">
		<header id='top'>
		    <div class='navbar-wrapper'>
		      <div class='container'>
		        <div class='navbar navbar-inverse navbar-static-top' role='navigation'>
		        	
		            <div class='row top-header'>
		              <div class='col-lg-8 col-md-7 col-sm-6'>
		                <a class='navbar-brand' href='<?php echo home_url(); ?>'>LIS - Laboratory of information systems</a>
		              </div>
		              <div class='col-lg-4 col-md-5 col-sm-6 hidden-xs'>
		                <div class='top-header-right'>
		                	
		                	
		                  <div class='acessibility'>
		                  	<?php if(function_exists('fontResizer_place')) { fontResizer_place(); } ?>
		                  </div>
	                  		
		                  <?php wp_bootstrap_second_nav(); // Adjust using Menus in Wordpress Admin ?>
		                  
		                </div>	
		                <div class='search'>
		                  <?php //if(of_get_option('search_bar', '1')) {?>
		                  <form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		                    <div class='form-group'>
		                      <label class='sr-only' for='exampleInputEmail2'>Search</label>
		                      <input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search','wpbootstrap'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
		                    </div>
		                    <button class='btn btn-default' type='submit'>Submit</button>
		                  </form>
		                  <?php //} ?>
		                </div>
		              </div>
		            </div>
		            <div class='row menu'>
		              	<div class='search visible-xs'>
		                  <?php //if(of_get_option('search_bar', '1')) {?>
		                  <form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		                    <div class='form-group'>
		                      <label class='sr-only' for='exampleInputEmail2'>Search</label>
		                      <input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search','wpbootstrap'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
		                    </div>
		                    <button class='btn btn-default' type='submit'>ok</button>
		                  </form>
		                  <?php //} ?>
		            	</div>
		                
		              <div class='navbar-header'>
		                <button class='navbar-toggle' data-target='.navbar-collapse' data-toggle='collapse' type='button'>
		                  <span class='sr-only'>Toggle navigation</span>
		                  <span class='icon-bar'></span>
		                  <span class='icon-bar'></span>
		                  <span class='icon-bar'></span>
		                </button>
		              </div>
		              <div class='navbar-collapse collapse'>
		                <?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
		                <div class='visible-xs navbar-collapse'>
			              <?php wp_bootstrap_second_nav(); // Adjust using Menus in Wordpress Admin ?>
			          </div>
		              </div>
		              
		            </div>
		            <div class='row'>
		              <div class='col-md-12 shadow'></div>
		            </div>
		          </div>

		      </div>
		    </div>
		</header>
		
		<div class="container">
