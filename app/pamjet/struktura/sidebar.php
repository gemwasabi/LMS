<div class="sidebar active">
    <div class="top">
        <div class="logo">
            <img src="" alt="" />
        </div>
    </div>
    <div class="user">
        <img class="user-img" src="<?= ROOT ?>/asetet/foto/<?= $_SESSION['foto'] ?>" alt="">
        <div>
            <p class="bold">
                <?= $_SESSION['emri'] . ' ' . $_SESSION['mbiemri'] ?>
            </p>
            <p class="bold">
                <?= $_SESSION['emaili'] ?>
            </p>
        </div>
    </div>
    <div class="separator"></div>
    <?php if ($_SESSION['grupi'] == '2'): ?>
        <span class="sidebar-category">Studenti</span>
        <ul>
            <li>
                <a href="<?= ROOT ?>/ballina">
                    <i class="material-symbols-outlined icon">library_books</i>
                    <span class="nav-item">Ballina</span>
                </a>
                <span class="tooltip">Ballina</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/klasat/klasat_personale/<?= $_SESSION['id'] ?>">
                    <i class="material-symbols-outlined icon">auto_stories</i>
                    <span class="nav-item">Klasat</span>
                </a>
                <span class="tooltip">Klasat</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/ballina">
                    <i class="material-symbols-outlined icon">schedule</i>
                    <span class="nav-item">Orari</span>
                </a>
                <span class="tooltip">Orari</span>
            </li>
        </ul>
        <div class="separator"></div>
    <?php endif; ?>
    <?php if ($_SESSION['grupi'] == '1' || $_SESSION['grupi'] == '0'): ?>
        <span class="sidebar-category">Profesori</span>
        <ul>
            <li>
                <a href="<?= ROOT ?>/postimet">
                    <i class="material-symbols-outlined icon">post</i>
                    <span class="nav-item">Postimet</span>
                </a>
                <span class="tooltip">Postimet</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/klasat/klasat_ligjeruese/<?= $_SESSION['id'] ?>">
                    <i class="material-symbols-outlined icon">auto_stories</i>
                    <span class="nav-item">Klasat Ligjëruese</span>
                </a>
                <span class="tooltip">Klasat Ligjëruese</span>
            </li>
        </ul>
        <div class="separator"></div>
    <?php endif; ?>
    <?php if ($_SESSION['grupi'] == '0'): ?>
        <span class="sidebar-category">Admin</span>
        <ul>
            <li>
                <a href="<?= ROOT ?>/perdoruesit">
                    <i class="material-symbols-outlined icon">person</i>
                    <span class="nav-item">Përdoruesit</span>
                </a>
                <span class="tooltip">Përdoruesit</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/klasat">
                    <i class="material-symbols-outlined icon">library_books</i>
                    <span class="nav-item">Klasat</span>
                </a>
                <span class="tooltip">Klasat</span>
            </li>
        </ul>
        <div class="separator"></div>
    <?php endif; ?>
    <span class="sidebar-category">Shtesa</span>
    <ul>
        <li>
            <a href="<?= ROOT ?>/perdoruesit/sfondi/<?= $_SESSION['id'] ?>">
                <i class="material-symbols-outlined icon">settings</i>
                <span class="nav-item">Sfondi</span>
            </a>
            <span class="tooltip">Sfondi</span>
        </li>
    </ul>
</div>