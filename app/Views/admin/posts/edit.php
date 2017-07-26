
<form method="post">
	
	<?= $form -> input('titre_article','Titre de l\'article',[], 'titre_article'); ?>	
	<?= $form -> select('categorie_id','Catégorie de l\'article', $categories); ?>
	<?= $form -> input('contenu_article','Contenu de l\'article',['type'=>'textarea'], 'contenu_article'); ?>
	<button class="btn btn-primary">Sauvegarder</button>

</form>


<?php // var_dump($commentaire); ?>



<h3>Commentaire(s)</h3>
    

		<?php foreach($commentaire as $comment):

                if( $comment->id_commentaire_parent == "0"){
                    echo '<div class="media" id="comment_'.$comment->id_commentaire.'">';
                    }else{
                    echo '<div class="media" style="padding-left:50px;" id="comment_'.$comment->id_commentaire.'">';
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
                                
                                ?>
                                    <form action="?pagetype=admin.comments.moderate" method="post" style="display: inline;" onsubmit="return confirm('Attention, vous êtes sur le point d\'effectuer une modération de ce commentaire, voulez-vous continuer ?')">
                                        <input type="hidden" name="id_comment" value="<?= $comment->id_commentaire; ?>">
                                        <button type="submit" class="btn btn-warning">Modérer le commentaire</button>
                                    </form>
                            <?php
                        } ?>
                    </div>
                </div>

    <?php         
		endforeach;
	?>