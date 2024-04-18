@extends('layouts.default')
@section('content')
    Test
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
$(document).ready(function() {
    // let x = document.cookie;
    // const y = $.cookie('token');
console.log("token", getCookieValue('token'))

$.ajax({
    url: "<?php echo route('auth.role'); ?>",
    headers: {
        'Authorization':`Bearer ${getCookieValue('token')}`,
        'Content-Type':'application/json',
        'X-CSRF-Token': '{{ csrf_token() }}'
    },
    method: 'GET',
    dataType: 'json',
    success: function(data){
      console.log('succes: '+data);
    }
  });

function getCookieValue(name) 
    {
      const regex = new RegExp(`(^| )${name}=([^;]+)`)
      const match = document.cookie.match(regex)
      if (match) {
        return match[2]
      }
   }
})

</script>
@endpush