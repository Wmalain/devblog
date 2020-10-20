<?php
require "../vendor/autoload.php";



use \App\src\DAO\ArticleDAO;
use \App\src\DAO\commentDAO;

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
    $articles = $a_m->getArticle($_GET['id']);
    $a_m=$articles->fetch()
        ?>
        <h2><a href="single.php?id=<?= $a_m->id ;?>"></a> <?= $a_m->title ;?></h2>
        <p><?= $a_m->content ;?></p>
        <p><?= $a_m->author ;?></p>
        <p><?= $a_m->createdAt ;?></p>

    <a href="home.php">retour à l'acceuil</a>
    <div id="comments">
        <h3>commentaires</h3>
        <?php
            $comment= new commentDAO();
            $comments = $comment->getCommentsFromArticle($_GET['id']);
            while($comment = $comments->fetch()){
                ?>
                <h4><?= $comment->content ?></h4>
                <p><?= $comment->createdAt ?></p>
                <p><?= $comment->id_user ?></p>
                <p><?= $comment->id_user ?></p>


<?php
     $articles->closeCursor();

            }
        ?>
        
    </div>
</body>
</html>