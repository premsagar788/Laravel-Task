@extends('layouts.app')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" /> 


<!-- Add Company Modal -->

  <div class="modal fade" id="addcompanymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addcompanymodal">Add Company</h5>
          <button style="height:30px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <form id="addcompanyform">
            @csrf
            <div class="form-row">
                <div class="col-xs-12 col-sm-12">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="aname" name="name" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-xs-12 col-sm-12">
                    <label for="email">Email</label>
                    <input  type="email" name="email" id="aemail" class="form-control" required >
                </div>
                </div>
            
            <div class="form-row">
                <div class="col-xs-12 col-sm-12">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="awebsite" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Add Company Modal End -->


<!-- Edit Modal -->

  <div class="modal fade" id="editusermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addusermodal">Edit User</h5>
          <button style="height:30px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <form id="edituserform">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id">
            <div class="form-row">
              <div class="col-xs-12 col-sm-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
              </div>
            </div>
            <div class="form-row">
              <div class="col-xs-12 col-sm-12">
                <label for="email">Email</label>
                <input  type="email" name="email" id="email" class="form-control"  >
              </div>
            </div>

            <div class="form-row">
              <div class="col-xs-12 col-sm-12">
                <label for="website">Website</label>
                <input  type="text" name="website" id="website" class="form-control"  >
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Edit Modal End -->

<!-- Delete Modal  -->

  <div class="modal fade" id="deleteusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>

          </button>
        </div>
        <div class="modal-body">
          <form id="deleteuserform">
            @csrf
            {{ method_field('delete') }}
            <input type="hidden" name="id" id="delete_id">

            <p>Are you sure want to delete this company?</p>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Delete Modal End -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a href="#" class="addcompany d-inline float-right">Add</a></div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                        </thead>

                        @foreach($companies as $company)
                        <tbody>
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>
                                <a href="#" class="btn btn-primary editbutton">Edit</a>
                                <a href="#" class="btn btn-danger deletebtn">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

  <script type="text/javascript">

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function(){

        $('.addcompany').on('click', function() {

        $('#addcompanymodal').modal('show');
        
        $('#addcompanymodal').on('submit', function (e){
        e.preventDefault();

        var name = $('#aname').val();
        var email = $('#aemail').val();
        var website = $('#awebsite').val();

        console.log(website);
        $.ajax({
          type: 'POST',
          url: 'companies/addcompany/',
          data: {
            _token:"{{ csrf_token() }}",
            name: name,
            email: email,
            website: website
          },
          success: function (response) {
            console.log(response);
            $('#addcompanymodal').hide();
            window.location.reload();
          },
          error: function (error){
            console.log(error);
          }
        });

      });

      });


      $('.editbutton').on('click', function() {

        $('#editusermodal').modal('show');


          $tr = $(this).closest('tr');

          var data = $tr.children('td').map(function () {
            return $(this).text();
          }).get();
          console.log(data);
          $('#id').val(data[0]);
          $('#name').val(data[1]);
          $('#email').val(data[2]);
          $('#website').val(data[3]);
      });
      $('#edituserform').on('submit', function (e){
        e.preventDefault();
        var id = $('#id').val();

        $.ajax({
          type: 'PUT',
          url: 'companies/updatecompany/'+id,
          data: $('#edituserform').serialize(),
          success: function (response) {
            console.log(response);
            $('#editusermodal').hide();
            // alert('User updated');
            window.location.reload();
          },
          error: function (error){
            console.log(error);
          }
        });

      });

    });

    $('.deletebtn').on('click', function () {

      $('#deleteusermodal').modal('show');

      $tr = $(this).closest('tr');

          var data = $tr.children('td').map(function () {
            return $(this).text();
          }).get();

          console.log(data);
          
          $('#delete_id').val(data[0]);
          
          $('#deleteuserform').on('submit',function(e){
          e.preventDefault();

          var id = $('#delete_id').val();

          $.ajax({
            type:'DELETE',
            url: 'companies/deletecompany/'+id,
            data: $('#deleteuserform').serialize(),
            success: function (response) {
              console.log(response)
              $('#exampleModal').modal('hide');
              // alert('User Added');
              window.location.reload();
            },
            error: function (error) {
              console.log(error);
              alert('Some error occured');
            }
          });
        });
    });
  </script>


@endsection
