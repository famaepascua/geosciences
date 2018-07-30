$(document).ready(function () {
            if(location.hash === '#success'){
                $.notify({
                    icon: 'glyphicon glyphicon-star',
                    message: "Record Was Updated!"
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