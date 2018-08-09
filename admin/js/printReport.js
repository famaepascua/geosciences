//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

function printDiv(divName) {
        $(document).ready(function () {
            $('#repHeader').removeAttr('hidden');
            $('#repFooter').removeAttr('hidden');
            var footer = ``;
            var printContents = document.getElementById(divName).innerHTML + footer;
            document.body.innerHTML = printContents;

            window.print();
            location.href = './records.php';
        })
    }

    $(document).ready(function () {
        var openModalsCount = 0;
        $('.modal').on('shown.bs.modal', function () {
            openModalsCount++;
        }).on('hidden.bs.modal', function () {
            openModalsCount--;
            if (openModalsCount > 0) $('body').addClass('modal-open');
        });
        $.ajax({
            type: "POST",
            dataType: 'JSON',
            data: {key: $('#filter').val()},
            url: 'php/getFilterKeys.php',
            success: function (data) {
                var options = [];

                $.each(data, function (key, value) {
                    options.push("<option value='" + value + "'>" + value + "</option>");
                })

                $('#searchKeys').html(options);
            }
        })
        $('#filter').change(function () {
            if ($(this).val() == 'dateInsp' || $(this).val() == 'dateRec' || $(this).val() == 'dateRel' || $(this).val() == 'docDate') {
                $('#dateFilter').removeAttr('hidden');
                $('#searchFilter').attr('hidden', 'hidden');
                $("#classifFilter").attr('hidden', 'hidden');
            } else if ($(this).val() == 'classification') {
                $("#classifFilter").removeAttr('hidden');
                $('#searchFilter').attr('hidden', 'hidden');
                $('#dateFilter').attr('hidden', 'hidden');
            } else {
                $.ajax({
                    type: "POST",
                    dataType: 'JSON',
                    data: {key: $(this).val()},
                    url: 'php/getFilterKeys.php',
                    success: function (data) {
                        var options = [];

                        $.each(data, function (key, value) {
                            options.push("<option value='" + value + "''>" + value + "</option>");
                        })

                        $('#searchKeys').html(options);
                        console.log(options);
                    }
                })

                $('#searchFilter').removeAttr('hidden');
                $('#dateFilter').attr('hidden', 'hidden');
                $("#classifFilter").attr('hidden', 'hidden');
            }
        })

        $('#editFile').on('click', function (e) {
            $('#scannedFile').attr('hidden', 'hidden');
            $('#uploadForm').removeAttr('hidden');
            $('#cnclBtn').toggleClass('hidden');
        })
        $('#cnclBtn').on('click',function(){
            $('#scannedFile').removeAttr('hidden');
            $('#uploadForm').attr('hidden','hidden');

              $('#editFile').on('click', function (e) {
            $('#scannedFile').attr('hidden', 'hidden');
            $('#uploadForm').removeAttr('hidden');
            $('#cnclBtn').toggleClass('hidden');
        })
        })

        $('#exampleModal').on('show.bs.modal', function () {
            $('#btnArch').val($('#recordID').val());
        });

        var table = $('#dataTables-example').DataTable({
            responsive: true
        });
        var tableArch = $('#archivedTable').DataTable({
            responsive: true
        });
        $('#saveRecord').click(function () {
            $(this).toggleClass('hidden');
            $('#backRecord').toggleClass('hidden');
            $('#editRecord').toggleClass('hidden');
            $('#archbtn').toggleClass('hidden');
            var text = $('.toSpanText');
            var date = $('.toSpanDate');
            var textarea = $('.toSpanTextArea');
            var classif = $('.classif');
            var data = {};
            text.each(function () {
                var $span = $('<span>', {
                    text: $(this).val(),
                    class: 'text',
                    id: $(this).attr('name')
                })
                $(this).replaceWith($span);
                data[$(this).attr('name')] = $(this).val();

            })
            date.each(function () {
                var $span = $('<span>', {
                    text: $(this).val(),
                    class: 'date',
                    id: $(this).attr('name')
                })
                $(this).replaceWith($span);
                data[$(this).attr('name')] = $(this).val();

            })
            textarea.each(function () {
                var $span = $('<span>', {
                    text: $(this).val(),
                    class: 'textarea',
                    id: $(this).attr('name')
                })
                $(this).replaceWith($span);
                data[$(this).attr('name')] = $(this).val();

            })
            classif.each(function () {
                var $span = $('<span>', {
                    text: $(this).val(),
                    class: 'classif',
                    id: $(this).attr('name')
                })
                $(this).replaceWith($span);
                data[$(this).attr('name')] = $(this).val();

            })
            var recordID = $('#recordID').val();

            $.ajax({
                type: "POST",
                url: 'php/updateRecord.php',
                data: {data: data, recordID: recordID},
                success: function (data) {

                }
            });
            $.ajax({
                url: 'php/getScannedFile.php',
                success: function (link) {
                    $('#viewfile').attr('href', '../admin/uploads/' + link);
                },
            });
        })
        
        $('#editRecord').click(function () {
            $(this).toggleClass('hidden');
            $('#backRecord').removeClass('hidden');
            $('#archbtn').toggleClass('hidden');
            $('#saveRecord').toggleClass('hidden');
            var text = $('#recordinfo').find('span.text');
            var date = $('#recordinfo').find('span.date');
            var textarea = $('#recordinfo').find('span.textarea');
            var classif = $('.classif');
            var locSelect = $('.locSelect');
            text.each(function () {
                var $input = $('<input>', {
                    val: $(this).text(),
                    type: "text",
                    class: 'form-control toSpanText',
                    name: $(this).attr('id')
                })
                $(this).replaceWith($input);
            })
            date.each(function () {
                var $input = $('<input>', {
                    val: $(this).text(),
                    type: "date",
                    class: 'form-control toSpanDate',
                    name: $(this).attr('id')
                })
                $(this).replaceWith($input);
            })
            textarea.each(function () {
                var $input = $('<input>', {
                    val: $(this).text(),
                    type: "textarea",
                    class: 'form-control toSpanTextArea',
                    name: $(this).attr('id')
                })
                $(this).replaceWith($input);
            });

            classif.each(function () {
                var $classification = $('#clsSelect').clone().addClass('classif').val($(this).text());
                $(this).replaceWith($classification);
            });
        })

        $('table tbody').on('click', 'tr', function () {
            $('#deleteRecord').on('show.bs.modal', function () {
                $('#btnDel').val($('#recordID').val());
            });
            $('#revertRecord').on('show.bs.modal', function () {
                $('#btnRev').val($('#recordID').val());
            });

            if ($('.tab-pane.fade.in.active').attr('id') == 'saved') {
                var data = table.row(this).data();
                 $('#editRecord').removeClass('hidden');
                $('#rvrtbtn').addClass('hidden');
                $('#dltbtn').addClass('hidden');
                $('#archbtn').removeClass('hidden');
                $('#uploadPanel').removeClass('hidden');
                $('#actionPanel').removeClass('hidden');
            } else {
                var data = tableArch.row(this).data();
                $('#editRecord').addClass('hidden');
                $('#rvrtbtn').removeClass('hidden');
                $('#dltbtn').removeClass('hidden');
                $('#archbtn').addClass('hidden');
                $('#uploadPanel').addClass('hidden');
                $('#actionPanel').addClass('hidden');

            }
            $('#status').html(data[7]);
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
            $('#recordinfo').modal();

            if (data[14]) {
                $('#uploadForm').attr('hidden', 'hidden');
                $('#scannedFile').removeAttr('hidden');
            } else {
                $('#scannedFile').attr('hidden', 'hidden');
                $('#uploadForm').removeAttr('hidden');
            }
        });
        $('#barangay').change(function () {
            $id = $(this).val();
            $.ajax({
                url: 'folderNo.php',
                data: {barangay: $id},
                dataType: 'JSON',
                success: function (data) {
                    $('#folderNo').val(data[0]);
                }
            });
            $.ajax({
                url: 'getLocation.php',
                data: {barangay: $id},
                dataType: 'JSON',
                success: function (data) {
                    if (data != false) {
                        var municipality = data[0];
                        var province = data[1];
                        $('input[name=municipality]').val(municipality);
                        $('input[name=province]').val(province);
                    } else {
                        $('input[name=municipality]').val('');
                        $('input[name=province]').val('');
                    }
                }
            });
            if ($id == '54' || $id == '56') {
                $('input[name=brgyname]').removeAttr('disabled');
                $('#folderNo').removeAttr('disabled');
            } else {
                $('input[name=brgyname]').attr('disabled', 'disabled');
                $('#folderNo').attr('disabled', 'disabled');
            }
        });
    });