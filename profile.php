<?php
session_start();
if (!isset($_SESSION['logged_user'])) {
    header('Location: index.php');
    die();
}

require_once 'utils.php';
$zone = new UcZone('A3i8TiMKz7Sndpe8PB8l091qz9RXA-1z');

$data = $_POST;

?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Страница пользователя Minority</title>
	<meta charset="utf-8">
	<meta name="Description" content="Удобный и многофункциональный софт для комфортной игры в dota 2"/>
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
	<link href="images/favicon.ico" rel="icon" type="image/x-icon">
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>

<body data-offset="300" data-spy="scroll" data-target=".site-navbar-target">
	<div class="page-bg">
		<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
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
				<div class="site-mobile-menu-close mt-3">	<span class="icon-close2 js-menu-toggle"></span>
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
								<li>	<a class="nav-link smoothscroll" href="logged.php#home-section">Minority</a>
								</li>
								<li>	<a class="nav-link smoothscroll" href="logged.php#functions">Функции</a>
								</li>
								<li>	<a class="nav-link smoothscroll" href="logged.php#gallery">Галерея</a>
								</li>
								<li>	<a class="nav-link smoothscroll" href="logged.php#buy">Купить</a>
								</li>
								<li>	<a class="nav-link" href="logout.php">Выйти</a>
								</li>
							</ul>
						</nav><a class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right" href="#"><span class="icon-menu h3"></span></a>
					</div>
				</div>
			</div>
		</header>
		<div class="site-section">
			<div class="container">
				<div class="container emp-profile">
					<form method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="profile-img">
									<img src="images/logo.png" alt="Minority_logo" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="profile-head">
									<h1>
                                        <?php echo $_SESSION['logged_user']['username']; ?>
                                    </h1>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="profile-work">

								<form method="POST">
									<div class="cta ml-right">	<a class="d-flex d-md-flex align-items-center btn_buy" data-toggle="modal" data-target="#cd-reset-password"><span class="mx-auto"><span>Сменить пароль  &nbsp; &nbsp; ➤</span></span></a>
									</div>
									<div class="cta ml-right">
											 
											<input value="Сбросить HWID &nbsp; &nbsp; ➤" type="submit" name="do_reset_hwid" class="d-flex d-md-flex align-items-center btn_buy" data-toggle="modal" data-target="#cd-hwid">

										
									</div>
									<div class="cta ml-right">
										<a class="d-flex d-md-flex align-items-center btn_buy" href="success.php">
											<span class="mx-auto"><span>Гайд по установке  &nbsp; &nbsp; ➤</span></span>
										</a>
									</div>
								</form>
								</div>
							</div>
							<div class="col-md-8">
								<div class="tab-content profile-tab" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="row">
											<div class="col-md-6">
												<label>Наличие подписки</label>
											</div>
											<div class="col-md-6" style="display: inherit;">
												<p><?=(time() > $_SESSION['subscribe_end']) ? 'нет' : 'есть' ;?> 
												<form action="profile.php" method="post">
													<input name='update' style="display: inline-block; border: none; background-color: #09475a00" type='submit' value='↺'>
												</form>
												</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Дата окончания подписки</label>
											</div>
											<div class="col-md-6">
												<p><?=date("Y-m-d H:i:s", $_SESSION['subscribe_end']);?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Email</label>
											</div>
											<div class="col-md-6">
												<p><?php echo $_SESSION['logged_user']['email']; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Дата последней покупки</label>
											</div>
											<div class="col-md-6">
												<p>Coming soon...</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Дата регистрации</label>
											</div>
											<div class="col-md-6">
												<p><?=date("Y-m-d H:i:s", $_SESSION['register_date']); ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="cd-reset-password" data-easein="fadeIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
			<!-- reset password form -->
			<div class="modal-header">
			<p><h1>Смена пароля</h1></p>
			</div>
			<form class="cd-form">
				<p class="fieldset">
					<label class="">Старый пароль</label>
					<input class="full-width has-padding has-border" id="reset-email" placeholder="******" type="password">
				</p>
				<p class="fieldset">
					<label class="">Новый пароль</label>
					<input class="full-width has-padding has-border" id="reset-email" placeholder="******" type="password">
				</p>
				<p class="fieldset">
					<label class="">Повторите новый пароль</label>
					<input class="full-width has-padding has-border" id="reset-email" placeholder="******" type="password">
				</p>
				<p class="fieldset">
					<input class="full-width has-padding" type="submit" value="Сменить пароль">
				</p>
			</form>
		</div>
	</div>
		</div>
				<div class="modal fade" id="cd-hwid" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
			<!-- reset password form -->
			<div class="modal-header">
			<p><h1>HWID</h1></p>
			</div>
			<form class="cd-form">
				<h2>Ваш HWID сбросится в течение нескольких минут</h2>
			</form>
		</div>

		<?php
                if (isset($_POST['do_reset_hwid'])) {
                  
                
                  $errors = array();
                    require_once 'utils.php';
                    $zone = new UcZone('A3i8TiMKz7Sndpe8PB8l091qz9RXA-1z');
                    $res  = $zone->resetHWID($_SESSION['logged_user']['username'], $_SESSION['user_login_info']['password']);
                    
                    
                    if (!$res) {
                        $errors[] = $zone->last_error();
                    } else {
                      //Здесь можно добавить обновление subscribe_end
                        //$_SESSION['logged_user'] = $res;
                        //$_SESSION['user_login_info'] = $data;
                        echo "<div style='color: #169414'>HWID успешно сбросится в течение нескольких минут</div>"; 
                        
                        
                    }
                    
                    if (!empty($errors)) {

                       var_dump($errors);
                    }
                }
                    
                

                ?>
	</div>
		</div>
		<!-- cd-reset-password -->
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