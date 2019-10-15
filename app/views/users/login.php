<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php
//            var_dump($_SESSION);
            flash('register_success');?>
            <h2>Авторизация</h2>
            <p>Пожалуйста введите ваши данные</p>
            <form action="<?php echo URLROOT?>/users/login" method="post">
                <div class="form-group">
                    <label for="phone">Телефон: <sup>*</sup></label>
                    <input type="text" name="phone" id="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_error'])) ? 'is-invalid' : ''?>"
                           value="<?php echo $data['phone']; ?>">
                    <span class="invalid-feedback"><?php echo $data['phone_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Пароль: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''?>"
                           value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Войти" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT;?>/users/register " class="btn btn-light btn-block">Нет учетной записи? <span style="color: cornflowerblue">Зарегистрироваться</span></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
