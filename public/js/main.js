// alert('Hello');
// jQuery(function($){
//    $("#phone").mask("+38(999) 999-9999");
// });

$(document).ready(function () {
   $("#insert_form").click(function(){
         event.preventDefault();
         if($("#name").val() == ""){
            alert('Небхідно вказати імя');
         }
   });
});


// jQuery(function($){
//
// });



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