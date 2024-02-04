<style>
    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        margin: 0 4px;
        text-decoration: none;
        color: #6f97ff;
        border: 1px solid #6f97ff;
        border-radius: 4px;
    }

    .pagination a.active {
        background-color: #6f97ff;
        color: #fff;
    }
</style>
<div class="main-content">
    <?php
    $flash = new Flash;

    $x = $flash->merr('success');
    $y = $flash->merr('danger');
    ?>
    <div class="container">
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
                <a href="<?= ROOT ?>/ballina">Ballina</a> <i class="material-symbols-outlined icon">chevron_right</i>
                Sfondi
            </span>
        </div>
        <div class="row">
            <div class="form-field mt-1">
                <a href="<?= ROOT ?>/klasat/krijo" class="btn"><i class="material-symbols-outlined icon">add</i>
                    Krijo Klasë</a>
            </div>
            <table class="mt-1">
                <thead>
                    <th>ID</th>
                    <th>Emri</th>
                    <th>Përshkrimi</th>
                    <th>Fjalëkalimi</th>
                    <th>Profesori</th>
                    <th>Data e krijimit</th>
                    <th>Numri i studentëve</th>
                    <th>Aksion</th>
                </thead>
                <tbody>
                    <?php foreach ($klasat as $k): ?>
                        <tr>

                            <td>
                                <?= $k['id'] ?>
                            </td>
                            <td>
                                <?= $k['emri'] ?>
                            </td>
                            <td>
                                <?= $k['pershkrimi'] ?>
                            </td>
                            <td>
                                <?= $k['fjalekalimi'] ?>
                            </td>
                            <td>
                                <a href="<?= ROOT ?>/perdoruesit/sfondi/<?= $k['profesori_id'] ?>">
                                    <?= $k['profesori'] ?>
                            </td>
                            <td>
                                <?= $k['data_krijimit'] ?>
                            </td>
                            <td>
                                <?= $k['nr_studenteve'] ?> studentë
                            </td>
                            <td>
                                <a href="<?= ROOT ?>/klasat/perditeso/<?= $k['id'] ?>">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </a>
                                <a href="<?= ROOT ?>/klasat/shlyej/<?= $k['id'] ?>">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="pagination" id="pagination"></div>
        </div>
    </div>
</div>

<script src="<?= ROOT ?>/asetet/js/pagination.js"></script>