<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" type="text/css" href="public/css/style.css"  />
            <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" />
            <script src="public/js/jquery-1.11.3.min.js"></script>
            <script src="public/js/bootstrap.js"></script>
        </meta>
        <title>Bank payments</title>
    </head>	

    <body>
        <?php include 'App/views/common/menu.php'; ?>
        <?php
        include 'app.php';
        $controller = new App\Controllers\PaymentsController();
        ?>
    </body>
</html>
