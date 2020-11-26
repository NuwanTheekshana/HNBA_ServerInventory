
<!-- Add Modal -->
<div class="modal fade" id="addnew_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Server Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="form1">
      <div class="form-group row">
            <label for="py_or_vir" class="col-sm-4 col-form-label">Server Type *</label>
          <div class="col-sm-8">
            <select class="form-control" name="py_or_vir" id="py_or_vir">
              <option value="">Select Asset Type</option>
              <option value="Physical">Physical Server</option>
              <option value="Virtual">Virtual Server</option>
              <option value="NAS">NAS</option>
              <option value="Switch">Network Switch</option>
              <option value="Router">Network Router</option>
            </select>
          </div>
      </div>

      <div id="server_option" style="display: none;">
        <div class="form-group row">
          <label for="serv_option_in" class="col-sm-4 col-form-label">Availbilty of VM</label>
        <div class="col-sm-8">
          <select class="form-control" name="serv_option_in" id="serv_option_in">
            <option value="">Select Server Type</option>
            <option value="Yes">Available</option>
            <option value="No">No</option>
          </select>
        </div>
    </div>
      </div>
      
      <div class="card mb-2" id="vir_server_data" style="display: none;">
          <div class="card-body">
              
            <div class="form-group row">
              <label for="vir_name_py" class="col-sm-6 col-form-label">Virtual Machine Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="vir_name_py" name="vir_name_py" placeholder="">
              </div>
            </div>
    
            <div class="form-group row">
              <label for="vir_ipadd_py" class="col-sm-6 col-form-label">IP Address</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="vir_ipadd_py" name="vir_ipadd_py" placeholder="">
              </div>
            </div>
    
            <div class="form-group row">
              <label for="vir_os_py" class="col-sm-6 col-form-label">Operating System</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="vir_os_py" name="vir_os_py" placeholder="">
              </div>
            </div>
    
            <div class="form-group row">
              <label for="vir_application_py" class="col-sm-5 col-form-label">Applications</label>
              <div class="col-sm-6">
                <div id="vir_text_div_py">
                    <input type="text" class="form-control mb-3" id="vir_application_py_main" name="vir_application_py_main" placeholder="">     
                </div>       
              </div>
              <button type="button" class="btn btn-warning btn-sm" style="height:40px;background-color: orange" id="btn_add_txtbox_py"><i class="fa fa-plus"></i></button>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label"></label>
              <div class="col-sm-6" id="sampleclone"></div>
          </div>
 
           <button type="button" class="btn btn-success pull-right mb-2" style="background-color: green" id="insert_item_btn">Insert</button>

           <div id="tableshow_div" style="display: none">

            <table class="table table-bordered mt-4" id="vir_inset_item_table">
              <thead>
                <tr>
                  <th scope="col">Machine Name</th>
                  <th scope="col">IP Address</th>
                  <th scope="col">Operating System</th>
                  <th scope="col">Applications</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
            
              </tbody>
             </table>

             <div id="tablevalues">

             </div>

           </div>

          </div>
      </div>

      <div id="virual_list" style="display: none;">
        <div class="form-group row">
          <label for="vir_name" class="col-sm-6 col-form-label">Virtual Machine Name</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="vir_name" name="vir_name" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="vir_ipadd" class="col-sm-6 col-form-label">IP Address</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="vir_ipadd" name="vir_ipadd" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="vir_os" class="col-sm-6 col-form-label">Operating System</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="vir_os" name="vir_os" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="vir_application" class="col-sm-4 col-form-label">Applications</label>
          <div class="col-sm-6">
            <div id="vir_text_div">
                <input type="text" class="form-control mb-3" id="vir_application" name="vir_application" placeholder="">     
            </div>       
          </div>
          <button type="button" class="btn btn-warning" style="height:40px;background-color: orange" id="btn_add_txtbox"><i class="fa fa-plus"></i></button>
        </div>
      </div>
      

      <div class="form-group row" id="phy_seri_no">
            <label for="seri_no" class="col-sm-4 col-form-label">Serial Number</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="seri_no" name="seri_no" placeholder="">
          </div>
      </div>

      <div class="form-group row" id="phy_asset_no">
            <label for="asset_no" class="col-sm-4 col-form-label">Asset Number</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="asset_no" name="asset_no" placeholder="">
          </div>
      </div>

      <div class="form-group row" id="phy_pur_year">
            <label for="pur_year" class="col-sm-4 col-form-label">Purchase Year</label>
          <div class="col-sm-8">
           <input type="date" class="form-control" id="pur_year" name="pur_year" placeholder="">
          </div>
      </div>

      <div class="form-group row" id="phy_rack_no">
            <label for="rack_no" class="col-sm-4 col-form-label">Rack Number</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="rack_no" name="rack_no" placeholder="">
          </div>
      </div>

      <div class="form-group row" id="phy_rack_u_no">
            <label for="rack_u_no" class="col-sm-4 col-form-label">Rack Unit Number</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="rack_u_no" name="rack_u_no" placeholder="">
          </div>
      </div>

      <div class="form-group row" id="phy_modal">
            <label for="pro_model" class="col-sm-4 col-form-label">Product & Model</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="pro_model" name="pro_model" placeholder="">
          </div>
      </div>

      <div class="form-group row" id="phy_ipadd">
            <label for="ip_address" class="col-sm-4 col-form-label">IP Address</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="">
          </div>
      </div>

      <div class="form-group row" id="phy_os">
            <label for="os" class="col-sm-4 col-form-label">Operating System</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="os" name="os" placeholder="">
          </div>
      </div>

      <div class="form-group row" id="phy_app">
        <label for="apps" class="col-sm-4 col-form-label">Applications</label>
        <div class="col-sm-6">
          <div id="text_div">
              <input type="text" class="form-control mb-3" id="apps_val" name="apps_val" placeholder="">     
          </div>       
        </div>
        <button type="button" class="btn btn-warning" style="height:40px;background-color: orange" id="btn_add_plus"><i class="fa fa-plus"></i></button>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"></label>
        <div class="col-sm-6" id="sampleclone2"></div>
      </div>

      <button type="reset" id="btn_rest" class="btn btn-danger pull-right" style="background-color: red;"><i class="fa fa-eraser"></i>&nbsp; Clear</button>
      <button type="button" id="btn_submit" class="btn btn-success pull-right mr-3" style="background-color: green;"><i class="fa fa-plus"></i>&nbsp; Add</button>
      
      </form>
      </div>

    
    </div>
  </div>
</div>







<!-- Update Modal -->
<div class="modal fade" id="update_modal">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Server Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-servede-tab" data-toggle="tab" href="#nav-servede" role="tab" aria-controls="nav-servede" aria-selected="true">Server Details</a>
              <a class="nav-item nav-link" id="nav-vmdetals-tab" data-toggle="tab" href="#nav-vmdetals" role="tab" aria-controls="nav-vmdetals" aria-selected="false">VM Details</a>
           
          </div>
        </nav>  

  <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-servede" role="tabpanel" aria-labelledby="nav-servede-tab">
    
        <form id="form1" class="mt-3">
      <div class="form-group row">
            <label for="update_py_or_vir" class="col-sm-4 col-form-label">Server Type *</label>
          <div class="col-sm-8">
            <select class="form-control" name="update_py_or_vir" id="update_py_or_vir">
              <option value="">Select Server Type</option>
              <option value="Physical">Physical</option>
              <option value="Virtual">Virtual</option>
            </select>
          </div>
      </div>

      <div id="update_virual_to_list" style="display: none;">

        <div class="form-group row">
          <label for="update_vir_name" class="col-sm-6 col-form-label">Virtual Machine Name</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="update_vir_name" name="update_vir_name" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="update_vir_ipadd" class="col-sm-6 col-form-label">IP Address</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="update_vir_ipadd" name="update_vir_ipadd" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="update_vir_os" class="col-sm-6 col-form-label">Operating System</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="update_vir_os" name="update_vir_os" placeholder="">
          </div>
        </div>

        <div class="form-group row">
            <label for="curr_app" class="col-sm-6 col-form-label">Current Use Applications</label>
              <div class="col-sm-6">
                <textarea name="curr_app" id="curr_app" cols="20" rows="5" disabled></textarea>
              </div>
        </div>

        <div class="form-group row">
          <label for="update_vir_application" class="col-sm-4 col-form-label">Applications</label>
          <div class="col-sm-6">
            <div id="update_vir_text_div">
                <input type="text" class="form-control mb-3" id="update_vir_application" name="update_vir_application" placeholder="">     
            </div>       
          </div>
          <button type="button" class="btn btn-warning" style="height:40px;background-color: orange" id="update_btn_add_txtbox"><i class="fa fa-plus"></i></button>
        </div>


      </div>

      <div id="update_py_view">

        <div class="form-group row" id="up_sri_num">
          <label for="update_seri_no" class="col-sm-4 col-form-label">Serial Number</label>
        <div class="col-sm-8">
         <input type="text" class="form-control" id="update_seri_no" name="update_seri_no" placeholder="">
        </div>
    </div>

    <div class="form-group row">
          <label for="update_asset_no" class="col-sm-4 col-form-label">Asset Number</label>
        <div class="col-sm-8">
         <input type="text" class="form-control" id="update_asset_no" name="asset_no" placeholder="">
        </div>
    </div>

    <div class="form-group row">
          <label for="update_pur_year" class="col-sm-4 col-form-label">Purchase Year</label>
        <div class="col-sm-8">
         <input type="date" class="form-control" id="update_pur_year" name="update_pur_year" placeholder="">
        </div>
    </div>

    <div class="form-group row">
          <label for="update_rack_no" class="col-sm-4 col-form-label">Rack Number</label>
        <div class="col-sm-8">
         <input type="text" class="form-control" id="update_rack_no" name="update_rack_no" placeholder="">
        </div>
    </div>

    <div class="form-group row">
          <label for="update_rack_u_no" class="col-sm-4 col-form-label">Rack Unit Number</label>
        <div class="col-sm-8">
         <input type="text" class="form-control" id="update_rack_u_no" name="update_rack_u_no" placeholder="">
        </div>
    </div>

    <div class="form-group row">
          <label for="update_pro_model" class="col-sm-4 col-form-label">Product & Model</label>
        <div class="col-sm-8">
         <input type="text" class="form-control" id="update_pro_model" name="update_pro_model" placeholder="">
        </div>
    </div>

    <div class="form-group row" id="update_phy_ipadd">
          <label for="update_ip_address" class="col-sm-4 col-form-label">IP Address</label>
        <div class="col-sm-8">
         <input type="text" class="form-control" id="update_ip_address" name="update_ip_address" placeholder="">
        </div>
    </div>

    <div class="form-group row" id="update_phy_os">
          <label for="update_os" class="col-sm-4 col-form-label">Operating System</label>
        <div class="col-sm-8">
         <input type="text" class="form-control" id="update_os" name="update_os" placeholder="">
        </div>
    </div>

    <div class="form-group row" id="update_phy_app">
      <label for="update_apps" class="col-sm-4 col-form-label">Applications</label>
      <div class="col-sm-6">
        <div id="update_text_div">
            <input type="text" class="form-control mb-3" id="update_apps" name="update_apps" placeholder="">     
        </div>       
      </div>
      <button type="button" class="btn btn-warning" style="height:40px;background-color: orange" id="update_btn_add_plus"><i class="fa fa-plus"></i></button>
    </div>




      </div>
     

      <input type="hidden" class="form-control" id="update_id" name="update_id" placeholder="">

      <button type="button" id="update_btn_submit" class="btn btn-warning pull-right" style="background-color: orange;"><i class="fa fa-edit"></i>&nbsp; Update</button>
      
      </form>

      </div>


      
<div class="tab-pane fade" id="nav-vmdetals" role="tabpanel" aria-labelledby="nav-vmdetals-tab">

<div class="card mt-3" style="border: none">
      <div class="card-body">
        <div class="card mb-3" id="vm_insert_card" style="display: none;">
          <div class="card-body">

            <form id="vir_data_form">
              <input type="hidden" name="vir_torken" id="vir_torken">
              <input type="hidden" name="availble_vm" id="availble_vm">
              <input type="hidden" name="py_id" id="py_id">
            <div class="form-group row" id="inst_vm_name">
                <label for="insert_vmname" class="col-sm-4 col-form-label">Virtual Machine Name</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" id="insert_vmname" name="insert_vmname" placeholder="">
              </div>
            </div>

            <div class="form-group row" id="inst_vm_ip">
              <label for="insert_vmip" class="col-sm-4 col-form-label">IP Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="insert_vmip" name="insert_vmip" placeholder="">
              </div>
            </div>

            <div class="form-group row" id="inst_vm_os">
              <label for="insert_vmos" class="col-sm-4 col-form-label">Virtual Machine OS</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="insert_vmos" name="insert_vmos" placeholder="">
              </div>
            </div>

            {{-- <div class="form-group row" id="inst_vm_app">
              <label for="insert_vmapp" class="col-sm-4 col-form-label">Applications</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="insert_vmapp" name="insert_vmapp" placeholder="">
              </div>
            </div> --}}

            <div class="form-group row" id="inst_vm_app">
              <label for="insert_vmapp_input" class="col-sm-5 col-form-label">Applications</label>
              <div class="col-sm-6">
                <div id="vir_text_div_py">
                    <input type="text" class="form-control mb-3" id="insert_vmapp_input" name="insert_vmapp_input" placeholder="">     
                </div>       
              </div>
              <button type="button" class="btn btn-warning btn-sm" style="height:40px;background-color: orange" id="btn_add_txtbox_vm"><i class="fa fa-plus"></i></button>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label"></label>
              <div class="col-sm-6" id="clone_txt_input"></div>
          </div>

            <button class="btn btn-warning pull-right" type="button" id="insert_vir_data_btn" style="background-color: orange;"><i class="fa fa-plus-circle"></i> Insert</button>

            </form>
            

             
          </div>
        </div>
        <center>
          <button type="button" class="btn btn-success mb-3" id="insert_vir_btn" style="background-color: green"><i class="fa fa-plus"></i>&nbsp;Insert Virtual Server</button>

        </center>
           
            <div id="vm_table_div">
              <table id="vm_data_table" class="table table-bordered mt-3">
                <thead>
                  <tr>
                    <th style="width: 15%">Virtual Machine Name</th>
                    <th style="width: 15%">IP Address</th>
                    <th style="width: 10%">Operating System</th>
                    <th style="width: 50%">Applications</th>
                    <th style="width: 10%">Action</th>
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

      </div>

    
    </div>
  </div>
</div>





<!-- View Modal -->
<div class="modal fade" id="view_modal">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">View Server Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        

            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-view_servede-tab" data-toggle="tab" href="#nav-view_servede" role="tab" aria-controls="nav-view_servede" aria-selected="true">Server Details</a>
                  <a class="nav-item nav-link" id="nav-view_vmdetals-tab" data-toggle="tab" href="#nav-view_vmdetals" role="tab" aria-controls="nav-view_vmdetals" aria-selected="false">VM Details</a>
               
              </div>
            </nav>  
    
      <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-view_servede" role="tabpanel" aria-labelledby="nav-view_servede-tab">
        
            <div class="card mt-3">
              <div class="card-body">

            <form id="form1">
              <div class="form-group row">
                    <label for="view_py_or_vir" class="col-sm-4 col-form-label">Server Type *</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="view_py_or_vir" id="view_py_or_vir" disabled>
                      <option value="">Select Server Type</option>
                      <option value="Physical">Physical</option>
                      <option value="Virtual">Virtual</option>
                    </select>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_seri_no" class="col-sm-4 col-form-label">Serial Number</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" id="view_seri_no" name="view_seri_no" placeholder="" disabled>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_asset_no" class="col-sm-4 col-form-label">Asset Number</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" id="view_asset_no" name="asset_no" placeholder="" disabled>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_pur_year" class="col-sm-4 col-form-label">Purchase Year</label>
                  <div class="col-sm-8">
                   <input type="date" class="form-control" id="view_pur_year" name="view_pur_year" placeholder="" disabled>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_rack_no" class="col-sm-4 col-form-label">Rack Number</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" id="view_rack_no" name="view_rack_no" placeholder="" disabled>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_rack_u_no" class="col-sm-4 col-form-label">Rack Unit Number</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" id="view_rack_u_no" name="view_rack_u_no" placeholder="" disabled>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_pro_model" class="col-sm-4 col-form-label">Product & Model</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" id="view_pro_model" name="view_pro_model" placeholder="" disabled>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_ip_address" class="col-sm-4 col-form-label">IP Address</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" id="view_ip_address" name="view_ip_address" placeholder="" disabled>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_os" class="col-sm-4 col-form-label">Operating System</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" id="view_os" name="view_os" placeholder="" disabled>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_apps" class="col-sm-4 col-form-label">Applications</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" id="view_apps" name="view_apps" placeholder="" disabled>
                  </div>
              </div>
        
              <div class="form-group row">
                    <label for="view_create" class="col-sm-4 col-form-label">Created By</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" id="view_create" name="view_create" placeholder="" disabled>
                  </div>
              </div>
        
              <input type="hidden" class="form-control" id="view_id" name="view_id" placeholder="" disabled>

              </form>

          </div>

        </div>
      </div>
             
<div class="tab-pane fade" id="nav-view_vmdetals" role="tabpanel" aria-labelledby="nav-view_vmdetals-tab">

  <div class="card mt-3" style="border: none;">
    <div class="card-body">

      <div id="view_vm_table_div">
        <table id="view_vm_data_table" class="table table-bordered mt-3" style="width: 100%;">
          <thead>
            <tr>
              <th>Virtual Machine Name</th>
              <th>IP Address</th>
              <th>Operating System</th>
              <th>Applications</th>
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
  </div>
</div>