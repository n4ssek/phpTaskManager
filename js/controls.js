$(document).ready(function(){
        $("#myTable").DataTable( {
          "searching": false,
          "paging": false,
          "lengthChange": false,
          "info": false
        });
        $('#preview').on('click', function(e) {
            e.preventDefault();
            preview();
          });
    }
);

function preview(){
    var username = $('input[name="username"]').val();
    var username_data = '<p><strong>Имя</strong> : ' + username + '</p>';


    var email = $('#email').val();
    var email_data = '<p><strong>Email</strong> : ' + email + '</p>';

    var task = $('input[name="task"]').val();
    var task_data = '<p><strong>Text field</strong> : ' + task + '</p>';

    var data = username_data + email_data + task_data;
    $('#preview_data').html('');
    $('#preview_data').append(data);
    $('#preview_data').dialog({
        resizable: false,
        modal: true,
        buttons: {
            Cancel: function() {
                $(this).dialog("close");
            }
        }
    });
  }
