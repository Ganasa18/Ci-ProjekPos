<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
$ci = new CI_Controller();
$ci = &get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>404 Page Not Found</title>
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:700,900" rel="stylesheet">
  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>vendor/404/css/style.css" />
</head>

<body>
  <div id="notfound">
    <div class="notfound">
      <div class="notfound-404">
        <h1><?php echo $heading; ?></h1>
      </div>
      <h2><?php echo $message; ?></h2>
      <p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
      <a href="<?= base_url() ?>">Go To Homepage</a>
    </div>
  </div>
  <!-- This templates was made by Colorlib (https://colorlib.com) -->
</body>

</html>