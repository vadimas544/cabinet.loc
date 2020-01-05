// alert('Hello');
jQuery(function($){
   $("#phone").mask("+38(999) 999-9999");
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