<?php

get_header(); 
	$lang = 'ru';
	$altLang = 'en';

	$urlLang = $_GET["lang"]; //getting language from the query string

	if ($urlLang && strcmp($urlLang, $lang) < 0) { //swap language settings
		$tmp = $lang;
		$lang = $altLang;
		$altLang=$tmp;
	}
?>


	<!--**************** MAIN ****************-->
	<div id="main">

	<?php if($lang == 'en') {?>
		<!--**************** CONTENT EN****************-->
		<div id="content">

			<!--**************** SLIDER ****************-->
			<div class="slider">
				<div class="innerSlider">
					<div class="sliderItem" style="background-image: url('/wp-content/themes/fabrika.space/img/sliderHomePage/cosmopolitan.jpg');" data-title="Ground floor - Bar and restaurant"></div>
					<div class="sliderItem" style="background-image: url('/wp-content/themes/fabrika.space/img/sliderHomePage/eventzone2.jpg');" data-title="1st floor - Event-zone"></div>
					<div class="sliderItem" style="background-image: url('/wp-content/themes/fabrika.space/img/sliderHomePage/imgSliderConferenceService.jpg');" data-title="2nd floor - Event-zone"></div>
					<div class="sliderItem" style="background-image: url('/wp-content/themes/fabrika.space/img/sliderHomePage/coworking.jpg');" data-title="3rd floor - Coworking"></div>
				</div>

				<div class="arrows">
					<div class="leftArrow"></div>
					<div class="rightArrow"></div>
				</div>
				<div class="data">
					<span class="title"></span>
				</div>
			</div><!-- end .slider-->

			<!--**************** INTRODUCTION ****************-->
			<div class="introduction">
				<div class="blockContacts">
					<div class="blockContactsText">
						<ul>
							<li><span class="icon_location">Blagovischenska str. 1, Kharkiv, Ukraine</span></li>
							<li>
								<span class="icon_tel">Event-zone/Coworking:</span><br/>
								<a href="tel:+380681001133">+38 (068) 100 11 33</a><br/>
								<a href="tel:+380995023246">+38 (099) 502 32 46</a>
							</li>
							<li>
								<span class="icon_tel">Bar/Restaurant:</span><br/>
								<a href="tel:+380681001155">+38 (068) 100 11 55</a><br/>
							</li>
							<li><a href="mailto:info@fabrika.space" class="icon_mail">info@fabrika.space</a></li>
						</ul>
					</div>
					<div class="social">
						<ul>
							<li><a href="http://facebook.com/fabrika.space/" class="icon_fb"></a></li>
							<li><a href="http://twitter.com/_fabrika_" class="icon_tw"></a></li>
							<li><a href="https://www.instagram.com/fabrika.space/" class="icon_instagram"></a></li>
							<li><a href="https://vk.com/fabrika.space" class="icon_vk"></a></li>
							<li><a href="https://foursquare.com/v/fabrika/55565bbf498eae863fff5b6c" class="icon_location"></a></li>
						</ul>
					</div>
				</div>
				<?php
					$args = array( 'category_name' => 'Description');
					$postslist = get_posts( $args );
					$pID = $postslist[0]->ID;
					setup_postdata( $postslist[0] );
					?>
				<div class="introductionText">
					<div class="siteTitle">
						<span class="innerSiteTitle">Fabrika.space: coworking, event zone, bar and lots of inspiration</span>
					</div>
					<div class="siteDescription">
						<p>Fabrika.space is a perfect combination of bar, restaurant, coworking and event zone. We have carefully reconstructed the factory built in 1933 and turned it into a place for meeting friends and business partners, work and leisure.</p><br /><br />
						<p>Our guests work in coworking space on the fourth floor; go to meetups, seminars, conferences which are held in the event zone on 3 and 2 floors and then meet their friends at the bar on the first floor.</p>
					</div>
					
				</div>
				<?php
					wp_reset_postdata();?>
			</div><!-- end .introduction-->

			<!--**************** PARTS_OF_BUILDING ****************-->
			<div class="section partsOfBuilding">
				<div class="sectionTitle">We are</div>
				<div class="sectionContent">
					<a href="/coworking/" class="item">
						<div class="itemImg">
							<img src="/wp-content/themes/fabrika.space/img/coworking.jpg" />
						</div>
						<div class="itemLayerOverImg">
							<div class="itemTitle">Coworking</div>
							<div class="itemDesc">
								<div class="txt">Coworking – everything that a freelancer or a small company needs</div>
								<span class="readMore">read more</span>
							</div>
						</div>
					</a>
					<a href="/event-zone/" class="item">
						<div class="itemImg">
							<img src="/wp-content/themes/fabrika.space/img/conferenceService.jpg" />
						</div>
						<div class="itemLayerOverImg">
							<div class="itemTitle">Event-zone</div>
							<div class="itemDesc">
								<div class="txt">Event-zone - this is where you may find something new</div>
								<span class="readMore">read more</span>
							</div>
						</div>
					</a>
					<a href="/bar/" class="item">
						<div class="itemImg">
							<img src="/wp-content/themes/fabrika.space/img/bar.jpg" />
						</div>
						<div class="itemLayerOverImg">
							<div class="itemTitle">Bar</div>
							<div class="itemDesc">
								<div class="txt">Bar – favorite place of our guests</div>
								<span class="readMore">read more</span>
							</div>
						</div>
					</a>
				</div>
			</div><!-- end .partsOfBuilding-->

			<!--**************** NEWS ****************-->
			<div class="section news">
				<div class="sectionTitle">News</div>
				<div class="sectionContent">
					<?php
						$args = array( 'category_name' => 'News', 
									'posts_per_page' => 3, 
									'orderby' => 'post_date',
									'meta_query' => array(
										array(
											'key' => 'lang',
											'value' => $lang) 
									) );
						$postslist = get_posts( $args );
						$latest=true;

						foreach ( $postslist as $post ) :
						  setup_postdata( $post ); 
							if($latest){?> 
									<a href="<?php the_permalink(); ?>" class="lastnews">
										<?php
											$img = get_post_meta($post->ID, 'Photo', true);
											if($img){ 
										?>
											<div class="imgLastnews">
												<img src="<?php echo $img; ?>" />
											</div>
										<?php } ?>	
										<div class="contentLastnews">
											<span class="title"><?php the_title(); ?></span>
											<span class="date"><?php the_date(); ?></span>
											<span class="txt arrowReadMore"><?php the_excerpt(); ?></span>
										</div>
									</a>
									<div class="prevLastNews">
						<?php
								$latest=false;
							}else{
						?>

									<a href="<?php the_permalink(); ?>" class="item">
										<span class="title"><?php the_title(); ?></span>
										<span class="date"><?php unset($previousday); the_date(); ?></span>
										<span class="txt arrowReadMore"><?php the_excerpt(); ?></span>
									</a>
						<?php }

						endforeach; 
						wp_reset_postdata();
					?>
								</div>

				</div>
			</div><!-- end .news-->

			<!--**************** EVENTS ****************-->
			<div class="section events">
				<div class="sectionTitle">Events</div>
				<div class="sectionContent">
					<div class="leftArrow"></div>
					<div class="rightArrow"></div>
					
					<div class="listItems">

						<div class="innerListItems">
							<?php
								$querystr = "
											SELECT STR_TO_DATE(wpostmeta.meta_value, '%d-%m-%Y') as evdate, wposts.*
											FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
											WHERE wposts.ID = wpostmeta.post_id
											AND wpostmeta.meta_key = 'EventDate'
											AND wposts.post_status = 'publish'
											AND wposts.post_type = 'post'
											AND wposts.ID IN  (
											SELECT pm.post_id FROM $wpdb->postmeta pm, $wpdb->posts p
												WHERE (pm.post_id = p.ID)
												AND pm.meta_key = 'lang'
                                                AND pm.meta_value = 'en'
											)
											ORDER BY evdate ASC";

								$pageposts = $wpdb->get_results($querystr, OBJECT);

								if ($pageposts){
									$no_active = true;
									$now_date = date_parse(date("Y-m-d"));

									foreach ( $pageposts as $post ) :
									  setup_postdata( $post ); 
										$eventDate = date_parse(get_post_meta($post->ID, 'EventDate', true));

										if($no_active && $eventDate >= $now_date){
											$no_active = false;
										?>
											<a href="<?php the_permalink(); ?>" class="item act">

										<?php }else{ ?>

											<a href="<?php the_permalink(); ?>" class="item">
										<?php } ?>

											<div class="itemContent">
												<div class="title"><div><span><?php the_title(); ?></span></div></div>
												<div class="dateTime">
													<span class="time">
														<span>&nbsp;</span><?php echo get_post_meta($post->ID, 'EventStartTime', true); ?><br /><span>&nbsp;</span>to<br /><span>&nbsp;</span><?php echo get_post_meta($post->ID, 'EventEndTime', true); ?>
													</span>
													<span class="date"><?php echo $eventDate['day']; ?></span>
													<span class="month"><?php echo date('F', mktime(0, 0, 0, $eventDate['month'], 10)); ?></span>
												</div>
											</div>
											<div class="itemImg">
												<img src="<?php echo get_post_meta($post->ID, 'Photo', true); ?>" />
											</div>
										</a>
									<?php

									endforeach;
								}
								wp_reset_postdata();
							?>

						</div>
					</div>
				</div>
			</div><!-- end .events-->

			<!--**************** GALLERY ****************-->
			<div class="section gallery">
				<div class="sectionContent">
				<?php
					$args = array( 'category_name' => 'Photo', 'posts_per_page' => 6, 'orderby' => 'rand' );
					$postslist = get_posts( $args );
					?>
					<div class="part">
						<div class="bigImg">
							<img src="<?php echo reset(get_attached_media('image', $postslist[0]->ID))->guid; ?>" />
							<div class="txt"><?php echo get_the_title($postslist[0]);?></div>
						</div>
						<div class="smallImages">
							<div class="smallImg">
								<img src="<?php echo reset(get_attached_media('image', $postslist[1]->ID))->guid; ?>" />
								<div class="txt"><?php echo get_the_title($postslist[1]);?></div>
							</div>
							<div class="smallImg">
								<img src="<?php echo reset(get_attached_media('image', $postslist[2]->ID))->guid; ?>" />
								<div class="txt"><?php echo get_the_title($postslist[2]);?></div>
							</div>
						</div>
					</div>
					<div class="part">
						<div class="bigImg">
							<img src="<?php echo reset(get_attached_media('image', $postslist[3]->ID))->guid; ?>" />
							<div class="txt"><?php echo get_the_title($postslist[3]);?></div>
						</div>
						<div class="smallImages">
							<div class="smallImg">
								<img src="<?php echo reset(get_attached_media('image', $postslist[4]->ID))->guid; ?>" />
								<div class="txt"><?php echo get_the_title($postslist[4]);?></div>
							</div>
							<div class="smallImg">
								<img src="<?php echo reset(get_attached_media('image', $postslist[5]->ID))->guid; ?>" />
								<div class="txt"><?php echo get_the_title($postslist[5]);?></div>
							</div>
						</div>
				<?php
					wp_reset_postdata();?>

					</div>
				</div>
			</div><!-- end .gallery-->

		</div><!-- end #content en-->
	<?php }else{ ?>
		<!--**************** CONTENT RU****************-->
		<div id="content">

			<!--**************** SLIDER ****************-->
			<div class="slider">
				<div class="innerSlider">
					<div class="sliderItem" style="background-image: url('/wp-content/themes/fabrika.space/img/sliderHomePage/cosmopolitan.jpg');" data-title="1 Этаж - Бар"></div>
					<div class="sliderItem" style="background-image: url('/wp-content/themes/fabrika.space/img/sliderHomePage/eventzone2.jpg');" data-title="2 Этаж - Ивент-зона"></div>
					<div class="sliderItem" style="background-image: url('/wp-content/themes/fabrika.space/img/sliderHomePage/imgSliderConferenceService.jpg');" data-title="3 Этаж - Ивент-зона"></div>
					<div class="sliderItem" style="background-image: url('/wp-content/themes/fabrika.space/img/sliderHomePage/coworking.jpg');" data-title="4 Этаж - Коворкинг"></div>
				</div>

				<div class="arrows">
					<div class="leftArrow"></div>
					<div class="rightArrow"></div>
				</div>
				<div class="data">
					<span class="title"></span>
				</div>
			</div><!-- end .slider-->

			<!--**************** INTRODUCTION ****************-->
			<div class="introduction">
				<div class="blockContacts">
					<div class="blockContactsText">
						<ul>
							<li><span class="icon_location">Харьков, ул. Благовещенская, 1</span></li>
							<li>
								<span class="icon_tel">Ивент-зона:</span><br/>
								<a href="tel:+380681001133">+38 (068) 100 11 33</a><br/>
								<a href="tel:+380995023246">+38 (099) 502 32 46</a><br/>
								<a href="tel:+380681001144">+38 (068) 100 11 44</a>
							</li>
							<li>
								<span class="icon_tel">Коворкинг:</span><br/>
								<a href="tel:+380681001177">+38 (068) 100 11 77</a>
							</li>
							<li>
								<span class="icon_tel">Бар/Ресторан:</span><br/>
								<a href="tel:+380681001155">+38 (068) 100 11 55</a>
							</li>
							<li>
								<span class="icon_tel">Организация банкетов, кейтеринг:</span><br/>
								<a href="tel:+380681001166">+38 (068) 100 11 66</a>
							</li>
							<li><a href="mailto:info@fabrika.space" class="icon_mail">info@fabrika.space</a></li>
						</ul>
					</div>
					<div class="social">
						<ul>
							<li><a href="http://facebook.com/fabrika.space/" class="icon_fb"></a></li>
							<li><a href="http://twitter.com/_fabrika_" class="icon_tw"></a></li>
							<li><a href="https://www.instagram.com/fabrika.space/" class="icon_instagram"></a></li>
							<li><a href="https://vk.com/fabrika.space" class="icon_vk"></a></li>
							<li><a href="https://foursquare.com/v/fabrika/55565bbf498eae863fff5b6c" class="icon_location"></a></li>
						</ul>
					</div>
				</div>
				<?php
					$args = array( 'category_name' => 'Description');
					$postslist = get_posts( $args );
					$pID = $postslist[0]->ID;
					setup_postdata( $postslist[0] );
					?>
				<div class="introductionText">
					<div class="siteTitle">
						<span class="innerSiteTitle"><?php echo get_the_title( $pID ); ?></span>
					</div>
					<a href="<?php echo get_permalink($pID); ?>" class="siteDescription arrowReadMore">
						<?php the_excerpt();?>
					</a>
				</div>
				<?php
					wp_reset_postdata();?>
			</div><!-- end .introduction-->

			<!--**************** PARTS_OF_BUILDING ****************-->
			<div class="section partsOfBuilding">
				<div class="sectionTitle">Мы</div>
				<div class="sectionContent">
					<a href="/coworking/" class="item">
						<div class="itemImg">
							<img src="/wp-content/themes/fabrika.space/img/coworking.jpg" />
						</div>
						<div class="itemLayerOverImg">
							<div class="itemTitle">Коворкинг</div>
							<div class="itemDesc">
								<div class="txt">Коворкинг – все, что нужно для фрилансера или небольшой компании</div>
								<span class="readMore">read more</span>
							</div>
						</div>
					</a>
					<a href="/event-zone/" class="item">
						<div class="itemImg">
							<img src="/wp-content/themes/fabrika.space/img/conferenceService.jpg" />
						</div>
						<div class="itemLayerOverImg">
							<div class="itemTitle">Ивент-зона</div>
							<div class="itemDesc">
								<div class="txt">Ивент-зона - площадка концентрации разнообразных мероприятий</div>
								<span class="readMore">read more</span>
							</div>
						</div>
					</a>
					<a href="/bar/" class="item">
						<div class="itemImg">
							<img src="/wp-content/themes/fabrika.space/img/bar.jpg" />
						</div>
						<div class="itemLayerOverImg">
							<div class="itemTitle">Бар</div>
							<div class="itemDesc">
								<div class="txt">Бар – любимое место всех гостей: оптимальное для переговоров, отдыха и общения</div>
								<span class="readMore">read more</span>
							</div>
						</div>
					</a>
				</div>
			</div><!-- end .partsOfBuilding-->

			<!--**************** NEWS ****************-->
			<div class="section news">
				<div class="sectionTitle">Новости</div>
				<div class="sectionContent">
					<?php
						$args = array( 'category_name' => 'News', 
										'posts_per_page' => 3, 
										'orderby' => 'post_date', 
										'meta_query' => array(
										array(
											'key' => 'lang',
											'compare' => 'NOT EXISTS') 
									));
						$postslist = get_posts( $args );
						$latest=true;

						foreach ( $postslist as $post ) :
						  setup_postdata( $post ); 
							if($latest){?> 
									<a href="<?php the_permalink(); ?>" class="lastnews">
										<?php
											$img = get_post_meta($post->ID, 'Photo', true);
											if($img){ 
										?>
											<div class="imgLastnews">
												<img src="<?php echo $img; ?>" />
											</div>
										<?php } ?>	
										<div class="contentLastnews">
											<span class="title"><?php the_title(); ?></span>
											<span class="date"><?php the_date(); ?></span>
											<span class="txt arrowReadMore"><?php the_excerpt(); ?></span>
										</div>
									</a>
									<div class="prevLastNews">
						<?php
								$latest=false;
							}else{
						?>

									<a href="<?php the_permalink(); ?>" class="item">
										<span class="title"><?php the_title(); ?></span>
										<span class="date"><?php unset($previousday); the_date(); ?></span>
										<span class="txt arrowReadMore"><?php the_excerpt(); ?></span>
									</a>
						<?php }

						endforeach; 
						wp_reset_postdata();
					?>
								</div>

				</div>
			</div><!-- end .news-->

			<!--**************** EVENTS ****************-->
			<div class="section events">
				<div class="sectionTitle">События</div>
				<div class="sectionContent">
					<div class="leftArrow"></div>
					<div class="rightArrow"></div>
					
					<div class="listItems">

						<div class="innerListItems">
							<?php
								$querystr = "
											SELECT STR_TO_DATE(wpostmeta.meta_value, '%d-%m-%Y') as evdate, wposts.*
											FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
											WHERE wposts.ID = wpostmeta.post_id
											AND wpostmeta.meta_key = 'EventDate'
											AND wposts.post_status = 'publish'
											AND wposts.post_type = 'post'
											AND wposts.ID NOT IN  (
												SELECT pm.post_id FROM $wpdb->postmeta pm, $wpdb->posts p
												WHERE (pm.post_id = p.ID)
												AND pm.meta_key = 'lang'
                                                AND pm.meta_value = 'en'
											)
											ORDER BY evdate ASC";

								$pageposts = $wpdb->get_results($querystr, OBJECT);

								if ($pageposts){
									$no_active = true;
									$now_date = date_parse(date("Y-m-d"));

									foreach ( $pageposts as $post ) :
									  setup_postdata( $post ); 
										$eventDate = date_parse(get_post_meta($post->ID, 'EventDate', true));
										$enMonths = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
										$ruMonths = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');

										if($no_active && $eventDate >= $now_date){
											$no_active = false;
										?>
											<a href="<?php the_permalink(); ?>" class="item act">

										<?php }else{ ?>

											<a href="<?php the_permalink(); ?>" class="item">
										<?php } ?>

											<div class="itemContent">
												<div class="title"><div><span><?php the_title(); ?></span></div></div>
												<div class="dateTime">
													<span class="time">
														<span>с</span><?php echo get_post_meta($post->ID, 'EventStartTime', true); ?><br /><span>по</span><?php echo get_post_meta($post->ID, 'EventEndTime', true); ?>
													</span>
													<span class="date"><?php echo $eventDate['day']; ?></span>
													<span class="month"><?php echo($lang=='ru'?$ruMonths[$eventDate['month']-1]:$enMonths[$eventDate['month']-1]) ?></span>
												</div>
											</div>
											<div class="itemImg">
												<img src="<?php echo get_post_meta($post->ID, 'Photo', true); ?>" />
											</div>
										</a>
									<?php

									endforeach;
								}
								wp_reset_postdata();
							?>

						</div>
					</div>
				</div>
			</div><!-- end .events-->

			<!--**************** GALLERY ****************-->
			<div class="section gallery">
				<div class="sectionContent">
				<?php
					$args = array( 'category_name' => 'Photo', 'posts_per_page' => 6, 'orderby' => 'rand' );
					$postslist = get_posts( $args );
					?>
					<div class="part">
						<div class="bigImg">
							<img src="<?php echo reset(get_attached_media('image', $postslist[0]->ID))->guid; ?>" />
							<div class="txt"><?php echo get_the_title($postslist[0]);?></div>
						</div>
						<div class="smallImages">
							<div class="smallImg">
								<img src="<?php echo reset(get_attached_media('image', $postslist[1]->ID))->guid; ?>" />
								<div class="txt"><?php echo get_the_title($postslist[1]);?></div>
							</div>
							<div class="smallImg">
								<img src="<?php echo reset(get_attached_media('image', $postslist[2]->ID))->guid; ?>" />
								<div class="txt"><?php echo get_the_title($postslist[2]);?></div>
							</div>
						</div>
					</div>
					<div class="part">
						<div class="bigImg">
							<img src="<?php echo reset(get_attached_media('image', $postslist[3]->ID))->guid; ?>" />
							<div class="txt"><?php echo get_the_title($postslist[3]);?></div>
						</div>
						<div class="smallImages">
							<div class="smallImg">
								<img src="<?php echo reset(get_attached_media('image', $postslist[4]->ID))->guid; ?>" />
								<div class="txt"><?php echo get_the_title($postslist[4]);?></div>
							</div>
							<div class="smallImg">
								<img src="<?php echo reset(get_attached_media('image', $postslist[5]->ID))->guid; ?>" />
								<div class="txt"><?php echo get_the_title($postslist[5]);?></div>
							</div>
						</div>
				<?php
					wp_reset_postdata();?>

					</div>
				</div>
			</div><!-- end .gallery-->

		</div><!-- end #content ru-->
	<?php } ?>
	</div><!-- end #main-->


	<!--****************FOOTER****************-->
	<script src="https://maps.googleapis.com/maps/api/js"></script>
		<script>
			function initialize() {
				var mapCanvas = document.getElementById('googleMap');
				var myLatlng = new google.maps.LatLng(49.98916, 36.22252);
				var mapOptions = {
					center: myLatlng,
					zoom: 16,
					mapTypeControl: false,
					draggable: false,
					scaleControl: false,
					scrollwheel: false,
					navigationControl: false,
					streetViewControl: false,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(mapCanvas, mapOptions)
				var marker = new google.maps.Marker({
					position: myLatlng,
					map: map,
					title: 'Fabrika',
				});
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		<div id="googleMap"></div>

<?php 
get_footer(); ?>
