@include('layouts.partials.head')

<body class="font-sans antialiased">
  @include('layouts.sidebar')
  <div class="min-h-screen bg-gray-100">

    @include('layouts.navigation')

    <!-- Page Heading -->
    @include('layouts.header')

    <!-- Page Content -->
    @include('layouts.body')
  </div>
  <!-- Page Foot -->
  @include('layouts.foot')
</body>

</html>
