<?=require('partials/head.php');?>


<body>

    <div class="left-side">
        <div class="form-container">
            <div class="foto">
                <img src="../../public/asetet/foto/user.jpg" alt="">
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
            <img src="../../public/asetet/foto/lms-white.png" alt="">
        </div>
    </div>

<?= require('partials/script.php'); ?>
</body>

</html>