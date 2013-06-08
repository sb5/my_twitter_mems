<head>
    <!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <!--site by Stephen Breighner!-->



    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php
        $title = $_SERVER['PHP_SELF'];
        $title = str_replace('/', '', $title);
        $title = explode('.', $title);
        $title = Ucfirst($title[0]);

        echo $title;
        ?> | Stephen Breighner Photography</title>
    <link type ="text/css" href="tm_style.css" media="all" rel="stylesheet"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>





