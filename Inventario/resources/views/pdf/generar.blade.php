<form action="{{ route('generar.pdf') }}" method="post">
    @csrf
    <label for="monto">Ingrese el monto a asegurar:</label>
    <input type="number" id="monto" name="monto" required>
    <a href="{{ route('pdf.generar', ['id' => $asigaper->id_asigaper]) }}" class="btn btn-light" target="_blank"><i class="bi bi-printer"></i> PDF</a>
</form>
