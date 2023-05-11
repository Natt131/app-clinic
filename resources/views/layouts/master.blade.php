<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WebMED - консультативная клиника</title>

    <link rel="icon" href="../../../img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../../../css/core-style.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/doc_profile.css">
    <link rel="stylesheet" href="../../../css/chats.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../../../css/responsive.css">
    <link rel="stylesheet" href="../../../css/register.css">

</head>
@yield(('styles'))
<body>
@include('layouts.header')
</body>
@yield(('content'))
@include('layouts.footer')
<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="../../../js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="../../../js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="../../../js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="../../../js/plugins.js"></script>
<!-- Active js -->
<script src="../../../js/active.js"></script>
<script src="../../../js/register.js"></script>
<script src="../../../js/edit_profile.js"></script>

@yield(('scripts'))
</html>
