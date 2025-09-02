const container = document.getElementById('container');
const signUpBtn = document.getElementById('signUp');
const signInBtn = document.getElementById('signIn');
const signInForm = document.getElementById('sign-in-form');

signUpBtn.addEventListener('click', () => {
    container.classList.add('active');
});

signInBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

signInForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent the form from submitting normally

    // For this example, we assume login is always successful.
    // In a real application, you would validate the email and password here.

    // 1. Set a flag in session storage to indicate the user is logged in
    sessionStorage.setItem('loggedIn', 'true');

    // 2. Redirect the user to the parking page
    window.location.href = 'parking2.html';
});