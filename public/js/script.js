function reponseComment(){

		$( ".btn_reponse" ).click(function(event) {
		  event.preventDefault();
			var id_commentaire_parent = $(this).attr('rel').split('_');

			$("#formRep #parent_id").val(id_commentaire_parent[1]);
			$("#formRep input[name='comment_parent']").val(id_commentaire_parent[2]);
			$('html, body').animate({
	            scrollTop: $("#formRep ").offset().top
	        }, 500);
		});

	
}


$( document ).ready(function() {
   

	reponseComment();


    var listElement = $('#pagination');
	var perPage = 5; 
	var numItems = listElement.children().size();
	var numPages = Math.ceil(numItems/perPage);

	$('.pagination').data("curr",0);

	var curr = 0;
	while(numPages > curr){
	  $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo('.pagination');
	  curr++;
	}

	$('.pagination .page_link:first').addClass('active');

	listElement.children().css('display', 'none');
	listElement.children().slice(0, perPage).css('display', 'block');

	$('.pagination li a').click(function(){
	  var clickedPage = $(this).html().valueOf() - 1;
	  goTo(clickedPage,perPage);
	});

	function previous(){
	  var goToPage = parseInt($('.pagination').data("curr")) - 1;
	  if($('.active').prev('.page_link').length==true){
	    goTo(goToPage);
	  }
	}

	function next(){
	  goToPage = parseInt($('.pagination').data("curr")) + 1;
	  if($('.active_page').next('.page_link').length==true){
	    goTo(goToPage);
	  }
	}

	function goTo(page){
	  var startAt = page * perPage,
	    endOn = startAt + perPage;
	  
	  listElement.children().css('display','none').slice(startAt, endOn).css('display','block');
	  $('.pagination').attr("curr",page);
	}



});