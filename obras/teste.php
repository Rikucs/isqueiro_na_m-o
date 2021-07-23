<?php

// Include config file

require_once "../user/config.php";
include("../pages/estrutura.php");



// Define variables and initialize with empty values

$data1 = $data2 = "";

$data1_err = $data2_err = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $data_1 = mysqli_real_escape_string($link, $_REQUEST["data1"]);
        $data_2 = mysqli_real_escape_string($link, $_REQUEST["data2"]);

    if (empty($data1_err) && empty($data2_err)) {

        // Prepare an insert statement

        $sql = " SELECT * FROM abastecimentos 
        INNER JOIN obras ON abastecimentos.obra = obras.id_obras
        INNER JOIN  maquinas ON abastecimentos.maquina = maquinas.id_maquinas
        INNER JOIN  combustiveis ON abastecimentos.combustivel = combustiveis.id_combustiveis
        where abastecimentos.reciclagem = 0 and adata BETWEEN '$data_1' AND '$data_2'
        ORDER BY id_abastecimentos DESC";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters


            $param_adata = $adata;

            $param_maquina = $maquina;

            $param_obra = $obra;

            $param_combustivel = $combustivel;

            $param_litros = $litros;

            $param_km = $km;

            $param_horas = $horas;

            



            if (mysqli_stmt_execute($stmt)) {

                // Redirect to login page
                echo "<script> alert('inserido com sucesso')</scritp>";
                header("location: ../index.php");
            } else {

                echo "Something went wrong. Please try again later.";
            }

            // Close statement 


            mysqli_stmt_close($stmt);
        }
    }

    // Close connection

    mysqli_close($link);
    header("location: ../user/logout.php");
    exit;
}

?>




<div class="main-wrapper">

    <!-- Content Body Start -->

    <div class="content-body m-0 p-0">

        <div class="login-register-wrap">

            <div class="row">

                <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">

                    <div class="login-register-form-wrap">

                        <div class="content">
                            </br></br></br></br>
                            <h2>Escolha as Datas</h2>


                        </div>
                        </br>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                            <div class="form-group <?php echo (!empty($data1_err)) ? 'has-error' : ''; ?>">

                                <label>Data Inicio</label>
                                <input type="text" name="data1" id='data1' class="form-control input-date-single" required>
                                <span class="help-block"><?php echo $data1_err; ?></span>

                            </div>

                            <br />

                            <div class="form-group <?php echo (!empty($data2_err)) ? 'has-error' : ''; ?>">

                                <label>Data Final</label>
                                <input type="text" name="data2" id='data2' class="form-control input-date-single" required>
                                <span class="help-block"><?php echo $data2_err; ?></span>

                            </div>

                            <br />

                            <div class="form-group">

                                <input type="submit" class="button button-primary button-outline" value="Confirmar">

                            </div>

                        </form>

                    </div>

                </div>

                <div>

                    <div class="content">

                        <img src="../img/656775.png" alt="656775">

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- JS

============================================ -->

<!-- Global Vendor, plugins & Activation JS -->

<script src="../assets/js/vendor/modernizr-3.6.0.min.js"></script>

<script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>

<script src="../assets/js/vendor/popper.min.js"></script>

<script src="../assets/js/vendor/bootstrap.min.js"></script>

<!--Plugins JS-->

<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>

<script src="../assets/js/plugins/tippy4.min.js.js"></script>

<!--Main JS-->

<script src="../assets/js/main.js"></script>

<script src="../assets/js/plugins/moment/moment.min.js"></script>
<script src="../assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/js/plugins/daterangepicker/daterangepicker.active.js"></script>
<script src="../assets/js/plugins/inputmask/bootstrap-inputmask.js"></script>
</body>

</html>