<?php
Yii::app()->clientscript
        ->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap.css')
        ->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-responsive.css')
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Моя статистика</title>
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
    </head>
    <body>
        <?php $this->renderPartial('//site/navbar'); // меню навигации ?>
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
