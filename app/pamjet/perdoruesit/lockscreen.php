<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="<?= ROOT ?>/asetet/css/lockscreen.css">
</head>

<body>

    <div class="left-side">
        <div class="form-container">
            <div class="foto">
                <img src="<?= ROOT ?>/asetet/foto/user.jpg" alt="">
            </div>
            <p class="titulli">Përshëndetje, Filan!</p>
            <form action="<?= ROOT ?>/perdoruesit/kycu" method="POST">
                <div class="fusha">
                    <label for="">Fjalëkalimi</label>
                    <div class="fusha-icon">
                        <input type="hidden" name="email" value="<?= $email ?>">
                        <span class="material-symbols-outlined icon">lock</span>
                        <input type="password" class="input" name="fjalekalimi" placeholder="Fjalëkalimi">
                    </div>
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
            <img src="<?= ROOT ?>/asetet/foto/lms-white.png" alt="">
        </div>
    </div>
</body>

</html>