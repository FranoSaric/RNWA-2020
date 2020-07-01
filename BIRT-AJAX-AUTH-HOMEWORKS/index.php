<!DOCTYPE html> 
<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="BIRT.css">
    <title>BIRT DATABASE</title>
</head>
<body>

    <div class="col-12 header">
      <h1 class="col-8">BIRT database</h1>
      <p class="col-4 logo">  </p>
    </div>
    
    <div class="row">
      <div class="col-12 menu">
        <ul>
          <li class="topnav" id="myTopnav">
            <a href="BIRT.html" class="active">Pocetna</a>
            <a href="javascript:void(0);" class="icon" onclick="navBarResponzive()"> 
          </li>
          <li>
            <a href="3.1/employees.html">DZ 3.1</a>
            <a href="javascript:void(0);" class="icon" onclick="navBarResponzive()"> 
          </li>
          <li>
            <a href="3.2/employees.html">DZ 3.2</a>
            <a href="javascript:void(0);" class="icon" onclick="navBarResponzive()">
          </li>
          <li>
            <a href="PZProducts/index.php">PZ Products</a>
            <a href="javascript:void(0);" class="icon" onclick="navBarResponzive()">
          </li>
          <li>
            <a href="PZOrders/indexOrder.php">PZ Orders</a>
            <a href="javascript:void(0);" class="icon" onclick="navBarResponzive()">
          </li>
          <li align="center">
            <?php
              if($login_button == '')
              {
                echo '<h3>Dobrodošli : '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                echo '<h3><a href="logout.php">Logout</h3></div>';
              }
              else
              {
                echo '<div align="center">'.$login_button . '</div>';
              }
            ?>
          </li>
          <li>
            <a href="login/login.php">LogIn/Registration</a>
            <a href="javascript:void(0);" class="icon" onclick="navBarResponzive()">
          </li>
        </ul>
         
         
      </div>

        <div class="col-9">
          <div class="main_frame">
                <div class="frame1 col-4">
                    <h1>Nešto o BIRT-u</h1>
                  <p class="frame1">
                    Tehnološka platforma otvorenog koda koja se koristi za stvaranje vizualizacija podataka i izvješća koja se mogu ugraditi u bogate klijentske i web aplikacije.</p>
                </div>
                <div class="frame1 col-8">
                    <h1>BIRT: The Groundswell</h1>
                  <p class="frame1">
                    Danas je platforma BIRT tehnologija jedna od najčešće prihvaćenih tehnologija za vizualizaciju i izvještavanje podataka s preko 12 milijuna preuzimanja i preko 2,5 milijuna programera u 157 zemalja. BIRT također ima veliku, aktivnu i rastuću zajednicu programera koja predstavlja sve vrste organizacija. Glavne tehnološke tvrtke poput IBM, Cisco, S1 i ABS Nautical Systems uvrstile su BIRT u svoje proizvodne linije.</p>
                </div>
            </div>
      </div>

      <div class="col-3 ">
        <div class="right-aside">
          <h3>Tim 15</h3>
            <p class="tim">
                <b>Studenti:</b> </br></br>
                Frano Šarić,  </br>
                Vedran Miletić </br></br>
                <b>Predmet: </b> </br></br>
                Razvoj naprednih web aplikacija</br></br></br>
                <b>Fakultet strojarstva, računarstva i elektrotehnike, Mostar</b>
            </p>
        </div>
      </div>
    </div>
    
    <div class="footer">
      <p>RNWA, 2020</p>
    </div>
    </body>
</html>