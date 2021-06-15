<?php

session_start();

if (!$_SESSION['user']) {
    header('Location: ../index.php');
}

include("header-admin.php");

?>


<script>
    $(document).ready(function() {

        document.getElementById("userName").innerHTML = localStorage.getItem("username")
    })
</script>

<body>



    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid  text-warning">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0 text-warning" href="#">

                    <i class="fas fa-user-cog fa-2x"></i>
                    <!-- <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="15" alt="" loading="lazy" /> -->
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item menu-tarefas">
                        <a class="nav-link   text-warning" href="#">
                            <i class="fas fa-tasks"></i>
                            Consultar Tarefas [A-Z]
                        </a>
                    </li>
                    <li class="nav-item menu-tarefa-concluida">
                        <a class="nav-link text-warning" href="#">
                            <i class="fas fa-trophy"></i>
                            Tarefas Concluida
                        </a>
                    </li>
                    <li class="nav-item  menu-gestao-user">
                        <a class="nav-link text-warning" href="#">
                            <i class="fas fa-users"></i>
                            Gestão de Utilizadores
                        </a>
                    </li>

                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex  align-items-center  justify-content-end">


                <a class="nav-link text-warning logout" id="userName">
                    <i class="fas fa-user-alt"></i>
                    Honorio Silva Eduardo
                </a>


                <!-- <li class="nav-item "> -->
                <a class="nav-link text-warning logout close-session">
                    <i class="fas fa-sign-out-alt"></i>
                    Encerrar Sessão
                </a>
                <!-- </li> -->

            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->


    <?php
    include("gestao-utilizador.php");
    ?>

    <?php
    include("gestao-tarefa.php");
    ?>


    <!-- costomize  js   -->
    <script src="../js/main.js"></script>

    <!-- bootstrap js   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- MDB JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.js"></script>

</body>


</html>