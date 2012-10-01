<?php
Yii::app()->clientscript
        ->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap.css')
        ->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-responsive.css')
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Моя статистика</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                body{
                    padding-top: 0px;
                }
            }
        </style>
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Статистика</a>
                    <div class="nav-collapse">
                        <?php if (!Yii::app()->user->isGuest) { ?>
                            <p class="navbar-text pull-right">Добро пожаловать, Администратор <span style="padding-left: 30px;"><a href="<?php echo Yii::app()->baseUrl . '/site/logout'; ?>">Выход</a></span></p>
                        <?php } else { ?>
                            <p class="navbar-text pull-right">Добро пожаловать, гость <span style="padding-left: 30px;"><a href="<?php echo Yii::app()->baseUrl . '/site/login'; ?>">Вход</a></span></p>                        
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="hero-unit">
                        <?php echo $content ?>
                    </div>
                </div>
                <hr>
                <footer>
                    <p style="text-align: center;">&copy; Voronkov 2012</p>
                </footer>
            </div>
    </body>
</html>
