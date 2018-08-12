
<? if(isset($errors) && $errors == true) : ?>

    <div class="alert alert-danger"> Indentifiants incorrects </div>

<? endif; ?>
<form method="post">

    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe',['type'=>'password']); ?>
    <?= $form->submit(); ?>

</form>


