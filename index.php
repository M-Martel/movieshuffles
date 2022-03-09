<?php
$json = file_get_contents("movies.json");
$movies = json_decode($json, true);


include("template/header.php");

?>


<div class="listmovies">
    <?php
    foreach ($movies as $item) {

        $smalltitle = strtolower($item["title"]);
        $picture = str_replace(" ", "-", $smalltitle);
        //utiliser strtolower pour constituer le nom de limage avec str replace
        $genre = implode(", ", $item["genres"]);
    ?>
        <div class="movie">
            <div class="poster">
                <a href="detail.php?id=<?= $item["id"] ?>">
                    <img src="img/poster/<?= $picture ?>.jpg" alt="pictures">
                </a>
            </div>
            <div class="double">
                <h2>
                    <a href="detail.php?id=<?= $item["id"] ?>"><?= $item["title"] ?>
                </h2>
                <p><?= $genre ?></p>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
include("template/footer.php");
?>