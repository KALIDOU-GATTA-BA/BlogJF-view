<?php $title = 'Jean Forteroche'; 
require_once('secureForm.php');?>
<?php ob_start(); ?>
<img src="../../public/images/alaska.jpg" class="img-responsive"  height="1px">
<h1>Jean Forteroche</h1>
<div class="title"><p><strong>BILLET SIMPLE POUR L'ALASKA</strong></p></div>
<div class="container-fluid">
    <div class="col-md-12 col-xs-12 col-lg-12">
        <div class="row">
            <?php
                while ($data = $posts->fetch()){?>
                    <div class="news">
                        <h3>
                            <?= secureForm($data['title']) ?>
                                <em>le <?= $data['creation_date'] ?></em>
                        </h3>
                        <p>
                            <?= nl2br(secureForm($data['chapter'])) .' [...]'?><br />  
                            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><button type="button" class="btn btn-primary">Lire la suite</button></a>
                        </p>
                    </div>
                <?php
                    }
                    $posts->closeCursor();    
                ?>
        </div>
    </div>
</div>
<?php 
require_once("model/Manager.php");
$dbAcess=new Manager;
$db=$dbAcess->dbConnect();
$totalChapterReq= $db->query('SELECT id from posts');
$totalChapter= $totalChapterReq->rowCount();
$chapterByPage= 5;
$totalPage = ceil($totalChapter/$chapterByPage);
?>           
<div class="pagination_numbers">
    <ul class="pagination">
          <li>
              <?php
                  for ($i=1; $i<=$totalPage;$i++){
                      if ($i==$currentPage){
                          echo $i. '';
                      } 
                      else{ 
                          echo '<a href="../../index.php?action=listPosts&page='.$i.'">'.$i.'</a> ';
                      }
                  }
              ?>
          </li>
    </ul>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>
<?php require('footer.php') ;?>