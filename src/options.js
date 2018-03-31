 $(document).ready(function(){
	$( "#category" ).change(function() {
			
	
	
	 let problemtypes= {
		"P":["Projectors","Furniture","Painting","Others"],
		 "E":["Lights","Power Connections","UPS","Others"],
		 "G":["Name Plates","Auditorium","Others"]
	}
		let category=$('#category').val(); 
		let type=category[0];
		
		let requiredtypes = problemtypes[type];
		var node = document.getElementById('probid');
		while (node.firstChild) {
			node.removeChild(node.firstChild);
		}
		
		for(i=0;i<requiredtypes.length;i++){
		
			$("#probid").append('<option value='+requiredtypes[i]+'>'+requiredtypes[i]+'</option>');
			}
		
		
		
		
	});

});  

