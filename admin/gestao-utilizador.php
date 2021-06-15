

<div class="container gestao-utilizador  mt-5  bg-warning border border-1 rounded border-dark d-none">

    <div class="d-flex justify-content-end">
        <button type="button" class="btn-close btn-close-main-box-user" aria-label="Close"></button>
    </div>

    <!-- title -->
    <div class="row justify-content-center">

        <div class="col-4 text-center">
            <h3 class="text-center h3-title text-dark">
                <i class="fas fa-users"></i>
                Gestão de Utilizadores
            </h3>
        </div>
    </div>

    <!--   apagar utilizador  -->

    <div class="row justify-content-center text-center box-delet-user bg-white d-none border border-1 rounded border-warning">

        <div class="d-flex justify-content-end">
            <button type="button" class="btn-close btn-close-box-delet-user" aria-label="Close"></button>
        </div>

        <h3> apagar utilizador ? </h3>

        <div class="d-flex justify-content-center mb-2">

            <i class="fas fa-check-circle me-3 fa-2x text-success i-delet-user " style="cursor: pointer;"></i>
            <i class="fas fa-times-circle fa-2x text-danger i-close-box-delet" style="cursor: pointer;"></i>

        </div>

    </div>


    <!-- head  -->
    <div class="row  mt-3 ms-2 mb-2 me-2 justify-content-center bg-white text-white  border border-1 rounded border-dark ">

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>

            <tbody class="body-table">

            </tbody>
        </table>

    </div>

    <div class="row d-flex justify-content-center">

        <div class="col-md-3 mb-3  text-dark text-center ">
            <i class="fas fa-plus-circle   btn-open-box-add-user fa-2x" style="cursor: pointer;"></i>
        </div>

    </div>





</div>
<!--     Formulario add    -->

<div class="container my-5 py-5 z-depth-1  form-user d-none">

    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7 col-form-user  bg-warning  border border-1 rounded border-dark">

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close btn-close-form-user" aria-label="Close"></button>
                </div>

                <form class="text-center">

                    <p class="h4 mb-4 mt-2 text-dark title-form-user"> </p>


                    <div class="form-row ">
                        <div class="col mb-3">
                            <!-- Nome -->
                            <input type="text" id="frName" class="form-control" placeholder="Nome">
                        </div>
                        <div class="col">
                            <!-- E-mail -->
                            <input type="email" id="frEmail" class="form-control mb-3" placeholder="E-mail">
                            <p class="text-start ms-1  info-mail  d-none text-danger"></p>
                        </div>
                    </div>

                    <!-- Password  password    -->
                    <input type="password" id="frPass" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">

                    <input class="form-control mt-3" list="datalistOptions" id="exampleDataList" placeholder="Tipo de utilizador">
                    <datalist id="datalistOptions">
                        <option value="Admin">
                        <option value="Normal">
                    </datalist>

                    <span id="idUser" class="d-none"></span>
                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block btn-add-user bg-dark border border-1 rounded border-dark " type="button">Registar</button>
                    <button class="btn d-none btn-info my-4 btn-block  btn-update-user  bg-dark border border-1 rounded border-dark " type="button">Actualizar</button>

                </form>

            </div>

        </div>

    </section>



</div> <!--     Formulario add  end    -->