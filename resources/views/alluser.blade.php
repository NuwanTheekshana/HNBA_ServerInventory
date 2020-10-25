@extends('layouts.app1')

@section('title')
    All User Details
@endsection

@section('content')

    @if (Auth::user()->Status != "1")
        <script>
            alert("You can not access this page.please contact administrator..!")
            window.location.href="{{ url('/home') }}";
        </script>
    @endif

    <div class="container">

  <div class="card mt-5" id="all_user_card">
    <div class="card-body">
<p>All User Details</p>


<table id="all_user_details" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="20%">EPF No</th>
                <th width="20%">User Name</th>
                <th width="20%">Email Address</th>
                <th width="20%">Premission Type</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allusers as $users)
                <tr>
                <td>{{$users->epf}}</td>
                <td>{{$users->username}}</td>
                <td>{{$users->email }}</td>
                <td>
                    @if ($users->premission == "1")
                        Admin User
                    @else
                        Default User
                    @endif
                    
                </td>
                <td>
                <button class="btn btn-success" title="Edit" style="background-color: green" onclick="edit('{{$users->id}}', '{{$users->epf}}', '{{$users->fname}}', '{{$users->lname}}', '{{$users->email}}', '{{$users->premission}}')"><i class="fa fa-edit"></i></button>
                <button class="btn btn-warning" title="Change Password" style="background-color: orange" onclick="changepass('{{$users->id}}')"><i class="fa fa-key"></i></button>
                    <button class="btn btn-danger" title="Remove" style="background-color: red" onclick="remove('{{$users->id}}')"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>

</table>



    </div>
</div>


</div>

@include('modals.user_modal')

<script>
  function edit(id, epf, fname, lname, email, premission) 
  {
      $('#update_epf').val(epf);
      $('#update_fname').val(fname);
      $('#update_lname').val(lname);
      $('#update_premission').val(premission);
      $('#update_email').val(email);
      $('#update_user_id').val(id);
      $('#update_user_modal').modal('show');
  }

  function changepass(id) 
  {
      $('#update_pass_user_id').val(id);
      $('#update_user_password_modal').modal('show');
  }

</script>

<script>
    $('#update_user_pass_btn_submit').click(function () 
    {
            var id = $('#update_user_id').val();
            var update_password = $('#update_password').val();
            var update_cpassword = $('#update_cpassword').val();

          if (update_password == "" || update_cpassword == "") 
          {
              $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;All Feilds are required..!',
              {
                type: 'danger',
                width: 500,
                delay: 5000,  
              });

              return false;
          } 

          if (update_password != update_cpassword) 
          {
              $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;The Password confirmation does not match.',
              {
                type: 'danger',
                width: 500,
                delay: 5000,  
              });

              return false;
          }

          if (update_password.length < 8 || update_cpassword.length < 8) 
          {
              $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Password must be at least 8 characters.',
              {
                type: 'danger',
                width: 500,
                delay: 5000,  
              });

              return false;
          }

            $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'GET',
           url:'{{url("/update_user_pass")}}',
           data:{id:id, update_password:update_password, update_cpassword:update_cpassword},
           success:function(data){
            $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
              {
                type: 'success',
                width: 500,
                delay: 5000,  
              });

              $('#update_user_password_modal').modal('hide');
              $('#update_password').val('');
              $('#update_cpassword').val('');
              
           }

        });
    });
</script>

<script>
    function remove(id) 
    {
        if (confirm('Are you sure you want to remove this user account?')) 
        {
        } 
        else 
        {
           return false;
        }


             $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'GET',
           url:'{{url("/remove_user")}}',
           data:{id:id},
           success:function(data){

            $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
              {
                type: 'success',
                width: 500,
                delay: 5000,  
              });

              $("#all_user_card").load(" #all_user_card > *");
           }

        });
    }
</script>

@endsection