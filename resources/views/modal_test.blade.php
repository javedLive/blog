<html>
	<head>
			<title> Modal Test</title>
      <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	   
  </head>
	<body>
		<div class="container">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createUser" style="float: right;margin-right: 20px;margin-top: 10px;">Create User</button>
			 <div id="createUser" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="post" id="userForm" class="form-horizontal">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <div class="control-group">
                                            <label class="control-label">Name :</label>
                                            <div class="controls">
                                                <input class="span11 name" name="name" placeholder="Name" type="text">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email :</label>
                                            <div class="controls">
                                                <input class="span11 email" name="email" placeholder="Email" type="text">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Password</label>
                                            <div class="controls">
                                                <input class="span11 password" name="password" placeholder="Enter Password" type="password">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Confirm Password</label>
                                            <div class="controls">
                                                <input class="span11" placeholder="Confirm Password" type="password">
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" id="userAdd" data-dismiss="modal" >save</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
		</div>
	</body>
		<script type="text/javascript">
			
			 $('#userAdd').click(function () {
                        var data= $('#userForm').serialize();
                        var userName=$('.name').val();
                        var userEmail=$('.email').val();
                        var userPassword=$('.password').val();
                        var addUser=$.post("{{asset('register')}}",{'name':userName,'email':userEmail,'password':userPassword,'_token':'{{csrf_token()}}'});
                        addUser.done(function(data){
                          //  location.reload();
                        });
                        addUser.fail();
                });      

		</script>

</html>