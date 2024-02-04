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

    h3 {
        color: #007bff;
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

    .user-img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    textarea {
        resize: vertical;
        /* Allow vertical resizing */
        min-height: 100px;
        /* Set a minimum height */
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

    .user-title {
        font-size: 1.1rem;
        color: #5b5b5b;
        font-weight: 500;
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
        <span class="bc-header">Krijo Klasë</span>
        <span class="bc-bc">
            <a href="<?= ROOT ?>/klasat">Klasat</a> <i class="material-symbols-outlined icon">chevron_right</i>
            Krijo Klasë
        </span>
    </div>
    <div class="container mt-2">
        <div class="row">
            <form action="<?= ROOT ?>/klasat/krijo" method="POST" class="user-form">
                <div class="user-details">
                    <span class="user-title">Detajet e Klasës</span>
                    <div class="separator"></div>
                    <div class="form-field">
                        <label for="emri">Emri i Klasës</label>
                        <input type="text" id="emri" class="input" placeholder="Emri i Klasës" name="emri">
                        <div class="error-message" id="emri-error"></div>
                    </div>
                    <div class="form-field">
                        <label for="pershkrimi">Përshkrimi i Klasës</label>
                        <textarea id="pershkrimi" name="pershkrimi" class="input" rows="5"
                            placeholder="Përshkrimi i Klasës"></textarea>
                        <div class="error-message" id="pershkrimi-error"></div>
                    </div>
                    <div class="form-field">
                        <label for="grupi">Profesori i Klasës</label>
                        <select name="profesori" class="input">
                            <?php foreach ($profesorat as $p): ?>
                                <option value="<?= $p['id'] ?>">
                                    <?= $p['emri'] . ' ' . $p['mbiemri'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="fjalekalimi">Fjalekalimi</label>
                        <input type="password" id="fjalekalimi" class="input" placeholder="Fjalekalimi"
                            name="fjalekalimi">
                        <div class="error-message" id="fjalekalimi-error"></div>
                    </div>
                    <div class="form-field">
                        <label for="kfjalekalimi">Konfirmo Fjalëkalimin</label>
                        <input type="password" id="kfjalekalimi" class="input" placeholder="Konfirmo Fjalëkalimin"
                            name="kfjalekalimi">
                        <div class="error-message" id="kfjalekalimi-error"></div>
                    </div>
                    <div class="form-field">
                        <button class="btn" type="submit"><i class="material-symbols-outlined icon">add</i>
                            Krijo</button>
                    </div>
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

            let pershkrimi = $('#pershkrimi').val().trim();
            if (pershkrimi === '') {
                displayError('pershkrimi', 'Pershkrimi nuk mund të jetë bosh.');
                isValid = false;
            } else {
                clearError('pershkrimi');
            }

            let fjalekalimi = $('#fjalekalimi').val().trim();
            if (fjalekalimi === '') {
                displayError('fjalekalimi', 'Fjalekalimi nuk mund të jetë bosh.');
                isValid = false;
            } else {
                clearError('fjalekalimi');
            }

            let kfjalekalimi = $('#kfjalekalimi').val().trim();
            if (kfjalekalimi === '') {
                displayError('kfjalekalimi', 'Konfirmo Fjalëkalimin nuk mund të jetë bosh.');
                isValid = false;
            } else if (fjalekalimi !== kfjalekalimi) {
                displayError('kfjalekalimi', 'Konfirmo Fjalëkalimin nuk është e njejtë me Fjalëkalimin.');
                isValid = false;
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