<?php ?>
<?php get_header(); ?>
	<div class="navBar">
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

	<div class="main">
		<div class="container">
			
			<section id="about" class="about">
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
						<input id="inputName" type="text" placeholder="Enter your name">
						<input type="submit">
					</form>
				</div>
				<a href="#gifts"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</section>

			<section id="gifts" class="gifts">
				<h2>Gifts</h2>
				<div class="content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis temporibus, dolorem eaque sunt harum illum dignissimos excepturi! Quod, aut ad dolor iusto animi earum in, ullam expedita magni nobis. Fugit.</p>
				</div>
				<a href="#faq"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</section>

			<section id="faq" class="faq">
				<div class="content">
					<h2 class="clip">FAQ</h2>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php endwhile; else : ?><p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
				</div>
			</section>
		</div> <!-- /.container -->
	</div> <!-- /.main -->
<?php get_footer(); ?>