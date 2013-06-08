<head>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<!--site by Stephen Breighner special thanks to Twitter Bootstrap!-->



<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php 

$title = $_SERVER['PHP_SELF'];
$title = str_replace('/','',$title);
$title = explode('.',$title);
$title = Ucfirst($title[0]);
//put whatever after the | below for ur site
echo $title; ?> | Stephen Breighner Photography</title>

<style>body{margin: 20px:}.tweets, #img{text-align: center; }</style>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" /> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>





