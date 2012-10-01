<h2>Авторизация:</h2>
<br />
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(// генерируем форму авторизации
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
            ));
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Пользователь:'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <span style="color:red;"><?php echo $form->error($model, 'username'); ?></span>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Пароль:'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <span style="color:red;"><?php echo $form->error($model, 'password'); ?></span>
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>
    <br />
    <div class="row">
        <?php echo CHtml::submitButton('Войти', array('class' => 'btn-success')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
