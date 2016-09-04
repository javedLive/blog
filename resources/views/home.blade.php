<html>
    <head>   
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    </head>
    <body>
        <div class="container">
        <form method="post" action="store" accept-charset="UTF-8" id="saveForm">
  <!--      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>         -->
              <div class="form-group">
                <label >Title</label>
                <input type="text" class="form-control" name = "title" placeholder="title">
              </div>
               <div class="form-group">
                <label > Description</label>
                <input type="text" class="form-control" name = "description" placeholder="description">
              </div>

        <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

    

   


        <script>
            $('#saveForm').on('submit', function (e) {
                e.preventDefault();
                var data=$("#saveForm").serialize();
                 $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                     });
                  $.ajax({ 
                            type: "POST", 
                            url : "{{url('store')}}",                
                            data:data,
                            success: function( data ) {
                                  console.log(data);
                                }
                        });
            });         
        </script>


    </body>
</html>