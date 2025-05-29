import { ref } from 'vue';
import { Modal } from 'bootstrap';

const deleteModal = ref(null);

$(document).on('click','.show-delete-modal',function(e){
    e.preventDefault();
    deleteModal.formUrl = $(this).attr('data-custom-action');
    deleteModal.referenceTable = $(this).attr('data-custom-referece-table');
    deleteModal.value = new Modal(document.getElementById('confirm_delete_modal'));
    deleteModal.value.show();
});

$(document).on('click','#confirmBtn',function(e){
    e.preventDefault();
    deleteModal.value.hide();
    $.ajax({
        type: 'DELETE',
        url: deleteModal.formUrl,
        contentType: false,
        processData: false,
        success: (response) => {
            if (response) {
                //alert(response.message);
                $('#sucess_message_modal .modal-body').html(response.message);
                new Modal(document.getElementById('sucess_message_modal')).show();
                window.requestTable = $("#"+deleteModal.referenceTable).dataTable();
                console.log(window.requestTable);
                window.requestTable.fnDraw();;
            }
        },
        error: function (response) {
            console.log(response);
            $('#file-input-error').text(response.responseJSON.message);
        }
    });
    
});