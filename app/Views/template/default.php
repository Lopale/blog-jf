<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../bootstrap/favicon.ico">

    <title><?php echo App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../bootstrap/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://blog-jf.david-grillon.com/public/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://blog-jf.david-grillon.com/public/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://blog-jf.david-grillon.com/public/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="http://blog-jf.david-grillon.com/public/img/favicons/manifest.json">
    <link rel="mask-icon" href="http://blog-jf.david-grillon.com/public/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="http://blog-jf.david-grillon.com/public/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="http://blog-jf.david-grillon.com/public/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Fin Favicon -->

    <!-- TiniMCE -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <!-- Fin TiniMCE -->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template" style="padding-top: 100px;">
        

        <?php echo $pageContent; // Contenu de la page ?> 


      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="../../public/js/script.js"></script>
  </body>
</html>
