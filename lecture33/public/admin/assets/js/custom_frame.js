$(document).on("click", ".open-modal", function(e) {
    e.preventDefault();
    let modalType = $(this).attr('modal-type');
    let divId = $(this).attr('selector');
    let modalUrl = $(this).attr('href');
    let modalTitle = $(this).attr('modal-title');

    $.ajax({
        url: modalUrl,
        type: "GET",
        datatype: "html",
        success: function(response) {

            if (modalType == 'Show') {
                bootbox.dialog({
                    title: modalTitle,
                    message: `<div id="${divId}"></div>`,
                    size: 'large',
                    buttons: {
                        close: {
                            label: "Close",
                            className: 'btn-default',
                            callback: function(){
                            }
                        }
                    }
                });
            } else {
                bootbox.dialog({
                    title: modalTitle,
                    message: `<div id="${divId}"></div>`,
                    size: 'large',
                    buttons: {
                        close: {
                            label: "Close",
                            className: 'btn-default',
                            callback: function(){
                            }
                        },
                        success: {
                            label: modalType,
                            className: 'btn-success',
                            callback: function(){
                                $('#'+ divId +' form').submit();
                                return false;
                            }
                        }
                    }
                });
            }

            $('#'+divId).html(response);
        }
    })

});
