<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>oziLoadData 2.x</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">


    <!-- Bootstrap core CSS -->
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">-->
    <link href="./bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>
<body>
<div style="height:10px;">
    <div class="progress-bar-global"></div>
</div>
<div class="container py-4">


    <?php include('menu.php') ?>

    <main id="mainContainer" class="p-4">

<?php //include('home.php') ?>
        <?php include('form.html') ?>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album example is © Bootstrap, but please download and customize it for yourself!</p>
            <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                        href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>
</div>
<script src="./bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./js/oziLoadData.js"></script>
<!--<script src="./js/oziLoadData-old.js"></script>-->

<script>
    // const conf = oziLoadDataConf({
    //     zldProgressBarGlobalClass: 'progress-bar-global',
    //     zldResponseValidClass: 'is-valid',
    //     zldResponseInvalidClass: 'is-invalid'
    // });

</script>
</body>
</html>