<?php
//header is just link to stylesheet and jquery
include 'myheader.php';
echo '<h2 style = "text-shadow: 2px 2px 2px #CCCCCC;">My Twitter Memories</h2><h3 class = "muted" ><em>are you thinking of leaving the twiter world? Me too..anyways, maybe you should grab all of your tweets before u go?</em></h6>';
if (isset($_GET['name'])) {
    $name = htmlentities($_GET['name']);

    $url = "https://api.twitter.com/1/statuses/user_timeline/$name.json?callback=?&count=2000";

    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
    $f = curl_exec($curl_handle);
    curl_close($curl_handle);


    echo '<div id ="img"></div><div class = "tweets"></div>';
    ?><script>
        $(document).ready(function() {
            loadTweets();
        });

        function loadTweets() {
            var _url = <?php echo "'" . $url . "'"; ?>;

            $.getJSON(_url, function(data) {



                var profileImg = data[0].user.profile_image_url_https;

                $("#img").html("<img src = '" + profileImg + "'  alt = ''>");
                for (i = 0; i < data.length; i++) {


                    var tweet = data[i].text;

                    $(".tweets").append('<p id = "' + i + '">' + tweet + '</p>');
                }
            });
        }
    </script>
<?php
} else {
    echo '<br><form action = "" method = "get"><span class="add-on">@</span>
  <input class="span2" id="prependedInput" type="text" placeholder="Username" name = "name"><input type  ="submit" value = "submit"/></form>
';
}?>
