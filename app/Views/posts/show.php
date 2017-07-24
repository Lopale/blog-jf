<?php

	echo "<h2>".$article->titre_article."</h2>";
	//echo "<em>ID : ".$article->id."</em>";
	echo "<em>Le : ".$article->date_article."</em>";
	echo "<p><b>Categorie : ".$article->titre_categorie."</b></p>";
	echo "<p>".$article->contenu_article."</p>";



?>
<a href="index.php" class='btn btn-info' >Retour à l'accueil</a>


	
	<h3>Commentaire(s)</h3>
    
    <?php //var_dump($commentaire); ?>

	<ul>
		<?php foreach($commentaire as $comment):
            if( $comment->id_commentaire_parent == "0"){
                echo "<li>";
            }else{
                echo "<li style='padding-left:50px;'>";
            }
			echo "Le : ".$comment->date_commentaire."</em>";
			echo "<p>Par <b>ID Auteur : ".$comment->id_commentateur."</b></p>";
			
            echo "<p>";
            if($comment->modere_commentaire==1){
				echo "<b>Ce commentaire a été modéré par l'administrateur car il ne respecte pas la charte !</b>";
			}else{				
			    echo $comment->contenu_commentaire;
			}
            echo "</p>";
            echo '<p><a href="#" class="btn btn-warning" >Signalez le commentaire</a></p>';
		endforeach;
	?>
	</ul>



    <form action="" role="form" method="post" id="comment">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Pseudo</label>
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label>Commentaire</label>
                    <textarea name="content" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn ctn-primary">Envoyer</button>
            </div>
            <input type="hidden" name="parent_id" value="0" id="parent_id">
            <input type="hidden" name="action" value="comment">
        </div>
    </form>