'use strict'

  $(document).ready( function(){
      mostrarL();
      actualizar();
      eliminarLibro();
      insertarLibro();
} );
    var mostrarL = function(){
        var table = $("#libraryTable").DataTable({
            "scrollCollapse": true,
            "scrollY": '60vh',
            "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "destroy":true,
            "ajax":{
                "type":"POST",
                "datatype": "JSON",
                "url": "mostrarLibros.php"
            },
            "columns":[
                {"data":"CLAVE_AUTOR"},
                {"data":"NOMBRE"},
                {"data":"APELLIDOS"},
                {"data":"CLAVE_EDITORIAL"},
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
            var data = table.row( $(this).parents("tr") ).data(); 
            var idLibro = $("#IdLEd").val(data.CLAVE_LIBRO ),
                tituloLibro = $("#tituloLEd").val(data.LIBRO ),
                editorialLibro = $("#editorialLEd").val(data.CLAVE_EDITORIAL ),
                autorLibro = $("#autorLEd").val(data.CLAVE_AUTOR );   
        });
    }
    var limpiar = function(){
        $('#IdLEd').val("");
        $('#tituloLEd').val("");
        $('#editorialLEd').val("");
        $('#autorLEd').val("");
    }
    var getIdEliminar = function(tbody, table){
        $(tbody).on("click", "button.eliminar", function(){
            var data = table.row($(this).parents("tr")).data();
            var idLibro = $("#IdLibroEliminar").val(data.CLAVE_LIBRO);
        });
    }
    var actualizar = function(){
        $("#btn-Editar").on("click", function(e){
            e.preventDefault();
            var frm = $("#formularioEditar").serialize();
            console.log(frm);
            $.ajax({
                method: "POST",
                url: "actualizarLibro.php",
                data: frm,
                success:function(r){
                    $("#EditarModal").modal('hide');
                    
                    mostrarL();
                    //$("#EliminarModal").modal('hide');
                }
            });
        });
    }
    var eliminarLibro = function(){
        $("#btnEliminarLibro").on("click", function(){
            var idLibro = $("#IdLibroEliminar").val();
            $.ajax({
                type: "POST",
                url: "eliminarLibro.php",
                data: {"IdLibro": idLibro},
                success:function(r){
                    console.log(idLibro);
                    //$("#IdLibro").trigger("reset");
                    mostrarL();
                    $("#EliminarModal").modal('hide');
                    //$("formEditar").validate().resetForm();
                }
            });
        });
    }
    var insertarLibro = function(){
        $("#insLibro").click(function(e){
            e.preventDefault();
            var frm = $("#formularioInsertar").serialize();
            $.ajax({
                type: "POST",
                url: "agregarLibro.php",
                data: frm,
                success:function(r){
                    $("#formularioInsertar").trigger("reset");
                    $("#InsertarModal").modal('hide');
                    mostrarL();
                }
            });
        });
    }