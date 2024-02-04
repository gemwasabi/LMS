<style>
    .pagination {
        text-align: center;
        margin-top: 20px;
    }

    .pagination-btn {
        background-color: #6f97ff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        cursor: pointer;
        margin: 0 5px;
    }

    .page-info {
        display: inline-block;
        margin: 0 10px;
    }
</style>
<?php
$flash = new Flash;

$x = $flash->merr('success');
?>

<div class="main-content">
    <div class="container">
        <?php if ($x): ?>
            <div class="alert alert-success">
                <?= $x ?>
            </div>
        <?php endif; ?>
        <div class="breadcrumbs">
            <span class="bc-header">Ballina</span>
            <span class="bc-bc">
                <a href="#">Ballina</a> <i class="material-symbols-outlined icon">chevron_right</i> Të gjitha
            </span>
        </div>
        <?php if ($postimet): ?>
            <div class="filters">
                <div class="left">
                    <span>Të gjitha postimet</span>
                    <span class="left-num">
                        <?= sizeof($postimet) ?>
                    </span>
                </div>
                <div class="right" id="filtro">
                    <button type="button" class="btn"><i class="material-symbols-outlined icon">filter_alt</i>
                        Filtro</button>
                </div>
            </div>
            <div class="separator"></div>
            <?php foreach ($postimet as $p): ?>
                <div class="card" data-id="<?= $p['id'] ?>">
                    <div class="card-body">
                        <div class="left">
                            <p class="card-header"><i class="material-symbols-outlined icon">tag</i>
                                <?= $p['emri_klases'] ?>
                            </p>
                            <p class="card-title">
                                <?= $p['titulli'] ?>
                            </p>
                            <p class="card-footer"><i class="material-symbols-outlined icon">calendar_today</i> Krijuar më
                                <?= $p['data_krijimit'] ?>
                            </p>
                        </div>
                        <div class="right">
                            <div>
                                <p class="card-p-role">Profesori</p>
                                <p class="card-p-name">
                                    <?= $p['perdoruesi'] ?>
                                </p>
                            </div>
                            <i class="material-symbols-outlined icon">face</i>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="pagination">
                <button class="pagination-btn prev">Kaluara</button>
                <div class="page-info"></div>
                <button class="pagination-btn next">Tjetra</button>
            </div>
        <?php else: ?>
            <h3>Nuk keni asnjë postim të ri. Provoni të bashkangjiteni në disa <a
                    href="<?= ROOT ?>/klasat/klasat_personale/<?= $_SESSION['id'] ?>">klasa</a>!</h3>
        <?php endif; ?>
    </div>
</div>

<div id="cardModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <div class="left">
                <div class="modal-title"></div>
                <p class="card-meta"><i class="material-symbols-outlined icon">calendar_today</i> Krijuar më
                    23 Qershor
                    2023</p>
                <div class="modal-subtitle">
                    <p></p>
                </div>
                <div class="modal-text">

                </div>
                <p class="card-separator">Fajllat e bashkangjitur</p>
                <div class="attachment-content">
                    <div class="attachment">
                        <i class="material-symbols-outlined icon">picture_as_pdf</i>
                        <p>File Name.pdf</p>
                    </div>
                    <div class="attachment">
                        <i class="material-symbols-outlined icon">description</i>
                        <p>File Name.pdf</p>
                    </div>
                    <div class="attachment">
                        <i class="material-symbols-outlined icon">image</i>
                        <p>File Name.pdf</p>
                    </div>
                </div>
                <button type="button" class="btn-square" id="mbyll_modal"><i
                        class="material-symbols-outlined icon">close</i>
                    Mbyll</button>
            </div>
            <div class="right">
                <i class="material-symbols-outlined icon">face</i>
                <p class="p-role">Profesori</p>
                <p class="p-name" id="modal-profesori"></p>
                <div class="separator"></div>
                <p class="p-role">Lënda</p>
                <p class="p-name" id="modal-lenda"></p>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function () {


            var cardsPerPage = 4;
            var currentPage = 1;
            var totalPages; // Declare totalPages outside the function scope

            function showPage(page) {
                $('.card').hide();
                var startIndex = (page - 1) * cardsPerPage;
                var endIndex = startIndex + cardsPerPage;
                $('.card').slice(startIndex, endIndex).show();
            }

            function updatePageInfo() {
                var totalCards = $('.card').length;
                totalPages = Math.ceil(totalCards / cardsPerPage); // Assign the value to totalPages
                $('.page-info').text('Faqja ' + currentPage + ' nga ' + totalPages);
            }

            showPage(currentPage);
            updatePageInfo();

            $('.pagination-btn').click(function () {
                if ($(this).hasClass('next') && currentPage < totalPages) {
                    currentPage++;
                } else if ($(this).hasClass('prev') && currentPage > 1) {
                    currentPage--;
                }
                showPage(currentPage);
                updatePageInfo();
            });


            // Toggle sidebar
            $('#btn').click(function () {
                $('.sidebar').toggleClass('active');
            });

            $("#filtro").on('click', function () {

            })

            // Modal show
            $('.card').click(function () {
                let id = $(this).data('id');
                $.ajax({
                    url: 'postimet/merr_postimin_json',
                    method: 'GET',
                    dataType: 'json',
                    data: { id: id },
                    success: function (r) {
                        $(".modal-title").text(r.titulli);
                        $(".modal-subtitle p").text(r.klasa + ' - ' + r.titulli);
                        $(".modal-text").text(r.permbajtja);
                        $("#modal-profesori").text(r.profesori);
                        $("#modal-lenda").text(r.klasa);
                        $('#cardModal').css('display', 'block');

                    },
                    error: function (x) { }
                });
            });

            // Modal hide
            $('#mbyll_modal').click(function () {
                $('#cardModal').css('display', 'none');
            });

            // Close modal when clicking outside the modal
            $(window).click(function (event) {
                if (event.target == $('#cardModal')[0]) {
                    $('#cardModal').css('display', 'none');
                }
            });
        });
    </script>