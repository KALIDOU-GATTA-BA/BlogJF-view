<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../../public/css/styleBackOff.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 col-xl-12">
 
		</div>
	</div>
</div><br>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 col-xl-12">
			<a href="../../controller/mainForLogin.php?deconnexion=true"><strong><span class="dec">Deconnexion</span></strong></a><br>
                        <a href="http://kalidougattaba.fr"><strong>Accueil</strong></a><br><br><br>
			<div class="chapterManager">
				<em><strong>GESTION DES CHAPITRES</strong></em>
			</diV>
			<br><br><br>
			<table class="table table-dark table-hover">
				<thead>
					  <tr>
						<th style="text-align:left;">Chapitres</th>
						<th style="text-align:left;">Commentaires</th>
						<th style="text-align:center;">Modifier</th>
						<th style="text-align:right;">Supprimer</th>
					  </tr>
				</thead>
					  	<?php                                                     
                		$db = new PDO('...');
                		$posts= $db->query('SELECT title, id, countComment from posts');
                		while ($data = $posts->fetch()){ 
                		?>
                		<tbody>
				    <tr>
				       <td style="color:blue;"><strong><?= htmlspecialchars($data['title']) ?></strong></td>
				       <td style="text-align:left;"><strong><?php  echo $data['countComment']; ?></strong></td>
					<td style="text-align:center;"><a href="../../index.php?action=update&amp;id=<?= $data['id'] ?>"><span class="glyphicon glyphicon-pencil" style="text-align:center;"></span></a></td>
					<td style="text-align:right;"><a href="../../index.php?action=delete&amp;id=<?= $data['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce chapitre?'));" ><span class="glyphicon glyphicon-trash"></span></a></td>
				    </tr>
				</tbody>
			<?php
                    	}
                    	$posts->closeCursor();
                    	?>	  
			</table>
			<a href="viewAddChapter.php"><em><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon">&#xe127;</span> Ajouter un chapitre</button></em></a>
			<div class="commentManager">
				<em><strong>GESTION DES COMMENTAIRES</strong></em>
			</diV><br><br>
			<div class="notReadCommentManager">
				<?php                                                     
                		$db = new PDO('...');
                		$posts= $db->query('SELECT COUNT(notReadComment) as fetchComment from comments where notReadComment = 1'); 
                		$req=$posts->fetch();
                		$req= $req['fetchComment'];
                		?>
				<strong>COMMENTAIRES NON LUS</strong> (<?= $req ?>)
			</diV><br><br><br>	
			<table class="table table-dark table-hover">
				<thead>
					  <tr class="table-dark">
						<th>Chapitre</th>
						<th style="text-align:center;">Date du commentaire</th>
						<th style="text-align:right;">Commentaire</th>
					  </tr>
				</thead> 
					   	<?php                                                     
                        $db = new PDO('...);
                        $notRead= $db->query('SELECT SUBSTRING(comment, 1,20) AS cmt, post_id, id, comment_date from comments where notReadComment=1');
                        while ($notReadComment = $notRead->fetch()){ 
                        $postId=$notReadComment['post_id'];
                        $chapter= $db->query("SELECT title from posts where id=$postId");
                        $thisChapter = $chapter->fetch();?>
                        <tbody>
	                        <tr class="table-dark">
							<td style="color:blue;"><?= $thisChapter['title']?></td>
							<td  style="color:blue;text-align:center;"><?= $notReadComment['comment_date'] ?></td>
							<td  style="color:indigo;text-align:right;"><a href="../../index.php?action=notReadComment&amp;id=<?= $notReadComment['post_id'] ?>&amp;idC=<?= $notReadComment['id'] ?>"><b><?php echo $notReadComment['cmt'] .'[...]'.'<b></a>' ?></td>
							 </tr> 
						 </tbody>
						 <?php 
						 }
	                     $posts->closeCursor();
	                     ?> 
			</table>
			<div class="reportedCommentManager">
						<?php                                                     
                		$db = new PDO('...');
                		$posts= $db->query('SELECT COUNT(reported) as reportedComment from comments where reported = 1'); 
                		$req=$posts->fetch();
                		$req= $req['reportedComment'];
                		?>
				<strong>COMMENTAIRES SIGNALES</strong> (<?= $req ?>)
			</diV><br><br><br>
			<table class="table table-dark table-hover">
				<thead>
					  <tr class="table-dark">
						<th>Auteur</th>
						<th style="color:black;text-align:center;">Commentaire</th>
						<th style="color:black;text-align:right;">Modération</th>
					  </tr>
				</thead>
					<?php                                                     
	                $db = new PDO('...');
	                $reported= $db->query('SELECT author, id, post_id, SUBSTRING(comment, 1,20) AS cmt from comments where reported=1');
	                while ($report = $reported->fetch()){?>    	
				<tbody>
					   <tr class="table-dark">
						<td style="color:blue;"><?=$report['author']?></td>
						<td  style="color:blue;text-align:center;"><a href="../../index.php?action=notReadComment&amp;id=<?= $report['post_id'] ?>&amp;idC=<?= $report['id'] ?>"><?=$report['cmt'].' [...]'?></a></td>
						<td style="word-spacing:8px;text-align:right;""><a href="../../index.php?action=deleteReportedComment&amp;id=<?= $report['id'] ?>"><span class="glyphicon glyphicon-trash" style="color:red;"></span></a> 
							<a href="../../index.php?action=reportedCommentsManager&amp;id=<?= $report['post_id'] ?>&amp;idC=<?= $report['id'] ?>"><span class="glyphicon glyphicon-send" style="color:green; font-size:24px;"></span></a></td>
					  </tr>
				</tbody>
				<?php 
				}
                ?>
			</table>
		</div>
	</div>
</div>    
</body>
</html> 
