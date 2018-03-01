    <!-- About Section
    ================================================== -->
    <?php if( is_page( 'contacts' ) ){ ?>
    <div class="map wow fadeInUp" data-wow-delay="1s">
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d634.5761426089892!2d30.512885829277593!3d50.49128899871757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDI5JzI4LjYiTiAzMMKwMzAnNDguNCJF!5e0!3m2!1sru!2sua!4v1490272357687" width="100%" height="360" frameborder="0" allowfullscreen></iframe></div>
    	<?php } ?>
    	<div id="footer-nav"  itemscope itemtype="http://schema.org/PostalAddress">
    		<div class="col-xs-12 col-md-4">
    			<div class="footer_contacts">
    				<span itemprop="name">Ресторан АРАН</span><br>
    				<span itemprop="addressLocality">г. Киев, ул. Приозерная 12б</span><br>
    				<span><a class="socicon-facebook" href="https://m.facebook.com/RestoranAran/?ref=bookmarks"></a></span>
    				<span><a class="socicon-instagram" href="https://www.instagram.com/aranrestoran/"></a></span>
    			</div>    
    		</div>
    		<div class="col-xs-12 col-md-3">
    			<div class="footer_contacts">
    				<span itemprop="telephone"><a href="tel:044223 94 63">(044) 223 94 63<a></span><br>
    				<span itemprop="telephone"><a href="tel:0636223262">(063) 622 32 62</a></span><br>
    				<span itemprop="telephone"><a href="tel:0686223262">(068) 622 32 62</a></span><br>
    			</div>
    		</div>
    		<div class="col-xs-12 col-md-2">
    			<a href="/"><img src="http://www.aran-kiev.com/wp-content/uploads/2016/08/aran_logo.png" width="140" height="auto" itemprop="image"></a>
    		</div>
    		<div class="col-xs-12 col-md-3">
    			<div class="copyright">
    				<!-- Copyright notice on the bottom -->
    				<span><?php $copyright = get_theme_mod('rokophotolite_footer_copyrights', __( 'RokoPhoto Lite. All Rights Reserved', 'rokophotolite' )); if(!empty($copyright)) { echo wp_kses_post( $copyright ); } ?></span>
    			</div>  
    		</div>
    	</div>
    	<?php wp_footer(); ?>
    </body>
    </html>