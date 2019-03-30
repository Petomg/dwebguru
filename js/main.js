
$(function(){
  $('#deletebutton').click(function(){
    $('#delconfirmation').html( `<div class="alert alert-danger" role="alert">
                                  Do you really want to delete these post?
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-success confirm">Confirm</button>
                                  <button type="button" class="btn btn-danger cancel">Cancel</button>
                                </div>

                                `);
    window.location.replace("#delconfirmation");
  });

  $('#delconfirmation').on('click', "button.confirm", function(){
    $('#deleteform').submit();
  });

  $('#delconfirmation').on('click',"button.cancel", function(){
    $('#delconfirmation').html("");
  });

//TODO: Ocultar Titulo: Codigo y Links en caso de no tener valor
});
