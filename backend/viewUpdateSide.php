<!DOCTYPE html>
<html>
    <head>
    	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link href="public/css/style.css" rel="stylesheet" /> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    	<header>
    		<img src="public/images/alaska.jpeg">
    	</header><br>
    	       <form action="../../index.php?action=confirmUpdate&amp;id=<?= $post['id'] ?>" method="post">
                <div class="container">
                  <input type="text" rows="2" cols="2" name="tempChapterTitle" value="<?= htmlspecialchars($post['title']) ?>"><br><br>
                        <div class="form-group">
                          <textarea class="form-control" rows="25" id="comment" name="tempChapterContent">
                            <?= nl2br(htmlspecialchars($post['content'])) ?> 
                          </textarea>
                        </div>
                       <input  type="submit" value="Publier" style="display: inline-block;padding: 15px 25px;font-size: 24px;cursor: pointer;text-align: center;text-decoration: none;outline: none;color: #fff;background-color:green;border: none;border-radius: 15px;box-shadow: 0 9px #999;" />     
                </div>
              </form><br><br> 
              <a href="view/backend/indexBackend.php">
                <button type="button" class="btn btn-outline-danger">Annuler</button><br><br> 
              </a>
              
    </body>
    <footer>
      <?php require_once ("footerBackend.php"); ?>
    </footer>
</html>