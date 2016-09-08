<html>
	<head>
		<title> Item List</title>
		<style>
			td { border:1px solid #eee; position:relative; min-width:120px;}
			td input, td select {position:absolute; top:0; left:0; width:100%;}
					.toedit {opacity:0;}
		</style>

		<meta name="csrf-token" content="{{ csrf_token() }}">	
	
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	</head>
	
	<body>
			<div class="container">
				<h3> List Of Courses </h3></br>

				<div class="reloadTable">
					<table class="table table-striped table-bordered dataTable" id="example">
					 	<thead>
						<tr>
							<td>Serial No</td>
							<td>Title</td>
							<td>Description</td>					
							<td>Action</td>
						</tr>
						</thead>
						<tbody>
						<?php $i=1; ?>
						@foreach($items as $row)
						
							<tr>
								<td>{{$i}}</td>
							<td class="title" data-id1="{{$row->id}}" contenteditable>{{$row->title}}</td>  
							<td class="description" data-id2="{{$row->id}}" contenteditable>{{$row->description}}</td>  
							<td>	
									<button type="button" onclick="deleteItem({{ $row->id }})" class="btn btn-danger">Delete</button>					
							</td>

							</tr>
						
						<?php $i++; ?>
							
						@endforeach
						</tbody>
					</table>
				</div>
				
			</div>

			<script>
			 function deleteItem(id) {
				$.ajaxSetup({
                        headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                     });
                $.ajax({ 
				           type: "POST", 
				           url:"{{url('delete')}}", 
				           data:{id:id},
				           success: function(result) {				    
				       jQuery("#example").html(result);
				           }
				       }); 
           		 } 
			</script>			

			<script>
			  function edit_title(id, title)  
			      {  
			      		$.ajaxSetup({
		                        headers: {
		                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                    }
		                     });
			           $.ajax({  
			                url:"{{url('update')}}",  
			                method:"POST",  
			                data:{id:id, title:title},  			                
			                   success: function( data ) {
                          console.log(data);
                        }
			           });  
			      }  

			       function edit_description(id, description)  
			      	{  
			      		$.ajaxSetup({
		                        headers: {
		                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                    }
		                     });
			           $.ajax({  
			                url:"{{url('update')}}",  
			                method:"POST",  
			                data:{id:id, description:description},  			                
			                  success: function( data ) {
                          console.log(data);
                        }
			           });  
			      }  
			      $(document).on('blur', '.title', function(){  
			           var id = $(this).data("id1");  
			           var title = $(this).text();  
			           edit_title(id, title);  
			      });  
			      $(document).on('blur', '.description', function(){  
			           var id = $(this).data("id2");  
			           var description = $(this).text();  
			           edit_description(id,description);  
			      }); 
			</script>	

			<script type="text/javascript">
/*				setInterval(function()
					{
					  $(".reloadTable").load("list  #example");					  			
					}, 3000);	*/
		
			</script>	

			<script type="text/javascript">
/*

					refreshInterval = 500;
  					refreshTimeout = setTimeout( getNotifications, refreshInterval );
					function getNotifications() {
					        $.ajax({
					            url : "{{url('unread')}}",
					            type : 'POST',
					            data:{id:id}
					            dataType : 'json',
					            success : function(data) {
					                alert('You have'+ data.total +' new messages')
					                refreshTimeout = setTimeout( getNotificationCounts, refreshInterval ); //this will check every half of second
					            }
					        });
					    }			*/
			</script>

			<script type="text/javascript">

			
				setInterval(function(){ 
			//		var csrf_token="{{csrf_token()}}";

						$(".container").load("list", function(){
							

							  $.ajax({
							  	type : "get",
					            url : "{{url('unread')}}",
							//	_token: 'csrf_token',					            					           
					         	 dataType : 'json',					   			
					            success : function(data) {
					            	
					            		$.each(data,function(index,subcatObj){					            			
					            //			$('#total').val(subcatObj.total);  
					            			if(subcatObj.total != '0')
					            			{
					            				var yes	= confirm('You have '+subcatObj.total+' new messages');
					            						if(yes){
															status_update();
					            						}
					            			}
					            			
					                });					            
					            },

/*					            error: function (xhr, ajaxOptions, thrownError) {
        									alert(xhr.status);
        									alert(thrownError);
        								}*/
					        });													                 
                    });

        
 					 }, 3000);	

					 function status_update(){
					 	$.ajaxSetup({
		                        headers: {
		                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                    }
		                     });		
			           $.ajax({  
			                url:"{{url('s_update')}}",  
			                method:"POST",  			                  			                
		//	                success: function( data ) {
         //                 	console.log(data);
          //              }
			           });  
					 }			
			</script>
	</body>
</html>