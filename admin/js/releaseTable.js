//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

$(document).ready(function() {
          var table =  $('#dataTables-example').DataTable({
            responsive: true
        });
          $('#dataTables-example tbody').on( 'click', 'tr', function () {
            var data = table.row( this ).data();
            $('#code').html(data[1]);
            $('#folderno').html(data[10]);
            $('#dateReceived').html(data[13]);
            $('#applicant').html(data[2]);
            $('#sender').html(data[3]);
            $('#location').html(data[4]);
            $('#purpose').html(data[11]);
            $('#dateInspected').html(data[9]);
            $('#inspector').html(data[8]);
            $('#documentDate').html(data[0]);
            $('#recordUpdate').val(data[7]);
            $('#classification').html(data[12]);
            $('#subject').html(data[5]);
            $('#recordID').val(data[7]);
            $('#editRelease').modal();
        } );
      });