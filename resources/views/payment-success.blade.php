@extends('layouts.app')

@section('content')

<h2>Payment Success</h2>
<h4>payment id: <span>{{ $payment_id }}</span></h4>
<h4>state: <span>{{ $state }}</span></h4>
<h4>failure-reason: <span>{{ $failure_reason }}</span></h4>

<h4>redirection to home page..</h4>
<script>
    setTimeout(() => window.location.href = "{{ route('home') }}", 3000);
</script>

@endsection