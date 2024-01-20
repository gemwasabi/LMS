<?php 

    require('partials/head.php');
    require('partials/navbars.php');
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

    <div id="cardModal" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <div class="left">
                    <div class="modal-title">SHKI - Java 2</div>
                    <p class="card-meta"><i class="material-symbols-outlined icon">calendar_today</i> Krijuar më
                        23 Qershor
                        2023</p>
                    <div class="modal-subtitle">
                        <p>Algoritme - 2.2 Mergesort</p>
                    </div>
                    <div class="modal-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates harum nam mollitia.
                        Voluptatem eum harum ducimus, deleniti quas eos sit error itaque. Hic aperiam ea dolores!
                        Odioenim corrupti nisi! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates
                        harum nam mollitia. Voluptatem eum harum ducimus, deleniti quas eos sit error itaque. Hic
                        aperiam ea dolores! Odioenim corrupti nisi! Lorem ipsum dolor sit, amet consectetur adipisicing
                        elit. Voluptates harum nam mollitia. Voluptatem eum harum ducimus, deleniti quas eos sit error
                        itaque. Hic aperiam ea dolores! Odioenim corrupti nisi! Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit. Voluptates harum nam mollitia. Voluptatem eum harum ducimus, deleniti quas eos
                        sit error itaque. Hic aperiam ea dolores! Odioenim corrupti nisi! Lorem ipsum dolor sit, amet
                        consectetur adipisicing elit. Voluptates harum nam mollitia. Voluptatem eum harum ducimus,
                        deleniti quas eos sit error itaque. Hic aperiam ea dolores! Odioenim corrupti nisi!
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
                    <p class="p-name">Mirlinda Reqica</p>
                    <div class="separator"></div>
                    <p class="p-role">Lënda</p>
                    <p class="p-name">Algoritme</p>
                </div>
            </div>

        </div>
    </div>
</body>

<?php require('partials/script.php'); ?>

</html>