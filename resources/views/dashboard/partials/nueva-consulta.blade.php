<div class="center-container">
    <div class="card p-4">
        <h3 class="mb-4">Crear nueva Consulta</h3>
        <form>
            <div class="form-group mb-3">
                <label for="paciente">Seleccionar Paciente</label>
                <select id="paciente" class="form-control">
                    <option value="">-- Selecciona un paciente --</option>
                    <option value="1">Paciente 1</option>
                    <option value="2">Paciente 2</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="fecha">Seleccionar fecha</label>
                <input type="date" id="fecha" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="hora">Hora</label>
                <input type="time" id="hora" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Crear</button>
        </form>
    </div>
</div>
