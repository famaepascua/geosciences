$(document).ready(function() {
          var table =  $('#dataTables-example').DataTable({
            responsive: true
        });
          $('#dataTables-example tbody').on( 'click', 'tr', function () {
            var data = table.row( this ).data();
            $('#code').html(data[1]);
            $('#folderNo').html(data[6]);
            $('#dateReceived').html(data[0]);
            $('#applicant').html(data[2]);
            $('#sender').html(data[3]);
            $('#location').html(data[4]);
            $('#purpose').html(data[5]);
            $('#recordID').val(data[7]);
            $('#editUnclaim').modal();
        } );
      });