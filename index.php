<?php
include("./include/header.php");
?>

<body>

<script>

$(document).ready(function() {

  carregarDadosLogin()
})

</script>

<div class="alert alert-danger  box-alerts d-none" role="alert">
  Login Invalido, verifique as credencias !
</div>


  <!-- login -->
  <?php
  include("./include/loginForm.php");
  ?>

  <!-- admin -->
  <?php
  //include("./page/admin.php");
  ?>

  <!-- costomize  js   -->
  <script src="./js/main.js"></script>

  <!-- bootstrap js   -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <!-- MDB JS -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.js"></script>


</body>


</html>