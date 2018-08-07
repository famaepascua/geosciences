//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

$(document).ready(function () {
        if(location.hash === '#success'){
            $.notify({
                icon: 'glyphicon glyphicon-star',
                message: "Successfully added a new record!"
            },{
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
            window.location.replace(location.href.split('#')[0]+'#');
        }

        if(location.hash === '#failed'){
            $.notify({
                icon: 'glyphicon glyphicon-star',
                message: "Failed to add data!,Contact Administrator"
            },{
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
            window.location.replace(location.href.split('#')[0]+'#');
        }

    })

    function myPrint() {
        window.print();
    }