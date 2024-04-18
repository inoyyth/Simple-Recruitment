<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{!! csrf_token() !!}">
      <title>AML Distribution Monitoring</title>
      <link rel="shortcut icon" type="image/png" href="{{
            URL::asset('themes/assets/images/logos/favicon.png') }}" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
      <link rel="stylesheet" href="{{
            URL::asset('themes/assets/css/styles.min.css') }}" />
      @stack('styles')
</head>