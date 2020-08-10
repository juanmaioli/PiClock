<?php
    $html = file_get_contents("https://newsapi.org/v2/top-headlines?country=ar&apiKey=188cf6b3db644dabb4097d204bf27308");
    $json = json_decode($html);
    $totalNews = $json->totalResults;
    $totalNews = 20;
    $noticias = "";
    for ($x = 0; $x <= $totalNews - 1 ; $x++) {
    $link = " <a href='" . $json->articles[$x]->url . "' target='_blank' >Ver</a>";
        $noticias = $noticias . "<b>" . $json->articles[$x]->source->name . "</b>  - " . $json->articles[$x]->title. " - " .  $link ."<br>";
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>JSON Newsapi.org PHP7</title>
</head>
<body>
    <?php echo $noticias;?>
</body>
</html>