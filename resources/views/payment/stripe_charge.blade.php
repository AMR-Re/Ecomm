
<!DOCTYPE html>

<html>
<head>
  <script src="https://js.stripe.com/v3/"></script>
    <title>Stripe Checkout</title>
       
    
</head>
<body>
 

    <script type="text/javascript">

  var session_id='{{$session_id}}';
  var stripe = Stripe('{{ env('STRIPE_PUBLIC')}}');
  stripe.redirectToCheckout({
    sessionId:session_id
  }).then(function(result){
    // Handle result
  });


    </script>
</body>
</html>

