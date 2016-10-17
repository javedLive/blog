<html>
    <head>
        <title> Test Form</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
    </head>
    <body onload="myFunction1()">
        <div class="container">
            <div class="row">
            <form>
                <div id="form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>
                <div id="form1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="col-sm-3">                  
                    <input id="first" class="btn btn-default" onclick="myFunction()" type="button" value="Add">
                </div>
                
                <button type="submit" class="btn btn-default">Submit</button>
             </form>
            </div>
        </div>
        
        <script>
            function myFunction1(){
                var elem1 = document.getElementById('form1');
                elem1.style.display = 'none';
            }
            function myFunction() {
                var elem = document.getElementById('first');
                elem.style.visibility = 'hidden';
                 var elem1 = document.getElementById('form1');
                elem1.style.display = 'block';
                }
        </script> 
    </body>
</html>