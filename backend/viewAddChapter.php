<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
        tinymce.init({ selector:'textarea' });</script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link href="../../public/css/style.css" rel="stylesheet" /> 
            <link href="../../public/css/styleBackend.css" rel="stylesheet" /> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    	<header>
    		<img src="../../public/images/alaska.jpeg">
    	</header><br>
    	 <form action="../../controller/adChapter.php" method="post">
                <div class="container">
                  <label> Le titre du chapitre: <br>
                  	<input type="text" rows="2" cols="2" name="tempChapterTitle" value=""><br><br>
                  </label>
                        
                          <label> Le contenu du chapitre: <br></label>
                          <textarea rows="25"  name="tempChapterContent"></textarea>
                      
                       <input  type="submit" value="Publier" style="display: inline-block;padding: 15px 25px;font-size: 24px;cursor: pointer;text-align: center;text-decoration: none;outline: none;color: #fff;background-color:green;border: none;border-radius: 15px;box-shadow: 0 9px #999;" />     
                </div>
              </form><br><br> 
              <a href="indexBackend.php">
                <button type="button" class="btn btn-outline-danger">Annuler</button><br><br> 
              </a>   
    </body>
    <footer>
      <?php require_once ("footerBackend.php"); ?>
    </footer>
    </body>
 </html>
