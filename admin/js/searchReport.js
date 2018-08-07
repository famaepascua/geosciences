//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

function searchReport() {
        var from = '';
        var to = '';
        var filterClassification = $('#filter').val();
        if (filterClassification == 'classification') {
            var searchValue = $('#classifFilter').find('select').val();
        } else if (filterClassification == 'dateInsp' || filterClassification == 'dateRec' || filterClassification == 'dateRel' || filterClassification == 'docDate') {
            from = $('input[name=from]').val();
            to = $('input[name=to]').val();
        } else {
            var searchValue = $('input[name=search]').val();
        }
        $('#repTable').DataTable({
            "ajax": {
                "url": "php/report.php",
                "type": "POST",
                "dataSrc": '',
                'data': {key: filterClassification, value: searchValue, from: from, to: to},
                "columns": [
                    {"data": "code"},
                    {"data": "applicant"},
                    {"data": "sender"},
                    {"data": "location"},
                    {"data": "subject"},
                    {"data": "status"}
                ]
            },
        }).destroy();
    }

    $(document).ready(function () {


        if (location.hash === '#success') {
            $.notify({
                icon: 'glyphicon glyphicon-star',
                message: "Scanned files Successfully Saved!"
            }, {
                type: 'success',
                animate: {
                    enter: 'animated fadeInUp',
                    exit: 'animated fadeOutRight'
                },
                placement: {
                    from: "top",
                    align: "center"
                },
                offset: 10,
                spacing: 10,
                z_index: 1031,
            });
            window.location.replace(location.href.split('#')[0] + '#');
        }

        if (location.hash === '#failed') {
            $.notify({
                icon: 'glyphicon glyphicon-star',
                message: "Failed to add data!,Contact Administrator"
            }, {
                type: 'danger',
                animate: {
                    enter: 'animated fadeInUp',
                    exit: 'animated fadeOutRight'
                },
                placement: {
                    from: "top",
                    align: "center"
                },
                offset: 10,
                spacing: 10,
                z_index: 1031,
            });
            window.location.replace(location.href.split('#')[0] + '#');
        }

    })