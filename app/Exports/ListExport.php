<?php
namespace App\Exports;
use App\serverdetails;
use App\py_vir_server_table;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ListExport implements FromCollection, WithHeadings
{
  public function collection()
  {
      $Request = serverdetails::where('Status', '1')->get();
      return $Request;
  }

  public function headings(): array
    {
        return [
            'id ',
            'Physial_or_Virtual',
            'availble_vm',
            'virtual_serv_token',
            'Serial_No',
            'Asset_No',
            'serv_location',
            'Purchase_year',
            'Rack_No',
            'Rack_unit_No',
            'product_and_modal',
            'vir_name',
            'ip_address',
            'vir_ipadd',
            'OS',
            'vir_os',
            'Applications',
            'vir_application',
            'Created_user_id',
            'Created_by',
            'power_status',
            'Status',
            'created_at',
            'updated_at',
        ];
    }
    
}

