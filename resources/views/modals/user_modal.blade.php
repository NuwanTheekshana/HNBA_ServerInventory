
<!-- Update Modal -->
<div class="modal fade" id="update_user_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update User Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form id="form2" action="{{ route('update_user_details') }}" method="GET">
       @csrf

      <div class="form-group row">
            <label for="update_epf" class="col-sm-4 col-form-label">EPF No</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="update_epf" name="epf" placeholder="">
          </div>
      </div>

      <div class="form-group row">
            <label for="update_fname" class="col-sm-4 col-form-label">First Name</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="update_fname" name="update_fname" placeholder="">
          </div>
      </div>

      <div class="form-group row">
            <label for="update_lname" class="col-sm-4 col-form-label">Last Name</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="update_lname" name="update_lname" placeholder="">
          </div>
      </div>

      <div class="form-group row">
            <label for="update_premission" class="col-sm-4 col-form-label">Premission Type</label>
          <div class="col-sm-8">
            <select class="form-control" name="update_premission" id="update_premission">
              <option value="">Select Premission</option>
              <option value="1">Admin User</option>
              <option value="2">Defualt User</option>
            </select>
          </div>
      </div>

      <div class="form-group row">
            <label for="update_email" class="col-sm-4 col-form-label">Email Address</label>
          <div class="col-sm-8">
           <input type="email" class="form-control" id="update_email" name="email" placeholder="">
          </div>
      </div>


      <input type="hidden" class="form-control" id="update_user_id" name="update_user_id" placeholder="">

      <button type="submit" id="update_user_btn_submit" class="btn btn-success pull-right" style="background-color: green;"><i class="fa fa-edit"></i>&nbsp; Update User</button>
      
      </form>
      </div>

    
    </div>
  </div>
</div>


<!-- Update Password Modal -->
<div class="modal fade" id="update_user_password_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="form1">
          <input type="hidden" class="form-control" id="update_pass_user_id" name="update_pass_user_id" placeholder="">

      <div class="form-group row">
            <label for="update_password" class="col-sm-4 col-form-label">New Password</label>
          <div class="col-sm-8">
           <input type="Password" class="form-control" id="update_password" name="update_password" placeholder="">
          </div>
      </div>

      <div class="form-group row">
            <label for="update_cpassword" class="col-sm-4 col-form-label">Confirm Password</label>
          <div class="col-sm-8">
           <input type="password" class="form-control" id="update_cpassword" name="update_cpassword" placeholder="">
          </div>
      </div>

     
      <input type="hidden" class="form-control" id="update_pass_id" name="update_pass_id" placeholder="">

      <button type="button" id="update_user_pass_btn_submit" class="btn btn-warning pull-right" style="background-color: orange;"><i class="fa fa-edit"></i>&nbsp; Change Password</button>
      
      </form>
      </div>

    
    </div>
  </div>
</div>
