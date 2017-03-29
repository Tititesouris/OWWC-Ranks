<?php
include_once("simple_html_dom.php");
date_default_timezone_set('UTC');
$html = file_get_html("https://worldcup.playoverwatch.com/en-us/");

$countries = [];
foreach ($html->find("div.TopCountries-row") as $element) {
    foreach ($element->find("div.TopCountries-rating") as $sr) {
        foreach ($element->find("div.TopCountries-countryName") as $name) {
            $countries[$name->plaintext] = $sr->plaintext;
        }
    }
}

echo date("Y-m-d H:i");
ksort($countries);
foreach ($countries as $sr) {
    echo "," . $sr;
}
echo "\n";