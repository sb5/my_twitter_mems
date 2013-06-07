<?php
//header is just link to stylesheet and jquery
include 'myheader.php';
echo '<h2 style = "text-shadow: 2px 2px 2px #CCCCCC;">My Twitter Memories</h2><h3>are you thinking of leaving the twiter world? Me too..anyways, maybe you should grab all of your tweets before u go?</h3>';
if(isset($_GET['name'])){
$name = htmlentities($_GET['name']);

$url = "https://api.twitter.com/1/statuses/user_timeline/$name.json?callback=?&count=2000";
//$url = 'http://www.stephenbreighner.com/tweet.json';
//$url = 'https://api.twitter.com/1/statuses/user_timeline.json?&screen_name=stvnphotography&count=2000';
///*
//the file get contents way
//$f = file_get_contents($url);


//echo file_get_contents($url);
//*the curl way
$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,$url);
curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
$f = curl_exec($curl_handle);
curl_close($curl_handle);

//echo $f;

echo '<div id ="img"></div><div class = "tweets">
    <ul></ul></div>
';
?><script>
$(document).ready(function() {
    loadTweets();
});
 
    function loadTweets(){
    var _url = <?php echo "'". $url ."'"; ?>;
  
    // var url = 
    $.getJSON(_url,function(data){
    // var tweet = data[0].text;
  
	
	var profileImg = data[0].user.profile_image_url_https;
	
	$("#img").html("<img src = '"+ profileImg +"'  alt = ''>");
  	for(i = 0; i< data.length; i++){ 

   // var dateArray = data[i].created_at.split(" ");
   // var date = dateArray[1]+' '+dateArray[2]+','+dateArray[5];
   	var tweet = data[i].text;
   	
  //switch w/below for date addition  $(".tweets").append('<p id = "'+ i +'">Date: '+date+' '+tweet+'</p>');}
  $(".tweets").append('<p id = "'+ i +'">'+tweet+'</p>');}
    });
}
</script>
<?php }else{ echo '<br><form action = "" method = "get">screen name: <input type = "text" name = "name"/><input type  ="submit" value = "submit"/></form>
';}?>
