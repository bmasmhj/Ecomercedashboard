
function closemodel(){
    document.getElementById('preview').style.display = 'none';
}



    

function emailaction(id){
  $('#show_'+id).addClass('d-none');
  $('#mailaction_'+id).removeClass('d-none');   
}
function emailactionnvert(id){
  $('#show_'+id).removeClass('d-none');
  $('#mailaction_'+id).addClass('d-none');    

}

function maildetails(){
  $.ajax({
  url: "maildata.php",
  method: 'POST',
  data:{'maildata':'maildata'},
  success:function(data){
      document.getElementById('mailfromcontact').innerHTML = data;

  }
}); 

}
function viewthismail(id){
  const no = id;
  $.ajax({
  url: "maildata.php",
  method: 'POST',
  data:{'mailviewdata': no},
  success:function(data){
    $('#preview').html(data);
    maildetails();
    // document.getElementById('mailfromcontact').innerHTML = data;
    document.getElementById('preview').style.display = 'block';
  }  }); 

}


function addproduct(){
  document.getElementById('reportformmodal').style.display = 'block';

}

function removeproduct(id){
    $.ajax({
      url: "main/delete.php",
      method: 'POST',
      data:{'deleterecords':id},
      success:function(data){
      document.getElementById('row_'+id).style.display = 'none';   
      }
  }); 
}

function viewimg(id){
    var image = document.getElementById('imagesrc_'+id).src;
    document.getElementById('preview').style.display = 'block';
    document.getElementById('productimage').innerHTML = '<img id="reportimage" src = "'+image+'">';

}

function productstatus(id){
  var val =  $('#statchangedval_'+id).val();
  $.ajax({
  url : 'main/update.php',
  data: {'changepstatus' : id, 'stat' : val},
  method : 'post',
  dataType : 'text',
  success :function (response){
          $('#changestat_'+id).html(response);
      }
  });
  
}
function deletesocial(id){
  if(confirm("Sure want to delete ?")==true){
      $.ajax({
          url: "main/delete.php",
          method: 'POST',
          data:{'deletesocial':id},
          success:function(data){
              document.getElementById('socialrow_'+id).style.display = 'none';   
          }
      }); 
  }
  
}
function deletethismail(id){
  if(confirm("Sure want to delete ?")==true){
      $.ajax({
          url: "main/delete.php",
          method: 'POST',
          data:{'deletethismail':id},
          success:function(data){
            $('#mailrow_'+id).addClass('d-none') ; 
            $('#mailrow_'+id).removeClass('d-flex') ; 
          }
      }); 
  }
  
}
function deletecategory(id){
  if(confirm("Sure want to delete ?")==true){
      $.ajax({
          url: "main/delete.php",
          method: 'POST',
          data:{'deletecategory':id},
          success:function(data){
              document.getElementById('socialrow_'+id).style.display = 'none';   
          }
      }); 
  }
  
}
function deletesub(id){
  if(confirm("Sure want to delete ?")==true){
      $.ajax({
          url: "main/delete.php",
          method: 'POST',
          data:{'deletesub':id},
          success:function(data){
              document.getElementById('row_'+id).style.display = 'none';   
          }
      }); 
  }
  
}

function deleteuser(id){
    var name = $('#name_'+id).text();
   Swal.fire({
       title: 'Are you sure user '+name+' ?',
       text: "You won't be able to revert this!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, delete it!'
     }).then((result) => {
       if (result.isConfirmed) {
         jQuery.ajax({
         url:'main/delete.php',
         type:'post',
         data:'deleteuser='+id,
         success:function(datas){
           var results = $.trim(datas);
 
           if(results == 'deleted'){
             Swal.fire(
               'Deleted!',
               'User '+name+' has been deleted.',
               'success'
             )
             jQuery('#tr_'+id).hide(500);
 
           }else{  
             alert('no'+datas);
           }
         } 
     });      
       }
     })
 }



function closeform(){
document.getElementById('reportformmodal').style.display = 'none';
}




$('#updatename').click(function(){
  const name = $('#fullname').val();
  $.ajax({
    url: "main/update.php",
    type: "POST",
    data: {'updatereceptname' : name},
    success:function(response){
        var result = $.trim(response);
        if(result == 'sucess'){
          $('#stat').html('Name has been changed!');
          $('#stat').removeClass('text-danger');
          $('#stat').addClass('text-success');
        }
        else{
            $('#stat').html(response );
        }
    }
});

});

$('#cnewps').keyup(function(){
  const newpw = $('#newpw').val();
  const cnewps = $('#cnewps').val();
  if( newpw == cnewps ){
    $('#stat').html("Password matched");
    $('#stat').removeClass('text-danger');
    $('#stat').addClass('text-success');
  }else{
    $('#stat').html("Password did not matched");
    $('#stat').removeClass('text-success');
    $('#stat').addClass('text-danger');
  }
});


$('#newpw').keyup(function(){
  const newpw = $('#newpw').val();
  const cnewps = $('#cnewps').val();
  if(cnewps !== ''){
    if( newpw == cnewps ){
    $('#stat').html("Password matched");
    $('#stat').removeClass('text-danger');
    $('#stat').addClass('text-success');
  }else{
    $('#stat').html("Password did not matched");
    $('#stat').removeClass('text-success');
    $('#stat').addClass('text-danger');
  }
  }
});

$('#updatepass').on('submit', function(e) {
  e.preventDefault();
  const newpw = $('#newpw').val();
  const oldpw = $('#oldpw').val();
  const cnewps = $('#cnewps').val();

  if(oldpw !='' && newpw !='' && cnewps != '' ){
    console.log('first part');
    if(newpw == cnewps){
      $.ajax({
        url: "main/update.php",
        type: "POST",
        data: {"newpw" : newpw  ,'oldpw': oldpw ,'cnewps':cnewps},
        success:function(response){
            var result = $.trim(response);

            if(result == 'oldwrong'){
                $('#stat').html('Old Password Wrong');
                $('#stat').removeClass('text-success');
                $('#stat').addClass('text-danger');
                $('#oldpw').val('');
            }
            else if(result == 'sucess'){
                $('#stat').html('Password Changed');
                $('#stat').removeClass('text-danger');
                $('#stat').addClass('text-success');
                document.getElementById("updatepass").reset();
            }
            else{
                $('#stat').html(response );
            }
        }
    });
    }
  }
});





function viewuserdetail(id){
  $.ajax({
  url: "modelview.php",
  method: 'POST',
  data:{'viewuserdetail':id},
  success:function(data){
      document.getElementById('preview').innerHTML = data;
      document.getElementById('preview').style.display = 'block';
  }
}); 

}


$('#provience').change(function(){
  var pid = $('#provience').val();
  $.ajax({
      url : 'main/data.php',
      data: {'pid' : pid},
      method : 'post',
      dataType : 'text',
      success :function (response){
          $('#district').empty();

          $('#district').append(response);
      }
  });
});
