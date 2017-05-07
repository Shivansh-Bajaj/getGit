<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>	
	<style type="text/css">
		.list-group-item img {
 	   		height: 40px;
       		width: 40px;
       		margin-right: 15px;
			top: 0px;   
		}
	</style>
	</head>
	<body>
		<div class="container bootcards-container">

		    <div class="row" style="margin-top: 50px;">
		    	<div class="text-center col-md-12">
		    		<font face="Comic sans MS" size="7">
		    			Find Github Users
		    		</font>
		    	</div>
		      	<div class="col-md-12 bootcards-list">
		       		<div class="panel panel-default">
		         		<div class="panel-body">
		           			<div class="search-form">
		             			<div class="row">
		                 			<div class="col-md-10">
					                   <div class="form-group">
					                    	<input type="text" id="name" class="form-control" placeholder="email, name">
					                   </div>
					                  	<div class="form-group">
					                    	<input type="text" id="language" class="form-control" placeholder="language">
					                	</div>
					                </div>
			                 		<div class="col-md-2">
			                   			<button class="btn btn-primary pull-rights" id="search">
			                    		search</button>
			                 		</div>
			                 		{{ csrf_field() }}
		             			</div>
		           			</div>
		         		</div>
		        		<div class="list-group" id="list"></div>
		        	</div>
		    	</div>
			</div>
		</div> 
		<script
			src="https://code.jquery.com/jquery-2.2.4.min.js"
			integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  	<script
			src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
			integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
			crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootcards/1.0.0/js/bootcards.min.js"></script>
		<script type="text/javascript">
	        function zoom() {
	            document.body.style.zoom = "90%" 
	        }
	    </script>
		<script>
		    $(document).ready(function(){
		        $("#search").click(function(){
		        	if($('#name').val()=="" &&  $("#language").val()==""){
		        		alert("some input is required");
		        	} else{
		        		console.log($('#name').val(), $("#language").val());
			            $('#list').empty();
			        	$.post("/api/search",
			            {
			            	_token: $('input[name="_token"]').val(),
			               	name: $("#name").val(),
			               	language: $("#language").val()
			            }).done(function(response){
			            	if(response['success']){
			            		$.each(response.data,function (key, value) {
			            		$('#list').append('<a class="list-group-item pjax" href="'+ value['html_url'] +'" id="element'+ key +'" style="height: 60px;" ><img class="img-rounded pull-left" src="'+value['avatar_url']+'"><h4 class="list-group-item-heading" id="user_name">' + value['login'] + '</h4><p class="list-group-item-text" ></p></div></a>');	
			            		});
			            	} else {
			            		alert(response['message']);
			            	}
			            	
			            });  
		        	}
		        });

		    });
    	</script>
    	<script>
	    	$(document).ready(function(){
	        	$('a.pjax').click(function(){
	        		console.log('this is awesome');
	        	})
	    	});
		</script>
	</body>
</html>