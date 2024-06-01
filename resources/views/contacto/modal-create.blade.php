<!-- Modal -->
<div class="modal fade" id="contactoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Contactos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="{{ route ('inicio.store') }}" method="post">
        @csrf <!--Para que se pueda enviar el formulario-->
        <div class="modal-body">
            <label>Nombre </label>
            <input type="text" name="nombre" id="" class="form-control" >
            <label>Telefono </label>
            <input type="text" name="telefono" id="" class="form-control"  >
            <label>Correo </label>
            <input type="text" name="correo" id="" class="form-control" >

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>    
    </div>
  </div>
</div>