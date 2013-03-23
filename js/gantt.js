$(function() {

	$( ".task" ).resizable({
		maxHeight: 20,
		minHeight: 20,
		grid: 20
	});
			
	$( ".task" ).draggable({ 
		grid: [ 20,20 ],
		axis : "x",
		containment: "parent"
	});
	
	$( "li.category" ).click(function () {
	
		var item = $(this);
		var list = $(this).nextAll("ul");
		
		if(list.css('display') == "block") {
			item.children('i').removeClass('icon-folder-open');
			item.children('i').addClass('icon-folder-close');
			list.css('display', 'none');	
		}
		else
		{
			item.children('i').removeClass('icon-folder-close');
			item.children('i').addClass('icon-folder-open');
			list.css('display', 'block');
		}

	});

});