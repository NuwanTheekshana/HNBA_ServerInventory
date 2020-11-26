<?php
namespace App\Exports;
use App\serverdetails;
use App\py_vir_server_table;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ListExport2 implements FromCollection, WithHeadings
{
  public function collection()
  {
       
    //   $vir_Request = DB::select('select py_vir_server_tables.*,serverdetails.* FROM py_vir_server_tables INNER JOIN serverdetails ON py_vir_server_tables.virtual_serv_token = serverdetails.virtual_serv_token');
      $vir_Request = DB::table('py_vir_server_tables')
      ->select('py_vir_server_tables.id', 'py_vir_server_tables.virtual_serv_token', 'py_vir_server_tables.vir_machine_name', 'py_vir_server_tables.virtual_machine_ip', 'py_vir_server_tables.virtual_machine_os', 'py_vir_server_tables.virtual_apps' , 'py_vir_server_tables.added_user',  'py_vir_server_tables.vir_status', 'serverdetails.Physial_or_Virtual', 'serverdetails.availble_vm', 'serverdetails.Serial_No', 'serverdetails.Asset_No' , 'serverdetails.Purchase_year', 'serverdetails.Rack_No' , 'serverdetails.Rack_unit_No', 'serverdetails.product_and_modal', 'serverdetails.ip_address', 'serverdetails.OS', 'serverdetails.Applications', 'serverdetails.Status')
      ->join('serverdetails', 'serverdetails.virtual_serv_token', '=', 'py_vir_server_tables.virtual_serv_token')
      ->get();
      return $vir_Request;
  }

  public function headings(): array
    {
        return [
            'id ',
            'virtual_serv_token',
            'vir_machine_name',
            'virtual_machine_ip',
            'virtual_machine_os',
            'virtual_apps',
            'added_user',
            'vir_status',
            'Physial_or_Virtual',
            'availble_vm',
            'Serial_No',
            'Asset_No',
            'Purchase_year',
            'Rack_No',
            'Rack_unit_No',
            'product_and_modal',
            'ip_address',
            'OS',
            'Applications',
            'Status',
           
          
        ];
    }

}