$( document ).ready(function() {
    console.log( "ready!" );

    function attention() {
		resultat=window.confirm('Attention, vous êtes sur le point d\'effctuer une suppression, voulez-vous continuer ?');
			if (resultat==1) {}
		else {
			return false;
		}
	}



});