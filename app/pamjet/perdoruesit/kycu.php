<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS |
        <?= $titulli ?>
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="<?= ROOT ?>/asetet/css/kycu.css">
</head>

<body>
    <section class="container">
        <div class="form">
            <div class="foto">
                <img src="<?= ROOT ?>/asetet/foto/lms.png" alt="">
            </div>
            <header>Kyçuni në program</header>

            <form action="kycu" method="POST">
                <?php if (isset($error)): ?>
                    <div class="alert alert-error">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <div class="fusha">
                    <label for="">Email</label>
                    <div class="fusha-icon">
                        <span class="material-symbols-outlined icon">email</span>
                        <input type="email" class="input" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="fusha">
                    <label for="">Fjalëkalimi</label>
                    <div class="fusha-icon">
                        <span class="material-symbols-outlined icon">lock</span>
                        <input type="password" class="input" placeholder="Fjalëkalimi" name="fjalekalimi">
                    </div>
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

</html>