<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ListExport;
use App\Exports\ListExport2;
use App\serverdetails;
use App\py_vir_server_table;
use App\followup;
use App\py_vir_serve_followup;
use Auth;
use DB;

class serverdetailsController extends Controller
{
    public function add_server_details(Request $request)
    {
        $py_or_vir = $request->py_or_vir;

        $serv_option_in = $request->serv_option_in;
        $vir_pyname = $request->vir_pyname;
        $vir_pyipadd = $request->vir_pyipadd;
        $vir_pyos = $request->vir_pyos;
        $vir_pyapplication = $request->vir_pyapplication;

        $Serial_No = $request->Serial_No;
        $asset_no = $request->Asset_no;
        $serv_location = $request->serv_location;
        $pur_year = $request->pur_year;
        $rack_no = $request->rack_no;
        $rack_u_no = $request->rack_u_no;
        $pro_model = $request->pro_model;
        $ip_address = $request->ip_address;
        $os = $request->os;
        $apps = $request->apps;
        $virtual_machine_ip = $request->virtual_machine_ip;
        $vir_os = $request->vir_os;
        $vir_name = $request->vir_name;
        $vir_application = $request->vir_application;
        $created_by = Auth::user()->name;
        $created_user_id = Auth::user()->id;
        $date = date("Y-m-d");

        $errors = [
            'Asset_no.unique' => 'The Asset Number has already been taken.',
            'Serial_No.unique' => 'The Serial Number has already been taken.',
            
          ];

        if ($asset_no != "" || $asset_no != null) 
        {
            $find_asset = serverdetails::where('Asset_no', $asset_no)->where('Status', '1')->count();

            if ($find_asset > 0) 
            {   
                $this->validate($request, [
                    'Asset_no' => 'unique:serverdetails|numeric',
                ],$errors);
            }
        }

        if ($Serial_No != "" || $Serial_No != null) 
        {
            $find_serial = serverdetails::where('Serial_No', $Serial_No)->where('Status', '1')->count();

            if ($find_serial > 0) 
            {   
                $this->validate($request, [
                    'Serial_No' => 'unique:serverdetails',
                ],$errors);
            }
        }

        $ip_errors = "";
        if ($ip_address != "" || $ip_address != null) 
        {
            $find_server_ipaddress= serverdetails::where('ip_address', $ip_address)->where('Status', '1')->count();
            $find_virtual_machine_ip= py_vir_server_table::where('virtual_machine_ip', $ip_address)->where('vir_status', '1')->count();
            $ip_total_count = $find_server_ipaddress + $find_virtual_machine_ip;

            if ($ip_total_count > 0) 
            {   
                $ip_errors = "The IP Address has already been taken.";
            }
            else
            {
                $ip_errors = "";
            }
        }

        if ($virtual_machine_ip != "" || $virtual_machine_ip != null) 
        {
            $find_server_ipaddress= serverdetails::where('ip_address', $virtual_machine_ip)->where('Status', '1')->count();
            $find_virtual_machine_ip= py_vir_server_table::where('virtual_machine_ip', $virtual_machine_ip)->where('vir_status', '1')->count();
            $ip_total_count = $find_server_ipaddress + $find_virtual_machine_ip;

            if ($ip_total_count > 0) 
            {   
                $ip_errors = "The IP Address has already been taken.";
            }
            else
            {
                $ip_errors = "";
            }
        }
        

        if ($py_or_vir == "Virtual") {
            $Serial_No = "";
            $asset_no = "";
            $pur_year = "";
            $pro_model = "";
            $rack_u_no = "";
            $rack_no = "";
            $ip_address = "";
            $os = "";
            $apps = "";
        }

        if ($py_or_vir == "NAS") {
            $os = "";
            $apps = "";
        }

        if ($py_or_vir == "Switch" || $py_or_vir == "Router"|| $py_or_vir == "Tape Loader"|| $py_or_vir == "KVM") {
            $os = "";
            $apps = "";
            $ip_address = "";
        }

        if ($py_or_vir == "Physical") 
        {
            if ($serv_option_in == "Yes") 
            {
                $vir_serve_token = rand(10,100000);
                $vir_pyname = $request->vir_pyname;
                $vir_pyipadd = $request->vir_pyipadd;
                $vir_pyos = $request->vir_pyos;
                $vir_application_py = $request->vir_application_py;

                $add_data = new serverdetails();
                $add_data->Physial_or_Virtual = $py_or_vir;
                $add_data->availble_vm = $serv_option_in;
                $add_data->virtual_serv_token = $vir_serve_token;
                $add_data->Serial_No = $Serial_No;
                $add_data->Asset_No = $asset_no;
                $add_data->serv_location = $serv_location;
                $add_data->Purchase_year = $pur_year;
                $add_data->Rack_No = $rack_no;
                $add_data->Rack_unit_No = $rack_u_no;
                $add_data->product_and_modal = $pro_model;
                
                $add_data->vir_name = "";
                $add_data->ip_address = $ip_address;
                $add_data->vir_ipadd = "";
                $add_data->OS = $os;
                $add_data->vir_os = "";
                $add_data->Applications = $apps;
                $add_data->vir_application = "";
                $add_data->Created_user_id = $created_user_id;
                $add_data->Created_by = $created_by;
                $add_data->Status = 1;


                foreach ($vir_pyname as $i => $key)
                {
                    $data[] = array(
                        'virtual_serv_token' => $vir_serve_token,
                        'vir_machine_name' => $vir_pyname[$i],
                        'virtual_machine_ip' => $vir_pyipadd[$i],
                        'virtual_machine_os' => $vir_pyos[$i],
                        'virtual_apps' => $vir_pyapplication[$i],
                        'added_user_id' => $created_user_id,
                        'added_user' => $created_by,
                        'vir_status' => '1'
                    );

                    $data2[] = array(
                        'vm_server_token' => $vir_serve_token,
                        'vm_server_name' => $vir_pyname[$i],
                        'vm_server_update_user_id' => $created_user_id,
                        'vm_server_update_user' => $created_by,
                        'vm_server_status' => 'Create'
                    );

                }
                
                py_vir_server_table::insert($data);
                py_vir_serve_followup::insert($data2);
                
                $add_data->save();
                
            }
            else
            {




                $add_data = new serverdetails();
                $add_data->Physial_or_Virtual = $py_or_vir;
                $add_data->availble_vm = $serv_option_in;
                $add_data->virtual_serv_token = "";
                $add_data->Serial_No = $Serial_No;
                $add_data->Asset_No = $asset_no;
                $add_data->serv_location = $serv_location;
                $add_data->Purchase_year = $pur_year;
                $add_data->Rack_No = $rack_no;
                $add_data->Rack_unit_No = $rack_u_no;
                $add_data->product_and_modal = $pro_model;
                $add_data->vir_name = "";
                $add_data->ip_address = $ip_address;
                $add_data->vir_ipadd = "";
                $add_data->OS = $os;
                $add_data->vir_os = "";
                $add_data->Applications = $apps;
                $add_data->vir_application = "";
                $add_data->Created_user_id = $created_user_id;
                $add_data->Created_by = $created_by;
                $add_data->Status = 1;
                $add_data->save();
            }
        }
        else if($py_or_vir == "Virtual")
        {
                $add_data = new serverdetails();
                $add_data->Physial_or_Virtual = $py_or_vir;
                $add_data->availble_vm = "No";
                $add_data->virtual_serv_token = "";
                $add_data->Serial_No = "";
                $add_data->Asset_No = "";
                $add_data->serv_location = "";
                $add_data->Purchase_year = $date;
                $add_data->Rack_No = "";
                $add_data->Rack_unit_No = "";
                $add_data->product_and_modal = "";
                $add_data->vir_name = $vir_name;
                $add_data->ip_address = "";
                $add_data->vir_ipadd = $vir_ipadd;
                $add_data->OS = "";
                $add_data->vir_os = $vir_os;
                $add_data->Applications = "";
                $add_data->vir_application = $vir_application;
                $add_data->Created_user_id = $created_user_id;
                $add_data->Created_by = $created_by;
                $add_data->Status = 1;
                $add_data->save();
        }
        else
        {
                $add_data = new serverdetails();
                $add_data->Physial_or_Virtual = $py_or_vir;
                $add_data->availble_vm = "No";
                $add_data->virtual_serv_token = "";
                $add_data->Serial_No = $Serial_No;
                $add_data->Asset_No = $asset_no;
                $add_data->serv_location = $serv_location;
                $add_data->Purchase_year = $date;
                $add_data->Rack_No = $rack_no;
                $add_data->Rack_unit_No = $rack_u_no;
                $add_data->product_and_modal = $pro_model;
                $add_data->vir_name = "";
                $add_data->ip_address = $ip_address;
                $add_data->vir_ipadd = "";
                $add_data->OS = $os;
                $add_data->vir_os = "";
                $add_data->Applications = $apps;
                $add_data->vir_application = "";
                $add_data->Created_user_id = $created_user_id;
                $add_data->Created_by = $created_by;
                $add_data->Status = 1;
                $add_data->save();
        }

        $add_data = new followup();
        $add_data->server_type = $py_or_vir;
        $add_data->Serial_no = $Serial_No;
        $add_data->Asset_no = $asset_no;
        $add_data->Rack_no = $rack_no;
        $add_data->Rack_unit_No = $rack_u_no;
        $add_data->product_and_modal = $pro_model;
        $add_data->status = "Create";
        $add_data->remark = "";
        $add_data->update_user_id = $created_user_id;
        $add_data->update_user_name = $created_by;
        $add_data->save();

        return response()->json(['success'=>'Server Details added succesfully..!', 'vir_pyname' => $vir_pyname, 'ip_errors'=>$ip_errors]);
    }

    public function find_server_details(Request $request)
    {
        $ser_no = $request->ser_no;
        $asstno = $request->asstno;
        $ip = $request->ip;
        // $assttype = $request->assttype;

        if ($ip != null)
        {
         
        $find_type_pys_server = serverdetails::where('ip_address', $ip)->count();
        $find_type_vir_server = py_vir_server_table::where('virtual_machine_ip', $ip)->count();

        if ($find_type_pys_server > 0 && $find_type_vir_server > 0) 
        {
            $errors = "somethig wrong please try again.";
        }

        if ($find_type_vir_server > 0) 
        {
            $vir_query = DB::table('py_vir_server_tables')->where('vir_status', '1');

                if ($ip != null)
                {
                    $vir_query->where('virtual_machine_ip', $ip);
                }
    
                $vir_data = $vir_query->orderBy('id','desc')->get();
    
                $premission = Auth::user()->premission;
                return response()->json(['success'=>'Server Details find succesfully..!',
                'premission' => $premission, 
                'vir_query' => $vir_data,
                'assettype' => 'Virtual',
                ]);
    
        }
        else if ($find_type_pys_server > 0) 
        {
            $query = DB::table('serverdetails')->where('Status', '1');
            if ($ser_no != null)
            {
                $query->where('Serial_No', $ser_no);
            }
            if ($asstno != null)
            {
                $query->where('Asset_No', $asstno);
            }
            if ($ip != null)
            {
                $query->where('ip_address', $ip);
            }
                $data = $query->orderBy('id','desc')->get();

                $premission = Auth::user()->premission;
                return response()->json([
                    'success'=>'Server Details find succesfully..!', 
                    'data' => $data, 
                    'premission' => $premission,
                    'assettype' => 'Physical',
                    ]);   
        }

    }

        else
        {
            $query = DB::table('serverdetails')->where('Status', '1');
            if ($ser_no != null)
            {
                $query->where('Serial_No', $ser_no);
            }
            if ($asstno != null)
            {
                $query->where('Asset_No', $asstno);
            }
            if ($ip != null)
            {
                $query->where('ip_address', $ip);
            }
                $data = $query->orderBy('id','desc')->get();

                $premission = Auth::user()->premission;
                return response()->json([
                    'success'=>'Server Details find succesfully..!', 
                    'data' => $data, 
                    'premission' => $premission,
                    'assettype' => 'Physical'
                    
                    ]);   



        }



       
        
    }

    public function view_server_details(Request $request)
    {
        $id = $request->id;
        $viewdata = serverdetails::find($id);

        $vir_server_token = $viewdata->virtual_serv_token;
        $vir_server_token = py_vir_server_table::where('virtual_serv_token', $vir_server_token)->where('vir_status', '1')->get();


        return response()->json(['viewdata' => $viewdata,'vir_server_data' => $vir_server_token]);
    }


    public function view_vir_server_details(Request $request)
    {
        $token = $request->token;
        $id = serverdetails::where('virtual_serv_token',$token)->value('id');
        $viewdata = serverdetails::find($id);

        $vir_server_token = $viewdata->virtual_serv_token;
        $vir_server_token = py_vir_server_table::where('virtual_serv_token', $vir_server_token)->where('vir_status', '1')->get();


        return response()->json(['viewdata' => $viewdata,'vir_server_data' => $vir_server_token]);
    }



    public function update_server_details(Request $request)
    {
    $id = $request->id;
    $py_or_vir = $request->py_or_vir;
    $seri_no = $request->Serial_No;
    $asset_no = $request->Asset_no;
    $serv_location = $request->serv_location;
    $pur_year = $request->pur_year;
    $rack_no = $request->rack_no;
    $rack_u_no = $request->rack_u_no;
    $pro_model = $request->pro_model;
    $ip_address = $request->ip_address;
    $os = $request->os;
    $apps = $request->apps;
    $update_by = Auth::user()->name;
    $update_user_id = Auth::user()->id;

    $errors = [
        'Asset_no.unique' => 'The Asset Number has already been taken.',
        'Serial_No.unique' => 'The Serial Number has already been taken.',
        
      ];

    $update_data = serverdetails::find($id);
    $db_asset = $update_data->Asset_No;
    $db_Serial_No = $update_data->Serial_No;
    $db_ip_address = $update_data->ip_address;
    
    if ($db_asset != "" || $db_asset != null) 
    {
        if ($db_asset != $asset_no) 
        {
            $find_asset = serverdetails::where('Asset_no', $asset_no)->where('Status', '1')->count();

            if ($find_asset > 0) 
            {   
                $this->validate($request, [
                    'Asset_no' => 'unique:serverdetails|numeric',
                ],$errors);
            }
        }
    }

    if ($db_Serial_No != "" || $db_Serial_No != null) 
    {
        if ($db_Serial_No != $seri_no) 
        {
            $find_serial = serverdetails::where('Serial_No', $seri_no)->where('Status', '1')->count();

            if ($find_serial > 0) 
            {   
                $this->validate($request, [
                    'Serial_No' => 'unique:serverdetails',
                ],$errors);
            }
        }
    }

    $ip_errors = "";
    if ($db_ip_address != "" || $db_ip_address != null) 
    {
        if ($db_ip_address != $ip_address) 
        {
            $find_server_ipaddress= serverdetails::where('ip_address', $ip_address)->where('Status', '1')->count();
            $find_virtual_machine_ip= py_vir_server_table::where('virtual_machine_ip', $ip_address)->where('vir_status', '1')->count();
            $ip_total_count = $find_server_ipaddress + $find_virtual_machine_ip;

            if ($ip_total_count > 0) 
            {   
                $ip_errors = "The IP Address has already been taken.";
            }
            else
            {
                $ip_errors = "";
            }
        }
    }
    


    if ($py_or_vir == "NAS") {
        $os = "";
        $apps = "";
    }

    if ($py_or_vir == "Switch" || $py_or_vir == "Router"|| $py_or_vir == "Tape Loader"|| $py_or_vir == "KVM") {
        $os = "";
        $apps = "";
        $ip_address = "";
    }

    

    $update_data->Physial_or_Virtual = $py_or_vir;
    $update_data->Serial_No = $seri_no;
    $update_data->Asset_No = $asset_no;
    $update_data->serv_location = $serv_location;
    $update_data->Purchase_year = $pur_year;
    $update_data->Rack_No = $rack_no;
    $update_data->Rack_unit_No = $rack_u_no;
    $update_data->product_and_modal = $pro_model;
    $update_data->ip_address = $ip_address;
    $update_data->OS = $os;
    $update_data->Applications = $apps;
    $update_data->update();

    $add_data = new followup();
    $add_data->server_type = $py_or_vir;
    $add_data->Serial_no = $seri_no;
    $add_data->Asset_no = $asset_no;
    $add_data->Rack_no = $rack_no;
    $add_data->Rack_unit_No = $rack_u_no;
    $add_data->product_and_modal = $pro_model;
    $add_data->status = "Update";
    $add_data->remark = "";
    $add_data->update_user_id = $update_user_id;
    $add_data->update_user_name = $update_by;
    $add_data->save();

    return response()->json(['success'=>'Server Details Update Succesfully..!', 'ip_errors'=>$ip_errors]);
    }

    public function remove_server_details(Request $request)
    {
        $id = $request->id;
        $removed_by = Auth::user()->name;
        $removed_user_id = Auth::user()->id;
        
        $remove_data = serverdetails::find($id);
        $server_type = $remove_data->Physial_or_Virtual;
        $seri_no = $remove_data->Serial_No;
        $asset_no = $remove_data->Asset_No;
        $rack_no = $remove_data->Rack_No;
        $rack_u_no = $remove_data->Rack_unit_No;
        $pro_model = $remove_data->product_and_modal;
        $virtual_serv_token = $remove_data->virtual_serv_token;

        $py_vir_server_table = py_vir_server_table::where('virtual_serv_token', $virtual_serv_token)->pluck('id')->toArray();

        foreach ($py_vir_server_table as $key => $id) 
        {
            $remove_vir_data = py_vir_server_table::find($id);
            $remove_vir_data->vir_status = 0;
            $remove_vir_data->update();
        }


        $add_data = new followup();
        $add_data->server_type = $server_type;
        $add_data->Serial_no = $seri_no;
        $add_data->Asset_no = $asset_no;
        $add_data->Rack_no = $rack_no;
        $add_data->Rack_unit_No = $rack_u_no;
        $add_data->product_and_modal = $pro_model;
        $add_data->status = "Remove";
        $add_data->remark = "";
        $add_data->update_user_id = $removed_user_id;
        $add_data->update_user_name = $removed_by;
        $add_data->save();

        $remove_data->Status = 0;
        $remove_data->update();

        return response()->json(['success'=>'Server Details Remove Succesfully..!']);
    }

    public function vir_data_insert(Request $request)
    {
        // $request = $request->all();
        $vir_torken = $request->vir_torken;
        $id = $request->py_id;
        $availble_vm = $request->availble_vm;
        $insert_vmname = $request->insert_vmname;
        $inst_vm_ip = $request->insert_vmip;
        $insert_vmos = $request->insert_vmos;
        $insert_vmapp = $request->insert_vmapp;
        $added_by = Auth::user()->name;
        $add_user_id = Auth::user()->id;
        $vir_serve_token = rand(10,100000);

        $ip_errors = "";
        if ($inst_vm_ip != "" || $inst_vm_ip != null) 
        {
            $find_server_ipaddress= serverdetails::where('ip_address', $inst_vm_ip)->where('Status', '1')->count();
            $find_virtual_machine_ip= py_vir_server_table::where('virtual_machine_ip', $inst_vm_ip)->where('vir_status', '1')->count();
            $ip_total_count = $find_server_ipaddress + $find_virtual_machine_ip;

            if ($ip_total_count > 0) 
            {   
                $ip_errors = "The IP Address has already been taken.";
            }
            else
            {
                $ip_errors = "";
            }
        }



        if ($availble_vm == "No") 
        {
            $updateserver_details = serverdetails::find($id);
            $updateserver_details->availble_vm = "Yes";
            $updateserver_details->virtual_serv_token = $vir_serve_token;
            $updateserver_details->update();

            $vir_app_db = new py_vir_server_table();
            $vir_app_db->virtual_serv_token = $vir_serve_token;
            $vir_app_db->vir_machine_name = $insert_vmname;
            $vir_app_db->virtual_machine_ip = $inst_vm_ip;
            $vir_app_db->virtual_machine_os = $insert_vmos;
            $vir_app_db->virtual_apps = $insert_vmapp;
            $vir_app_db->added_user_id = $add_user_id;
            $vir_app_db->added_user = $added_by;
            $vir_app_db->vir_status = "1";
            $vir_app_db->save();

            $vir_app_db_followup = new py_vir_serve_followup();
            $vir_app_db_followup->vm_server_token = $vir_serve_token;
            $vir_app_db_followup->vm_server_name = $insert_vmname;
            $vir_app_db_followup->vm_server_update_user_id = $add_user_id;
            $vir_app_db_followup->vm_server_update_user = $added_by;
            $vir_app_db_followup->vm_server_status = "Update";
            $vir_app_db_followup->save();

            $vir_server_token = py_vir_server_table::where('virtual_serv_token', $vir_serve_token)->where('vir_status', '1')->get();

        }
        else
        {
            $vir_app_db = new py_vir_server_table();
            $vir_app_db->virtual_serv_token = $vir_torken;
            $vir_app_db->vir_machine_name = $insert_vmname;
            $vir_app_db->virtual_machine_ip = $inst_vm_ip;
            $vir_app_db->virtual_machine_os = $insert_vmos;
            $vir_app_db->virtual_apps = $insert_vmapp;
            $vir_app_db->added_user_id = $add_user_id;
            $vir_app_db->added_user = $added_by;
            $vir_app_db->vir_status = "1";
            $vir_app_db->save();

            $vir_app_db_followup = new py_vir_serve_followup();
            $vir_app_db_followup->vm_server_token = $vir_torken;
            $vir_app_db_followup->vm_server_name = $insert_vmname;
            $vir_app_db_followup->vm_server_update_user_id = $add_user_id;
            $vir_app_db_followup->vm_server_update_user = $added_by;
            $vir_app_db_followup->vm_server_status = "Update";
            $vir_app_db_followup->save();

            $vir_server_token = py_vir_server_table::where('virtual_serv_token', $vir_torken)->where('vir_status', '1')->get();

        }

        
        return response()->json(['success'=>'Virtual Server Details Insert Succesfully..!', 'vir_server_data' => $vir_server_token, 'ip_errors'=>$ip_errors]);
    }

    public function vir_data_delete(Request $request)
    {
        $id = $request->id;
        $removedata = py_vir_server_table::find($id);
        $removedata->vir_status = "0";
        $removedata->update();

        $vir_torken = $removedata->virtual_serv_token;
        $vm_server_name = $removedata->vir_machine_name;
        $added_by = Auth::user()->name;
        $add_user_id = Auth::user()->id;

        $vir_app_db_followup = new py_vir_serve_followup();
        $vir_app_db_followup->vm_server_token = $vir_torken;
        $vir_app_db_followup->vm_server_name = $vm_server_name;
        $vir_app_db_followup->vm_server_update_user_id = $add_user_id;
        $vir_app_db_followup->vm_server_update_user = $added_by;
        $vir_app_db_followup->vm_server_status = "Remove";
        $vir_app_db_followup->save();

        $vir_server_token = py_vir_server_table::where('virtual_serv_token', $vir_torken)->where('vir_status', '1')->get();

        return response()->json(['success'=>'Virtual Server Details Remove Succesfully..!', 'vir_server_data' => $vir_server_token]);
   
    }


    public function main_vir_data_delete(Request $request)
    {
        $id = $request->id;
        $removedata = py_vir_server_table::find($id);
        $removedata->vir_status = "0";
        $removedata->update();

        $vir_torken = $removedata->virtual_serv_token;
        $vm_server_name = $removedata->vir_machine_name;
        $added_by = Auth::user()->name;
        $add_user_id = Auth::user()->id;

        $vir_app_db_followup = new py_vir_serve_followup();
        $vir_app_db_followup->vm_server_token = $vir_torken;
        $vir_app_db_followup->vm_server_name = $vm_server_name;
        $vir_app_db_followup->vm_server_update_user_id = $add_user_id;
        $vir_app_db_followup->vm_server_update_user = $added_by;
        $vir_app_db_followup->vm_server_status = "Remove";
        $vir_app_db_followup->save();

        $vir_server_token = py_vir_server_table::where('virtual_serv_token', $vir_torken)->where('vir_status', '1')->get();

        return response()->json(['success'=>'Virtual Server Details Remove Succesfully..!', 'vir_server_data' => $vir_server_token]);
   
    }

    public function report()
    {
        return Excel::download(new ListExport, 'server_report.xlsx');
    }

    public function vir_report()
    {
        return Excel::download(new ListExport2, 'vir_report.xlsx');
    }


    public function swich_option(Request $request)
    {
        $id = $request->id;
        $remarktxt = $request->remarktxt;
        $swich_by = Auth::user()->name;
        $swich_user_id = Auth::user()->id;
        
        $swich_data = serverdetails::find($id);
        $server_type = $swich_data->Physial_or_Virtual;
        $seri_no = $swich_data->Serial_No;
        $asset_no = $swich_data->Asset_No;
        $rack_no = $swich_data->Rack_No;
        $rack_u_no = $swich_data->Rack_unit_No;
        $pro_model = $swich_data->product_and_modal;

        $power_status = $swich_data->power_status;

        if ($power_status == 0) 
        {
            $power_status_val = 1;
            $power_val = "Power on";
        }
        if ($power_status == 1)
        {
            $power_status_val = 0;
            $power_val = "Power off";
        }


        $add_data = new followup();
        $add_data->server_type = $server_type;
        $add_data->Serial_no = $seri_no;
        $add_data->Asset_no = $asset_no;
        $add_data->Rack_no = $rack_no;
        $add_data->Rack_unit_No = $rack_u_no;
        $add_data->product_and_modal = $pro_model;
        $add_data->status = $power_val;
        $add_data->remark = $remarktxt;
        $add_data->update_user_id = $swich_user_id;
        $add_data->update_user_name = $swich_by;
        $add_data->save();

        $swich_data->power_status = $power_status_val;
        $swich_data->update();


        return response()->json(['success'=>'Power Status update Succesfully..!']);


    }
}
