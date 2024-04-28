$(document).ready(function(){ 
	
	$("#livesearch").keyup(function(){
		var live = $(this).val();
		if(live != ''){
			$.ajax({
				url:"livesearch.php",
				method:"POST",
				data:{search:live},
				dataType:"text",
				success:function(data){
					$('#statuslive').html(data);
				}
			});
		}else{
			$('#statuslive').html("");
		}
	});
	
 });  
