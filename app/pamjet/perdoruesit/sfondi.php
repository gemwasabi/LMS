<style>
    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .row {
        display: flex;
        justify-content: space-between;
    }

    .user-form {
        display: flex;
        gap: 20px;
    }

    .user-details,
    .user-image {
        flex: 1;
    }

    .user-title {
        font-size: 1.1rem;
        color: #5b5b5b;
        font-weight: 500;
    }

    .separator {
        height: 1px;
        background-color: #dee2e6;
        margin: 15px 0;
    }

    .form-field {
        margin-bottom: 15px;
    }

    .label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .select-wrapper {
        position: relative;
    }

    .select-wrapper::after {
        content: '\25BC';
        font-size: 14px;
        color: #555;
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        pointer-events: none;
    }


    .file-input {
        margin-top: 10px;
    }

    .btn-standard button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn button:hover {
        background-color: #0056b3;
    }

    .user-img-sfondi {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        width: 200px;
        border-radius: 100%;
        border: #5b5b5b solid 1px;
    }



    /* Optional: Add responsiveness for smaller screens */
    @media (max-width: 768px) {
        .row {
            flex-direction: column;
        }

        .user-form {
            flex-direction: column;
        }

        .user-details,
        .user-image {
            width: 100%;
        }
    }

    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }
</style>
<?php
$flash = new Flash;

$x = $flash->merr('success');
$y = $flash->merr('danger');
?>
<div class="main-content">
    <?php if ($x): ?>
        <div class="alert alert-success">
            <?= $x ?>
        </div>
    <?php endif; ?>
    <?php if ($y): ?>
        <div class="alert alert-error">
            <?= $y ?>
        </div>
    <?php endif; ?>
    <div class="breadcrumbs">
        <span class="bc-header">Sfondi</span>
        <span class="bc-bc">
            <a href="<?= ROOT ?>/perdoruesit">Përdoruesit</a> <i
                class="material-symbols-outlined icon">chevron_right</i>
            Edito:
            <?= $perdoruesi['emri'] . ' ' . $perdoruesi['mbiemri'] ?>
        </span>
    </div>
    <div class="container">
        <div class="row">
            <form action="<?= ROOT ?>/perdoruesit/perditeso/<?= $perdoruesi['id'] ?>" method="POST" class="user-form" enctype="multipart/form-data">
                <div class="user-details">
                    <span class="user-title">Detajet e Përdoruesit</span>
                    <div class="separator"></div>
                    <div class="form-field">
                        <label for="emri">Emri</label>
                        <input type="text" class="input" id="emri" placeholder="Emri" name="emri"
                            value="<?= $perdoruesi['emri'] ?>">
                        <div class="error-message" id="emri-error"></div>
                    </div>
                    <div class="form-field">
                        <label for="mbiemri">Mbiemri</label>
                        <input type="text" class="input" id="mbiemri" placeholder="Mbiemri" name="mbiemri"
                            value="<?= $perdoruesi['mbiemri'] ?>">
                        <div class="error-message" id="mbiemri-error"></div>
                    </div>
                    <div class="form-field">
                        <label for="email">Email</label>
                        <input type="email" class="input" id="email" placeholder="Email" name="email"
                            value="<?= $perdoruesi['emaili'] ?>">
                        <div class="error-message" id="email-error"></div>
                    </div>
                    <div class="form-field">
                        <label for="grupi">Grupi</label>
                        <select name="grupi" class="input">
                            <option value="0" <?= ($perdoruesi['grupi'] == 0) ? 'selected' : '' ?>>Admin</option>
                            <option value="1" <?= ($perdoruesi['grupi'] == 1) ? 'selected' : '' ?>>Profesor</option>
                            <option value="2" <?= ($perdoruesi['grupi'] == 2) ? 'selected' : '' ?>>Student</option>
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="fjalekalimi">Fjalekalimi</label>
                        <input type="password" class="input" id="fjalekalimi" placeholder="Fjalekalimi"
                            name="fjalekalimi">
                        <div class="error-message" id="fjalekalimi-error"></div>
                    </div>
                    <div class="form-field">
                        <label for="kfjalekalimi">Konfirmo Fjalëkalimin</label>
                        <input type="password" class="input" id="kfjalekalimi" placeholder="Konfirmo Fjalëkalimin"
                            name="kfjalekalimi">
                        <div class="error-message" id="kfjalekalimi-error"></div>
                    </div>
                    <div class="form-field">
                        <button class="btn" type="submit"><i class="material-symbols-outlined icon">edit</i>
                            Përditëso</button>
                    </div>
                </div>
                <div class="user-image">
                    <span class="user-title">Fotoja e Përdoruesit</span>
                    <div class="separator"></div>
                    <img class="user-img-sfondi" src="<?= ROOT ?>/asetet/foto/user.jpg" alt="">
                    <input name="foto" type="file" class="file-input">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();

            if (validateForm()) {
                this.submit();
            }
        });

        function validateForm() {
            let isValid = true;

            let emri = $('#emri').val().trim();
            if (emri === '') {
                displayError('emri', 'Emri nuk mund të jetë bosh.');
                isValid = false;
            } else {
                clearError('emri');
            }

            let mbiemri = $('#mbiemri').val().trim();
            if (mbiemri === '') {
                displayError('mbiemri', 'Mbiemri nuk mund të jetë bosh.');
                isValid = false;
            } else {
                clearError('mbiemri');
            }

            let email = $('#email').val().trim();
            if (email === '') {
                displayError('email', 'Emaili nuk mund të jetë bosh.');
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                displayError('email', 'Emaili nuk është valid.');
                isValid = false;
            } else {
                clearError('email');
            }

            let fjalekalimi = $('#fjalekalimi').val().trim();
            let kfjalekalimi = $('#kfjalekalimi').val().trim();
            if (fjalekalimi !== '' || kfjalekalimi !== '') {
                if (fjalekalimi !== kfjalekalimi) {
                    displayError('kfjalekalimi', 'Konfirmo Fjalëkalimin nuk mund të jetë bosh.');
                    isValid = false;
                }
            } else {
                clearError('kfjalekalimi');
            }


            return isValid;
        }

        function displayError(fieldName, message) {
            $(`#${fieldName}-error`).text(message);
            $(`#${fieldName}`).css('border-color', 'red');
        }

        function clearError(fieldName) {
            $(`#${fieldName}-error`).text('');
            $(`#${fieldName}`).css('border-color', '');
        }
    });
</script>