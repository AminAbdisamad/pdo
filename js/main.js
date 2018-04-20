let elem = document.querySelector('select');
let instance = M.FormSelect.init(elem, options);

//check validation for users 

const email = document.querySelector('#email');
const username = document.querySelector('#username');
const status = document.querySelector('#status');

const error = document.querySelector('.error');
if(email.value === "" || username.value === "" || status.value === ""){
    const smg ='Empty Fields are not allowed ';
}