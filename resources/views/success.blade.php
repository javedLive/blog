		<form  id="payment_gw" action="https://localhost/blog/postsuccess" method="post" name="payment_gw">	
		<input type="hidden" name="val_id" value="{{$val_id}}" />
		<input type="hidden" name="tran_id" value="{{$tran_id }}" />
		<input type="hidden" name="amount" value="{{$amount}}" />
		<input type="hidden" name="card_type" value="{{$card_type}}" />
		<input type="hidden" name="store_amount" value="{{$store_amount}}" />
		</form>
	<script type='text/javascript'>
    document.payment_gw.submit();
	</script>		

	


		