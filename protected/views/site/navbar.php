<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="#">Статистика</a>
            <div class="nav-collapse">
                <?php if (!Yii::app()->user->isGuest) { ?>
                    <p class="navbar-text pull-right">
                        Добро пожаловать, Администратор
                        <span style="padding-left: 30px;"><?php echo CHtml::link('Войти', Yii::app()->createUrl('site/login')); ?>
                        </span>
                    </p>
                <?php } else { ?>
                    <p class="navbar-text pull-right">
                        Добро пожаловать, гость
                        <span style="padding-left: 30px;">
                            <?php echo CHtml::link('Выйти', Yii::app()->createUrl('site/logout')); ?>
                        </span>
                    </p>                        
                <?php } ?>
            </div>
        </div>
    </div>
</div>