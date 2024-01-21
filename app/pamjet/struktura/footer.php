</body>

<script>
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');

    btn.onclick = function () {
        sidebar.classList.toggle('active');
    }

    let modal = document.getElementById("cardModal");
    let btn2 = document.getElementById("myBtn");
    let btn_mbyll = document.getElementById("mbyll_modal");

    btn2.onclick = function () {
        modal.style.display = "block";
    }

    btn_mbyll.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    } 
</script>

</html>