$(document).ready(function () {
                var table = $('#dataTables-example').DataTable({
                    responsive: true
                });
                $('#dataTables-example tbody').on( 'click', 'tr', function () {
                    var data = table.row( this ).data();

                // if(data[14]){
                //     $('#releaseForm').removeAttr('hidden');
                //     $('#uploadForm').attr('hidden','hidden');
                // }else{
                //     $('#uploadForm').removeAttr('hidden');
                //     $('#releaseForm').attr('hidden','hidden');
                // }
                $('#code').html(data[0]);
                $('#fNo').html(data[1]);
                $('#dateReceived').html(data[2]);
                $('#applicant').html(data[3]);
                $('#sender').html(data[4]);
                $('#loc').html(data[5]);
                $('#purpose').html(data[6]);
                $('#dateInspected').html(data[10]);
                $('#documentDate').html(data[11]);
                $('#recordID').val(data[8]);
                $('#inspector').html(data[9]);
                $('#subject').html(data[12]);
                $('#classification').html(data[13]);
                $('#dateReleased').html(data[15]);
                $('#receiver').html(data[16]);
                $('#action').html(data[17]);
                $('#actiondesired').html(data[18]);
                $('#note').html(data[19]);
                $('#oicrd').html(data[20]);
                $('#viewfile').attr('href', '../admin/uploads/' + data[14]);

                if(data[21] == '0'){
                    $('#recordinfo').modal();
                }else{
                    $('#contact').modal();
                }

                if(data[14]){
                    $('#uploadForm').attr('hidden','hidden');
                    $('#scannedFile').removeAttr('hidden');
                }else{
                    $('#scannedFile').attr('hidden','hidden');
                    $('#uploadForm').removeAttr('hidden');
                }
            });
                $.ajax({
                url: 'php/getScannedFile.php',
                success: function (link) {
                    $('#viewfile').attr('href', '../admin/uploads/' + link);
                },
            });

            });

            function myPrint() {
                window.print();
            }

            function PrintElem(elem)
            {
                var mywindow = window.open('', 'PRINT', 'height=400,width=600');

                mywindow.document.write('<html><head><title>' + document.title  + '</title>');
                mywindow.document.write('</head><body >');
                mywindow.document.write('<h1>' + document.title  + '</h1>');
                mywindow.document.write(document.getElementById(elem).innerHTML);
                mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            mywindow.close();

            return true;
        }