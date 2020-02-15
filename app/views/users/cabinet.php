<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="text-left">
                <h4>Особисті дані</h4>
                <table class="table-cab">
                    <tr>
                        <td>Ім'я</td>
                        <td>Вадим</td>
                        <td>
                            <div class="edit">
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                    <img src="<?php echo URLROOT;?>/public/img/icon_edit.png" alt="edit">
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Введіть нове ім'я:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Ім'я:</label>
                                                        <input type="text" class="form-control" id="name">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                                <button type="button" class="btn btn-primary">Змінити</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Прізвище</td>
<!--                        <td>--><?php //echo $data['surname']; ?><!--</td>-->
<!--                    </tr>-->
<!--                    <tr >-->
<!--                        <td>Змінити прізвища</td>-->
<!--                        <td>-->
<!--                            <input type="text" id="surname" name="surname">-->
<!--                            <button id="change_surname" class="btn-md">Змінити</button>-->
<!--                        </td>-->
<!--                    </tr>-->
                    <tr>
                        <td>По-батькові</td>
<!--                        <td>--><?php //echo $data['patronymic']; ?><!--</td>-->
                    </tr>
<!--                    <tr>-->
<!--                        <td>Стать</td>-->
<!--                           --><?php
////                            if(!empty($properties[2])){
////                                if($properties[2] == 1){
////                                    echo 'Мужской';
////                                }else{
////                                    echo 'Женский';
////                                }
////                            } else{
////                                echo '-';
////                            }
////                            ?>
<!--                        </td>-->
<!--                    </tr>-->
                    <tr>
                        <td>Дата народження</td>
<!--                        <td>--><?php //echo $data['date_birth']; ?><!--</td>-->
                    </tr>
                    <tr>
                        <td>Телефон</td>
<!--                        <td>-->
<!--                            --><?php
//                            if(!empty($properties[1])){
//                                echo $properties[1];
//                            } else{
//                                echo '-';
//                            }
//                            ?>
<!--                        </td>-->
                    </tr>
<!--                    <tr>-->
<!--                        <td>Зміна номера телефону</td>-->
<!--                        <td>-->
<!--                            <input name='phone' id="phone" type='text' maxlength='20' size='20'>-->
<!--                            <button id="change_phone" class="btn-md">Змінити</button>-->
<!--                        </td>-->
<!--                    </tr>-->
                    <tr>
                        <td>E-mail</td>
<!--                        <td>-->
<!--                            --><?php
//                            if(!empty($properties[3])){
//                                echo $properties[3];
//                            } else{
//                                echo '-';
//                            }
//                            ?>
<!--                        </td>-->
                    </tr>
<!--                    <tr>-->
<!--                        <td>Змінити E-Mail</td>-->
<!--                        <td>-->
<!--                            <input name='email' id="email" type='text'>-->
<!--                            <button id="change_email" class="btn-md">Змінити</button>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Змінити пароль</td>-->
<!--                        <td>-->
<!--                            <input name='pwd' type='pwd' id="pwd" maxlength='20'>-->
<!--                            <button id="change_pwd" class="btn-md">Змінити</button>-->
<!--                        </td>-->
<!--                    </tr>-->
                </table>
            </div>
        </div>
        <div class="col-md-6 mx-auto">
            <div class="text-center">
                <h4>Карта лояльності</h4>
                <div class="card-wrapper">
                    <div class="card-front">
                        <h4 class="card-logo">
                            City
                            Market
                        </h4>
                        <h4 class="card-text">Карта лояльності</h4>
                        <p id="card-number">000401300001</p>
                        <h4 class="card-text-bottom">Карта лояльності</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
        </div>
        <div class="col-md-6 mx-auto">
            <div class="card-wrapper">
                <div class="card-front">
                    <h4 class="card-text">City Market</h4>
                    <div class="barcode">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
