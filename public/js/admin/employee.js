
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
    var recipient = button.data('whatever') 
    var modal = $(this)
    modal.find('.modal-title').text('Edit Log')
    modal.find('.modal-body input').val(recipient)
  })

$('#btn-clear').click(function() {
    $('#loan-form').replaceWith(formClone);
});
});
function myFunction() {

    $(document).ready(function(){
      $('#date').attr("placeholder", Date());
    });
    
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });