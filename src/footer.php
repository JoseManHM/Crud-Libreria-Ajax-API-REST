<footer class="text-center text-white fixed-bottom" style="background-color: #263238;">
<!-- Copyright -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  © 2021 Copyright: José Manuel Hernández Mayorga
</div>
<!-- Copyright -->
</footer>
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
<!-- JS de Data Table -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
  $('#libraryTable').DataTable({
  "scrollY": "450px",
    "scrollCollapse": true,
    "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
      
  });
} );
</script>
</body>
</html>