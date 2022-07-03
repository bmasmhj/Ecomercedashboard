$('#provience').change(function(){
    var pid = $('#provience').val();
    $.ajax({
        url : 'info.php',
        data: {'pid' : pid},
        method : 'post',
        dataType : 'text',
        success :function (response){
            $('#district').empty();
  
            $('#district').append(response);
        }
    });
  });
  