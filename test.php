<?php
define("DOC_ROOT","/");
//username and password of account
$username = "DrKoks";
$password = "Tayfun01!";

//set the directory for the cookie using defined document root var
$path = DOC_ROOT;
//build a unique path with every request to store. the info per user with custom func. I used this function to build unique paths based on member ID, that was for my use case. It can be a regular dir.
//$path = build_unique_h($path); // this was for my use case

//login form action url
$url="https://koeln.pennergame.de/"; 
$postinfo = "username=".$username."&password=".$password;

$cookie_file_path = $path."/cookie.txt";

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
//set the cookie the site has for certain features, this is optional
curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
curl_setopt($ch, CURLOPT_USERAGENT,
    "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
curl_exec($ch);

//page with the content I want to grab
curl_setopt($ch, CURLOPT_URL, "https://koeln.pennergame.de/activities/");
//do stuff with the info with DomDocument() etc
$html = curl_exec($ch);
curl_close($ch);
?>