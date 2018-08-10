<?php
/**
 * @package epfl
 * Template Name: Mock homepage
 * Template Post Type: page
 */

init_globals();
get_header();
get_sidebar();
?>
	<main id="main" role="main" class="content">

		<div class="fullwidth-teaser fullwidth-teaser-horizontal mb-lg-5 mb-xl-0 mt-5 mt-lg-0">
			<style>
				.vimeo-wrapper iframe {
					width: 100%;
					height: 56.25vw;
					/* Given a 16:9 aspect ratio, 9/16*100 = 56.25 */
				}
			</style>

			<div class="vimeo-wrapper d-none d-xl-block">
				<iframe src="https://player.vimeo.com/video/276045972?background=1" class="bg-gray-100" style="border: none;" frameborder
				  "0" allowfullscreen></iframe>
			</div>

			<picture class="d-block d-xl-none">
				<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/of-mices-and-research.gif" alt="">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							The neurons that rewrite traumatic memories</h3>
						<!--	
								<ul class="list-inline mt-2">
									<li class="list-inline-item">Biology</li>
									<li class="list-inline-item">Brain</li>
								</ul>
							-->
					</div>
					<a href="https://actu.epfl.ch/news/the-neurons-that-rewrite-traumatic-memories/" aria-label="Link to read more of that page"
					  class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
						Read the article
						<span class="sr-only">sur Tech Transfer.</span>
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						Neuroscientists at EPFL have located the cells that help reprogram long-lasting memories of traumatic experiences towards
						safety, a first in neuroscience. The study is published in Science.</p>
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
										<span class="card-info-date">
											<time datetime="DATETIME HERE">24.06.18</time>
										</span>
										<span>Environment</span>
									</div>
									<p>Palm oil has become part of our daily lives, but a recent study by EPFL and the Swiss Federal Institute for Forest,
										Snow and Landscape Research (WSL) serves as a reminder that intensive farming of this crop has a major impact on
										the environment. Both short- and long-term solutions exist, however.</p>
								</div>
							</a>

						</div>
						<div class="col-md-6 d-flex">
							<a href="#" class="card link-trapeze-horizontal">
								<div class="card-body">
									<h3 class="card-title">“In research, you need a sense of daring”</h3>
									<div class="card-info">
										<span class="card-info-date">
											<time datetime="DATETIME HERE">21.06.18</time>
										</span>
										<span>Campus</span>
									</div>
									<p>Doris Leuthard, head of Switzerland’s Federal Department of the Environment, Transport, Energy and Communications, takes a hands-on approach. We spoke with her about the latest challenges in transport, energy and communication – three core areas of research at our school.</p>
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

				<h3 class="h6 mb-3 text-spread">Missions</h3>
				<div class="row mb-4">
					<div class="col-md-4 d-flex">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Education</a>
								</h3>
								<p>Tomorrow's engineers, scientists and architects will require more than just the skills they learn in the classroom. EPFL brings together all teaching levels and provides an innovative education to its 10'000 students.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="https://migration-wp.epfl.ch/www.epfl.ch/education/" class="btn btn-secondary btn-sm">Visit the education portal</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<a href="https://migration-wp.epfl.ch/www.epfl.ch/research/">Research</a>
								</h3>
								<p>With over 350 laboratories and research groups on campus, EPFL is one of Europe’s most innovative and productive scientific institutions. Ranked top 3 in Europe and top 20 worldwide in many scientific rankings, EPFL attracts the best researchers in their fields.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="https://migration-wp.epfl.ch/www.epfl.ch/research/" class="btn btn-secondary btn-sm">Explore the research portal</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Innovation</a>
								</h3>
								<p>Tech transfer is our second nature. We are experts at turning scientific excellency into value for companies and society at large. Our Innovation Park, which hosts 170 companies, creates a unique ecosystem that fosters innovation and entrepreneurship on campus.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="https://migration-wp.epfl.ch/www.epfl.ch/innovation/" class="btn btn-secondary btn-sm">Open the Innovation portal</a>
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
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/2-teaser-basic-page-column1.jpg" class="img-fluid"
									  title="Artlab" alt="ALT OF IMAGE HERE">
								</picture>
							</a>
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Artlab</a>
								</h3>
								<p>ArtLab represents a bridge between hard sciences and the humanities. Three separate spaces highlight the intersection of science, the public and the arts.</p>
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
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/2-teaser-basic-page-column2-1.jpg" class="img-fluid"
									  title="Rolex Center" alt="ALT OF IMAGE HERE">
								</picture>
							</a>
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Rolex Learning Center</a>
								</h3>
								<p>The Rolex Learning Center is both a living learning laboratory and a library sheltering more than 500’000 volumes
									in the heart of an international cultural center.</p>
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
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/2-teaser-basic-page-column3.jpg" class="img-fluid"
									  title="SwissTech CC" alt="ALT OF IMAGE HERE">
								</picture>
							</a>
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">SwissTech Convention Center</a>
								</h3>
								<p>The SwissTech Convention Center is one of the biggest convention venue around Lake Geneva. It hosts renown international
									events.
								</p>
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
				<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/3-teaser-basic-page-highlight.jpg" aria-labelledby="background-label"
				  alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							From Bachelor studies to continuing education</h3>
					</div>
					<a href="#" aria-label="En savoir plus sur Tech Transfer" class="btn btn-primary triangle-outer-bottom-right d-none d-xl-block">
						Learn more
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>Thirteen different engineering science programs, customised PhD programs, cutting-edge laboratories directed by internationally renowned professors, close ties to industry: EPFL offers an exceptional student experience to young people planning a higher education in science and technology.</p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="#" aria-label="En savoir plus sur Tech Transfer" class="btn btn-primary btn-block d-xl-none">Learn more</a>
				</div>
			</div>
		</div>



		<div class="bg-gray-100 py-5">
			<div class="datepicker-wrapper">

			</div>

			<div class="overflow-hidden">
				<div class="container">
					<h2 class="text-center mb-5">EPFL events</h2>
					<?php 
					$data = [];
					$highlight = [
							'img' => 'https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-1.png',
							'title' => 'Drone Days 18 dates announced!',
							'date' => '10.06.2018',
							'time_from' => '13:00',
							'time_to' => '17:30',
							'location' => 'ArtLab EPFL',
							'category' => 'Cultural event',
							'link' => '#',
						];
					array_push(
						$data,
						[
							'img' => 'https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-2.png',
							'title' => 'International Symposium on Chemical Biology 2018',
							'date' => '17.06.2018',
							'time_from' => '08:00',
							'time_to' => '18:00',
							'location' => 'Rolex Learning Center',
							'category' => 'Symposium',
							'link' => '#',
						],
						[
							'img' => 'https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-3.png',
							'title' => 'New neurons for old brains : adult neurogenesis in Alzheimer’s disease',
							'date' => '24.06.2018',
							'time_from' => '18:00',
							'time_to' => '20:00',
							'location' => 'SwissTech Convention Center',
							'category' => 'Conference',
							'link' => '#',
						],
						[
							'img' => 'https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-4.png',
							'title' => 'EuroTechPostdoc Programme: application platform is now open!',
							'date' => '07.07.2018',
							'time_from' => '09:00',
							'time_to' => '17:00',
							'location' => 'EPFL',
							'category' => 'Application',
							'link' => '#',
						],
						[
							'img' => 'https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-5.png',
							'title' => 'Startup Acceleration Workshops',
							'date' => '21.07.2018',
							'time_from' => '09:00',
							'time_to' => '15:30',
							'location' => 'Rolex Learning Center',
							'category' => 'Workshop',
							'link' => '#',
						],
						[
							'img' => 'https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-6.png',
							'title' => 'Movie-mercredi “Shaw of the Dead”
			- original version',
							'date' => '02.08.2018',
							'time_from' => '19:00',
							'time_to' => '21:00',
							'location' => 'ArtLab EPFL',
							'category' => 'Movie',
							'link' => '#',
						]
					);

			?>

					<div class="card-slider-wrapper mb-4">
						<div class="card-slider">

							<div class="card-slider-cell card-slider-cell-lg">
								<a href="#" class="card card-gray link-trapeze-horizontal">
									<div class="card-body">
										<picture class="card-img-top">
											<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/event-teaser-1.png" class="img-fluid" title="Image title" alt="Image alt description" />
										</picture>

										<h3 class="card-title">EPFL Drone Days 2018 dates have been announced!</h3>
										<p>1—3 September 2018, more than 5,000 people will be treated to drone races, showcases, conferences and demos on the EPFL's campus.</p>
										<div class="card-info">
											<span class="card-info-date">10.01.2018</span>
											<span>13:00</span>
											<span>17:30</span>
											<p>
												Lieu :
												<b>Laboratoire ALICE</b>
												<br>Organisé par
												<b>Campus Farmers (Unipoly)</b>
												<br>
											</p>
										</div>
									</div>
								</a>
							</div>

							<?php foreach ($data as $d): ?>

							<div class="card-slider-cell">
								<a href="<?php echo $d['link'] ?>" class="card card-gray link-trapeze-horizontal">
									<div class="card-body">
										<picture class="card-img-top">
											<img src="<?php echo $d['img'] ?>" class="img-fluid" title="Image title" alt="Image alt description" />
										</picture>

										<h3 class="card-title">
											<?php echo $d['title'] ?>
										</h3>
										<div class="card-info">
											<span class="card-info-date">
												<?php echo $d['date'] ?>
											</span>
											<span>
												<?php echo $d['time_from'] ?>
											</span>
											<span>
												<?php echo $d['time_to'] ?>
											</span>
											<p>
												Lieu :
												<b>
													<?php echo $d['location'] ?>
												</b>
												<br> Catégorie :
												<b>
													<?php echo $d['category'] ?>
												</b>
												<br> </p>
										</div>
									</div>
								</a>
							</div>

							<?php endforeach; ?>

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
								<a href="#">See events complete list</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fullwidth-teaser fullwidth-teaser-horizontal">
			<picture>
				<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/Andrea_Rinaldo-1600px.jpg" aria-labelledby="background-label"
				  alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							Andrea Rinaldo elected to the American Academy of Arts and Sciences</h3>
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
						Professor Andrea Rinaldo, the director of the Laboratory of Ecohydrology in EPFL's School of Architecture, Civil and Environmental
						Engineering, has been elected to the American Academy of Arts and Sciences, one of the leading scientific societies
						in the world.</p>
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
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-lausanne-1.jpg" class="img-fluid"
									  title="Lausanne" alt="ALT OF IMAGE HERE">
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
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-geneva.jpg" class="img-fluid"
									  title="Genève" alt="ALT OF IMAGE HERE">
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
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-neuchatel.jpg" class="img-fluid"
									  title="Neuchâtel" alt="ALT OF IMAGE HERE">
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
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-fribourg.jpg" class="img-fluid"
									  title="Fribourg" alt="ALT OF IMAGE HERE">
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
							<a href="https://valais.epfl.ch/" target="_blank" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-valais.jpg" class="img-fluid"
									  title="Valais" alt="ALT OF IMAGE HERE">
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
									<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/5-teaser-mission-research-middle-east.jpg"
									  class="img-fluid" title="Middle East" alt="ALT OF IMAGE HERE">
								</picture>
								<div class="card-body">
									<h3 class="card-title link-icon mb-0 h5">
										Middle East
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

		<div class="container-fluid p-0 my-3">
			<div class="question">

				<div class="question-img">
					<picture>
						<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/science-questions-children.jpg" class="img-fluid" alt="ALT">
					</picture>
				</div>

				<div class="question-content">
					<h4 class="mb-4">Science question</h4>
					<p class="h3">Children’s muscles tire less quickly than adults’ because:</p>

					<div class="question-answers">
						<input type="radio" id="custom-radio1" name="customRadio" class="custom-control-input">
						<label class="custom-control-label" for="custom-radio1">
							<span class="custom-control-label-content">
								Children’s muscles generate less of an effort</span>
							<span class="trapeze-horizontal d-none d-lg-block"></span>
							<span class="trapeze-vertical d-lg-none"></span>
						</label>
						<input type="radio" id="custom-radio2" name="customRadio" class="custom-control-input">
						<label class="custom-control-label" for="custom-radio2">
							<span class="custom-control-label-content">
								Children have a lower body mass</span>
							<span class="trapeze-horizontal d-none d-lg-block"></span>
							<span class="trapeze-vertical d-lg-none"></span>
						</label>
						<input type="radio" id="custom-radio3" name="customRadio" class="custom-control-input">
						<label class="custom-control-label" for="custom-radio3">
							<span class="custom-control-label-content">
								Children’s muscle fibers show greater endurance</span>
							<span class="trapeze-horizontal d-none d-lg-block"></span>
							<span class="trapeze-vertical d-lg-none"></span>
						</label>
					</div>
					<br>
					<button class="btn btn-primary">Vote</button>
				</div>
			</div>
		</div>


		<div class="fullwidth-teaser fullwidth-teaser-horizontal">
			<picture>
				<img src="https://migration-wp.epfl.ch/www.epfl.ch/wp-content/uploads/2018/06/1024x1024-e1529575766143.jpg" aria-labelledby="background-label"
				  alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							Organoïds duplicates our organs in laboratory</h3>
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
						Tiny organs, no bigger than peppercorns, have been transforming stem cells research for the past 10 years and are bringing
						in vitro and in vivo closer together.
					</p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="https://actu.epfl.ch/news/les-organoides-repliquent-nos-organes-en-laborat-2/" target="_blank" aria-label="Link to read more of that page"
					  class="btn btn-primary btn-block d-xl-none">Read the study</a>
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
										<strong>@epfl</strong>
										<span class="text-small">42 minutes ago</span>
									</p>
									<p>A Berlin, les étudiantes et étudiants de Dominique Perrault exposent leurs travaux à la galerie Aedes Architecture
										Forum du 27 janvier au 8 mars. @dpa_official http://www.aedes..</p>

									<picture>
										<img src="https://pbs.twimg.com/card_img/1009103614688792576/gwCLZx0F?format=jpg&name=600x314" class="img-fluid" alt="ALT">
									</picture>
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
										<strong>@epflcampus</strong>
										<span class="text-small">8 hours ago</span>
									</p>
									<p>Where is the skate emoji? #epfl #epflskate #rolexlearningcenter #vivapoly2018 #Vivapoly #epflshapes #epflstudents #epflcampus #skateboard</p>

									<picture>
										<img src="https://shft.cl/img/i/instagram.flhr5-1.fna.fbcdn.net-732522343920240.jpg" class="img-fluid" alt="ALT">
									</picture>
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
										<strong>@epflcampus</strong>
										<span class="text-small">2 days ago</span>
									</p>
									<p>Tall Amazonian trees are more resistant to precipitation variations than shorter ones. This information is key to more accurately predicting how the rainforest will react to climate change. #epflENAC</p>

									<picture>
										<img src="https://actu.epfl.ch/image/66588/652x367.jpg" class="img-fluid" alt="ALT">
									</picture>
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

	</main>
	<?php
get_footer();
