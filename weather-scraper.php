<?php   

$city = $_GET["city"];

//$city = str_replace(" ","-",$city);

$apiKey = "4c91291dc0337670f1e66477eb8e3ff0";

$contents = file_get_contents("https://api.openweathermap.org/data/2.5/forecast?q=".$city."&appid=".$apiKey."&lang=en");

$contents = json_decode($contents,true);

$cityName = $contents["city"]["name"];

$countryName = $contents["city"]["country"];

$description1 = $contents["list"][0]["weather"][0]["description"];
$temperature1 = $contents["list"][0]["main"]["temp"] - 273.15;

$description2 = $contents["list"][8]["weather"][0]["description"];
$temperature2 = $contents["list"][8]["main"]["temp"] - 273.15;


$result = "City: ".$cityName."<br><br> Country: ".$countryName.
    "<br><br>Today's Weather: ".$description1.", Temprature: ".$temperature1."°C".
    "<br><br>Tomorrow's Weather: ".$description2.", Temprature: ".$temperature2."°C";

if($cityName != ""){
    echo $result;
}

?>