<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <h2>Регистрация</h2>
        <p>На ваш номер телефона выслано смс с паролем. Пожалуйста введите его ниже:</p>
        <form action="<?php echo URLROOT?>/users/sms" method="post">
            <div class="form-group">
                <label for="pass">Пароль: <sup>*</sup></label>
                <input type="text" name="pass" class="form-control form-control-lg">
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
