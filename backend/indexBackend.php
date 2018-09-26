<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link href="../../public/css/style.css" rel="stylesheet" /> 
            <link href="../../public/css/styleBackend.css" rel="stylesheet" /> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <img src="../../public/images/alaska.jpeg"><br><br>
            <a href='../../controller/principale.php?deconnexion=true'><span class="dec"><button type="button" class="btn btn-danger">Déconnexion</button></span></a><br> <br> <br>
            <a href="viewAddChapter.php"><em><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon">&#xe127;</span> Ajouter un  chapitre</button></em></a>
        </header><br>
    
        <div class="container">
            <div class="jumbotron">GESTION DES CHAPITRES </div>
                <?php                                                     
                $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
                $posts= $db->query('SELECT title, id from posts');
                while ($data = $posts->fetch())
                {
                ?>
                <div class="row">
                    <h3>
                        <table style="width:100%">
                            <tr>
                                <th><?= htmlspecialchars($data['title']) ?></th>                       
                    </h3>
                                    <p>     
                                        <th colspan="2"> 
                                            <button><a href="../../index.php?action=post&amp;id=<?= $data['id'] ?>"><span class="glyphicon glyphicon-eye-open"></span>Voir</a></buttton>
                                        </th><br><br> <th colspan="2">                 
                                                    <a href="../../index.php?action=update&amp;id=<?= $data['id'] ?>"><button><span class="glyphicon glyphicon-pencil"></span> Modifier</button></a>   
                                                </th> 
                                        <th colspan="2"> 
                                            <button><a href="../../index.php?action=delete&amp;id=<?= $data['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce chapitre?'));" ><span class="glyphicon glyphicon-trash"></span>Supprimer</a></buttton>
                                        </th><br><br>
                                    </p>
                            </tr>  
                        </table></div>
                    <?php
                    }
                    $posts->closeCursor();
                    ?>
                    <br><br><br><br><br><br>
                    <div class="jumbotron">GESTION DES COMMENTAIRES</div>
                </div>
                <div class="container">
                    <div class="panel-group">
                        <div class="panel panel-success">
                                <div class="panel-heading">
                                    <a href="../../notReadComment.php">Commentaires non lus</a> 
                                </div>
                                    
                                <?php                                                     
                                $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
                                $notRead= $db->query('SELECT comment, post_id, comment_date from comments where notReadComment=1');
                                while ($notReadComment = $notRead->fetch()){ 
                                    $postId=$notReadComment['post_id'];
                                    $chapter= $db->query("SELECT title from posts where id=$postId");
                                    $thisChapter = $chapter->fetch();
                                    echo "Nouveau commentaire sur le chapitre: " .'<strong>'.$thisChapter['title'] .'</strong>, posté le: <strong>'.$notReadComment['comment_date'] .'</strong><br>';?>
                                <a href="../../index.php?action=notReadComment&amp;id=<?= $notReadComment['post_id'] ?>">
                                    <b><?php echo $notReadComment['comment'] .'<br><br></b></a>';

                                }?>

                        </div></br></br>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    COMMENTAIRES SIGNALÉS  
                                </div>
                            </div>
                        </div>
                            <table>
                            <tr> <th>Auteur</th><th>Commentaire</th><th>Date du commentaire</th><th>Chapitre commenté</th></tr>
                            <?php                                                     
                            $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
                            $reported= $db->query('SELECT author, comment, comment_date from comments where reported=1');
                            while ($report = $reported->fetch()){?>
                            
                                
                                <tr> <td><?=$report['author']?></td><td><?=$report['comment']?></td><td><?=$report['comment_date']?></td><td><?=$thisChapter['title']?></td></tr>
                            </table>
                            
                        <?php }
                            ?>
                    
            
            
        </div>
    </body> <br><br><br><br>
    <footer>
        <?php require_once("footerBackend.php");?>
    </footer>
</html>