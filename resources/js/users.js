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
                $('#sucess_message_modal .modal-body').html(response.message);
                new Modal(document.getElementById('sucess_message_modal')).show();
                window.LaravelDataTables[deleteModal.referenceTable].ajax.reload();
            }
        },
        error: function (response) {
            $('#error_message_modal .modal-body').html(response.responseJSON.message);
            new Modal(document.getElementById('error_message_modal')).show();
        }
    }); 
    
});