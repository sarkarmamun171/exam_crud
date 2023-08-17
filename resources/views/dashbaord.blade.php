<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>

li {
  padding: 5px 4px 6px 7px;
  margin-top: 3px;
  margin-bottom: 3px;
  list-style: none;
}
</style>

</head>
<body>
<div class="container" style="padding:100px;">
    <div class="row">
     <div class="col-md-8">
        <h2>Question Board</h2>
     </div>
     <div class="col-md=4">
        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Question</a>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="myForm">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Question</label>
                  <input type="test" class="form-control" name="question" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please type Question Here" required>
                </div>
                <div class="container">
                    <h5>Answer List</h5>
                    <ul id="tasks">
                        <li>
                            <input type="text"  name="answer[]" placeholder="Type Your Answer Here" required>
                            <button id="add"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            <button id="delete"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        </li>
                    </ul>
                </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editRow" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRow">Edit Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body editRow">
            <form id="updateForm">
                @csrf
                <div class="form-group">
                <input type="hidden" name="id" id="id">
                  <label for="exampleInputEmail1">Question</label>
                  <input type="test" class="form-control" name="question" id="question" aria-describedby="emailHelp" placeholder="Please type Question Here" required>
                </div>
                <div class="container">
                    <h5>Answer List</h5>
                    <ul id="edittask">
                        <li>

                        </li>
                    </ul>
                </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
      </div>
    </div>
  </div>
     </div>
    </div>
    <div class="container" style="margin-top:40px;">
        <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th rowspan="4" style="text-align:center; vertical-align: middle">SL</th>
                <th rowspan="4" style="text-align:center; vertical-align: middle">Question</th>
                <th colspan="4"  style="text-align:center; vertical-align: middle">Answer</th>
                <th rowspan="4" style="text-align:center; vertical-align: middle">Action</th>
              </tr>
              <tr>
                <td>1st Answer</td>
                <td>2nd Answer</td>
                <td>3rd Answer</td>
                <td>4th Answer</td>
              </tr>
            </thead>
            <tbody id="res">


            </tbody>
          </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        allquestion();

    $('ul').on('click', '#add', function(e){
        e.preventDefault();
      $('#tasks').append('<li><input type="text" name="answer[]" placeholder="Type Your Answer Here"><button id="add" class="ml-2"><i class="fa fa-plus" aria-hidden="true"></i></button><button id="delete"><i class="fa fa-minus" aria-hidden="true"></i></button></li>');

    });


    $('ul').on('click', '#delete', function(e){
        e.preventDefault();
        $(this).parent().remove();
    });


    $('#myForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('save.question') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $("#res").empty();
                $('#myForm')[0].reset();
                allquestion();
                alert(response.message);
            },
            error: function(xhr) {
                // Handle error response
                console.log(xhr.responseText);
            }
        });

    });

    $(document).on('click','#deleteRow',function()
    {
        var id = $(this).data('id');

        if(id){

            $.ajax({
                type: 'get',
                url: "{{ url('/deleteques') }}"+ "/" + id,
                dataType:"json",
                success: function(response) {
                $("#res").empty();
                allquestion();
                alert(response.message);

                }
            });

        }


    });

    $(document).on('click','#editRow',function()
    {
        var id = $(this).data('id');

        if(id){

            $.ajax({
                type: 'get',
                url: "{{ url('/editquestion') }}"+ "/" + id,
                dataType:"json",
                success: function(response) {
                  console.log(response);
                $('.editRow #id').val(response.que.id);
                $('.editRow #question').val(response.que.name);
                $("#edittask").empty();

                $.each(response.answer,function(key,item){

                $('#edittask').append('<li><input type="text" name="answer[]" placeholder="Type Your Answer Here" value="'+item.answer+'"><button id="add" class="ml-2"><i class="fa fa-plus" aria-hidden="true"></i></button><button id="delete"><i class="fa fa-minus" aria-hidden="true"></i></button></li>');

            });





                }
            });

        }


    });

    $('#updateForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('update.question') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $("#res").empty();
                allquestion();
                alert(response.message);
            },
            error: function(xhr) {
                // Handle error response
                console.log(xhr.responseText);
            }
        });
    });
    });

  function allquestion()
  {
    var a = '';
    $.ajax({
                type: 'get',
                url: "{{ url('/allquestion') }}",
                dataType:"json",
                success: function(response) {
                console.log(response);
                var i=0;

                $.each(response.all,function(key,item){
                  i++;
            
                  a = (item.answers).toString().split(",");
                  

                  if(a.length==4)
                  {
                    $('#res').append('<tr><td>'+i+'</td><td>'+ item.name + '</td><td>'+a[0] + '<input type="hidden" id="id" value="'+item.id+'"></td><td>'+a[1] + '</td><td>'+a[2] + '</td><td>'+a[3] + '</td><td><a href="#editRow" data-toggle="modal" class="btn btn-primary mr-2" id="editRow" data-id="'+item.id+'">Edit</a><a class="btn btn-danger" data-id="'+item.id+'" id="deleteRow">Delete</a></td></tr>');

                  }

                  else
                  {
                    $('#res').append('<tr><h2>Answer Must be 4</h2></tr>')
                  }
      
                  

            });
                }
            });
}



</script>
</body>
</html>

