<?php
require "../vendor/autoload.php";



use \App\src\DAO\ArticleDAO;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevBlog Fullstack 2020</title>
</head>
<body>
    <div>
    <h1>DevBlog Fullstack 2020</h1>
    <h5>Engineered at Talis Business School</h5>
    <p>en construction (comme tout à talis)</p>
    </div>
    <?php
    $a_m = new ArticleDAO();
    $articles = $a_m->getArticles();

    while ($a_m=$articles->fetch()) {
        ?>
        <h2><a href="single.php?id=<?php echo $a_m->id ;?>"><?php echo $a_m->title ;?></a> </h2>
        <p><?= $a_m->content ;?></p>
        <p><?= $a_m->author ;?></p>
        <p><?= $a_m->createdAt ;?></p>
        <?php
    }

    ?>
</body>
</html>