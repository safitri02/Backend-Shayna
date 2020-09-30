
<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <meta name="description" content="ShaynaAdmin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
<!-- Style -->
@stack('before-style')
@include('include.style')
@stack('after-style')

</head>

<body>

<!-- Sidebar -->
@include('include.sidebar')

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

<!-- Header -->
@include('include.navbar')

        <!-- Content -->
        <div class="content">

<!-- Konten -->
@yield('konten')

        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->

<!--    
//Script -->
@stack('before-script')
@include('include.script')
@stack('after-script')



</body>
</html>
