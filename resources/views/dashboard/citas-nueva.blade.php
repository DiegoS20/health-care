@extends('dashboard.citas')

@section('subcontent')
    <div class="center-container">
        <div class="card p-4">
            <h3 class="mb-4">Crear nueva Consulta</h3>
            <form method="POST" action="{{ route('store-cita') }}">
                @csrf
                <div class="form-group mb-3">
                    <div class="input-field col s12">
                        <select required name="idPaciente">
                            <option value="" disabled selected>Selecciona un paciente</option>
                            @foreach ($pacientes as $p)
                                <option value="{{ $p['idPaciente'] }}">{{ $p['nombres'] }} {{ $p['apellidos'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="fecha">Seleccionar fecha</label>
                    <input required type="text" class="datepicker" id="fecha" name="fecha">
                </div>
                <div class="form-group mb-3">
                    <label for="hora">Hora</label>
                    <input type="time" id="hora" class="form-control" name="hora" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Crear</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const datepickers = document.querySelectorAll('.datepicker');
            M.Datepicker.init(datepickers, {
                format: 'yyyy-mm-dd',
                minDate: new Date(),
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
