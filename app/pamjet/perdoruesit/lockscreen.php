<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="../asetet/css/lockscreen.css">
</head>

<body>

    <div class="left-side">
        <div class="form-container">
            <div class="foto">
                <img src="../asetet/foto/user.jpg" alt="">
            </div>
            <p class="titulli">Përshëndetje, Filan!</p>
            <form action="#" onsubmit="return validateForm()">
                <div class="fusha">
                    <label for="">Fjalëkalimi</label>
                    <div class="fusha-icon">
                        <span class="material-symbols-outlined icon">lock</span>
                        <input type="password" id="password" class="input" placeholder="Fjalëkalimi"
                            oninput="validatePassword()">
                    </div>
                    <div class="error" id="passwordError"></div>
                </div>
                <div class="fusha btn">
                    <button type="submit">Kyçu</button>
                </div>
            </form>
        </div>
    </div>

    <div class="right-side">
        <div class="white-logo">
            <!-- Your white logo content goes here -->
            <img src="../asetet/foto/lms-white.png" alt="">
        </div>
    </div>

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
</body>

</html>