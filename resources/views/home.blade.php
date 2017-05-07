<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>	
	<style type="text/css">
		
	</style>
	</head>
	<body>
		<div class="container bootcards-container" id="main" ng-controller="ProfileController as proCtrl">
		    <div class="row" style="margin-top: 50px;">      
		      <div class="col-sm-5 bootcards-list" id="list" data-title="Contacts">
		       <div class="panel panel-default">
		         <div class="panel-body">
		           <div class="search-form">
		             <div class="row">
		                 <div class="col-xs-9">
		                   <div class="form-group">
		                     <input type="text" id="name" class="form-control" placeholder="email, name">
		                     <i class="fa fa-search"></i>
		                   </div>
		                  <div class="form-group">
		                     <input type="text" id="language" class="form-control" placeholder="tag, language">
		                     <i class="fa fa-search"></i>
		                   </div>
		                 </div>
		                 <div class="col-xs-3">
		                   <button class="btn btn-primary pull-rights" id="search">
		                    search</button>
		                 </div>
		                 {{ csrf_field() }}
		             </div>
		           </div>
		         </div>
		         <div class="list-group">
		             <div class="list-group-item pjax" style="margin-bottom: 12px;" >
		               <h4 class="list-group-item-heading" id="user_name"></h4>
		               <p class="list-group-item-text" id="user_organization"></p>
		             </div>
		        	</div>
		         </div>
		       </div>
		        <div class="col-sm-7 bootcards-cards hidden-xs" id="listDetails">
			 		<div class="panel panel-default">
						 <div class="panel-heading clearfix">
							 <h3 class="panel-title pull-left" style="padding-top: 8px;"> Details</h3>
							 <div class="btn-group pull-right visible-xs">

							 </div>
							
						 </div>

						 <div class="list-group">
							 <div class="list-group-item">
								 <label>Name</label>
								 <h4 class="list-group-item-heading" id="user_name"></h4>
							 </div>
							 <div class="list-group-item">
								 <label>Service Areas</label>
								 <h4 class="list-group-item-heading" id="user_department"></h4>
							 </div>
							 <div class="list-group-item" >
								 <label>mobile no</label>
								 <h4 class="list-group-item-heading" id="user_phone"></h4>
							 </div>
							 <div class="list-group-item" >
								 <label>Email</label>
								 <h4 class="list-group-item-heading" id="user_mail"></h4>
							 </div>
			                <div class="list-group-item">
			                	<label>About Firm</label>
			                	<h4 class="list-group-item-heading" id="user_about"></h4>
			              </div>
						 </div>
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
        	$.post("/result",
            {
            	_token: $('input[name="_token"]').val(),
               	name: $("#name").val(),
               	language: $("#language").val()
            });  
           event.preventDefault() ;
        });    
    });
</script>

	</body>
</html>