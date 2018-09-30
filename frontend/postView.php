<?php 
require_once('secureForm.php');
$title = secureForm($post['title']); ?>
<?php ob_start(); ?>
<img src="../../public/images/alaska.jpeg">
<h1>Billet simple pour l'Alaska</h1>
<div class="back"><p><a href="index.php">Retour à la liste des billets</a></p></div>

<div class="news">
    <h3>
        <?= secureForm($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(secureForm($post['content'])) ?>
    </p>
</div>
<h2>Commentaires</h2>
<div class="container">
    <div class="col-md-4 col-xs-12 col-lg-8">
        
                        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                                    <div>
                                            <label for="author">Auteur</label><br />
                                            <input type="text" id="author" name="author" />
                                    </div>
                                    <div>
                                            <label for="comment">Commentaire</label><br />
                                            <textarea id="comment" name="comment"></textarea>
                                    </div>
                                            <div>
                                                <input type="submit" value="Envoyer"/>
                                            </div>
                        </form>
       
<?php  
while ($comment = $comments->fetch())
{
?>
    <div class="cmt">
        <p>
            <strong><?= secureForm($comment['author']) ?></strong> 
            le <?= $comment['comment_date_fr'] ?>
        </p>
    <p>
        <?= nl2br(secureForm($comment['comment'])) ?>
    </p>
    </div>
    <div class="btn">
        <a href="../../index.php?action=reported&amp;id=<?= $post['id'] ?>&amp;idC=<?= $comment['id'] ?>"><button>Signaler</button></a>
    </div>
<?php
} 
?>  
    </div>  
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');
require('footer.php');?>
