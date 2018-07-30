$(document).ready(function () {
        $('.addLocClose').click(function () {
            $(this).closest('.modal').modal("hide");
        });
        var counter = 0;

        $('#addlocation').click(function () {
            $('#folderNo').removeAttr('disabled');
            var numberOfInputs = $('#numofinput').val();

            var label = '<label>Location</label>';
            for (i = 1; i <= numberOfInputs; i++) {
                counter++;
                $('#location').append(label);
                var barangay = $('#barangay').clone().attr('data-num', counter).attr('name', 'barangay[' + counter + ']').appendTo('#location');
                var other = $('#brgyname0').clone().val('').attr('id', 'brgyname' + counter).attr('name', 'brgyname[' + counter + ']').appendTo('#location');
                var municipality = $('#m0').clone().val('').attr('id', 'm' + counter).attr('name', 'municipality[' + counter + ']').appendTo('#location');
                var province = $('#p0').clone().val('').attr('id', 'p' + counter).attr('name', 'province[' + counter + ']').appendTo('#location');
            }
            locationChange();
        })

    });

    locationChange();

    function locationChange() {
        $('select[name^=barangay]').change(function () {
            $id = $(this).val();
            $num = $(this).data('num');
            if ($num != '0') {
                $('#folderNo').removeAttr('disabled');
                $('#folderNo').val('');
            } else {
                if ($id == '54' || $id == '56') {
                    $('#brgyname' + $num).removeAttr('disabled');
                    $('#folderNo').removeAttr('disabled');
                } else {
                    $('#brgyname' + $num).attr('disabled', 'disabled');
                    $('#folderNo').attr('disabled', 'disabled');
                }
            }
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
                        $('#m' + $num).val(municipality);
                        $('#p' + $num).val(province);
                    } else {
                        $('#m' + $num).val('');
                        $('#p' + $num).val('');
                    }
                }
            });
        });
    }