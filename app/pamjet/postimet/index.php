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
                <a href="<?= ROOT ?>/postimet/krijo" class="btn"><i class="material-symbols-outlined icon">add</i>
                    Krijo Postim</a>
            </div>
            <table class="mt-1" id="postimet-table">
                <thead>
                    <th>ID</th>
                    <th>Klasa</th>
                    <th>Titulli</th>
                    <th>Përmbajtja</th>
                    <th>Data e krijimit</th>
                    <th>Aksion</th>
                </thead>
                <tbody>
                    <?php foreach ($postimet as $p): ?>
                        <tr>

                            <td>
                                <?= $p['id'] ?>
                            </td>
                            <td>
                                <?= $p['emri_klases'] ?>
                            </td>
                            <td>
                                <?= $p['titulli'] ?>
                            </td>
                            <td>
                                <?= substr($p['permbajtja'], 0, 50) ?>...
                            </td>
                            <td>
                                <?= $p['data_krijimit'] ?>
                            </td>
                            <td>
                                <a href="<?= ROOT ?>/postimet/perditeso/<?= $p['id'] ?>">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </a>
                                <a href="<?= ROOT ?>/postimet/shlyej/<?= $p['id'] ?>">
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