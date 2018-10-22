<?php $title = 'Jean Forteroche'; 
require_once('secureForm.php');?>
<?php ob_start(); ?>
<div class="container">
        <div class="row"> <br>
         <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
           <p>ÉDITO... <br> autem cuique tribuendum, primum quantum ipse efficere possis, deinde etiam quantum ille quem diligas atque adiuves, sustinere. Non enim neque tu possis, quamvis excellas, omnes tuos ad honores amplissimos perducere, ut Scipio P. Rupilium potuit consulem efficere, fratrem eius L. non potuit. Quod si etiam possis quidvis deferre ad alterum, videndum est tamen, quid ille possit sustinere.</p>
         </div><br><br>         <h1> <br>BILLET SIMPLE POUR L'ALASKA</h1>
            <?php
                while ($data = $posts->fetch()){?>
                    <div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
                       <div class="news"> 
                          <h3>
                              <?= $data['title'] ?>
                                  <em>le <?= $data['creation_date'] ?></em>
                          </h3>
 
                              <?php $t=$data['content']; ?>
                              <p> <?php echo substr ( $t, 0, 200).htmlspecialchars('[...]') ; ?> 
                              <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><em>Lire la suite</em></a>
                          </p>
                    </div>
                  </div>
                <?php
                    }
                    $posts->closeCursor();    
                ?>
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
