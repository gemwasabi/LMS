<?php
    require('partials/head.php');
    require('partials/navbars.php');

?>
<body>

    <main>
        <div class="profileContent">
            <div class="topProfile">
                <div class="profileLeft">
                    <img src="../../public/asetet/foto/user.jpg" class="profileIMG">
                    <span>Filan Fisteku</span>
                </div>
                <div class="profileRight">
                    <button>Edit Profile</button>
                </div>
            </div>
            <div class="midProfile">
                <div class="midLeft">
                    <p class="s_d">Personal Details</p>
                    <p class="p_d">Email: <input type="email" name="email" placeholder="filanfisteku@gmail.com"
                            disabled></p>
                    <p class="p_d">Phone Number: <input type="number" name="number" placeholder="049-123-456" disabled>
                    </p>
                    <p class="p_d">Personal Number: <input type="number" name="number" placeholder="111222333" disabled>
                    </p>
                    <p class="p_d">Address: <input type="text" name="address" placeholder="Prizren, Kosovo" disabled>
                    </p>
                </div>
                <div class="midRight">
                    <p class="s_d">School Details</p>
                    <p class="p_d">Student ID: <input type="number" name="email" placeholder="123123123" disabled></p>
                    <p class="p_d">Faculty: <input type="text" name="faculy" placeholder="Computer Science" disabled>
                    </p>
                    <p class="p_d">Level: <input type="text" name="level" placeholder="Bachelor" disabled></p>
                    <p class="p_d">Financial Code: <input type="code" name="address" placeholder="12121212" disabled>
                    </p>
                </div>
            </div>
        </div>
    </main>
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