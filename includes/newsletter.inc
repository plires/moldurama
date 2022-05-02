<!-- newsletter -->
<section class="container">

	<div class="row">

		<div class="newsletter d-flex flex-column justify-content-center col-md-6">
			<div>
				<h4 class="text-center mb-4 wow fadeInLeft">¡Suscribite a nuestro Newsletter para recibir las últimas novedades!</h4>
				
				<div class="error">
		      <ul>
		        <?php foreach ($errors_news as $error_news) { ?>
		          <li><?php echo $error_news; ?></li>
		        <?php } ?>
		      </ul>
		    </div>
				
				<form class="wow fadeInUp" method="post" action="">
				  <div class="row d-flex justify-content-center">

				  	<input name="origin" type="hidden" value="Newsletter">

				    <div class="col-lg-8 col-md-7 col-sm-12 mb-3">
				      <input required type="email" name="email_news" type="text" class="form-control" value='<?php echo $email_news; ?>' placeholder="Email">
				    </div>

				    <div class="col-lg-4 col-md-5 col-sm-12 text-center">
				      <button name="newsletter" id="newsletter" type="submit" class="btn btn_site font_1em mb-3 wow fadeInUp">SUSCRIBIRME</button>
				    </div>

				  </div>
				</form>

			</div>
		</div>

		<div class="newsletter col-md-6">
			<img class="img-fluid wow fadeInRight" src="img/home/newsletter.png" alt="newsletter moldurama">
		</div>

  </div>

</section>
<!-- newsletter end -->