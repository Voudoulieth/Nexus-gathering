// variable qui target les boutons

const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

// permutation 

registerBtn.addEventListener('click', ()=> { container.classList.add("active")});
loginBtn.addEventListener('click', ()=> { container.classList.remove("active")})

function isValidUsername(username) {
    return username.trim().length > 0;
}

function isValidPassword(password) {
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return regex.test(password);
}

function isValidEmail(email) {
    const regex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    return regex.test(email);
}