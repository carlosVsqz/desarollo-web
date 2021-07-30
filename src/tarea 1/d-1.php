<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tours de relajamiento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .card {
            width: 850px;
            padding: 10px;
            border-radius: 20px;
            background: #fff;
            border: none;

            position: relative
        }

        .container {
            height: 100vh
        }

        body {
            background: #eee
        }

        .mobile-text {
            color: #989696b8;
            font-size: 15px
        }

        .form-control {
            margin-right: 12px
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #ff8880;
            outline: 0;
            box-shadow: none
        }

        .cursor {
            cursor: pointer
        }
    </style>
</head>

<body>
<div class="d-flex justify-content-center align-items-center container">
    <div class="card py-5 px-5">
        <div class="row">
            <form class="row g-3 needs-validation" novalidate>
                <div class="row justify-content-md-center">
                    <div class="col">
                        <h5 class="m-0">Reservación de viaje</h5>
                    </div>
                    <div class="col col-lg-2">
                        <b class="text-danger">No. 00001</b>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Nombres" required>
                    <div class="valid-feedback">
                        Valido!
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Apellidos" required>
                    <div class="valid-feedback">
                        Valido!
                    </div>
                </div>
                <div class="col-md-12">
                    <span class="mobile-text">Direccion de notificación</span>
                    <input type="text" class="form-control" placeholder="Direccion de casa"
                           id="validationCustomUsername"
                           aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Indique una direccion valida!
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control" id="validationCustom03" placeholder="Email" required>
                    <div class="invalid-feedback">
                        Ingrese un email valido!
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control" id="validationCustom04" placeholder="Telefono" required>
                    <div class="invalid-feedback">
                        Ingrese un numero de telefono valido!
                    </div>
                </div>
                <span class="mobile-text">Metodo de pago</span>
                <div class="col-md-12">
                    <input type="number" class="form-control" id="validationCustom05" placeholder="Numero de Tarjeta"
                           required>
                    <div class="invalid-feedback">
                        Numero de Tarjeta invalido!
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="validationCustom06" placeholder="Fecha de vencimiento"
                           required>
                    <div class="invalid-feedback">
                        Ingrese una fecha valida
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="validationCustom07" required>
                        <option selected disabled value="">Banco emisor</option>
                        <option>Agromercantil</option>
                        <option>Banco Azteca</option>
                        <option>Banco de Antigua</option>
                        <option>Banco BAC</option>
                        <option>Banco Citi</option>
                        <option>Banco Credito Hipotecario</option>
                        <option>Banco De Credito</option>
                        <option>Banco Bantrab</option>
                        <option>Banrural</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione un banco
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="validationCustom08" required>
                        <option selected disabled value="">Pais a viajar</option>
                        <option>Finlandia</option>
                        <option>Dinamarca</option>
                        <option>Noruega</option>
                        <option>Islandia</option>
                        <option>Países Bajos</option>
                        <option>Suiza</option>
                        <option>Suecia</option>
                        <option>Nueva Zelanda</option>
                        <option>Guatemala</option>
                        <option>Costa Rica</option>
                        <option>Estados Unidos</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione un pais
                    </div>
                </div>
                <span class="mobile-text">Duracion en tiempo</span>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="mind" placeholder="Fecha de inicio"
                           required>
                    <div class="invalid-feedback">
                        Ingrese un dato valido!
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="date" class="form-control" id="maxd"
                           placeholder="Fecha de fin"
                           readonly
                           required>
                    <div class="invalid-feedback">
                        Ingrese un dato valido!
                    </div>
                </div>
                <div class="text-center mt-5">
                    <input class="font-weight-bold text-danger cursor btn btn-outline-light" type="submit"
                           value="Enviar solicitud">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        'use strict'
        var forms = document.querySelectorAll('.needs-validation')

        const minValue = document.getElementById('mind');
        const maxValue = document.getElementById('maxd');
        let max;
        let date = new Date();

        let current;
        minValue.addEventListener('change', (event) => {
            let target = event.target.value.split('-');
            let a = new Date(target[0], target[1] - 1, target[2]);
            if (a > date) {
                current = a;
                document.getElementById('maxd').removeAttribute('readonly');
            } else if (a < date) {
                event.target.value = null;
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No puede seleccionar una fecha inferior a la de hoy',
                })
            }
        });

        maxValue.addEventListener('change', (event) => {
            let target = event.target.value.split('-');
            let a = new Date(target[0], target[1] - 1, target[2]);
            if (current === null) {
                max = new Date();
            } else {
                max = current;
            }
            if (a < max) {
                event.target.value = null;
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No puede seleccionar una fecha inferior a la seleccionada',
                })
            }
        });

        Array.prototype.slice.call(forms)
            .forEach((form) => {
                form.addEventListener('submit', (event) => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    });
</script>
</body>
</html>
