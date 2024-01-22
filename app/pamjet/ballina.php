<?php
$flash = new Flash;

$x = $flash->merr('success');

if ($x) {
    echo "<h1>$x</h1>";
}
?>

<div class="main-content">
    <div class="container">
        <div class="breadcrumbs">
            <span class="bc-header">Ballina</span>
            <span class="bc-bc">
                <a href="#">Ballina</a> <i class="material-symbols-outlined icon">chevron_right</i> Të gjitha
            </span>
        </div>
        <div class="filters">
            <div class="left">
                <span>Të gjitha postimet</span>
                <span class="left-num">54</span>
            </div>
            <div class="right">
                <button class="btn"><i class="material-symbols-outlined icon">filter_alt</i> Filtro</button>
            </div>
        </div>
        <div class="separator"></div>
        <div class="card" id="myBtn">
            <div class="card-body">
                <div class="left">
                    <p class="card-header"><i class="material-symbols-outlined icon">tag</i> Hyrje në
                        algoritme</p>
                    <p class="card-title">2.2 Mergesort</p>
                    <p class="card-footer"><i class="material-symbols-outlined icon">calendar_today</i> Krijuar më
                        23 Qershor
                        2023</p>
                </div>
                <div class="right">
                    <div>
                        <p class="card-p-role">Profesori</p>
                        <p class="card-p-name">Mirlinda Reqica</p>
                    </div>
                    <i class="material-symbols-outlined icon">face</i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="left">
                    <p class="card-header"><i class="material-symbols-outlined icon">tag</i> Hyrje në
                        algoritme</p>
                    <p class="card-title">2.2 Mergesort</p>
                    <p class="card-footer"><i class="material-symbols-outlined icon">calendar_today</i> Krijuar më
                        23 Qershor
                        2023</p>
                </div>
                <div class="right">
                    <div>
                        <p class="card-p-role">Profesori</p>
                        <p class="card-p-name">Mirlinda Reqica</p>
                    </div>
                    <i class="material-symbols-outlined icon">face</i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="left">
                    <p class="card-header"><i class="material-symbols-outlined icon">tag</i> Hyrje në
                        algoritme</p>
                    <p class="card-title">2.2 Mergesort</p>
                    <p class="card-footer"><i class="material-symbols-outlined icon">calendar_today</i> Krijuar më
                        23 Qershor
                        2023</p>
                </div>
                <div class="right">
                    <div>
                        <p class="p-role">Profesori</p>
                        <p class="p-name">Mirlinda Reqica</p>
                    </div>
                    <i class="material-symbols-outlined icon">face</i>
                </div>
            </div>
        </div>
    </div>
</div>