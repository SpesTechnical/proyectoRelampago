<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Factores
    </title>
    <?php include_once('./links.php'); ?>
</head>

<body>

    <?php
    include_once('./nav.php');
    require('modals.php');
    ?>

    <div class="container mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #212529; color: #ffffff; text-align:center;">
                <h3 class="text-center">Desgloce de Factores <i class="fa-sharp fa-regular fa-list-timeline"></i></h3>
            </div>

            <div class="card-body">
                <div class="container mt-3">

                    <div class="table-responsive-lg">
                        <div class="row text-md-center">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">
                                <h4>Característica</h4>
                                <input class="form-control text-center" id="" list="listaCaracteris" placeholder="----Seleccione una Caracteristica----">
                                <datalist id="listaCaracteris">
                                    <option>Ejemplo 1S</option>
                                </datalist>
                            </div>

                            <div class="col-sm-4">
                                <hr>
                                <button class="btn btn-success" id="" type="button">Filtrar <i class="fa-solid fa-filter fa-beat"></i></button>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>

                        <table class="table table-dark table-hover table-bordered text-md-center">
                            <thead class="table-dark">
                                <hr>
                                <br>
                                <tr>
                                    <th>ID</th>
                                    <th>Caracteristica</th>
                                    <th>Requerimiento</th>
                                    <th>Impacto</th>
                                    <th>PESTEL</th>
                                </tr>
                            </thead>
                            <tbody class="table-secondary" id="tablaUsuarios">
                                <td>1</td>
                                <td>Ejemplo Caracteristica</td>
                                <td>Requerimiento 1</td>
                                <td>
                                    <p>Positivo</p>
                                    <input type="checkbox" style="width: 20px; height: 20px;">

                                    <p>Negativo</p>
                                    <input type="checkbox" style="width: 20px; height: 20px;">
                                </td>

                                <td>
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ClasPestel">Pestel <i class="fa-sharp fa-solid fa-list"></i></button>
                                </td>
                                <script>
                                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                                    checkboxes.forEach(checkbox => {
                                        checkbox.addEventListener('change', () => {
                                            if (checkbox.checked) {
                                                checkboxes.forEach(otherCheckbox => {
                                                    if (otherCheckbox !== checkbox) {
                                                        otherCheckbox.checked = false;
                                                        Swal.fire({
                                                            icon: 'warning',
                                                            title: 'Advertencia!',
                                                            text: 'Solo se puede marcar un tipo de impacto.',
                                                        });
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="background-color: #212529; color: #ffffff; text-align:center;"></div>
        </div>
    </div>


    <?php
    require('footer.php')
    ?>


</body>

</html>