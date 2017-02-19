<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5.4 Components & Slots Example</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<h3>Homepage</h3>

	<!-- Alert with error -->
	@component('alert')	

	    @slot('class')
	        alert-danger
	    @endslot

	    @slot('title')
	        Something is wrong
	    @endslot

	    My components with errors
	@endcomponent

	<!-- Alert with success -->
	@component('alert')	

	    @slot('class')
	        alert-success
	    @endslot

	    @slot('title')
	        Success
	    @endslot

	    My components with successful response
	@endcomponent

</div>

</body>
</html>