<script>
    function validateEmail() {
        var emailInput = document.getElementById('email');
        var emailError = document.getElementById('emailError');

        var emailRegex = /[a-zA-Z0-9._-]+@+[a-z]+\.+[a-z]{2,4}$/;

        if (emailRegex.test(emailInput.value)) {
            emailInput.classList.remove('invalid');
            emailError.style.display = 'none';
        } else {
            emailInput.classList.add('invalid');
            emailError.style.display = 'block';
            emailError.textContent = 'Ju lutem kontrolloni emailin!';
        }
    }

    function validatePassword() {
        var passwordInput = document.getElementById('password');
        var passwordError = document.getElementById('passwordError');

        var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (passwordRegex.test(passwordInput.value)) {
            passwordInput.classList.remove('invalid');
            passwordError.style.display = 'none';
        } else {
            passwordInput.classList.add('invalid');
            passwordError.style.display = 'block';
            passwordError.textContent = 'Ju lutem kontrolloni fjalekalimin!';
        }
    }

    function validateForm() {
        validateEmail();
        validatePassword();

        return !(document.querySelectorAll('.input.invalid').length > 0);
    }
</script>