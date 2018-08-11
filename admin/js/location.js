//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

$(document).ready(function () {
    $('#recordinfo').on('hide.bs.modal',function() {
        location.href = './records.php'
    })
      $('input[name=code]').change(function(){
            $.ajax({
            url: 'php/codeValidate.php',
            data: {code: $(this).val()},
            dataType: 'JSON',
            success: function (res) {
                if(res != "True"){
                    alert("There is a duplicate code. Please enter a new one. ");
                    $('input[name=code]').val('');
                }
            }
        }); 
        })
        $('.addLocClose').click(function () {
            alert('Multiple locations added.')
            $(this).closest('.modal').modal("hide");
        });
        var counter = 0;

        $('#addlocation').click(function () {
            $('#folderNo').removeAttr('disabled');
            var numberOfInputs = $('#numofinput').val();

            for (i = 1; i <= numberOfInputs; i++) {
                counter++;
                $('#location').append('<label id=lab'+counter+'>Location</label>');
                var barangay = $('#barangay').clone().attr('data-num', counter).attr('name', 'barangay[' + counter + ']').appendTo('#location');
                var other = $('#brgyname0').clone().val('').attr('id', 'brgyname' + counter).attr('name', 'brgyname[' + counter + ']').appendTo('#location');
                var municipality = $('#m0').clone().val('').attr('id', 'm' + counter).attr('name', 'municipality[' + counter + ']').appendTo('#location');
                var province = $('#p0').clone().val('').attr('id', 'p' + counter).attr('name', 'province[' + counter + ']').appendTo('#location');
                $('#location').append('<button type="button" id="btn'+counter+'" onclick="removeAddedLoc('+counter+')" class="btn btn-danger">Remove Location</button><br>');
               
            }
            locationChange();
        })

    });

    locationChange();
    function removeAddedLoc(counter){
        $('select[data-num='+counter+']').remove();
        $('#btn'+counter).remove();
        $('#lab'+counter).remove();
        $('#brgyname'+counter).remove();
        $('#m'+counter).remove();
        $('#p'+counter).remove();
    }
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