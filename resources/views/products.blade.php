<html>
	<head>
		<title> Item List</title>
		

		<meta name="csrf-token" content="{{ csrf_token() }}">	
	
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">   
	</head>
	
	<body>
		 <div class="container">
            <div id="content">               
              <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">   
                 @foreach ($categories as $category)              
                    <li><a href="#{{$category->id}}" data-toggle="tab" >{{$category->name}}</a></li>
                 @endforeach
              </ul>
                
                 <div id="my-tab-content" class="tab-content">
                    @foreach($categories as $category)
                       
                      <div class="tab-pane " id="{{$category->id}}">
                        @foreach($category->products as $product)
                          <div>
                              {{$product->name}}
                          </div> 
                        @endforeach                          
                        </div>  
                      
                    @endforeach
                </div>     
            </div>
        </div>


        <script>
            /* function showItem(id) {
                $.ajaxSetup({
                        headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                     });
                $.ajax({ 
                           type: "POST", 
                           url:"{{url('showitems')}}", 
                           data:{id:id},
                           success: function(data) {                  
                               console.log(data);
                           }
                       }); 
                 } */
        </script>   
	</body>
</html>