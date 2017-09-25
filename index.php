<?php
error_reporting(E_ALL);
include_once('../simple_html_dom.php');

# Use the Curl extension to query Google and get back a page of results
$url = "https://www.trekbikes.com/us/en_US/bikes/mountain-bikes/trail-mountain-bikes/fuel-ex/fuel-ex-9-9-29/p/2146600-2018/?colorCode=black_greys";
// $ch = curl_init();
// $timeout = 5;
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
// $html = curl_exec($ch);
// curl_close($ch);

# Create a DOM parser object
$dom = new DOMDocument();

# Parse the HTML from Google.
# The @ before the method call suppresses any warnings that
# loadHTML might throw because of invalid HTML in the page.
$html = file_get_html($url);
$table = $html->find("#trekProductSpecificationsComponent", 0)->children(1);

$array = (explode("<li>", $table));
$string = implode(" ", $array);
$string2 = strip_tags($string);
$string3 = preg_replace('/\s+/', '', $string2);
$frame = substr($string3, 13,30);
if (strpos($frame, 'Carbon') !== false) {
    echo 'true';
}


?>
