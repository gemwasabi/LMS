<?php
    require('partials/head.php');
?>

<body>
    <section class="container">
        <div class="form">
            <div class="foto">
                <img src="../../public/asetet/foto/lms.png" alt="">
            </div>
            <header>Kyçuni në program</header>

            <form action="/" onsubmit="return validateForm()">
                <div class="fusha">
                    <label for="email">Email</label>
                    <div class="fusha-icon">
                        <span class="material-symbols-outlined icon">email</span>
                        <input type="email" id="email" class="input" placeholder="Email" oninput="validateEmail()">
                    </div>
                    <div class="error" id="emailError"></div>
                </div>

                <div class="fusha">
                    <label for="password">Fjalëkalimi</label>
                    <div class="fusha-icon">
                        <span class="material-symbols-outlined icon">lock</span>
                        <input type="password" id="password" class="input" placeholder="Fjalëkalimi"
                            oninput="validatePassword()">
                    </div>
                    <div class="error" id="passwordError"></div>
                </div>

                <div class="form-link">
                    <span class="ruaj-te-dhenat"><input type="checkbox"> Ruaj të dhënat</span>
                    <a href="#" class="forgot-pass">Ke harruar fjalëkalimin?</a>
                </div>

                <div class="fusha btn">
                    <button type="submit">Kyçu</button>
                </div>
            </form>
        </div>
    </section>
</body>
    <?= require('partials/script.php'); ?>

</html>