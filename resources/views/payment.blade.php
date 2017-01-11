	<form  id="payment_gw" action="https://securepay.sslcommerz.com/gwprocess/testbox/v3/process.php" method="post" name="payment_gw">
		<input type="hidden" name="store_id" value="test" /> 
		<input type="hidden" name="total_amount" value="{{$total_amount}}" />
		<input type="hidden" name="tran_id" value="{{$tran_id }}" />
		<?php $itemid='fbfan01'; // Set your item/product id here ?>
		<input type="hidden" name="success_url" value="http://localhost/blog/postsuccess" />
		<input type="hidden" name="fail_url" value="http://facebookcorner.com/api_test/fail.php?itemid=<?php echo $itemid;?>" />
		<input type="hidden" name="cancel_url" value="http://facebookcorner.com/api_test/cancel.php?itemid=<?php echo $itemid;?>" />
	</form>	

	<script type='text/javascript'>
    document.payment_gw.submit();
	</script>
