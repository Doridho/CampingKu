
// login dan register 

const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const toRegister = document.getElementById('toRegister');
const toLogin = document.getElementById('toLogin');

// Pindah ke Form Register
toRegister.addEventListener('click', (e) => {
    e.preventDefault();
    loginForm.classList.add('hidden');
    registerForm.classList.remove('hidden');
});

// Pindah ke Form Login
toLogin.addEventListener('click', (e) => {
    e.preventDefault();
    registerForm.classList.add('hidden');
    loginForm.classList.remove('hidden');
});
