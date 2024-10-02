$(document).ready(function () {
    $('#table_datatable').DataTable({
        "language": {
            "url": "/assets/plugins/datatables/lenguaje/spanish.json"
        }
    });
});

$(document).ready(function () {
    $('#table_etrabajo').DataTable({
        "ordering": false,
        "language": {
            "url": "/assets/plugins/datatables/lenguaje/spanish.json"
        }
    });
});

$(document).ready(function () {
    $('#table_calendario').DataTable({
        "paging":   false,
        "order": [[0, "asc"]],
        "language": {
            "url": "/assets/plugins/datatables/lenguaje/spanish.json"
        }
    });
});

    $(document).ready(function () {
        $('#example4').DataTable({
            "order": [[1, "desc"]],
            "language": {
                "url": "/assets/plugins/datatables/lenguaje/spanish.json"
            }
        });
        $('#example1').DataTable({
            "ordering": false
        });
    });
$(function () {
    $("#example1").dataTable();
});

$(document).ready(function () {
    $('#table_noticia').DataTable({
        "ordering": false,
        "language": {
            "url": "/assets/plugins/datatables/lenguaje/spanish.json"
        }
    });
});