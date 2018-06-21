<?php
/**
 * @package epfl
 * Template Name: Mock homepage
 * Template Post Type: page
 */

init_nav();
get_header();
get_sidebar();
?>
	<main id="main" role="main" class="content">

		<div class="fullwidth-teaser fullwidth-teaser-horizontal mb-lg-5 mb-xl-0">
			<style>
				.vimeo-wrapper iframe {
					width: 100%;
					height: 56.25vw; /* Given a 16:9 aspect ratio, 9/16*100 = 56.25 */
				}
			
			</style>

			<div class="vimeo-wrapper d-none d-xl-block">
				<iframe src="https://player.vimeo.com/video/276045972?background=1" style="border: none;" frameborder"0" allowfullscreen></iframe>
			</div>

			<picture class="d-block d-xl-none">
				<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/of-mices-and-research.gif" alt="">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							The neurons that rewrite traumatic memories</h3>
						<ul class="list-inline mt-2">
							<li class="list-inline-item">Biology</li>
							<li class="list-inline-item">Brain</li>
						</ul>
					</div>
					<a href="https://actu.epfl.ch/news/the-neurons-that-rewrite-traumatic-memories/" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
						Read the article
						<span class="sr-only">sur Tech Transfer.</span>
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						Neuroscientists at EPFL have located the cells that help reprogram long-lasting memories of traumatic experiences towards safety, a first in neuroscience. The study is published in Science.</p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none">Read the article</a>
				</div>
			</div>
		</div>


		<div class="container pb-5 offset-xl-top">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="row mb-4">
						<div class="col-md-6 d-flex">
							<a href="#" class="card link-trapeze-horizontal">
								<div class="card-body">
									<h3 class="card-title">Palm oil: the carbon cost of deforestation</h3>
									<div class="card-info">
										<span>Environment</span>
										<span>Palm oil</span>
									</div>
									<p>Palm oil has become part of our daily lives, but a recent study by EPFL and the Swiss Federal Institute for Forest, Snow and Landscape Research (WSL) serves as a reminder that intensive farming of this crop has a major impact on the environment. Both short- and long-term solutions exist, however.</p>
								</div>
							</a>

						</div>
						<div class="col-md-6 d-flex">
							<a href="#" class="card link-trapeze-horizontal">
								<div class="card-body">
									<h3 class="card-title">“In research, you need a sense of daring”</h3>
									<div class="card-info">
										<span class="card-info-date">
											<time datetime="DATETIME HERE">25.06.18</time>
										</span>
										<span>Campus</span>
									</div>
									<p>Palm oil has become part of our daily lives, but a recent study by EPFL and the Swiss Federal Institute for Forest, Snow and Landscape Research (WSL) serves as a reminder that intensive farming of this crop has a major impact on the environment. Both short- and long-term solutions exist, however.</p>
								</div>
							</a>

						</div>
					</div>
					<p class="text-center">
						<a class="link-pretty" href="https://actu.epfl.ch" target="_blank">Show all news</a>
					</p>
				</div>
			</div>
		</div>


		<div class="bg-gray-100 py-5">
			<div class="container">
				<h2 class="text-center mb-5">EPFL in a nutshell</h2>

				<h3 class="h6 mb-3 text-spread">School missions</h3>
				<div class="row mb-4">
					<div class="col-md-4 d-flex">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Education</a>
								</h3>
								<p>The excellency of education of EPFL’ students and teachers makes it one of the most prestigious science and technology schools in the world.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="#" class="btn btn-secondary btn-sm">Visit the education portal</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Research</a>
								</h3>
								<p>Our unique organisation allows us to systematically be ranked in the upper part of the world	 organisation unique nous permet de figurer systématiquement dans le haut du classement mondial des universités pour les programmes de recherche.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="#" class="btn btn-secondary btn-sm">Explore the research portal</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Innovation</a>
								</h3>
								<p>Tech transfer is our second nature. We are experts to turn scientific excellency into business values for companies and economical tissues.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="#" class="btn btn-secondary btn-sm">Open the Innovation portal</a>
							</div>
						</div>

					</div>
				</div>

				<h3 class="h6 mb-3 text-spread">Iconic campus venues</h3>
				<div class="row">
					<div class="col-md-4 d-flex">
						<div class="card">
							<a href="#" class="card-img-top">
								<picture>
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/2-teaser-basic-page-column1.jpg" class="img-fluid" title="Artlab" alt="ALT OF IMAGE HERE">
								</picture>
							</a>
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">The Artlab</a>
								</h3>
								<p>The Artlab hosts a wide range of events that draw bridges between the local cultural scene organisations.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="https://artlab.epfl.ch/" target="_blank" class="btn btn-secondary btn-sm">Try out the Artlab</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<a href="#" class="card-img-top">
								<picture>
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/2-teaser-basic-page-column2.jpg" class="img-fluid" title="Rolex Center" alt="ALT OF IMAGE HERE">
								</picture>
							</a>
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Rolex Learning Center</a>
								</h3>
								<p>The Rolex Learning Center is both a living learning laboratory and a library sheltering more than 500’000 volumes in the heart of an international cultural center.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="https://rolexlearningcenter.epfl.ch/" target="_" class="btn btn-secondary btn-sm">Discover the center</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<a href="#" class="card-img-top">
								<picture>
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/2-teaser-basic-page-column3.jpg" class="img-fluid" title="SwissTech CC" alt="ALT OF IMAGE HERE">
								</picture>
							</a>
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">SwissTech Convention Center</a>
								</h3>
								<p>The SwissTech Convention Center is one of the biggest convention venue around Lake Geneva. It hosts renown international events.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="http://stcc.ch/" target="_blank" class="btn btn-secondary btn-sm">Enter the convention center</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>


		<div class="fullwidth-teaser">
			<picture>
				<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/3-teaser-basic-page-highlight.jpg" aria-labelledby="background-label" alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							Studying at EPFL: 13 programs</h3>
					</div>
					<a href="#" aria-label="En savoir plus sur Tech Transfer" class="btn btn-primary triangle-outer-bottom-right d-none d-xl-block">
						Learn more
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						Thirteen engineering science programs, customised PhD programs, cutting-edge laboratories directed by internationally renowned professors, a modern, fast-developing campus, close ties to industry: EPFL offers an exceptional student experience for higher education in science and technology.</p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="#" aria-label="En savoir plus sur Tech Transfer" class="btn btn-primary btn-block d-xl-none">Learn more</a>
				</div>
			</div>
		</div>



		<div class="bg-gray-100 py-5 mb-3">
			<div class="datepicker-wrapper">

			</div>

			<div class="overflow-hidden">
				<div class="container">
					<div class="card-slider-wrapper">
						<div class="card-slider flickity-enabled is-draggable" tabindex="0">
							<div class="flickity-viewport" style="height: 421.844px; touch-action: pan-y;">
								<div class="flickity-slider" style="left: 0px; transform: translateX(0%);">
									<div class="card-slider-cell is-selected" aria-selected="true" style="position: absolute; left: 0%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-1.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">EPFL Drone Days 2018 dates have been announced!</h3>
												<div class="card-info">
													<span class="card-info-date">10.06.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Location:
														<b>ArtLab EPFL</b>
														<br>Category:
														<b>Cultural event</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 32.03%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-2.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">International Symposium on Chemical Biology 2018</h3>
												<div class="card-info">
													<span class="card-info-date">10.06.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Location:
														<b>ArtLab EPFL</b>
														<br>Category:
														<b>Cultural event</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 64.06%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-3.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">New neurons for old brains : adult neurogenesis in Alzheimer’s disease</h3>
												<div class="card-info">
													<span class="card-info-date">10.06.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Location:
														<b>ArtLab EPFL</b>
														<br>Category:
														<b>Cultural event</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 96.09%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-4.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">EuroTechPostdoc Programme: application platform is now open!</h3>
												<div class="card-info">
													<span class="card-info-date">10.06.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Location:
														<b>ArtLab EPFL</b>
														<br>Category:
														<b>Cultural event</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 128.11%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-5.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">Startup Acceleration Workshops</h3>
												<div class="card-info">
													<span class="card-info-date">10.06.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Location:
														<b>ArtLab EPFL</b>
														<br>Category:
														<b>Cultural event</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 160.14%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-6.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">Movie-mercredi “Shaw of the Dead” - original version</h3>
												<div class="card-info">
													<span class="card-info-date">10.06.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Location:
														<b>ArtLab EPFL</b>
														<br>Category:
														<b>Cultural event</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>

						<div class="card-slider-footer">
							<div>
								<button role="button" id="card-slider-prev" class="card-slider-btn link-trapeze-horizontal disabled">
									<svg class="icon" aria-hidden="true">
										<use xlink:href="#icon-chevron-left"></use>
									</svg>
								</button>
								<button role="button" id="card-slider-next" class="card-slider-btn link-trapeze-horizontal">
									<svg class="icon" aria-hidden="true">
										<use xlink:href="#icon-chevron-right"></use>
									</svg>
								</button>
							</div>
							<div>
								<a href="https://memento.epfl.ch/" target="_blank">See events complete list</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="fullwidth-teaser fullwidth-teaser-horizontal">
			<picture>
				<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/Andrea_Rinaldo-1600px.jpg" aria-labelledby="background-label" alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							Andrea Rinaldo elected to the American Academy of Arts and Sciences</h3>
						<ul class="list-inline mt-2">
							<li class="list-inline-item">News</li>
							<li class="list-inline-item">Distinction</li>
						</ul>
					</div>
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
						Read article
						<span class="sr-only">sur Tech Transfer.</span>
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						Professor Andrea Rinaldo, the director of the Laboratory of Ecohydrology in EPFL's School of Architecture, Civil and Environmental Engineering, has been elected to the American Academy of Arts and Sciences, one of the leading scientific societies in the world.</p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none">Read article</a>
				</div>
			</div>
		</div>


		<div class="container py-6">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h2>A multi campus school, from Lausanne to the world</h2>
					<p class="h6">One school, 6 locations</p>
				</div>
				<div class="col-lg-9 col-md-6">
					<div class="row">
						<div class="col-6 col-lg-4">
							<a href="https://migration-wp.epfl.ch/www.epfl.ch/campus/" target="_blank" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-lausanne.jpg" class="img-fluid" title="Lausanne" alt="ALT OF IMAGE HERE">
								</picture>
								<div class="card-body">
									<h3 class="card-title link-icon mb-0 h5">
										Lausanne
										<svg class="icon" aria-hidden="true">
											<use xlink:href="#icon-arrow-right"></use>
										</svg>
									</h3>
								</div>
							</a>

						</div>
						<div class="col-6 col-lg-4">
							<a href="https://geneva.epfl.ch/" target="_blank" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-geneva.jpg" class="img-fluid" title="Genève" alt="ALT OF IMAGE HERE">
								</picture>
								<div class="card-body">
									<h3 class="card-title link-icon mb-0 h5">
										Genève
										<svg class="icon" aria-hidden="true">
											<use xlink:href="#icon-arrow-right"></use>
										</svg>
									</h3>
								</div>
							</a>

						</div>
						<div class="col-6 col-lg-4">
							<a href="https://neuchatel.epfl.ch/" target="_blank" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-neuchatel.jpg" class="img-fluid" title="Neuchâtel" alt="ALT OF IMAGE HERE">
								</picture>
								<div class="card-body">
									<h3 class="card-title link-icon mb-0 h5">
										Neuchâtel
										<svg class="icon" aria-hidden="true">
											<use xlink:href="#icon-arrow-right"></use>
										</svg>
									</h3>
								</div>
							</a>

						</div>
						<div class="col-6 col-lg-4">
							<a href="https://fribourg.epfl.ch/" target="_blank" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-fribourg.jpg" class="img-fluid" title="Fribourg" alt="ALT OF IMAGE HERE">
								</picture>
								<div class="card-body">
									<h3 class="card-title link-icon mb-0 h5">
										Fribourg
										<svg class="icon" aria-hidden="true">
											<use xlink:href="#icon-arrow-right"></use>
										</svg>
									</h3>
								</div>
							</a>

						</div>
						<div class="col-6 col-lg-4">
							<a href="https://valais.epfl.ch/"  target="_blank" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-valais.jpg" class="img-fluid" title="Valais" alt="ALT OF IMAGE HERE">
								</picture>
								<div class="card-body">
									<h3 class="card-title link-icon mb-0 h5">
										Valais
										<svg class="icon" aria-hidden="true">
											<use xlink:href="#icon-arrow-right"></use>
										</svg>
									</h3>
								</div>
							</a>

						</div>
						<div class="col-6 col-lg-4">
							<a href="http://www.epfl.ae/" target="_blank" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-middle-east.jpg" class="img-fluid" title="Middle-East" alt="ALT OF IMAGE HERE">
								</picture>
								<div class="card-body">
									<h3 class="card-title link-icon mb-0 h5">
										Middle-East
										<svg class="icon" aria-hidden="true">
											<use xlink:href="#icon-arrow-right"></use>
										</svg>
									</h3>
								</div>
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid p-0">
			<div class="question">

				<div class="question-img">
					<picture>
						<source media="(min-width: 1140px)" srcset="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/spider.jpg 1x, https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/spider.jpg 2x">
						<source media="(min-width: 960px)" srcset="https://via.placeholder.com/475x267.jpg 1x,https://via.placeholder.com/950x534.jpg 2x">
						<source media="(min-width: 720px)" srcset="https://via.placeholder.com/400x225.jpg 1x,https://via.placeholder.com/800x450.jpg 2x">
						<source media="(min-width: 541px)" srcset="https://via.placeholder.com/720x405.jpg 1x,https://via.placeholder.com/1440x810.jpg 2x">
						<source media="(max-width: 540px)" srcset="https://via.placeholder.com/540x304.jpg 1x,https://via.placeholder.com/1080x608.jpg 2x">
						<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/spider.jpg" class="img-fluid" alt="ALT">
					</picture>
				</div>

				<div class="question-content">
					<p class="h3">A spider’s silk thread is proportionally:</p>

					<div class="question-answers">
						<input type="radio" id="custom-radio1" name="customRadio" class="custom-control-input" data-com.agilebits.onepassword.user-edited="yes">
						<label class="custom-control-label" for="custom-radio1">
							<span class="custom-control-label-content">
								More resistant than steel</span>
							<span class="trapeze-horizontal d-none d-lg-block"></span>
							<span class="trapeze-vertical d-lg-none"></span>
						</label>
						<input type="radio" id="custom-radio2" name="customRadio" class="custom-control-input" data-com.agilebits.onepassword.user-edited="yes">
						<label class="custom-control-label" for="custom-radio2">
							<span class="custom-control-label-content">
								Heavier than lead</span>
							<span class="trapeze-horizontal d-none d-lg-block"></span>
							<span class="trapeze-vertical d-lg-none"></span>
						</label>
						<input type="radio" id="custom-radio3" name="customRadio" class="custom-control-input" data-com.agilebits.onepassword.user-edited="yes">
						<label class="custom-control-label" for="custom-radio3">
							<span class="custom-control-label-content">
								More radioactive than radon</span>
							<span class="trapeze-horizontal d-none d-lg-block"></span>
							<span class="trapeze-vertical d-lg-none"></span>
						</label>
					</div>
				</div>
			</div>
		</div>


		<div class="fullwidth-teaser fullwidth-teaser-horizontal">
			<picture>
				<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/1024x1024.jpg" aria-labelledby="background-label" alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							Organoïds duplicates our organs in laboratory</h3>
						<ul class="list-inline mt-2">
							<li class="list-inline-item">News</li>
							<li class="list-inline-item">Biology</li>
						</ul>
					</div>
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
						Read the study
						<span class="sr-only">sur Tech Transfer.</span>
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						Tiny organs, no bigger than peppercorns, have been transforming stem cells research for the past 10 years and are bringing in vitro and in vivo closer together. 
						</p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="https://actu.epfl.ch/news/les-organoides-repliquent-nos-organes-en-laborat-2/" target="_blank" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none">Read the study</a>
				</div>
			</div>
		</div>

		<div class="bg-gray-100 py-5">
			<div class="container">
				<h2 class="h3">Get the pulse of the campuses through social channels</h2>
				<div class="social-feed">
					<div class="social-feed-item-container">
						<div class="social-feed-item">
							<span class="social-icon social-icon-twitter social-icon-round">
								<svg class="icon" aria-hidden="true">
									<use xlink:href="#icon-twitter"></use>
								</svg>
							</span>


							<div class="social-feed-item-content">
								<div>
									<p class="social-feed-header">
										<strong>@epflENAC</strong>
										<span class="text-small">il y a 8 heures</span>
									</p>
									<p>A Berlin, les étudiantes et étudiants de Dominique Perrault exposent leurs travaux à la galerie Aedes Architecture
										Forum du 27 janvier au 8 mars. @dpa_official http://www.aedes..</p>

									<picture>
										<source media="(min-width: 1140px)" srcset="https://via.placeholder.com/380x214.jpg 1x,https://via.placeholder.com/760x428.jpg 2x">
										<source media="(min-width: 960px)" srcset="https://via.placeholder.com/380x214.jpg 1x,https://via.placeholder.com/760x428.jpg 2x">
										<source media="(min-width: 720px)" srcset="https://via.placeholder.com/320x180.jpg 1x,https://via.placeholder.com/640x360.jpg 2x">
										<source media="(min-width: 541px)" srcset="https://via.placeholder.com/720x405.jpg 1x,https://via.placeholder.com/1440x810.jpg 2x">
										<source media="(max-width: 540px)" srcset="https://via.placeholder.com/540x304.jpg 1x,https://via.placeholder.com/1080x608.jpg 2x">
										<img src="https://via.placeholder.com/380x214.jpg" class="img-fluid" alt="ALT">
									</picture>

									<p>What's your fave spot for sunset on campus? 😎</p>
								</div>
								<div>
									<a class="btn btn-secondary mt-4">Follow us on Twitter</a>
								</div>
							</div>
						</div>
					</div>
					<div class="social-feed-item-container">
						<div class="social-feed-item">
							<span class="social-icon social-icon-instagram social-icon-round">
								<svg class="icon" aria-hidden="true">
									<use xlink:href="#icon-instagram"></use>
								</svg>
							</span>


							<div class="social-feed-item-content">
								<div>
									<p class="social-feed-header">
										<strong>@epflENAC</strong>
										<span class="text-small">il y a 8 heures</span>
									</p>
									<p>A Berlin, les étudiantes et étudiants de Dominique Perrault exposent leurs travaux à la galerie Aedes Architecture
										Forum du 27 janvier au 8 mars. @dpa_official http://www.aedes..</p>

									<picture>
										<source media="(min-width: 1140px)" srcset="https://via.placeholder.com/1140x1140.jpg 1x,https://via.placeholder.com/2280x2280.jpg 2x">
										<source media="(min-width: 960px)" srcset="https://via.placeholder.com/1140x1140.jpg 1x,https://via.placeholder.com/2280x2280.jpg 2x">
										<source media="(min-width: 720px)" srcset="https://via.placeholder.com/960x960.jpg 1x,https://via.placeholder.com/1920x1920.jpg 2x">
										<source media="(min-width: 541px)" srcset="https://via.placeholder.com/240x240.jpg 1x,https://via.placeholder.com/480x480.jpg 2x">
										<source media="(max-width: 540px)" srcset="https://via.placeholder.com/180x180.jpg 1x,https://via.placeholder.com/360x360.jpg 2x">
										<img src="https://via.placeholder.com/1140x1140.jpg" class="img-fluid" alt="ALT">
									</picture>
									<p>What's your fave spot for sunset on campus? 😎</p>
								</div>
								<div>
									<a class="btn btn-secondary mt-4">Join us on Instagram</a>
								</div>
							</div>
						</div>
					</div>
					<div class="social-feed-item-container">
						<div class="social-feed-item">
							<span class="social-icon social-icon-facebook social-icon-round">
								<svg class="icon" aria-hidden="true">
									<use xlink:href="#icon-facebook"></use>
								</svg>
							</span>


							<div class="social-feed-item-content">
								<div>
									<p class="social-feed-header">
										<strong>@epflENAC</strong>
										<span class="text-small">il y a 8 heures</span>
									</p>
									<p>A Berlin, les étudiantes et étudiants de Dominique Perrault exposent leurs travaux à la galerie Aedes Architecture
										Forum du 27 janvier au 8 mars. @dpa_official http://www.aedes..</p>

									<picture>
										<source media="(min-width: 1140px)" srcset="https://via.placeholder.com/380x214.jpg 1x,https://via.placeholder.com/760x428.jpg 2x">
										<source media="(min-width: 960px)" srcset="https://via.placeholder.com/380x214.jpg 1x,https://via.placeholder.com/760x428.jpg 2x">
										<source media="(min-width: 720px)" srcset="https://via.placeholder.com/320x180.jpg 1x,https://via.placeholder.com/640x360.jpg 2x">
										<source media="(min-width: 541px)" srcset="https://via.placeholder.com/720x405.jpg 1x,https://via.placeholder.com/1440x810.jpg 2x">
										<source media="(max-width: 540px)" srcset="https://via.placeholder.com/540x304.jpg 1x,https://via.placeholder.com/1080x608.jpg 2x">
										<img src="https://via.placeholder.com/380x214.jpg" class="img-fluid" alt="ALT">
									</picture>

									<p>What's your fave spot for sunset on campus? 😎</p>
								</div>
								<div>
									<a class="btn btn-secondary mt-4">Like us on Facebook</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="text-center">
					<a href="#">Complete list of our social accounts</a>
				</p>
			</div>
		</div>

	</main>
	<?php
get_footer();