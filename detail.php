<?php

function convertMinutestoHours($duree)
{
    $minutes = $duree % 60;
    $hours = floor($duree / 60);
    return $hours . "h" . $minutes . "min";
    //guillement et a l'interieur accolade avec variable
}

$data = array("title" => "Titre introuvable");
$find = false;
if (isset($_GET["id"])) {
    $json = file_get_contents("movies.json");
    $movies = json_decode($json, true);

    foreach ($movies as $item) {
        if ($_GET["id"] == $item["id"]) {
            $find = true;
            $item["duration"] = convertMinutestoHours($item["duration"]);
            $smalltitle = strtolower($item["title"]);
            $picture = str_replace(" ", "-", $smalltitle);
            $genre = implode(", ", $item["genres"]);


            $data = $item;
        }
    }
}

include("template/header.php");
?>

<?php
if ($find) {
?>
    <div class="description">
        <div class="pict">
            <p><img src="img/poster/<?= $picture ?>.jpg" alt="poster"></p>
        </div>
        <div class="quad">
            <p>
                <?= $data["title"] ?>
            </p>
            <p><?= $data["description"] ?></p>
            <p><?= $genre ?></p>
            <p><?= $data["duration"] ?></p>
            <p><?= $data["releaseDate"] ?></p>
        </div>
        <h3>
            <a href="<?= $data["video"] ?>">Bande annonce</a>

        </h3>
    </div>

<?php
}

include("template/footer.php");
?>