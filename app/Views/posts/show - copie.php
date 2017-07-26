<?php

    //var_dump($article);

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
                        <label>Pseudo</label>
                        <input type="text" class="form-control" name="pseudo_commentateur">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email_commentateur">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label>En réponse au commentaire</label>
                        <input type="text" class="form-control" name="comment_parent">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label>Commentaire</label>
                        <textarea name="contenu_commentaire" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary">Valider</button>

                </div>
                <input type="hidden" name="parent_id" value="0" id="parent_id">
                <input type="hidden" name="niveau_commentaire" value="0">
                <input type="hidden" name="id_article" value="<?= $article->id_article; ?>" id="id_article">
            </div>
        </form>
    </div>

	
	<h3>Commentaire(s)</h3>
    
    <?php //var_dump($commentaire); ?>

	<ul>
		<?php foreach($commentaire as $comment):
   //          if( $comment->id_commentaire_parent == "0"){
   //              echo "<li>";
   //          }else{
   //              echo "<li style='padding-left:50px;'>";
   //          }
			// echo "Le : ".$comment->date_commentaire."</em>";
			// echo "<p>Par <b>".$comment->pseudo_commentateur."</b>, inscrit depuis le ".$comment->date_inscription."</p>";
			
            

   //              if($comment->modere_commentaire==1){
   //  				echo "<b><i>Ce commentaire a été modéré par l'administrateur car il ne respecte pas la charte !</i></b>";
   //  			}elseif($comment->demande_moderation_comment==1){
   //                 echo "<i>Ce commentaire est en attente de modération !</i>";
   //              }else{
   //                  echo $comment->contenu_commentaire;

   //                  if($comment->niveau_commentaire < 3){
                    
   //                      echo '<a href="#formRep" class="btn btn-primary btn_reponse" rel="comment_'. $comment->id_commentaire.'_'.$comment->pseudo_commentateur.'_'.$comment->niveau_commentaire.'" >Répondre</a>';
   //                      ?>
   //                          <!-- <form action="?pagetype=comments.report" method="post" style="display: inline;" onsubmit="return confirm('Attention, vous êtes sur le point d\'effectuer une demande de modération de ce commentaire, voulez-vous continuer ?')">
   //                              <input type="hidden" name="id_comment" value="<?= $comment->id_commentaire; ?>">
   //                              <input type="hidden" name="id_article" value="<?= $article->id_article; ?>">
   //                              <button type="submit" class="btn btn-warning">Signalez le commentaire</button>
   //                          </form> -->
   //                  <?php
   //                  }

   //              }




                if( $comment->id_commentaire_parent == "0"){
                    echo '<div class="media">';
                    }else{
                    echo '<div class="media" style="padding-left:50px;">';
                    } ?>
                    <div class="media-body">
                        <h4 class="media-heading">Par : <?= $comment->pseudo_commentateur; ?>
                            <small>Inscrit depuis le : <?= $comment->date_inscription; ?></small>
                        </h4>
                        <?php
                        if($comment->modere_commentaire==1){
                            echo "<b><i>Ce commentaire a été modéré par l'administrateur car il ne respecte pas la charte !</i></b>";
                        }elseif($comment->demande_moderation_comment==1){
                           echo "<i>Ce commentaire est en attente de modération !</i>";
                        }else{
                            echo $comment->contenu_commentaire;

                            if($comment->niveau_commentaire < 3){
                            
                                echo '<a href="#formRep" class="btn btn-primary btn_reponse" rel="comment_'. $comment->id_commentaire.'_'.$comment->pseudo_commentateur.'_'.$comment->niveau_commentaire.'" >Répondre</a>';
                                ?>
                                    <form action="?pagetype=comments.report" method="post" style="display: inline;" onsubmit="return confirm('Attention, vous êtes sur le point d\'effectuer une demande de modération de ce commentaire, voulez-vous continuer ?')">
                                        <input type="hidden" name="id_comment" value="<?= $comment->id_commentaire; ?>">
                                        <input type="hidden" name="id_article" value="<?= $article->id_article; ?>">
                                        <button type="submit" class="btn btn-warning">Signalez le commentaire</button>
                                    </form>
                            <?php
                            }

                        } ?>
                    </div>
                </div>










                





    <?php         
		endforeach;
	?>
	</ul>