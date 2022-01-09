@php
if (Session::has('sistema')){
    $value=Session::get('sistema', 'Guzanet');
}else{
      $value = config('sistema.sistema');
    Session::put('sistema', $value);
}
@endphp

@include('layouts.partials.head')

<body class="font-sans antialiased">
  @include('layouts.partials.sidebar')
  <div class="min-h-screen bg-gray-100">

    @include('layouts.partials.navigation')

    <!-- Page Heading -->
    @include('layouts.partials.header')

    <!-- Page Content -->
    @include('layouts.partials.body')
  </div>
  <!-- Page Foot -->
  @include('layouts.partials.foot')
</body>

</html>
