@extends('layouts.app1')

@section('title')
    Home Page
@endsection

@section('content')

             <form class="form-inline col-36" id="findform">
       
  <div class="form-group mb-2 mr-2 ml-2" style="width: 98%">
    <label for="ser_no" class="col form-label">Serial Number </label>
    <input type="text" id="ser_no" class="form-control col" aria-describedby="ser_no" name="ser_no">
    
    
   <label for="asstno" class="col form-label">Asset Number</label>
   <input type="text" id="asstno" class="form-control col" aria-describedby="asstno" name="asstno">

   <label for="ip" class="col form-label">IP Address</label>
   <input type="text" id="ip" class="form-control col" aria-describedby="ip" name="ip">

   <label for="assttype" class="col form-label">Asset Type &nbsp;<i style="color: red;">*</i></label>
   <select id="assttype" class="form-control col" name="assttype">
    <option value="">Select Asset Type</option>
    <option value="Physical">Physical Server</option>
    <option value="Virtual">Virtual Server</option>
    <option value="NAS">NAS</option>
    <option value="Switch">Network Switch</option>
    <option value="Router">Network Router</option>
  </select>
  
  </div>

  <br><br>
        @if (Auth::user()->premission == "1")
        <button type="button" class="btn btn-success mt-3 col-2" id="addnew" style="background-color: green;margin-left: 350px;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New</button>
    <button type="button" id="finddata" class="btn btn-warning mt-3 ml-3 col-2" style="background-color: orange;"><i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
    <button type="reset" class="btn btn-danger mt-3 ml-3 col-2" style="background-color: red"><i class="fa fa-recycle"></i>&nbsp;&nbsp;Reset</button>
        @else
        <div class="col-4"></div>
         <button type="button" id="finddata" class="btn btn-warning mt-3 ml-5 col-2" style="background-color: orange;"><i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
    <button type="reset" class="btn btn-danger mt-3 ml-3 col-2" style="background-color: red"><i class="fa fa-recycle"></i>&nbsp;&nbsp;Reset</button>
      
        @endif

  </div>

</form>

    </div>

        

          </div>

      </div>

    <div class="card mt-3 ml-3 mr-3" id="find_data_card">
    <div class="card-body">

        <div id="find_server_details_div" >

        
<p>Find Server Details</p>


<table id="find_server_details" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="10%">Server Type</th>
                <th width="10%">Asset No</th>
                <th width="20%">Serial No</th>
                <th width="10%">Rack No</th>
                <th width="20%">Product & Model</th>
                <th width="15%">IP Address</th>
                <th width="15%">Action</th>

            </tr>
        </thead>
        <tbody>
          

        </tbody>

</table>


</div>

<div id="find_vir_server_div" style="display: none">

<p>Find Virtual Server Details</p>


<table id="find_vir_server_details" class="table table-striped table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th width="20%">Virtual Machine Name</th>
                <th width="20%">Virtual Machine OS</th>
                <th width="20%">Virtual Machine IP Address</th>
                <th width="15%">Action</th>

            </tr>
        </thead>
        <tbody>
          

        </tbody>

</table>



</div>

    </div>
</div>

    </div>
    
</div>

@include('modals.main_modal')

@include('modals.scripts')

@endsection
