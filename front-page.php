<?php ?>
<?php get_header(); ?>
	<nav class="navBar" role="navigation">
		<div class="hamContainer">
			<div class="hamburger">
				<span class="line line-1"></span>
				<span class="line line-2"></span>
				<span class="line line-3"></span>
			</div>
		</div>
		<ul class="menu">
			<!-- <li><a href="#about" class="navLink">Home</a></li> -->
			<li><a tabindex="1" href="#about" class="navLink">About</a></li>
			<li><a tabindex="1" href="#rsvp" class="navLink">RSVP</a></li>
			<li><a tabindex="1" href="#gifts" class="navLink">Gifts</a></li>
			<li><a tabindex="1" href="#faq" class="navLink">FAQ</a></li>
		</ul>	
	</nav>

	<div class="main" role="main">
		<div class="container">
			
			<section id="about" class="about">
				<h2>About Us</h2>
				<div class="content">
					<img src="wp-content/themes/wordpressWedding/images/briana.png" alt>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur repudiandae dolore quae, soluta dicta voluptatum inventore ea sunt, repellendus possimus laborum necessitatibus illum cupiditate. Perferendis dolorem dolor tempora magnam ipsum.</p>
					<img src="wp-content/themes/wordpressWedding/images/corey.png" alt>

					<div class="imgContainer">
						<img src="wp-content/themes/wordpressWedding/images/briana.png" alt="Cartoon caricature of Briana smiling">
						<img src="wp-content/themes/wordpressWedding/images/corey.png" alt="Cartoon caricature of Corey smiling">
					</div>
				</div>
				<a href="#rsvp"><span class="hiddenScreen">Skip down to next section</span><i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</section>
			
			<section id="rsvp" class="rsvp">

				<div class="content">
					<div class="imgContainer">
						<img id="bFace" class="face" src="wp-content/themes/wordpressWedding/images/briana.png" alt="Briana's caricature">
						<img id="bThumb" src="wp-content/themes/wordpressWedding/images/like.png" alt="Briana's thumbs up">
					</div>
					<h2>RSVP</h2>
					<div class="imgContainer">
						<img id="cThumb" src="wp-content/themes/wordpressWedding/images/like.png" alt="Corey's thumbs up">
						<img id="cFace" class="face" src="wp-content/themes/wordpressWedding/images/corey.png" alt="Corey's caricature">
					</div>
				</div>

				<div class="content">
					
					<form id="rsvpForm">
						<fieldset>
							<label for="inputFirstName">First name:</label>
							<input id="inputFirstName" type="text" placeholder="Briana">
						</fieldset>
						<fieldset>
							<label for="inputLastName">Last name:</label>
							<input id="inputLastName" type="text" placeholder="Lantz">
						</fieldset>

						<input type="submit" for="rsvpForm">
					</form>
					
					<form id="alsoRSVP" class="hidden">
						<h4>Do you also want to RSVP for?</h4>
						
    					
    					<input type="submit" for="alsoRSVP">
					</form>

					<h4 id="confirmation" class="hidden"></h4>

				</div>
				<a href="#gifts"><span class="hiddenScreen">Skip down to next section</span><i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</section>

			<section id="gifts" class="gifts">
				<h2>Gifts</h2>
				<p>Monetary gifts are preferred. However if you would like to purchase a gift, registries can be found at the websites below.</p>
				<div class="content">
						<?php $new_query = new WP_Query('post_type=gifts&posts_per_page=-1'); 
							while ($new_query->have_posts()) : $new_query->the_post();
						?>
							<div class="registryItem">
								<a href="<?php echo the_field('gift_registry') ?>" target="_blank" rel="noopener">
									<?php the_post_thumbnail('thumbnail')?>
									<h3><?php the_title() ?></h3>
								</a>
							</div>
						<?php endwhile; ?>
				</div>
				<a href="#faq"><span class="hiddenScreen">Skip down to next section</span><i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</section>

			<section id="faq" class="faq">
				<div class="content">
				<!-- needs to be in content for knockout text to work -->
				<h2 class="clip">FAQ</h2>
					<div>
						<?php $new_query = new WP_Query('post_type=faq&posts_per_page=-1'); 
							while ($new_query->have_posts()) : $new_query->the_post();
						?>
							<h3><?php the_title() ?></h3>
							<p><?php the_content() ?></p>
						<?php endwhile; ?>

					</div>
				</div>
			</section>
		</div> <!-- /.container -->
	</div> <!-- /.main -->

<script src="https://www.gstatic.com/firebasejs/4.8.2/firebase.js"></script>

<?php get_footer(); ?>