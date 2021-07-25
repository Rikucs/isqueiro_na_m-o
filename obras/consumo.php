<?php

// Include config file

require_once "../user/config.php";
include("../pages/estrutura.php");


if (isset($_POST["submit"])) {


    $data1 = $_POST["data1"];
    $data1 = date("Y-m-d", strtotime($data1));
    $data2 = $_POST["data2"];
    $data2 = date("Y-m-d", strtotime($data2));

    $result = mysqli_query(
        $link,
        "SELECT adata,maquinas.Nome, obras.nome, combustiveis.NOME, litros, abastecimentos.km, abastecimentos.horas, assinatura 
    FROM abastecimentos 
    INNER JOIN obras ON abastecimentos.obra = obras.id_obras 
    INNER JOIN maquinas ON abastecimentos.maquina = maquinas.id_maquinas 
    INNER JOIN combustiveis ON abastecimentos.combustivel = combustiveis.id_combustiveis 
    where abastecimentos.reciclagem = 0 
    AND abastecimentos.adata BETWEEN '$data1' AND '$data2' 
    AND obra = " . $_GET["obras"] . "
    ORDER BY id_abastecimentos DESC"
    );

?>
    <div class="content-body">
        <div class="row justify-content-between align-items-center mb-10">
        </div>
        <div class="box">
            <div class="box-head">
                <h3 class="title"> Obras entre <?php echo $data1; ?> e <?php echo $data2; ?></h3></br>
                <a href=consumo.php?obras=<?php echo $_GET["obras"]; ?> class="button button-outline button-primary">Colocar outras datas</a>
                <a href="consumopdf.php?data1=<?php echo $data1;?>&amp;data2=<?php echo $data2;?>&amp;obras=<?php echo $_GET["obras"]; ?>" class="button button-outline button-primary">PDF</a>
                <?php echo str_repeat('&nbsp;', 155); ?>
                <a class="button button-outline button-secondary" href="obras.php">Voltar</a>
                <div class="row justify-content-between align-items-center mb-10">

                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr role="row" class="odd">
                                <th rowspan="1" colspan="1">Data</th>
                                <th rowspan="1" colspan="1">Maquina</th>
                                <th rowspan="1" colspan="1">Obra</th>
                                <th rowspan="1" colspan="1">Combustivel</th>
                                <th rowspan="1" colspan="1">Litros</th>
                                <th rowspan="1" colspan="1">Kilometros</th>
                                <th rowspan="1" colspan="1">Horas</th>
                                <th rowspan="1" colspan="1">Condutor</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>

                                    <td align="center"><?php echo $row["adata"] ?></td>
                                    <td align="center"><?php echo $row["Nome"] ?></td>
                                    <td align="center"><?php echo $row["nome"] ?></td>
                                    <td align="center"><?php echo $row["NOME"] ?> </td>
                                    <td align="center"><?php echo $row["litros"] ?>L</td>
                                    <td align="center"><?php echo $row["km"] ?>km</td>
                                    <td align="center"><?php echo $row["horas"] ?>H</td>
                                    <td align="center"><?php echo $row["assinatura"] ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row"></div>
    <?php } ?>





    <?php if (!isset($_POST["submit"])) { ?>



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
                                <form action="" method="post">


                                    <div class="form-group ">

                                        <label>Data Inicio</label>
                                        <input type="text" name="data1" id='data1' class="form-control input-date-single" required>
                                        <span class="help-block"></span>

                                    </div>

                                    <br />

                                    <div class="form-group ">

                                        <label>Data Final</label>
                                        <input type="text" name="data2" id='data2' class="form-control input-date-single" required>
                                        <span class="help-block"></span>

                                    </div>

                                    <br />

                                    <div class="form-group">

                                        <input type="submit" name="submit" id="submit" class="button button-primary button-outline" value="Confirmar">
                                        <a class="button button-outline button-secondary" href="obras.php">Voltar</a>
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
    <?php } ?>
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