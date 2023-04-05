<!-------------------------------------------------------------MODAL AGREGAR CARACTERISTICAS -->

<div class="modal fade" id="AgregarCaracteriticas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title">Agregar Características</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="bll/agregarcaracteristica.php" method="POST">
                <div class="modal-body text-center">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control inputsM" name="caracteritica" id="caracteritica" placeholder="Caracteristica">
                        <label for="caracteritica">Ingrese la caracteristica</label>
                    </div>
                    <hr>
                    <center>
                        <button class="btn btn-success" type="submit" id="" name="">Guardar <i class="fa-solid fa-floppy-disks fa-bounce"></i></button>
                    </center>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------MODAL AGREGAR REQUERIMIENTOS -->
<?php
include_once('./bll/consultas.php');
$consultas = new bllconsultas;
$datos = $consultas->consultaCaracterisca();

foreach ($datos as $dato) {
?>
    <div class="modal fade" id=<?php echo 'AgregarRequerimiento' . $dato->idCaracteristica ?>>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">Agregar Requerimiento</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <form action="./bll/agregarrequerimiento.php" method="post">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" name="Requerimiento" class="form-control inputsM" id="" placeholder="Requerimiento">
                            <label for="caracteritica">Ingrese el requerimiento</label>
                            <input type="hidden" name="idCaracteristica" value=<?php echo $dato->idCaracteristica ?>>
                        </div>
                        <hr>
                        <center>
                            <button class="btn btn-success" type="submit" id="" name="">Guardar <i class="fa-solid fa-floppy-disks fa-bounce"></i></button>
                        </center>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>


<!-------------------------------------------------------------MODAL CLASIFICAR PESTEL -->
<?php
include_once('./bll/consultas.php');
$consultas = new bllconsultas;
$datos = $consultas->consultaFactor();

foreach ($datos as $dato) {

    $datosPestel = $consultas->consultaPestelFactor($dato->idFactores);
    $datosComentario = $consultas->consultaComentario($dato->idFactores);
?>

    <div class="modal fade" id=<?php echo 'ClasPestel' . $dato->idFactores ?>>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">Desgloce Pestel <i class="fa-sharp fa-solid fa-list"></i></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <form action="./bll/agregarpestel.php" method="post">
                        <div class="row">
                            <div class="form-floating mb-3 mt-3">
                                <div class="col-sm">
                                    <h4>Clasificación del Factor</h4>
                                    <input class="Inputs form-control" id="" list="tipoClas" placeholder="---Seleccione una Clasificación---">
                                    <datalist id="tipoClas">
                                        <option value="Interno">0</option>
                                        <option value="Externo">1</option>
                                    </datalist>
                                </div>

                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <?php
                                $value = "";
                                foreach ($datosPestel as $datoPestel) {
                                    if ($datoPestel->idPestel == 1) {
                                        $value = "Aplica";
                                    }
                                }
                                ?>
                                <h4>Político</h4>
                                <input name="politico" class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---" value=<?php echo $value ?>>
                                <datalist id="tipoCPoli">
                                    <option value="Aplica">1</option>
                                    <option value="No Aplica">0</option>
                                </datalist>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                $value = "";
                                foreach ($datosPestel as $datoPestel) {
                                    if ($datoPestel->idPestel == 2) {
                                        $value = "Aplica";
                                    }
                                }
                                ?>
                                <h4>Económico</h4>
                                <input name="economico" class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---" value=<?php echo $value ?>>
                                <datalist id="tipoCPoli">
                                    <option value="Aplica">1</option>
                                    <option value="No Aplica">0</option>
                                </datalist>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                $value = "";
                                foreach ($datosPestel as $datoPestel) {
                                    if ($datoPestel->idPestel == 3) {
                                        $value = "Aplica";
                                    }
                                }
                                ?>
                                <h4>Social</h4>
                                <input name="social" class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---" value=<?php echo $value ?>>
                                <datalist id="tipoCPoli">
                                    <option value="Aplica">1</option>
                                    <option value="No Aplica">0</option>
                                </datalist>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <?php
                                $value = "";
                                foreach ($datosPestel as $datoPestel) {
                                    if ($datoPestel->idPestel == 4) {
                                        $value = "Aplica";
                                    }
                                }
                                ?>
                                <h4>Tecnológico</h4>
                                <input name="tecnologico" class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---" value=<?php echo $value ?>>
                                <datalist id="tipoCPoli">
                                    <option value="Aplica">1</option>
                                    <option value="No Aplica">0</option>
                                </datalist>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                $value = "";
                                foreach ($datosPestel as $datoPestel) {
                                    if ($datoPestel->idPestel == 5) {
                                        $value = "Aplica";
                                    }
                                }
                                ?>
                                <h4>Ecológico</h4>
                                <input name="ecologico" class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---" value=<?php echo $value ?>>
                                <datalist id="tipoCPoli">
                                    <option value="Aplica">1</option>
                                    <option value="No Aplica">0</option>
                                </datalist>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                $value = "";
                                foreach ($datosPestel as $datoPestel) {
                                    if ($datoPestel->idPestel == 6) {
                                        $value = "Aplica";
                                    }
                                }
                                ?>
                                <h4>Legal</h4>
                                <input name="legal" class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---" value=<?php echo $value ?>>
                                <datalist name="" id="tipoCPoli">
                                    <option value="Aplica">1</option>
                                    <option value="No Aplica">0</option>
                                </datalist>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-sm-8">

                                <div class="form-floating mb-3 mt-3">
                                    <textarea class="form-control" rows="6" id="comment" name="comentario" placeholder="Comentarios"><?php $resultado = empty($datosComentario[0]->comentarios) ? '' : $datosComentario[0]->comentarios; echo $resultado?></textarea>
                                    <label for="comment">Comentarios</label>
                                </div>

                            </div>
                            <div class="col-2"></div>

                        </div>
                        <hr>
                        <center>
                            <button class="btn btn-success" type="submit" id="" name="">Guardar <i class="fa-solid fa-floppy-disks fa-bounce"></i></button>
                        </center>
                        <input type="hidden" name="idFactor" value="<?php echo $dato->idFactores ?>">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>


<!-------------------------------------------------------------MODAL AGREGAR FACTORES -->
<?php
include_once('./bll/consultas.php');
$consultas = new bllconsultas;
$datos = $consultas->consultaRequerimientos();

foreach ($datos as $dato) {
?>
    <div class="modal fade" id=<?php echo 'AgregarFactor' . $dato->idRequerimiento ?>>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">Agregar factor</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <form action="./bll/agregarfactor.php" method="post">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" name="factor" class="form-control inputsM" id="" placeholder="Requerimiento">
                            <label for="caracteritica">Ingrese el factor</label>
                            <input type="hidden" name="idRequerimiento" value=<?php echo $dato->idRequerimiento ?>>
                        </div>
                        <h5>Aspecto</h5>
                        <div class="form-floating mb-3 mt-3 d-flex justify-content-center gap-2">

                            <p>Positivo</p>
                            <input name="aspecto" type="radio" style="width: 20px; height: 20px;" value=1>

                            <p>Negativo</p>
                            <input name="aspecto" type="radio" style="width: 20px; height: 20px;" value=0>

                        </div>
                        <h5>Clasificación</h5>
                        <div class="mb-3 mt-3 d-flex justify-content-center gap-2">

                            <p>Interno</p>
                            <input name="clasificacion" type="radio" style="width: 20px; height: 20px;" value=0>

                            <p>Externo</p>
                            <input name="clasificacion" type="radio" style="width: 20px; height: 20px;" value=1>


                        </div>
                        <hr>
                        <center>
                            <button class="btn btn-success" type="submit" id="" name="">Guardar <i class="fa-solid fa-floppy-disks fa-bounce"></i></button>
                        </center>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>