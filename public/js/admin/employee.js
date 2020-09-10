$(document).ready(function() {
    let formClone = $('#employee-form').clone();
$('#employeeModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever') 
    var modal = $(this)
    modal.find('.modal-title').text('Add Log')
    modal.find('.modal-body input').val(recipient)
  })
$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id') 
    var name = button.data('name') 
    var date = button.data('date') 
    var time = button.data('time') 
    var modal = $(this)
    modal.find('.modal-title').text('Edit Log')
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #date').val(date)
    modal.find('.modal-body #time').val(time)
  })
    $('#form-import').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire('Success', response.message, 'success')
                .then(function() {
                    $('#form-import')[0].reset();
                    $('#importModal').modal('hide');
                });
            },
            error: function(error) {
                let response = error.responseJSON;
                $.each(response.errors, function(index, value) {
                    $('#' + index ).addClass('is-invalid');
                    $('#' + index + '-feedback').html(value.join('<br>'));
                })
                Swal.fire('Whoops', error.responseJSON.message, 'error');
            }
        });
    });
  $('.btn-delete').click(function(event) {
    event.preventDefault();
    let deleteForm = $(this).closest('form');
    Swal.fire({
        title: 'Are you sure?',
        text: 'The data will be permanently remove',
        icon: 'warning',
        showCancelButton: true,
    }).then((result) => {
        if (result.value) {
            deleteForm.submit();
        }
    });
});

$('#btn-clear').click(function() {
    $('#loan-form').replaceWith(formClone);
});
      $('#date').attr("placeholder", Date());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    });