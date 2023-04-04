<!-------------------------------------------------------------MODAL AGREGAR CARACTERISTICAS -->

<div class="modal fade" id="AgregarCaracteriticas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title">Agregar Características</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control inputsM" id="caracteritica" placeholder="Caracteristica">
                    <label for="caracteritica">Ingrese la caracteritica</label>
                </div>
                <hr>
                <center>
                    <button class="btn btn-success" type="button" id="" name="">Guardar <i class="fa-solid fa-floppy-disks fa-bounce"></i></button>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------MODAL AGREGAR REQUERIMIENTOS -->

<div class="modal fade" id="AgregarRequerimiento">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title">Agregar Requerimiento</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control inputsM" id="" placeholder="Requerimiento">
                    <label for="caracteritica">Ingrese el requerimiento</label>
                </div>
                <hr>
                <center>
                    <button class="btn btn-success" type="button" id="" name="">Guardar <i class="fa-solid fa-floppy-disks fa-bounce"></i></button>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-------------------------------------------------------------MODAL CLASIFICAR PESTEL -->

<div class="modal fade" id="ClasPestel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title">Desgloce Pestel <i class="fa-sharp fa-solid fa-list"></i></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">

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
                        <h4>Poítico</h4>
                        <input class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---">
                        <datalist id="tipoCPoli">
                            <option value="Positivo">0</option>
                            <option value="Negativo">1</option>
                            <option value="No Aplica">2</option>
                        </datalist>
                    </div>
                    <div class="col-sm-4">
                        <h4>Económico</h4>
                        <input class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---">
                        <datalist id="tipoCPoli">
                            <option value="Positivo">0</option>
                            <option value="Negativo">1</option>
                            <option value="No Aplica">2</option>
                        </datalist>
                    </div>
                    <div class="col-sm-4">
                        <h4>Social</h4>
                        <input class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---">
                        <datalist id="tipoCPoli">
                            <option value="Positivo">0</option>
                            <option value="Negativo">1</option>
                            <option value="No Aplica">2</option>
                        </datalist>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <h4>Tecnológico</h4>
                        <input class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---">
                        <datalist id="tipoCPoli">
                            <option value="Positivo">0</option>
                            <option value="Negativo">1</option>
                            <option value="No Aplica">2</option>
                        </datalist>
                    </div>
                    <div class="col-sm-4">
                        <h4>Ecológico</h4>
                        <input class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---">
                        <datalist id="tipoCPoli">
                            <option value="Positivo">0</option>
                            <option value="Negativo">1</option>
                            <option value="No Aplica">2</option>
                        </datalist>
                    </div>
                    <div class="col-sm-4">
                        <h4>Legal</h4>
                        <input class="Inputs form-control" id="" list="tipoCPoli" placeholder="---Seleccione una Opción---">
                        <datalist id="tipoCPoli">
                            <option value="Positivo">0</option>
                            <option value="Negativo">1</option>
                            <option value="No Aplica">2</option>
                        </datalist>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-sm-8">

                        <div class="form-floating mb-3 mt-3">
                            <textarea class="form-control" rows="6" id="comment" name="text" placeholder="Comentarios"></textarea>
                            <label for="comment">Comentarios</label>
                        </div>

                    </div>
                    <div class="col-2"></div>

                </div>
                <hr>
                <center>
                    <button class="btn btn-success" type="button" id="" name="">Guardar <i class="fa-solid fa-floppy-disks fa-bounce"></i></button>
                </center>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>