			<div class="push"></div>
			</div>
        </div>
			<footer role="contentinfo">
				
				<div class='container'>
			        <div class='clearfix row footer'>
			          <div>
			            <div class='col-md-11 col-xs-10 footerdescription'>
			            	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            		<?php endif; ?>
			            </div>
			            <div class='col-md-1'>
			              <a class='totop' href='#'></a>
			            </div>
			          </div>
			        </div>
				</div>
			
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
	
		<?php wp_footer(); // js scripts are inserted using this function ?>
		

	<script type='text/javascript'>
        
        jQuery(document).ready(function($) {
			$('.member-description, .ngg-album').sameheight();
			});

      //]]>
    </script>	
	</body>

</html>