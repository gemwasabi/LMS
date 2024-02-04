<style>
    /* Basic styling for the user form */

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

    #drop-area {
        border: 2px dashed #ccc;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        margin: 50px auto;
        width: 300px;
    }

    #drop-area.hover {
        border-color: #6f97ff;
    }

    #file-list {
        list-style-type: none;
        padding: 0;
    }

    .file-item {
        margin: 5px 0;
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
            Krijo Përdorues
        </span>
    </div>
    <div class="container mt-2">
        <div class="row">
            <form action="<?= ROOT ?>/postimet/krijo" method="POST" class="user-form">
                <div class="user-details">
                    <span class="user-title">Detajet e Postimit</span>
                    <div class="separator"></div>
                    <div class="form-field">
                        <label for="grupi">Klasa</label>
                        <select name="klasa" class="input">
                            <?php if ($klasat): ?>
                                <?php foreach ($klasat as $k): ?>
                                    <option value="<?= $k['id'] ?>" <?php if (isset($klasa)) {
                                          if ($klasa == $k['id']) {
                                              echo 'selected';
                                          }
                                      } ?>><?= $k['emri'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-field">
                        <label for="titulli">Titulli</label>
                        <input type="text" class="input" placeholder="Titulli" name="titulli" id="titulli">
                        <div class="error-message" id="titulli-error"></div>
                    </div>
                    <div class="form-field">
                        <label for="pershkrimi">Përshkrimi</label>
                        <textarea name="pershkrimi" class="input" rows="5" placeholder="Përshkrimi"
                            id="pershkrimi"></textarea>
                        <div class="error-message" id="pershkrimi-error"></div>
                    </div>
                    <div id="drop-area" class="drop-area">
                        <p>Lësho fajllat PDF këtu apo kliko për ti zgjedhur.</p>
                        <input type="file" id="fileInput" name="pdf_file" multiple>
                        <ul id="file-list"></ul>
                    </div>
                    <div class="form-field ">
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

            const titulli = $('#titulli').val().trim();
            if (titulli === '') {
                displayError('titulli', 'Titulli nuk mund të jetë bosh.');
                isValid = false;
            } else {
                clearError('titulli');
            }

            const pershkrimi = $('#pershkrimi').val().trim();
            if (pershkrimi === '') {
                displayError('pershkrimi', 'Përshkrimi nuk mund të jetë bosh.');
                isValid = false;
            } else {
                clearError('pershkrimi');
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


        const $dropArea = $('#drop-area');
        const $fileInput = $('#fileInput');
        const $fileList = $('#file-list');

        $dropArea.on('dragover', function (e) {
            e.preventDefault();
            $dropArea.addClass('hover');
        });

        $dropArea.on('dragleave', function () {
            $dropArea.removeClass('hover');
        });

        $dropArea.on('drop', function (e) {
            e.preventDefault();
            $dropArea.removeClass('hover');

            const files = e.originalEvent.dataTransfer.files;
            handleFiles(files);
        });

        $fileInput.on('change', function () {
            const files = this.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            $fileList.empty();

            $.each(files, function (index, file) {
                const listItem = $('<li>', { class: 'file-item', text: file.name });
                $fileList.append(listItem);
            });
        }
    });
</script>