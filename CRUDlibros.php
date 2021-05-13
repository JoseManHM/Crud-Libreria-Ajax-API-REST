<?php
include('src/header.php');
?>
<!--Tabla de libros-->
<div class='container col-10 mt-4'>
    <table class="table col-12 col-sm-12" id="libraryTable" width="100%">
        <thead class="table-dark">
            <tr>
                <th>Id Autor</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Pais autor</th>
                <th>Editorial</th>
                <th>Clave libro</th>
                <th>Libro</th>
                <th>Acciones</th>
            </tr>
                
            </thead>
            <tbody id="cuerpoTabla"></tbody>
    </table>
    <!-- Botón agregar libros -->
    <div class="d-grid gap-2 d-md-block text-center">
        <button type="button" class="btn btn-outline-success mt-2 btn-lg" data-mdb-toggle="modal"
        data-mdb-target="#InsertarModal">Agregar libro</button>
        <!-- Modal -->
        <div
            class="modal fade"
            id="InsertarModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar libro</h5>
            <button
            type="button"
            class="btn-close"
            data-mdb-dismiss="modal"
            aria-label="Close"
            ></button>
        </div>
        <div class="modal-body">
        <form method="POST">
            <!-- Titulo de libro input -->
            <div class="form-outline mb-4">
                <input type="text" id="form1Example1" name="tituloL" class="form-control" />
                <label class="form-label" for="form1Example1">Titulo de libro</label>
            </div>

            <!-- Clave editorial input -->
            <div class="form-outline mb-4">
                <input type="text" id="form1Example2" name="cveEditorial" class="form-control" />
                <label class="form-label" for="form1Example2">Clave de editorial</label>
            </div>

            <!-- Clave autor input -->
            <div class="form-outline mb-4">
                <input type="text" id="form1Example2" name="cveAutor" class="form-control" />
                <label class="form-label" for="form1Example2">Clave de autor</label>
            </div>
        </div>  
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-mdb-dismiss="modal">
            Cancelar
            </button>
            <button type="submit" name="addlibro" class="btn btn-outline-success">Agregar</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    </div>

    <!--Modal editar-->

    <div
            class="modal fade"
            id="EditarModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar libro</h5>
            <button
            type="button"
            class="btn-close"
            data-mdb-dismiss="modal"
            aria-label="Close"
            ></button>
        </div>
        <div class="modal-body">
        <form method="POST">
            <!-- Id de libro input -->
            <div class="form-outline mb-4">
                <input type="text" id="IdLEd" name="tituloL" class="form-control" readonly="readonly"/>
                <label class="form-label" for="form1Example1">Id de libro</label>
            </div>
            <!-- Titulo de libro input -->
            <div class="form-outline mb-4">
                <input type="text" id="tituloLEd" name="tituloL" class="form-control" />
                <label class="form-label" for="form1Example1">Titulo de libro</label>
            </div>

            <!-- Clave editorial input -->
            <div class="form-outline mb-4">
                <input type="text" id="editorialLEd" name="cveEditorial" class="form-control" />
                <label class="form-label" for="form1Example2">Editorial</label>
            </div>

            <!-- Clave autor input -->
            <div class="form-outline mb-4">
                <input type="text" id="autorLEd" name="cveAutor" class="form-control" />
                <label class="form-label" for="form1Example2">Clave de autor</label>
            </div>
        </div>  
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-mdb-dismiss="modal">
            Cancelar
            </button>
            <button type="submit" name="addlibro" class="btn btn-outline-success">Editar</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    </div>

    <!--Modal eliminar-->

    <div
            class="modal fade"
            id="EliminarModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar libro</h5>
            <button
            type="button"
            class="btn-close"
            data-mdb-dismiss="modal"
            aria-label="Close"
            ></button>
        </div>
        <div class="modal-body">
            <p>¿Deseas eliminar este libro?</p>
        <!-- Id de libro input -->
        <div class="form-outline mb-4">
                <input type="text" id="IdLibroEliminar" name="tituloL" class="form-control" readonly="readonly"/>
                <label class="form-label" for="form1Example1">Id de libro</label>
            </div>
        </div>  
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-success" data-mdb-dismiss="modal">
            Cancelar
            </button>
            <button type="submit" name="addlibro" class="btn btn-outline-danger">Eliminar</button>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
<!-- JS de Data Table -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function(){
      mostrarL();
} );
    var mostrarL = function(){
        var table = $("#libraryTable").DataTable({
            "scrollCollapse": true,
            "scrollY": '60vh',
            "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "ajax":{
                "method":"POST",
                "url": "mostrarLibros.php"
            },
            "columns":[
                {"data":"CLAVE_AUTOR"},
                {"data":"NOMBRE"},
                {"data":"APELLIDOS"},
                {"data":"PAIS_AUTOR"},
                {"data":"EDITORIAL"},
                {"data":"CLAVE_LIBRO"},
                {"data":"LIBRO"},
                {"defaultContent":"<button type='button' class='editar btn btn-outline-success me-2 btn-sm' data-mdb-toggle='modal' data-mdb-target='#EditarModal'>Editar</button><button type='button' class='eliminar btn btn-outline-danger btn-sm'data-mdb-toggle='modal' data-mdb-target='#EliminarModal'>Eliminar</button>"}
            ]
        });
        getLibros("#libraryTable tbody", table);
        getIdEliminar("#libraryTable tbody", table);
    }
    var getLibros = function(tbody, table){
        $(tbody).on("click", "button.editar", function(){
            var dataLibros = table.row($(this).parents("tr")).data();
            var idLibro = $("#IdLEd").val(dataLibros.CLAVE_LIBRO),
                tituloLibro = $("#tituloLEd").val(dataLibros.LIBRO),
                editorialLibro = $("#editorialLEd").val(dataLibros.EDITORIAL),
                autorLibro = $("#autorLEd").val(dataLibros.CLAVE_AUTOR);
        });
    }
    var getIdEliminar = function(tbody, table){
        $(tbody).on("click", "button.eliminar", function(){
            var dataLibros = table.row($(this).parents("tr")).data();
            var idLibro = $("#IdLibroEliminar").val(dataLibros.CLAVE_LIBRO);
        });
    }
</script>
<?php
include('src/footer.php');
?>