<script>
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
            validatePassword();

            return !(document.querySelectorAll('.input.invalid').length > 0);
        }
    </script>