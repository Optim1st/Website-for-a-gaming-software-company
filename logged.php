<?php 
session_start();
if (!isset($_SESSION['logged_user'])){
    header('Location: index.php');
    die();
}

$user_login = $_SESSION['logged_user']['username'];
$user_email = $_SESSION['logged_user']['email'];

require_once 'utils.php';
$zone = new UcZone('A3i8TiMKz7Sndpe8PB8l091qz9RXA-1z');
          

?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
	<title>Приватный чит для DOTA 2 - Minority</title>
	<meta charset="utf-8">
	<meta name="Description" content="Чит для DOTA 2, который не дает спать спокойно Гейбу!"/>
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
	<link href="fonts/icomoon/style.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jquery-ui.css" rel="stylesheet">
	<link href="css/owl.carousel.min.css" rel="stylesheet">
	<link href="css/owl.theme.default.min.css" rel="stylesheet">
	<link href="css/owl.theme.default.min.css" rel="stylesheet">
	<link href="css/accordion.css" rel="stylesheet">                    
	<link href="css/jquery.fancybox.min.css" rel="stylesheet">
	<link href="fonts/flaticon/font/flaticon.css" rel="stylesheet">
	<link href="css/aos.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/modal.css" rel="stylesheet">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&display=swap" rel="stylesheet">
</head>
<body data-offset="300" data-spy="scroll" data-target=".site-navbar-target">
	<div class="page-bg" style="background-image: url(images/layout-bg.jpg);">
	<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
    	</div>
    </div>	
	<div class="site-wrap">
		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>
		<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
			<div class="container-fluid">
				<div class="d-flex align-items-center">
					<img class="site-logo" src="images/logo.png">
					<div class="ml-auto">
						<nav class="nav-menu site-navigation position-relative text-right" role="navigation">
							<ul class="js-clone-nav mr-auto d-none d-lg-block">
								
								<li>
									<a class="nav-link smoothscroll" href="#functions">Функции</a>
								</li>
								<li>
									<a class="nav-link smoothscroll" href="#gallery">Галерея</a>
								</li>
								<li>
									<a class="nav-link smoothscroll" href="#buy">Купить</a>
								</li>
								<li>

								<li>
									<a class="nav-link smoothscroll" href="#trainer-section">Отзывы</a>
								</li>

								<li>
									<a class="nav-link" href="profile.php">Профиль</a>
								</li>
							</ul>
						</nav><a class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right" href="#"><span class="icon-menu h3"></span></a>
					</div>
				</div>
			</div>
		</header>
		
		<div class="layout"> <br> <br> 
			<div class="site-section" id="advantages">
				<div class="container">
					<div class="row justify-content-center text-center mb-5" data-aos="fade-up">
						<div class="col-md-8 section-heading">
							<h2 class="heading mb-3">Преимущества</h2>
							<h3 class="p-desc">То, что отличает нас от остальных</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 mb-4 col-md-6" data-aos="flip-right" data-aos-delay="" data-aos-duration="1000">
							<div class="ftco-feature-1 adv-circle">
								<img class="brain-icon" src="images/brain.png">
								<div class="ftco-feature-1-text">
									<h2>Хуманайзер</h2>
									<p>При наблюдении за Вами, игроки не заметят ничего необычного</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 mb-4 col-md-6" data-aos="flip-right" data-aos-delay="300" data-aos-duration="1000">
							<div class="ftco-feature-1 adv-circle">
								<img class="def-icon" src="images/def.png">
								<div class="ftco-feature-1-text">
									<h2>Защита</h2>
									<p>Невозможно получить блокировку VAC</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 mb-4 col-md-6" data-aos="flip-right" data-aos-delay="600" data-aos-duration="1000">
							<div class="ftco-feature-1 adv-circle">
								<img class="skin-icon" src="images/skin.png">
								<div class="ftco-feature-1-text">
									<h2>Skin Changer</h2>
									<p>Любой скин из Dota 2 доступен бесплатно без лагов и лишних программ</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php

				include ('functions.php')

			 ?> 
			<br> <br>
			
			<div class="site-section" style="filter: drop-shadow(6px 8px 15px #095867);" id="gallery" data-aos="fade-up">
				<div class="gallery-section">
					<div class="row justify-content-center text-center mb-5">
						<div class="col-md-8 section-heading">
							<h2 class="heading mb-3">Галерея</h2>
							<h3 class="p-desc">То, как выглядит Minority</h3>
						</div>
					</div><!-- Slider -->
					<div class="owl-carousel nonloop-block-14 block-14">
						<div class="slide">
							<div class="ftco-feature-1">
								<a data-fancybox="images" href="screens/1.jpg"><img class="scale" src="screens/1_small.jpg"></a>
							</div>
						</div>
						<div class="slide">
							<div class="ftco-feature-1">
								<a data-fancybox="images" href="screens/2.jpg"><img class="scale" src="screens/2_small.jpg"></a>
							</div>
						</div>
						<div class="slide">
							<div class="ftco-feature-1">
								<a data-fancybox="images" href="screens/3.jpg"><img class="scale" src="screens/3_small.jpg"></a>
							</div>
						</div>
						<div class="slide">
							<div class="ftco-feature-1">
								<a data-fancybox="images" href="screens/4.jpg"><img class="scale" src="screens/4_small.jpg"></a>
							</div>
						</div>

						<div class="slide">
							<div class="ftco-feature-1">
								<a data-fancybox="images" href="screens/5.jpg"><img class="scale" src="screens/5_small.jpg"></a>
							</div>
						</div>
						
						<div class="slide">
							<div class="ftco-feature-1">
								<a data-fancybox="images" href="screens/6.jpg"><img class="scale" src="screens/6_small.jpg"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="background: linear-gradient(to left, #0c1621, #081019, #0c1620);">
			<div class="site-section" id="buy">
				<div class="container">
					<div class="row justify-content-center text-center mb-5">
						<div class="col-md-8 section-heading">
							
							<h2 class="heading mb-3">Покупка</h2>
							<h3 class="p-desc">Попробуйте Minority - почувствуйте игру по-новому</h3>
						</div>
					</div>
					<div class="pricing-table row justify-content-center">
	<div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100" data-aos-offset="200">
		<div class="card">
			<h6 class="type">1 День</h6>
			<div class="price">
				<span>₽</span>55
			</div>
			<div class="sale"> <center><h3>Скидка 30%</h3></center> </div>
			<ul class="details">
				<li>Доступ к приватному читу на 1 день</li>
				<li>Множество скриптов в дополнение</li>
				<li>Техническая поддержка 24/7</li>
			</ul>
			<div class="buy-button">
				<h3 class="btn">
					<form method="get" id="#myform" action="https://www.oplata.info/asp2/pay_wm.asp">
							<input type="hidden" name="id_d" value="3038884" />
							<input type="hidden" name="typecurr" value="WMR" />
							<input type="hidden" name="lang" value="ru-RU" />
							<input type="hidden" name="failpage" value="http://minority.pw" />
							<input type="hidden" name="agent" value="810759" />
							<input type="hidden" name="username" value='<?php echo $user_login ?>' />
							<input type="hidden" name="orderid" value="day" />
							<input class="btn input-btn" type="submit" value="Купить" />
					</form>
				</h3>
			</div>
		</div>
	</div>


	<div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="400" data-aos-offset="200">
		<div class="card">
			<h6 class="type">7 дней</h6>
			<div class="price">
				<span>₽</span>139
			</div>
			<div class="sale"> <center><h3>Скидка 30%</h3></center> </div>
			<ul class="details">
				<li>Доступ к приватному читу на 7 дней</li>
				<li>Множество скриптов в дополнение</li>
				<li>Техническая поддержка 24/7</li>
			</ul>
			<div class="buy-button">
				<h3 class="btn">
						<form method="get" id="#myform" action="https://www.oplata.info/asp2/pay_wm.asp">
							<input type="hidden" name="id_d" value="3038882" />
							<input type="hidden" name="typecurr" value="WMR" />
							<input type="hidden" name="lang" value="ru-RU" />
							<input type="hidden" name="failpage" value="http://minority.pw" />
							<input type="hidden" name="agent" value="810759" />
							<input type="hidden" name="username" value='<?php echo $user_login ?>' />
							<input type="hidden" name="orderid" value="week" />
							<input class="btn input-btn" type="submit" value="Купить">
					</form>
							</h3>
						</div>
					</div>
				</div>


				<div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="700" data-aos-offset="200">
					<div class="card">
						<h6 class="type">30 дней</h6>
						<div class="price">
							<span>₽</span>349
						</div>
						<div class="sale"> <center><h3>Скидка 30%</h3></center> </div>
						<ul class="details">
							<li>Доступ к приватному читу на 30 дней</li>
							<li>Множество скриптов в дополнение</li>
							<li>Техническая поддержка 24/7</li>
						</ul>
						<div class="buy-button">

							<h3 class="btn">
								<form method="get" id="#myform" action="https://www.oplata.info/asp2/pay_wm.asp">
									<input type="hidden" name="id_d" value="3038873" />
									<input type="hidden" name="typecurr" value="WMR" />
									<input type="hidden" name="lang" value="ru-RU" />
									<input type="hidden" name="failpage" value="http://minority.pw" />
									<input type="hidden" name="agent" value="810759" />
									<input type="hidden" name="username" value='<?php echo $user_login ?>' />
									<input type="hidden" name="orderid" value="Month" />
									<input class="btn input-btn" type="submit" value="Купить" />
								</form>
							</h3>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
			<hr class="line" align="center">
			<div class="site-section" id="trainer-section">
				<div class="container">
					<div class="row justify-content-center text-center mb-5" data-aos="fade-up">
						<div class="col-md-8 section-heading">
							<h2 class="heading mb-3">Отзывы о Minority</h2>
							<h3 class="p-desc">То, что говорят о нас известные личности</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="" data-aos-offset="300">
							<div class="person">
								<div class="imgholder">
									<div class="outer1 circle"></div>
									<div class="outer2 circle"></div>
									<figure>
										<img src="images/person_1.jpg">
									</figure>
								</div>
								<h3>Ярослав "NS" Кузнецов</h3>
								<p class="position">Бывший PRO-игрок, стример</p>
								<p>Скрипты дают невероятное преимущество! Вы видите все передвижения врагов, подсветку станов и направленных способностей! Одним словом — Имба.</p>
							</div>
						</div>
						<div class="col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100" data-aos-offset="300">
							<div class="person">
								<div class="imgholder">
									<div class="outer1 circle"></div>
									<div class="outer2 circle"></div>
									<figure>
										<img src="images/person_3.jpg">
									</figure>
								</div>
								<h3>Папич</h3>
								<p class="position">Стример</p>
								<p>Работяги, это невозможно победить... Он видит меня по всей карте, добивает меня автоматом и доджит мои станы. Это невозможно выиграть. GG WP.</p>
							</div>
						</div>
						<div class="col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200" data-aos-offset="300">
							<div class="person">
								<div class="imgholder">
									<div class="outer1 circle"></div>
									<div class="outer2 circle"></div>
									<figure>
										<img src="images/person_2.jpg">
									</figure>
								</div>
								<h3>Repachino</h3>
								<p class="position">Ютубер</p>
								<p>Да это же имба, поцаны! Я вижу все, что происходит на карте: кто фармит лес, кто где бегает, автоматически доджу станы и могу менять скины прямо в игре!</p>
							</div>
						</div>
						<div class="col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="300" data-aos-offset="300">
							<div class="person">
								<div class="imgholder">
									<div class="outer1 circle"></div>
									<div class="outer2 circle"></div>
									<figure>
										<img src="images/person_4.jpg">
									</figure>
								</div>
								<h3>Алексей «Tannim» Владимиров</h3>
								<p class="position">Основатель XONE</p>
								<p>С самого начала игры у вас будет преимущество. Вам осталось только правильно им распорядиться. Сломите волю соперника сломав все варды и не давайте фармить лес.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<div class="schedule-wrap2 clearfix">
				<div class="d-md-flex align-items-center">
					<div class="hours mr-md-4 mb-4 mb-lg-0">
						Остались вопросы? Задайте их в нашем онлайн-чате! ------->
					</div>
					<div class="cta ml-auto">
						<!-- <a class="d-flex d-md-flex align-items-center btn" href="#"><span class="mx-auto"><span>Группа</span> <span class="arrow icon-keyboard_arrow_right"></span></span></a> -->
					</div>
				</div>
			</div>
		</div>



	</div><!-- .site-wrap -->
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(67997194, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/67997194" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
	<script src="js/jquery-3.3.1.min.js">
	</script> 
	<script src="js/jquery-migrate-3.0.1.min.js">
	</script> 
	<script src="js/jquery-ui.js">
	</script> 
	<script src="js/popper.min.js">
	</script> 
	<script src="js/bootstrap.min.js">
	</script> 
	<script src="js/owl.carousel.min.js">
	</script> 
	<script src="js/jquery.stellar.min.js">
	</script> 
	<script src="js/jquery.easing.1.3.js">
	</script>
	<script src="js/aos.js">
	</script> 
	<script src="js/jquery.fancybox.min.js">
	</script> 
	<script src="js/jquery.sticky.js">
	</script>  
	<script src="js/main.js">
	</script>
	<script src="js/accordion.js">
	</script>
	<script src="//code-ya.jivosite.com/widget/YoMYSAyO1N" async></script> 
	
	
</body>
</html>