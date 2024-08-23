@extends('templates.dashboard-side-menu')

@section('title', 'Pacientes')

@section('content')
    <form>
        <div class="row">
            <div class="input-field col s12">
                <input required placeholder="Nombre(s)" id="nombres" type="text" class="validate" autocomplete="off">
                <label for="nombres">Nombre(s)</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input required placeholder="Apellido(s)" id="apellidos" type="text" class="validate" autocomplete="off">
                <label for="apellidos">Apellido(s)</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input required placeholder="Teléfono" id="telefono" type="tel" pattern="[0-9]{8}" class="validate"
                    autocomplete="off" min="8">
                <label for="telefono">Teléfono</label>
            </div>
            <div class="input-field col s6">
                <input required type="text" class="datepicker" id="birthdate">
                <label for="birthdate">Fecha de nacimiento</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <h6>Sexo: </h6>
                <label>
                    <input class="with-gap" name="sexo" type="radio" />
                    <span>Femenino</span>
                </label>
                <br>
                <label>
                    <input class="with-gap" name="sexo" type="radio" />
                    <span>Masculino</span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <button type="submit" class="waves-effect waves-light btn">Registrar</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const datepickers = document.querySelectorAll('.datepicker');
            M.Datepicker.init(datepickers, {
                format: 'dd mmmm, yyyy',
                maxDate: new Date(),
                yearRange: 50,
                i18n: {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                        "Septiembre", "Octubre", "Noviembre", "Diciembre"
                    ],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct",
                        "Nov", "Dic"
                    ],
                    weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"]
                }
            });
        });
    </script>
@endsection
