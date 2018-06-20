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
							Des océans plus froids que ce que nous le pensions </h3>
						<ul class="list-inline mt-2">
							<li class="list-inline-item">Actualités</li>
							<li class="list-inline-item">Biologie</li>
						</ul>
					</div>
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
						Lire l'article
						<span class="sr-only">sur Tech Transfer.</span>
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						Une équipe de chercheurs de l’EPFL et européenne a découvert une erreur dans la façon dont ont été estimées jusqu’ici les
						températures des océans, faisant potentiellement du réchauffement climatique actuel un évènement sans précédent ces
						cent derniers millions d’années. </p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none">En savoir plus</a>
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
									<h3 class="card-title">La valse quantique des électrons dessine les puces de demain</h3>
									<div class="card-info">
										<span>Actualité</span>
										<span>Nanotechnologies</span>
									</div>
									<p>Des chercheurs de l’EPFL ont réussi à mesurer certaines propriétés quantiques d’électrons de semi-conducteurs à
										deux dimensions. Leurs travaux dans le domaine de la spintronique pourraient notamment aboutir à la fabrication
										de puces plus petites et dégageant moins de chaleur.</p>
								</div>
							</a>

						</div>
						<div class="col-md-6 d-flex">
							<a href="#" class="card link-trapeze-horizontal">
								<div class="card-body">
									<h3 class="card-title">Un système intelligent et miniature qui analyse les biomarqueurs de la sueur</h3>
									<div class="card-info">
										<span class="card-info-date">
											<time datetime="DATETIME HERE">15.09.17</time>
										</span>
										<span>Recherche</span>
										<span>Prix et récompenses</span>
									</div>
									<p>Des chercheurs de l’EPFL et de la start-up Xsensio ont intégré sur une puce de moins d’un centimètre carré un système
										portable entier à faible énergie permettant l’encapsulation et l’analyse des biomarqueurs contenus dans la sueur.</p>
								</div>
							</a>

						</div>
					</div>
					<p class="text-center">
						<a class="link-pretty" href="https://actu.epfl.ch" target="_blank">Toutes les actualités</a>
					</p>
				</div>
			</div>
		</div>


		<div class="bg-gray-100 py-5">
			<div class="container">
				<h2 class="text-center mb-5">EPFL en bref</h2>

				<h3 class="h6 mb-3 text-spread">Les missions de l'école</h3>
				<div class="row mb-4">
					<div class="col-md-4 d-flex">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Éducation</a>
								</h3>
								<p>La qualité de formation des élèves et des enseignants à l’EPFL en fait l’une des institutions de science et de technologie
									les plus reconnues au monde.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="#" class="btn btn-secondary btn-sm">Portail Éducation</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Recherche</a>
								</h3>
								<p>Une organisation unique nous permet de figurer systématiquement dans le haut du classement mondial des universités
									pour les programmes de recherche.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="#" class="btn btn-secondary btn-sm">Portail Recherche</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Innovation</a>
								</h3>
								<p>Le transfert de technologies ou l’expertise de l’EPFL pour transformer l'excellence scientifique en valeur la société
									et le développement économique.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="#" class="btn btn-secondary btn-sm">Portail Innovation</a>
							</div>
						</div>

					</div>
				</div>

				<h3 class="h6 mb-3 text-spread">Les lieux totems</h3>
				<div class="row">
					<div class="col-md-4 d-flex">
						<div class="card">
							<a href="#" class="card-img-top">
								<picture>
									<img src="./images/homepage/2-teaser-basic-page-column1.jpg" class="img-fluid" title="Artlab" alt="ALT OF IMAGE HERE">
								</picture>
							</a>
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Artlab</a>
								</h3>
								<p>Le Artlab organise une grand diversité d’événements et en s’associant à des institutions culturelles de la région.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="#" class="btn btn-secondary btn-sm">Explorez le Artlab</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<a href="#" class="card-img-top">
								<picture>
									<img src="./images/homepage/2-teaser-basic-page-column2.jpg" class="img-fluid" title="Rolex Center" alt="ALT OF IMAGE HERE">
								</picture>
							</a>
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">Rolex Center</a>
								</h3>
								<p>Le Rolex Learning Center est à la fois un laboratoire d’apprentissage, une bibliothèque abritant 500’000 ouvrages
									et un centre culturel international.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="#" class="btn btn-secondary btn-sm">Découvrez le Rolex Center</a>
							</div>
						</div>

					</div>
					<div class="col-md-4 d-flex">
						<div class="card">
							<a href="#" class="card-img-top">
								<picture>
									<img src="./images/homepage/2-teaser-basic-page-column3.jpg" class="img-fluid" title="SwissTech CC" alt="ALT OF IMAGE HERE">
								</picture>
							</a>
							<div class="card-body">
								<h3 class="card-title">
									<a href="#">SwissTech CC</a>
								</h3>
								<p>Le SwissTech Convention Center est un des plus grand centre de congrès de la région lémanique accueillant des évènements
									de renommée internationale.</p>
							</div>
							<div class="card-footer mt-auto">
								<a href="#" class="btn btn-secondary btn-sm">Embarquez pour le SwissTech</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>


		<div class="fullwidth-teaser">
			<picture>
				<img src="./images/homepage/3-teaser-basic-page-highlight.jpg" aria-labelledby="background-label" alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							Étudier à l’EPFL, 13 filières de formation </h3>
					</div>
					<a href="#" aria-label="En savoir plus sur Tech Transfer" class="btn btn-primary triangle-outer-bottom-right d-none d-xl-block">
						En savoir plus
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						Treize filières de formation dans les sciences de l’ingénieur, des programmes doctoraux de choix, des laboratoires de pointe
						dirigés par des professeurs de réputation internationale, un campus moderne en plein développement qui s’étend sur
						plus de 10’000 mètres carrés. </p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="#" aria-label="En savoir plus sur Tech Transfer" class="btn btn-primary btn-block d-xl-none">En savoir plus</a>
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
													<img src="./images/event_teaser.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">Startup Acceleration Workshops</h3>
												<div class="card-info">
													<span class="card-info-date">10.01.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Lieu :
														<b>ArtLab EPFL</b>
														<br> Catégorie :
														<b>Événements culturel</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 32.03%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="./images/event_teaser.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">Startup Acceleration Workshops</h3>
												<div class="card-info">
													<span class="card-info-date">10.01.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Lieu :
														<b>ArtLab EPFL</b>
														<br> Catégorie :
														<b>Événements culturel</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 64.06%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="./images/event_teaser.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">Startup Acceleration Workshops</h3>
												<div class="card-info">
													<span class="card-info-date">10.01.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Lieu :
														<b>ArtLab EPFL</b>
														<br> Catégorie :
														<b>Événements culturel</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 96.09%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="./images/event_teaser.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">Startup Acceleration Workshops</h3>
												<div class="card-info">
													<span class="card-info-date">10.01.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Lieu :
														<b>ArtLab EPFL</b>
														<br> Catégorie :
														<b>Événements culturel</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 128.11%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="./images/event_teaser.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">Startup Acceleration Workshops</h3>
												<div class="card-info">
													<span class="card-info-date">10.01.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Lieu :
														<b>ArtLab EPFL</b>
														<br> Catégorie :
														<b>Événements culturel</b>
														<br> </p>
												</div>
											</div>
										</a>
									</div>
									<div class="card-slider-cell" aria-selected="false" style="position: absolute; left: 160.14%; height: 100%;">
										<a href="#" class="card card-gray link-trapeze-horizontal">
											<div class="card-body">
												<picture class="card-img-top">
													<img src="./images/event_teaser.png" class="img-fluid" title="Image title" alt="Image alt description">
												</picture>

												<h3 class="card-title">Startup Acceleration Workshops</h3>
												<div class="card-info">
													<span class="card-info-date">10.01.2018</span>
													<span>13:00</span>
													<span>17:30</span>
													<p>
														Lieu :
														<b>ArtLab EPFL</b>
														<br> Catégorie :
														<b>Événements culturel</b>
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
								<a href="#">Voir l’agenda complet des événements</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="fullwidth-teaser fullwidth-teaser-horizontal">
			<picture>
				<img src="./images/homepage/4-teaser-news-highlight.jpg" aria-labelledby="background-label" alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							Pour une transformation plus efficace des molécules </h3>
						<ul class="list-inline mt-2">
							<li class="list-inline-item">Actualités</li>
							<li class="list-inline-item">Biologie</li>
						</ul>
					</div>
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
						Lire l'article
						<span class="sr-only">sur Tech Transfer.</span>
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						Le chimiste Xile Hu est le lauréat du Prix Latsis 2017. Ce professeur à l’Ecole polytechnique fédérale de Lausanne est récompensé
						pour son impressionnante carrière scientifique et ses excellents travaux de recherche sur la compréhension fondamentale
						de la catalyse. </p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none">En savoir plus</a>
				</div>
			</div>
		</div>


		<div class="container py-6">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h2>Une école multi-sites, de Lausanne vers le monde</h2>
					<p class="h6">Une école, plusieurs campus</p>
				</div>
				<div class="col-lg-9 col-md-6">
					<div class="row">
						<div class="col-6 col-lg-4">
							<a href="#" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="./images/homepage/5-teaser-mission-research-lausanne.jpg" class="img-fluid" title="Lausanne" alt="ALT OF IMAGE HERE">
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
							<a href="#" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="./images/homepage/5-teaser-mission-research-geneva.jpg" class="img-fluid" title="Genève" alt="ALT OF IMAGE HERE">
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
							<a href="#" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="./images/homepage/5-teaser-mission-research-neuchatel.jpg" class="img-fluid" title="Neuchâtel" alt="ALT OF IMAGE HERE">
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
							<a href="#" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="./images/homepage/5-teaser-mission-research-fribourg.jpg" class="img-fluid" title="Fribourg" alt="ALT OF IMAGE HERE">
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
							<a href="#" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="./images/homepage/5-teaser-mission-research-valais.jpg" class="img-fluid" title="Valais" alt="ALT OF IMAGE HERE">
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
							<a href="#" class="card card-sm link-trapeze-horizontal">
								<picture class="card-img-top">
									<img src="./images/homepage/5-teaser-mission-research-middle-east.jpg" class="img-fluid" title="Middle-East" alt="ALT OF IMAGE HERE">
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


		<div class="fullwidth-teaser fullwidth-teaser-horizontal">
			<picture>
				<img src="./images/homepage/6-teaser-basic-page-highlight.jpg" aria-labelledby="background-label" alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							Explorer le portail étudiants de l'EPFL </h3>
						<ul class="list-inline mt-2">
							<li class="list-inline-item">Actualités</li>
							<li class="list-inline-item">Biologie</li>
						</ul>
					</div>
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
						Lire l'article
						<span class="sr-only">sur Tech Transfer.</span>
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						Découvrez l'ensemble des services dédiés aux étudiants : vie académique, cours, cartes d'accès et plans, transports et restauration.
						Mais aussi les bons plans, les réductions et les événements organisés par les nombreuses associations d'étudiants.
						</p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none">En savoir plus</a>
				</div>
			</div>
		</div>

		<div class="container-fluid p-0">
			<div class="question">

				<div class="question-img">
					<picture>
						<source media="(min-width: 1140px)" srcset="./images/homepage/7-science-question-SF.jpg 1x, ./images/homepage/7-science-question-SF.jpg 2x">
						<source media="(min-width: 960px)" srcset="https://via.placeholder.com/475x267.jpg 1x,https://via.placeholder.com/950x534.jpg 2x">
						<source media="(min-width: 720px)" srcset="https://via.placeholder.com/400x225.jpg 1x,https://via.placeholder.com/800x450.jpg 2x">
						<source media="(min-width: 541px)" srcset="https://via.placeholder.com/720x405.jpg 1x,https://via.placeholder.com/1440x810.jpg 2x">
						<source media="(max-width: 540px)" srcset="https://via.placeholder.com/540x304.jpg 1x,https://via.placeholder.com/1080x608.jpg 2x">
						<img src="./images/homepage/7-science-question-SF.jpg" class="img-fluid" alt="ALT">
					</picture>
				</div>

				<div class="question-content">
					<p class="h3">À quoi l'éternel brouillard de San Francisco est-il dû ?</p>

					<div class="question-answers">
						<input type="radio" id="custom-radio1" name="customRadio" class="custom-control-input" data-com.agilebits.onepassword.user-edited="yes">
						<label class="custom-control-label" for="custom-radio1">
							<span class="custom-control-label-content">
								Option 1</span>
							<span class="trapeze-horizontal d-none d-lg-block"></span>
							<span class="trapeze-vertical d-lg-none"></span>
						</label>
						<input type="radio" id="custom-radio2" name="customRadio" class="custom-control-input" data-com.agilebits.onepassword.user-edited="yes">
						<label class="custom-control-label" for="custom-radio2">
							<span class="custom-control-label-content">
								Option 2</span>
							<span class="trapeze-horizontal d-none d-lg-block"></span>
							<span class="trapeze-vertical d-lg-none"></span>
						</label>
						<input type="radio" id="custom-radio3" name="customRadio" class="custom-control-input" data-com.agilebits.onepassword.user-edited="yes">
						<label class="custom-control-label" for="custom-radio3">
							<span class="custom-control-label-content">
								Option 3</span>
							<span class="trapeze-horizontal d-none d-lg-block"></span>
							<span class="trapeze-vertical d-lg-none"></span>
						</label>
					</div>
				</div>
			</div>
		</div>


		<div class="fullwidth-teaser fullwidth-teaser-horizontal">
			<picture>
				<img src="./images/homepage/8-teaser-news-highlight.jpg" aria-labelledby="background-label" alt="An image description">
			</picture>

			<div class="fullwidth-teaser-text">

				<div class="fullwidth-teaser-header">
					<div class="fullwidth-teaser-title">
						<h3>
							L’EPFL vue du ciel </h3>
						<ul class="list-inline mt-2">
							<li class="list-inline-item">Actualités</li>
							<li class="list-inline-item">Biologie</li>
						</ul>
					</div>
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary triangle-outer-top-right d-none d-xl-block">
						Lire l'article
						<span class="sr-only">sur Tech Transfer.</span>
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-chevron-right"></use>
						</svg>
					</a>
				</div>

				<div class="fullwidth-teaser-content">
					<p>
						L'association Aéropoly a pris des images du campus à l'aide d'un dirigeable avant l'ouverture de Balélec. Le dirigeable avait
						déjà pris son envol une première fois pendant Polynice, événement organisé pour fêter les 60 ans de l'AGEPoly, soit
						l'association des étudiants de l'EPFL. </p>
				</div>

				<div class="fullwidth-teaser-footer">
					<a href="#" aria-label="Link to read more of that page" class="btn btn-primary btn-block d-xl-none">En savoir plus</a>
				</div>
			</div>
		</div>

		<div class="bg-gray-100 py-5">
			<div class="container">
				<h2 class="h3">Vivez au rythme de l’école, via les réseaux sociaux</h2>
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
									<a class="btn btn-secondary mt-4">Nous rejoindre sur Twitter</a>
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
									<a class="btn btn-secondary mt-4">Suivez-nous sur Instagram</a>
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
									<a class="btn btn-secondary mt-4">Likez notre page Facebook</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="text-center">
					<a href="#">Liste des comptes officiels</a>
				</p>
			</div>
		</div>

	</main>
	<?php
get_footer();