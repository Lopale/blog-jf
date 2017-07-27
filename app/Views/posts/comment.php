
               

                
                    <div class="media comment" id="comment_<?= $comment->id_commentaire; ?>">';
                    
                    <div class="media-body">
                        <h4 class="media-heading">Par : <?= $comment->pseudo_commentateur; ?>
                            <small>Inscrit depuis le : <?= $comment->date_inscription; ?></small>
                        </h4>
                        <?php

                        echo '<p>Le : '.$comment->date_commentaire.'</p>';
                        
                        if($comment->modere_commentaire==1){
                            echo "<b><i>Ce commentaire a été modéré par l'administrateur car il ne respecte pas la charte !</i></b>";
                        }elseif($comment->demande_moderation_comment==1){
                           echo "<i>Ce commentaire est en attente de modération !</i>";
                        }else{
                            echo $comment->contenu_commentaire;

                            if($comment->niveau_commentaire < 3){
                                 echo '<a href="#" class="btn btn-primary btn_fermer btn_fermer_'.$comment->id_commentaire.'" rel="comment_'. $comment->id_commentaire.'_'.$comment->pseudo_commentateur.'_'.$comment->niveau_commentaire.'" >Fermer</a>';

                                echo '<a href="#formRep" class="btn btn-primary btn_reponse btn_reponse_'.$comment->id_commentaire.'" rel="comment_'. $comment->id_commentaire.'_'.$comment->pseudo_commentateur.'_'.$comment->niveau_commentaire.'" >Répondre</a>';
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
            <div class="well reponseCommentaire reponseCommentaire_<?= $comment->id_commentaire; ?>" rel="comment_'. $comment->id_commentaire.'_'.$comment->pseudo_commentateur.'_'.$comment->niveau_commentaire.'">
                <h4>Répondre à ce commentaire</h4>
                <form method="post"  action="?pagetype=comments.add">
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
                                <textarea name="contenu_commentaire" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-primary">Valider</button>

                        </div>
                        <input type="hidden" name="parent_id" value="<?= $comment->id_commentaire; ?>">
                        <input type="hidden" name="niveau_commentaire" value="0">
                        <input type="hidden" name="id_article" value="<?= $article->id_article; ?>">
                    </div>
                </form>
                <p>* Champs obligatoires</p>
            </div>
<div style="margin-left: 50px;">
	<?php
		// foreach (( $this->showCommentChildren($comment->id_commentaire)) as $comment) {
		// 	require('comment.php');
		// }
	?>
	<?php

		if ($comment->children != "") {
			foreach ($comment->children as $comment) {
				require('comment.php');
			}
		}

	?>
</div>