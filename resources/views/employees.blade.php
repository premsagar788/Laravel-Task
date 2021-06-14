@extends('layouts.app')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" /> 

<!-- Add Employee Modal -->

  <div class="modal fade" id="addemployeemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addemployeemodal">Add employee</h5>
          <button style="height:30px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <form id="addemployeeform">
            @csrf
            <div class="form-row">
                <div class="col-xs-12 col-sm-12">
                    <label for="firstname">First Name</label>
                    <input id="firstname" type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-xs-12 col-sm-12">
                    <label for="lastname">Last Name</label>
                    <input id="lastname" type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-xs-12 col-sm-12">
                  @if(isset($companies))
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-select form-control" aria-label="Default select example">
                      @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                      @endforeach
                    </select>
                  @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col-xs-12 col-sm-12">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" id="email" class="form-control" required >
                </div>
                </div>
            
            <div class="form-row">
                <div class="col-xs-12 col-sm-12">
                    <label for="phone">Phone</label>
                    <input id="phone" type="number" name="phone" id="phone" class="form-control" required>
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

<!-- Add Employee Modal End -->

<!-- Edit Modal -->
  <div class="modal fade" id="editemployeemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addemployeemodal">Edit employee</h5>
          <button style="height:30px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <form id="editemployeeform">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id">
            <div class="form-row">
              <div class="col-xs-12 col-sm-12">
                <label for="name">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" >
              </div>
            </div>
            <div class="form-row">
              <div class="col-xs-12 col-sm-12">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" >
              </div>
            </div>
            <div class="form-row">
              <div class="col-xs-12 col-sm-12">
                <label for="company">Company</label>
                <input  type="text" name="company" id="company" class="form-control"  >
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
                <label for="phone">Phone</label>
                <input  type="number" name="phone" id="phone" class="form-control"  >
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

  <div class="modal fade" id="deleteemployeemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>

          </button>
        </div>
        <div class="modal-body">
          <form id="deleteemployeeform">
            @csrf
            {{ method_field('delete') }}
            <input type="hidden" name="id" id="delete_id">

            <p>Are you sure want to delete this employee?</p>

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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a href="#" class="addemployee d-inline float-right">Add</a></div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </thead>

                        @foreach($employees as $employee)
                        <tbody>
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->firstname }}</td>
                            <td>{{ $employee->lastname }}</td>
                            <td>{{ $employee->company_id  }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
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

      $('.addemployee').on('click', function() {

        $('#addemployeemodal').modal('show');
        
        $('#addemployeemodal').on('submit', function (e){
        e.preventDefault();

        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var company_id = $('#company_id').val();
        var email = $('#email').val();
        var phone = $('#phone').val();

        console.log(phone);
        $.ajax({
          type: 'POST',
          url: 'employees/addemployee/',
          data: {
            _token:"{{ csrf_token() }}",
            firstname: firstname,
            lastname: lastname,
            company_id: company_id,
            email: email,
            phone: phone
          },
          success: function (response) {
            console.log(response);
            $('#addemployeemodal').hide();
            window.location.reload();
          },
          error: function (error){
            console.log(error);
          }
        });

      });

      });

      $('.editbutton').on('click', function() {

        $('#editemployeemodal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children('td').map(function () {
            return $(this).text();
          }).get();
          console.log(data);
          $('#id').val(data[0]);
          $('#firstname').val(data[1]);
          $('#lastname').val(data[2]);
          $('#company').val(data[3]);
          $('#email').val(data[4]);
          $('#phone').val(data[5]);
      });
      $('#editemployeeform').on('submit', function (e){
        e.preventDefault();
        var id = $('#id').val();

        $.ajax({
          type: 'PUT',
          url: 'employees/updateemployee/'+id,
          data: $('#editemployeeform').serialize(),
          success: function (response) {
            console.log(response);
            $('#editemployeemodal').hide();
            window.location.reload();
          },
          error: function (error){
            console.log(error);
          }
        });

      });

    });

    $('.deletebtn').on('click', function () {

      $('#deleteemployeemodal').modal('show');

      $tr = $(this).closest('tr');

          var data = $tr.children('td').map(function () {
            return $(this).text();
          }).get();

          console.log(data);
          
          $('#delete_id').val(data[0]);
          
          $('#deleteemployeeform').on('submit',function(e){
          e.preventDefault();

          var id = $('#delete_id').val();

          $.ajax({
            type:'DELETE',
            url: 'employees/deleteemployee/'+id,
            data: $('#deleteemployeeform').serialize(),
            success: function (response) {
              console.log(response)
              $('#exampleModal').modal('hide');
              // alert('employee Added');
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
