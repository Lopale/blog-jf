function pagination(nbParPage,divSelect,divPager,model)
{   
    //Initialisation
    var nbElem = $(divSelect).length;
    var nbPage = Math.ceil(nbElem / nbParPage);
    var pageLoad = 1;
     
    $(divSelect).each(function(index) {
        if (index < nbParPage)
            $(divSelect).eq(index).show();
        else
            $(divSelect).eq(index).hide();
    });
     
    //Reset & vérification
    function reset() {
        if (nbPage < 2) $(divPager).hide();
        if (pageLoad == nbPage) $(divPager + ' span.suivant').hide(); else $(divPager + ' span.suivant').show();
        if (pageLoad == 1) $(divPager + ' span.precedent').hide(); else $(divPager + ' span.precedent').show();
        $(divPager + ' ul li').removeClass('selected');
        $(divPager + ' ul li').eq(pageLoad -1).addClass('selected');
    }
     
    //Pagination génération
    if (model != 1) {
        $(divPager).html('<ul></ul>');
        for(i = 1; i <= nbPage; i++) $(divPager + ' ul').append('<li>' + i + '</li>');
     
        //Changement click page
        $(divPager + ' ul li').click(function() {
            if ($(this).index() + 1 != pageLoad) {
                pageLoad = $(this).index() + 1;
                $(divSelect).hide();
                 
                $(divSelect).each(function(i) {
                    if (i >= ((pageLoad * nbParPage) - nbParPage) && i < (pageLoad * nbParPage)) $(this).show();
                });
                 
                reset();
            }
        });
    }
     
    //Suivant Précédent
    if (model == 1) {
        $(divPager).prepend('<span class="precedent">Precedent</span>');
        $(divPager).append('<span class="suivant">Suivant></span>');
    } else if (model == 3) {
        $(divPager + ' ul').before('<span class="precedent">Precedent</span>');
        $(divPager + ' ul').after('<span class="suivant">Suivant</span>');
    }
     
    //Evènement click sur suivant
    $(divPager + ' span.suivant').click(function() {
        if (pageLoad < nbPage) {
            pageLoad += 1;
            $(divSelect).hide();
             
            $(divSelect).each(function(i) {
                if (i >= ((pageLoad * nbParPage) - nbParPage) && i < (pageLoad * nbParPage)) $(this).show();
            });
             
            reset();
        }
    });
     
    //Evènement click sur précédent
    $(divPager + ' span.precedent').click(function() {
        if (pageLoad -1 >= 1) {
            pageLoad -= 1;
            $(divSelect).hide();
             
            $(divSelect).each(function(i) {
                if (i >= ((pageLoad * nbParPage) - nbParPage) && i < (pageLoad * nbParPage)) $(this).show();
            });
             
            reset();
        }
    });
     
    reset();
}



$( document ).ready(function() {
    console.log( "ready!" );


    pagination(5,'.postArticle','.paginator',3);


});