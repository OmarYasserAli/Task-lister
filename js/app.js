$(document).ready(function(){


 $("#craate-task").submit(function(event){
 	event.preventDefault();

 	$formData=$(this).serialize();
 	
 	$.ajax({

 		url:'create.php',
 		method:'post',
 		data: $formData,
 		success: function(data){
 			$('#ajax_msg').css('display','block').delay(3000).slideUp(300).html(data);
 			document.getElementById("craate-task").reset();
 		}
 	});
 });



 $('#task-list').load('read.php');



});


   function delTask(id){
 	
   	if(confirm('do you want do delete really?')){
   		$.ajax({
   			url:"delete.php",
   			method:'post',
   			data:{id:id},
   			success: function(data){
   				$('#ajax_msg').css('display','block').delay(3000).slideUp(300).html(data);
   				$('#task-list').load('read.php');
   			}
 	});
   	}
 	





 }




 	function makeElEditable(div){
 		div.style.border= "1px solid #000";
 		div.style.padding="5px";
 		div.contentEditable= true;
 		
 	}


 	function updatename(div , id){
 		div.style.border= "none";
 		div.style.padding="0px";
 		div.contentEditable= false;
 		var name=div.textContent;
 		$.ajax({
 			url:"update.php",
 			method:"POST",
 			data:{name: name , id: id},
 			success: function(data){
   				if(data !=""){
   				$('#ajax_msg').css('display','block').delay(3000).slideUp(300).html(data);
   				
   				}
   				
   			}
 		})
 		
 	}


 	function updatedescription(div , id){
 		div.style.border= "none";
 		div.style.padding="0px";
 		div.contentEditable= false;
 		var description=div.textContent;
 		$.ajax({
 			url:"update.php",
 			method:"POST",
 			data:{description: description , id: id},
 			success: function(data){
   				if(data !=""){
   				$('#ajax_msg').css('display','block').delay(3000).slideUp(300).html(data);
   				}
   				
   			}
 		})
 		
 	}

 		function toggleComplete(div ,id){
		$.ajax({
			url:'update.php',
			method:"post",
			data:{tglcom:1 ,id:id},
			success: function(data){
				if(data !=""){
   				$('#ajax_msg').css('display','block').delay(3000).slideUp(300).html(data);
   				$('#task-list').load('read.php');
   				}
   				
   			}

		})
	}

