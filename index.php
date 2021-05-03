<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
     require_once "functions/functions.php";
     $title = "My site";
     $news = getNews(3,$_GET["id"]);
     require_once "blocks/head.php";
     ?>
</head>
<body>
<?php require_once "blocks/header.php"?>
<div id="wrapper">
    <div id="leftCol">
    <?php
    for($i = 0; $i < count($news); $i++){
        if($i==0)
            echo "<div id=\"bigArticle\">";
        else
            echo "<div class=\"article\">";
        echo ' <img src="/img/articles/'.$news[$i]["id"].'.jpg" alt="Статья 1" title="Статья '.$news[$i]["id"].'" />
        <h2>Статья '.$news[$i]["title"].'</h2>
        <p>'.$news[$i]["intro_text"].'</p> <a href="/article.php?id='.$news[$i]["id"].'"><div class="more">Далее</div></a></div>  ';
        if($i==0)
            echo '<div class="clear"><br/></div>';
    
    }
     ?>
    
    </div>
    <?php  require_once "blocks/rightCol.php"?>
</div>

<?php require_once "blocks/footer.php"?>



</body>
</html>


