@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Pagamento</h1>
    </div>
</div>






@endsection

@section('extra-js')
<script src="https://js.stripe.com/v3/"></script>
<script>

var stripe = Stripe('pk_test_rSdHco7EqkhL0X71HmQGgWRt00okpFxU38');

stripe.redirectToCheckout({
  sessionId: '{{ $stripe_session }}'
})

</script>
@endsection