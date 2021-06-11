<?php 
session_start();
if (!isset($_SESSION['logged_user'])){
    header('Location: index.php');
    die();
}

$user_login = $_SESSION['logged_user']['username'];
$get_user_login = $_GET['username'];
$uniquecode = $_GET['uniquecode'];
$orderid = $_GET['orderid'];

include 'db.php';

/////////////////////////////////
if (isset($_GET['uniquecode']))
   {

  $seller = 844699;
  $ID = "AFB82B6EC7B34553AD9BFD4C8021574D";
  $timestamp = $_SERVER['REQUEST_TIME'];
  $ID .= $timestamp;
  $sign = hash('sha256', $ID);

  $data = array(
      'seller_id' => $seller,
      'timestamp' => $timestamp,
      'sign' => $sign
      );

  $payload = json_encode($data);

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL,"https://api.digiseller.ru/api/apilogin");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "Accept: application/json"
    ));

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $server_output = curl_exec($ch);
 
  $exited = json_decode($server_output);

  curl_close ($ch);

  $retval_from_token = $exited->retval;

  if ($retval_from_token == 0) {
    $token = $exited->token;

    $url = 'https://oplata.info/api/purchases/unique-code/';

        $ch2 = curl_init();

        curl_setopt($ch2, CURLOPT_URL, $url.$uniquecode. '?token=' .$token );
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT , 7); 
        curl_setopt($ch2, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch2, CURLOPT_HEADER, array(
        "Accept: application/json"
      ));
        curl_setopt( $ch2, CURLOPT_HEADER, false );
        
        $result = curl_exec($ch);
        curl_close($ch2);

        $exited_2 = json_decode($result);
        $retval_from_code = $exited_2->retval;
        $date_pay = $exited_2->date_pay;
        $amount = $exited_2->amount;

    if($retval_from_code == 0){

      mysqli_select_db($conn,$db);

        $check_day = mysqli_query($conn, "SELECT `uniquecode` FROM `day` WHERE `uniquecode`='$uniquecode'");
        $check_week = mysqli_query($conn, "SELECT `uniquecode` FROM `week` WHERE `uniquecode`='$uniquecode'");
        $check_month = mysqli_query($conn, "SELECT `uniquecode` FROM `month` WHERE `uniquecode`='$uniquecode'");

        $match_day = mysqli_num_rows($check_day);
        $match_week = mysqli_num_rows($check_week);
        $match_month = mysqli_num_rows($check_month);
          if($match_day.$match_week.$match_month < 1) {
          
          if ($amount == 55){

          $writingcode = mysqli_query($conn, "UPDATE `day` SET `uniquecode` = '$uniquecode', `username` = '$user_login', `timedate` = '$date_pay' WHERE `username` IS NULL AND `uniquecode` IS NULL LIMIT 1");
          $day = mysqli_query($conn, "SELECT `promocode` FROM `day` WHERE `username` = '$user_login' AND `username` = '$get_user_login' AND `uniquecode` = '$uniquecode'");

          while ($row = $day->fetch_assoc()) {
              $promocode = $row['promocode'];
          }
        }

        if ($amount == 139){

          $writingcode = mysqli_query($conn, "UPDATE `week` SET `uniquecode` = '$uniquecode', `username` = '$user_login', `timedate` = '$date_pay' WHERE `username` IS NULL AND `uniquecode` IS NULL LIMIT 1");
          $week = mysqli_query($conn, "SELECT `promocode` FROM `week` WHERE `username` = '$user_login' AND `username` = '$get_user_login' AND `uniquecode` = '$uniquecode'");

          while ($row = $week->fetch_assoc()) {
              $promocode = $row['promocode'];
          }

        }

        if ($amount == 349){

          $writingcode = mysqli_query($conn, "UPDATE `month` SET `uniquecode` = '$uniquecode', `username` = '$user_login', `timedate` = '$date_pay' WHERE `username` IS NULL AND `uniquecode` IS NULL LIMIT 1");
          $month = mysqli_query($conn, "SELECT `promocode` FROM `month` WHERE `username` = '$user_login' AND `username` = '$get_user_login' AND `uniquecode` = '$uniquecode'");

          while ($row = $month->fetch_assoc()) {
              $promocode = $row['promocode'];
            } 

          }
        }
      }
    }
  }

////////////////////////

?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <title>Инструкция по установке Minority</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">


  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="images/favicon.ico" rel="icon" type="image/x-icon">
  <!-- FONTS -->
  <link rel="stylesheet" href="css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
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
                  <a class="nav-link smoothscroll" href="logged.php#home-section">Minority</a>
                </li>
                <li>
                  <a class="nav-link smoothscroll" href="logged.php#functions">Функции</a>
                </li>
                <li>
                  <a class="nav-link smoothscroll" href="logged.php#gallery">Галерея</a>
                </li>
                <li>
                  <a class="nav-link smoothscroll" href="logged.php#buy">Купить</a>
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

    <div class="bgimg">
    
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7 title">
            <h2 class="">Гайд</h2>
            <p class="lead mx-auto desc mb-5">По установке Minority</p>
          </div>
        </div>
      </div>
    
    </div>

    <div class="site-section tutorial">
					<div class="l-contained">
							<h1 class="subtitle">
                <?php
                if (isset($_GET['uniquecode'])) {
                  
                
                  $errors = array();
                    require_once 'utils.php';
                    $zone = new UcZone('A3i8TiMKz7Sndpe8PB8l091qz9RXA-1z');
                    $res  = $zone->upgrade($_SESSION['logged_user']['username'], $_SESSION['user_login_info']['password'], $promocode);
                    
                    
                    if (!$res) {
                        $errors[] = $zone->last_error();
                    } else {
                      //Здесь можно добавить обновление subscribe_end
                        //$_SESSION['logged_user'] = $res;
                        //$_SESSION['user_login_info'] = $data;
                        echo "<div style='color: #169414'>Поздравляем, подписка успешно активирована!</div>"; 
                        
                        
                    }
                    
                    if (!empty($errors)) {

                       echo '<div style="color: #941414">С активацией Вашей подиписки что-то пошло не так. Обратитесь к администратору!</div>';
                    }
                }
                    
                

                ?>
                 <br>
								Как установить?
							</h1>
						<ul class="timeline-list">
							<li>
                  <div class="content">
								<h3>Установка лаунчера</h3>
						
								<p>
									Скачайте и запустите наш установщик: <a href="https://dist.uc.zone/UmbrellaInstaller.exe">СКАЧАТЬ</a>. Он автоматически установит нужное ПО, выберет папку, и создаст иконку чита на рабочем столе.

                  

								</p>
                </div>
							</li>
							<li>
                  <div class="content">
								<h3>Авторизация в лаунчере</h3>
							
								<p>
									Находим иконку чита на рабочем столе и запускаем. Вводите свои данные с сайта uc.zone. После авторизации выбираем в лоадере Minority [DotA2] [Public Build] и нажимаем Launch DotA 2.
									<img src="images/tutorial_1.jpg">
								</p>
                </div>
							</li>
							<li>
                  <div class="content">
								<h3>Запуск</h3>
							
						
								<p>
									Лаунчер сам запустит доту и появится меню чита.
									<img src="images/tutorial_2.jpg">
								</p>
                </div>
							</li>
						
						</ul>
						
								
						
					</div>
    </div>	


    <footer class="footer-section">
      <div class="container">

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <p class="copyright">2020</p>
            </div>
          </div>
        </div>
      </div>
    </footer>



  </div>
  <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="//code-ya.jivosite.com/widget/YoMYSAyO1N" async></script> 




  <script src="js/main.js"></script>

</body>

</html>