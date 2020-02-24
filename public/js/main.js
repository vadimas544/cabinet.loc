// alert('Hello');
// jQuery(function($){
//    $("#phone").mask("+38(999) 999-9999");
// });


$(document).ready(function () {
   $(".edit").on('click', function () {
         var code_client = $(this).attr("id");
         $.ajax({
            url:"fetch.php",
            method:"post",
            data:{code_client:code_client},
            success:function (data) {
               $("$name").val(data.name),
               $("$surname").val(data.surname),
               $("$patronymic").val(data.patronymic),
               $("$date_birth").val(data.date_birth),
               $("$phone").val(data.phone),
               $("$email").val(data.email)
            }

         });
   });
});


let showPassword = document.querySelectorAll('.password-show');

showPassword.forEach(item =>
   item.addEventListener('click', toggleType)
);

function toggleType(){
   let input = this.closest('.group').querySelector('.password');

   if(input.type === 'password'){
      input.type = 'text';
   } else{
      input.type = 'password';
   }
}

let updateName = document.querySelectorAll('#insert');
updateName.forEach(item =>
    item.addEventListener('click', UpdateName)
);
function UpdateName() {
   let input = this.closest('#insert_form').querySelector('#insert');
   if($("#name").val() == ""){
      alert('Небхідно вказати імя');
   }
}