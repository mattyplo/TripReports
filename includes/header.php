<?php include 'includes/tp_config.php'?>
<!DOCTYPE html>
<html>
<head>
<title><?=$title?></title>
<meta name="viewport" content="width=device-width" />
<meta name="robots" content="noindex,nofollow" />
<meta charset="utf-8">
<link rel="stylesheet" href="css/temp.css" />
<link rel="stylesheet" href="css/temp2.css" />
<link rel="stylesheet" href="css/form.css" />
</head>
    
<body>
<!-- START WRAPPER -->
<div class="wrapper">
<header>
  <h1><a href="index.php">Trip Reports</a></h1>
  <nav>
    <ul class="topnav" id="myTopnav">
      <?=makeLinks($nav1)?>
      <li class="icon"> <a href="javascript:void(0);" onclick="myFunction()">&#9776</a></li>
    </ul>
  </nav>
</header>  
<!--end header.php include here-->
<section>
<h2 class="pageID"><?=$pageID?></h2> 
    