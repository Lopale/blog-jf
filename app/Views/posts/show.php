<?php

	echo "<h2>".$article->titre_article."</h2>";
	//echo "<em>ID : ".$article->id_article."</em>";
	echo "<em>Le : ".$article->date_article."</em>";
	echo "<p><b>Categorie : ".$article->titre_categorie."</b></p>";
    echo '<img src="http://blog-jf.david-grillon.com/img/frozen_ship.jpg" class="img-responsive" alt="Vaisseau fantôme">';
	echo "<p>".$article->contenu_article."</p>";

?>
<a href="index.php" class='btn btn-info' >Retour à l'accueil</a>




    <div class="well">
        <h3>Laisser un commentaire</h3>
        <form method="post"  action="?pagetype=comments.add" id="formRep">
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Pseudo *</label>
                        <input type="text" class="form-control" name="pseudo_commentateur" required="required">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" class="form-control" name="email_commentateur" required="required">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label>Commentaire *</label>
                        <textarea name="contenu_commentaire" class="form-control" ></textarea>
                    </div>
                    <button class="btn btn-primary">Valider</button>

                </div>
                <input type="hidden" name="parent_id" value="0">
                <input type="hidden" name="niveau_commentaire" value="0">
                <input type="hidden" name="id_article" value="<?= $article->id_article; ?>" id="id_article">
            </div>
        </form>
        <p>* Champs obligatoires</p>
    </div>

	
	<h3>Commentaire(s)</h3>




<?php

    // A délpacer dans le controlleur
    $comments_by_id=[];

     foreach($commentaire as $comment):
        $comments_by_id[$comment->id_commentaire]=$comment;
     endforeach;

    foreach($commentaire as $k=>$comment):
        if($comment->id_commentaire_parent !="0"){
            $comments_by_id[$comment->id_commentaire_parent]->children[]=$comment;
            unset($commentaire[$k]);
        }
     endforeach;
?>


<?php foreach($commentaire as $comment):?>
    <?php require('comment.php'); ?>
<?php  endforeach; ?>


<?php 
    if(isset($message['succes'])){
        echo '<div class="alert alert-success fixed-top" role="alert">'.$message['succes'].'<button class="btn btn-primary fermer_alert">Fermer</button></div>';
    }
?>