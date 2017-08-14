<?php ?>
<?php get_header(); ?>
	<div class="navBar" role="navigation">
		<div class="hamContainer">
			<div class="hamburger">
				<span class="line line-1"></span>
				<span class="line line-2"></span>
				<span class="line line-3"></span>
			</div>
		</div>
		<ul class="menu">
			<!-- <li><a href="#about" class="navLink">Home</a></li> -->
			<li><a href="#about" class="navLink">About</a></li>
			<li><a href="#rsvp" class="navLink">RSVP</a></li>
			<li><a href="#gifts" class="navLink">Gifts</a></li>
			<li><a href="#faq" class="navLink">FAQ</a></li>
		</ul>	
	</div>

	<div class="main" role="main">
		<div class="container">
			
			<section id="about" class="about" tabindex="1">
				<h2>About Us</h2>
				<div class="content">
					<img src="wp-content/themes/wordpressWedding/images/briana.png" alt="Briana's caricature">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur repudiandae dolore quae, soluta dicta voluptatum inventore ea sunt, repellendus possimus laborum necessitatibus illum cupiditate. Perferendis dolorem dolor tempora magnam ipsum.</p>
					<img src="wp-content/themes/wordpressWedding/images/corey.png" alt="Corey's caricature">

					<div class="imgContainer">
						<img src="wp-content/themes/wordpressWedding/images/briana.png" alt="Briana's caricature">
						<img src="wp-content/themes/wordpressWedding/images/corey.png" alt="Corey's caricature">
					</div>
				</div>
				<a href="#rsvp"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</section>
			
			<section id="rsvp" class="rsvp" tabindex="1">

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
						<label for="inputName">Enter your name:</label>
						<input id="inputName" type="text" placeholder="" tabindex="1">
						<input type="submit" tabindex="1">
					</form>
				</div>
				<a href="#gifts"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</section>

			<section id="gifts" class="gifts" tabindex="1">
				<h2>Gifts</h2>
				<p>Monetary gifts are preferred. However if you would like to purchase a gift, registries can be found at the websites below.</p>
				<div class="content">
						<?php $new_query = new WP_Query('post_type=gifts&posts_per_page=-1'); 
							while ($new_query->have_posts()) : $new_query->the_post();
						?>
							<div class="registryItem">
								<a href="<?php echo the_field('gift_registry') ?>" target="_blank" rel="noopener" tabindex="1">
									<?php the_post_thumbnail('thumbnail')?>
									<h3><?php the_title() ?></h3>
								</a>
							</div>
						<?php endwhile; ?>
				</div>
				<a href="#faq"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</section>

			<section id="faq" class="faq" tabindex="1">
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
<?php get_footer(); ?>