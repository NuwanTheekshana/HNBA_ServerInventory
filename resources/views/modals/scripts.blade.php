
<script>
  $('#addnew').click(function () 
  {
      $('#addnew_modal').modal('show');
  });
</script>

<script>
  $('#btn_submit').click(function () 
  {
      var py_or_vir = $('#py_or_vir').val();
      var serv_option_in = $('#serv_option_in').val();
      var Serial_No = $('#seri_no').val();
      var Asset_no = $('#Asset_No').val();
      var serv_location = $('#serv_location').val();
      var pur_year = $('#pur_year').val();
      var rack_no = $('#rack_no').val();
      var rack_u_no = $('#rack_u_no').val();
      var pro_model = $('#pro_model').val();
      var ip_address = $('#ip_address').val();
      var os = $('#os').val();
      var virtual_machine_ip = $('#vir_ipadd').val();
      var vir_os = $('#vir_os').val();
      var vir_name = $('#vir_name').val();
      var vir_application = $('#vir_application').val();


      // var apps = $('input[name^=apps]');
      // var apps = apps.map(function(idx, elem) {
      //   return $(elem).val();
      // }).get();
      // var apps= apps.join('|');
      
      apps = [];
      $("input[name='apps']").each(function() {
        apps.push($(this).val());
      });
      var apps= apps.join('|');
      
      var vir_pyapplication = $('input[name^=vir_pyapplication]');
      var vir_pyapplication = vir_pyapplication.map(function(idx, elem) {
        return $(elem).val();
      }).get();
      // var vir_application= vir_application.join('|');


      var vir_pyname = $("input[id='vir_pyname']").map(function(){return $(this).val();}).get();
      var vir_pyipadd = $("input[id='vir_pyipadd']").map(function(){return $(this).val();}).get();
      var vir_pyos = $("input[id='vir_pyos']").map(function(){return $(this).val();}).get();

      if (py_or_vir == "Virtual") 
      {
        apps = "";
        ip_address = "";
        os = "";
      }
      else
      {
        vir_application = "";
        vir_ipadd = "";
        vir_os = "";
        vir_name = "";
      }

       
     
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'POST',
           url:'{{url("/add_server_details")}}',
           data:{py_or_vir:py_or_vir, serv_option_in:serv_option_in, vir_pyname:vir_pyname, vir_pyipadd:vir_pyipadd, vir_pyos:vir_pyos, vir_pyapplication:vir_pyapplication,Serial_No:Serial_No, Asset_no:Asset_no, pur_year:pur_year, rack_no, rack_u_no:rack_u_no, pro_model:pro_model, ip_address:ip_address, os:os, apps:apps, virtual_machine_ip:virtual_machine_ip, vir_os:vir_os, vir_name:vir_name, vir_application:vir_application, serv_location:serv_location},
           success:function(data){

             console.log(data.ip_errors);
             if (data.ip_errors != "") 
             {
              $.bootstrapGrowl('<i><span class = "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;Warning!&nbsp;'+data.ip_errors+'</i>',
                    {
                        type: 'danger',
                        width: 400,
                        delay: 10000,
                    });
                return false; 
             }
              $('#addnew_modal').modal('hide');
              $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
              {
                type: 'success',
                width: 500,
                delay: 3000,  
              });
              setTimeout(function () {
                location.reload();
              }, 4000);
              
           },
           error: function(response) 
        {
            var ip_address = response.responseJSON.errors;
            var Asset_no = response.responseJSON.errors.Asset_no;
            var Serial_No = response.responseJSON.errors.Serial_No;


            if (Asset_no) 
            {
              $.bootstrapGrowl('<i><span class = "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;Warning!&nbsp;'+Asset_no+'</i>',
                    {
                        type: 'danger',
                        width: 400,
                        delay: 10000,
                    });
                return false;  
            }

            if (Serial_No) 
            {
              $.bootstrapGrowl('<i><span class = "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;Warning!&nbsp;'+Serial_No+'</i>',
                    {
                        type: 'danger',
                        width: 400,
                        delay: 10000,
                    });
                return false;  
            }
            
        },
           
        });
  });
</script>


<script>
  $('#finddata').click(function () 
  {
      var ser_no = $('#ser_no').val();
      var asstno = $('#asstno').val();
      var ip = $('#ip').val();
      var assttype = $('#assttype').val();

      // if (assttype == "" || assttype == null) 
      // {
      //   $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Asset type is required..!',
      //         {
      //           type: 'danger',
      //           width: 500,
      //           delay: 5000,  
      //         });
      //   return false;
      // }

      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'GET',
           url:'{{url("/find_server_details")}}',
           data:{ser_no:ser_no,asstno:asstno,ip:ip,assttype:assttype},
           success:function(jsonData){
             var assettype = jsonData.assettype;
             var premission = jsonData.premission;

            if (assettype == "Virtual") 
            {
              
              $('#find_vir_server_div').show(1000);
              $('#find_server_details_div').hide(1000);


              $("#find_vir_server_details").dataTable().fnDestroy();
            if (premission == "1")
            {
            var myDataTable =  $('#find_vir_server_details').DataTable({
                data  :  jsonData.vir_query,
                columns : 
                [
                { data : "vir_machine_name" },
                { data : "virtual_machine_os" },
                { data : "virtual_machine_ip" },
                { data : "virtual_serv_token" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center><button onclick=editvir('"+row.virtual_serv_token+"'); class='btn btn-warning btn-sm btn_style' style='background-color:orange;'><i class='fa fa-edit'></i></button>  <button onclick=viewvir('"+row.virtual_serv_token+"'); class='btn btn-success btn-sm btn_style' style='background-color:green;'><i class='fa fa-server'></i></button> <button onclick=removevir('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i></button> </center>"
                }},

                ],
           
    });

      }
      else
      {

         var myDataTable =  $('#find_vir_server_details').DataTable({
                data  :  jsonData.vir_query,
                columns : 
                [
                { data : "vir_machine_name" },
                { data : "virtual_machine_os" },
                { data : "virtual_machine_ip" },
                { data : "virtual_serv_token" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center> <button onclick=viewvir('"+row.virtual_serv_token+"'); class='btn btn-success btn-sm btn_style' style='background-color:green;'><i class='fa fa-server'></i>&nbsp; View</button>  </center>"
                }},

                ],
           
          });
        }



            }


            else
            {
              $('#find_server_details_div').show(1000);
              $('#find_vir_server_div').hide(1000);

              $("#find_server_details").dataTable().fnDestroy();
            if (premission == "1")
            {
            var myDataTable =  $('#find_server_details').DataTable({
                data  :  jsonData.data,
                columns : 
                [
                { data : "Physial_or_Virtual" },
                { data : "Asset_No" },
                { data : "Serial_No" },
                { data : "Rack_No" },
                { data : "product_and_modal" },
                { data : "ip_address" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                  if (row.Physial_or_Virtual === 'Physical' || row.Physial_or_Virtual === 'NAS') 
                  {
                      if (row.power_status == "0") 
                      {
                        return "<center><button onclick=edit('"+row.id+"'); class='btn btn-warning btn-sm btn_style' style='background-color:orange;'><i class='fa fa-edit'></i></button>  <button onclick=view('"+row.id+"'); class='btn btn-success btn-sm btn_style' style='background-color:green;'><i class='fa fa-server'></i></button>   <button onclick=swich_option('"+row.id+"'); class='btn btn-primary btn-sm btn_style' style='background-color:#011842;'><i class='fa fa-power-off' aria-hidden='true'></i></button>   <button onclick=remove('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i></button> </center>";
                      } 
                      else 
                      {
                        return "<center><button onclick=edit('"+row.id+"'); class='btn btn-warning btn-sm btn_style' style='background-color:orange;'><i class='fa fa-edit'></i></button>  <button onclick=view('"+row.id+"'); class='btn btn-success btn-sm btn_style' style='background-color:green;'><i class='fa fa-server'></i></button>   <button onclick=swich_option('"+row.id+"'); class='btn btn-primary btn-sm btn_style'><i class='fa fa-power-off' aria-hidden='true'></i></button>   <button onclick=remove('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i></button> </center>";
                      }

                  }
                  else 
                  {
                    return "<center><button onclick=edit('"+row.id+"'); class='btn btn-warning btn-sm btn_style' style='background-color:orange;'><i class='fa fa-edit'></i></button>  <button onclick=view('"+row.id+"'); class='btn btn-success btn-sm btn_style' style='background-color:green;'><i class='fa fa-server'></i></button> <button onclick=remove('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i></button> </center>";
                  }

                  }},

                ],
           
    });

      }
      else
      {

         var myDataTable =  $('#find_server_details').DataTable({
                data  :  jsonData.data,
                columns : 
                [
                { data : "Physial_or_Virtual" },
                { data : "Asset_No" },
                { data : "Serial_No" },
                { data : "Rack_No" },
                { data : "product_and_modal" },
                { data : "ip_address" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center> <button onclick=view('"+row.id+"'); class='btn btn-success btn-sm btn_style' style='background-color:green;'><i class='fa fa-server'></i>&nbsp; View</button>  </center>"
                }},

                ],
           
          });
        }



            }










      
              
           },

           error: function(response) 
        {
            var errors = response.responseJSON.errors;

            $.bootstrapGrowl('<i><span class = "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;Warning!&nbsp;somethig wrong please try again.</i>',
                    {
                        type: 'danger',
                        width: 500,
                        delay: 10000,
                    });
                return false;  
        },

        });

  });
</script>

<script>
    function edit(id) 
    {
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'GET',
           url:'{{url("/view_server_details")}}',
           data:{id:id},
           success:function(jsonData){
            $('#update_id').val(jsonData.viewdata.id);
            $('#update_py_or_vir').val(jsonData.viewdata.Physial_or_Virtual);
            $('#update_seri_no').val(jsonData.viewdata.Serial_No);
            $('#update_asset_no').val(jsonData.viewdata.Asset_No);
            $('#update_pur_year').val(jsonData.viewdata.Purchase_year);
            $('#update_rack_no').val(jsonData.viewdata.Rack_No);
            $('#update_rack_u_no').val(jsonData.viewdata.Rack_unit_No);
            $('#update_pro_model').val(jsonData.viewdata.product_and_modal);
            $('#update_ip_address').val(jsonData.viewdata.ip_address);
            $('#update_os').val(jsonData.viewdata.OS);
            $('#update_apps').val(jsonData.viewdata.Applications);
            $('#update_serv_location').val(jsonData.viewdata.serv_location);

            if (jsonData.viewdata.Physial_or_Virtual == "Virtual") 
            {
              $('#update_vir_name').val(jsonData.viewdata.vir_name);
              $('#update_vir_ipadd').val(jsonData.viewdata.vir_ipadd);
              $('#update_vir_os').val(jsonData.viewdata.vir_os);
              var vir_application = jsonData.viewdata.vir_application;
              var array = vir_application.split('|');
              var textarea = document.getElementById("curr_app");
              textarea.value = array.join("\n");
                $('#update_virual_to_list').show();
                $('#update_py_view').hide();
                $('#nav-tab').hide();

            } 
            else 
            {
                $('#update_virual_to_list').hide();
                $('#update_py_view').show();
                $('#nav-tab').show();
                $('#vir_torken').val(jsonData.viewdata.virtual_serv_token);
                $('#availble_vm').val(jsonData.viewdata.availble_vm);
                $('#py_id').val(jsonData.viewdata.id);
                console.log(jsonData.vir_server_data);
                var table = $('#vm_data_table').DataTable();
                table.destroy();

                var myDataTable =  $('#vm_data_table').DataTable({
                data  :  jsonData.vir_server_data,
                columns : 
                [
                { data : "vir_machine_name" },
                { data : "virtual_machine_ip" },
                { data : "virtual_machine_os" },
                { data : "virtual_apps" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center> <button onclick=vir_remove('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i></button>  </center>"
                }},

                ],
           
            });

            }

            $('#update_modal').modal('show');
        
           }

        });
    }
   
</script>

<script>
    $('#insert_vir_btn').click(function () 
    {

        $('#vm_insert_card').show(1000);
        $('#insert_vir_btn').hide(1000);
    });
</script>


<script>
  $('#update_btn_submit').click(function () 
  {
      var id = $('#update_id').val();
      var py_or_vir = $('#update_py_or_vir').val();
      var Serial_No = $('#update_seri_no').val();
      var Asset_no = $('#update_asset_no').val();
      var serv_location = $('#update_serv_location').val();
      var pur_year = $('#update_pur_year').val();
      var rack_no = $('#update_rack_no').val();
      var rack_u_no = $('#update_rack_u_no').val();
      var pro_model = $('#update_pro_model').val();
      var ip_address = $('#update_ip_address').val();
      var os = $('#update_os').val();

      var apps = $('input[name^=update_apps]');
      var apps = apps.map(function(idx, elem) {
        return $(elem).val();
      }).get();
      var apps= apps.join('|')

      // var vir_application = $('input[name^=update_vir_application]');
      // var vir_application = vir_application.map(function(idx, elem) {
      //   return $(elem).val();
      // }).get();
      // var vir_application= vir_application.join('|')

      vir_application = [];
      $("input[name='vir_application']").each(function() {
        vir_application.push($(this).val());
      });
      var vir_application= vir_application.join('|');
     

      if (py_or_vir == "Virtual") 
      {
        apps = "";
        ip_address = "";
        os = "";
      }
      else
      {
        vir_application = "";
        vir_ipadd = "";
        vir_os = "";
        vir_name = "";
      }

      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'GET',
           url:'{{url("/update_server_details")}}',
           data:{id:id, py_or_vir:py_or_vir, Serial_No:Serial_No, Asset_no:Asset_no, pur_year:pur_year, rack_no, rack_u_no:rack_u_no, pro_model:pro_model, ip_address:ip_address, os:os, apps:apps, serv_location:serv_location},
           success:function(data){

             if (data.ip_errors != "") 
             {
              $.bootstrapGrowl('<i><span class = "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;Warning!&nbsp;'+data.ip_errors+'</i>',
                    {
                        type: 'danger',
                        width: 400,
                        delay: 10000,
                    });
                return false; 
             }
             $('#update_modal').modal('hide');
             $("#find_data_card").load(" #find_data_card > *");

             $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
              {
                type: 'success',
                width: 500,
                delay: 5000,  
              });

           },
           error: function(response) 
        {
            var ip_address = response.responseJSON.errors;
            var Asset_no = response.responseJSON.errors.Asset_no;
            var Serial_No = response.responseJSON.errors.Serial_No;


            if (Asset_no) 
            {
              $.bootstrapGrowl('<i><span class = "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;Warning!&nbsp;'+Asset_no+'</i>',
                    {
                        type: 'danger',
                        width: 400,
                        delay: 10000,
                    });
                return false;  
            }

            if (Serial_No) 
            {
              $.bootstrapGrowl('<i><span class = "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;Warning!&nbsp;'+Serial_No+'</i>',
                    {
                        type: 'danger',
                        width: 400,
                        delay: 10000,
                    });
                return false;  
            }
            
        }


        });

  });
</script>

<script>
    function view(id) 
    {
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'GET',
           url:'{{url("/view_server_details")}}',
           data:{id:id},
           success:function(jsonData){
              // console.log(jsonData.viewdata.Physial_or_Virtual);
              // return false;

            $('#view_id').val(jsonData.viewdata.id);
            $('#view_py_or_vir').val(jsonData.viewdata.Physial_or_Virtual);
            $('#view_seri_no').val(jsonData.viewdata.Serial_No);
            $('#view_asset_no').val(jsonData.viewdata.Asset_No);
            $('#view_pur_year').val(jsonData.viewdata.Purchase_year);
            $('#view_rack_no').val(jsonData.viewdata.Rack_No);
            $('#view_rack_u_no').val(jsonData.viewdata.Rack_unit_No);
            $('#view_pro_model').val(jsonData.viewdata.product_and_modal);
            $('#view_ip_address').val(jsonData.viewdata.ip_address);
            $('#view_os').val(jsonData.viewdata.OS);
            $('#view_apps').val(jsonData.viewdata.Applications);
            $('#view_create').val(jsonData.viewdata.Created_by);
            $('#view_serv_location').val(jsonData.viewdata.serv_location);

            // others
            
            $('#view_id_other').val(jsonData.viewdata.id);
            $('#view_py_or_vir_other').val(jsonData.viewdata.Physial_or_Virtual);
            $('#view_seri_no_other').val(jsonData.viewdata.Serial_No);
            $('#view_asset_no_other').val(jsonData.viewdata.Asset_No);
            $('#view_pur_year_other').val(jsonData.viewdata.Purchase_year);
            $('#view_rack_no_other').val(jsonData.viewdata.Rack_No);
            $('#view_rack_u_no_other').val(jsonData.viewdata.Rack_unit_No);
            $('#view_pro_model_other').val(jsonData.viewdata.product_and_modal);
            $('#view_ip_address_other').val(jsonData.viewdata.ip_address);
            $('#view_os_other').val(jsonData.viewdata.OS);
            $('#view_apps_other').val(jsonData.viewdata.Applications);
            $('#view_create_other').val(jsonData.viewdata.Created_by);
            $('#view_serv_location_other').val(jsonData.viewdata.serv_location);

            console.log(jsonData.viewdata.Physial_or_Virtual);
            var xs = jsonData.viewdata.Physial_or_Virtual;
            if (xs != "Physical")
            {
              $('#main_view_div').hide();
              $('#other_main_div').show();
              $('#nav_div').hide();
            }
            else
            {
              $('#nav-view_servede').show();
              $('#main_view_div').show();
              $('#other_main_div').hide();
              $('#nav_div').show();
            }

            // other assets
            if (xs == "NAS") {
                $('#view_ip_address_val_div').show();
            }
            else
            {
                $('#view_ip_address_val_div').hide();
            }
            
            
            $('#view_modal').modal('show');

            console.log(jsonData.vir_server_data);
                var table = $('#view_vm_data_table').DataTable();
                table.destroy();
              var myDataTable =  $('#view_vm_data_table').DataTable({
                data  :  jsonData.vir_server_data,
                columns : 
                [
                { data : "vir_machine_name" },
                { data : "virtual_machine_ip" },
                { data : "virtual_machine_os" },
                { data : "virtual_apps" },
                
                ],
           
            });

        
           }

        });
    }
</script>

<script>
  function remove(id) 
  {
        if (confirm('Are you sure you want to remove this record?')) 
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
           url:'{{url("/remove_server_details")}}',
           data:{id:id},
           success:function(data){
            $("#find_server_details").load(" #find_server_details > *");
            $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
              {
                type: 'success',
                width: 500,
                delay: 5000,  
              });


           }

        });
  }
</script>


<script>
  function swich_option(id) 
  {
        // if (confirm('Are you sure you want to remove this record?')) 
        // {
        // } 
        // else 
        // {
        //    return false;
        // }

        var txt;
        var remarktxt = prompt("Remark :", "");
        if (remarktxt == null || remarktxt == "") 
        {
          alert('Remark required..!')
          return false;
        }

        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'GET',
           url:'{{url("/swich_option")}}',
           data:{id:id,remarktxt:remarktxt},
           success:function(data){
            $("#find_server_details").load(" #find_server_details > *");
            $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
              {
                type: 'success',
                width: 500,
                delay: 5000,  
              });


           }

        });
  }
</script>




    
<script>
    $('#py_or_vir').change(function () 
    {
        var x = $('#py_or_vir').val();
        if (x == "" || x == null) 
        {
            $('#virual_list').hide(1000);
            $('#server_option').hide(1000);
            $('#phy_modal').show(1000);
            $('#phy_rack_u_no').show(1000);
            $('#phy_rack_no').show(1000);
            $('#phy_asset_no').show(1000);
            $('#phy_seri_no').show(1000);
            $('#phy_ipadd').show(1000);
            $('#phy_pur_year').show(1000);
            $('#phy_os').show(1000);
            $('#server_option').hide(1000);
          
        }
        else if (x == "Virtual") 
        {
            $('#virual_list').show(1000);
            $('#phy_modal').hide(1000);
            $('#phy_rack_u_no').hide(1000);
            $('#phy_rack_no').hide(1000);
            $('#phy_seri_no').hide(1000);
            $('#phy_asset_no').hide(1000);
            $('#phy_ipadd').hide(1000);
            $('#phy_os').hide(1000);
            $('#phy_app').hide(1000);
            $('#phy_pur_year').hide(1000);
            $('#server_option').hide(1000);
            $('#vir_server_data').hide(1000);
        }
        else if (x == "Physical") 
        {
            $('#virual_list').hide(1000);
            $('#server_option').show(1000);
            $('#phy_modal').show(1000);
            $('#phy_rack_u_no').show(1000);
            $('#phy_seri_no').show(1000);
            $('#phy_asset_no').show(1000);
            $('#phy_rack_no').show(1000);
            $('#phy_ipadd').show(1000);
            $('#phy_os').show(1000);  
            $('#phy_pur_year').show(1000);  
        }
        else if (x == "NAS") 
        {
            $('#virual_list').hide(1000);
            $('#phy_modal').show(1000);
            $('#phy_rack_u_no').show(1000);
            $('#phy_rack_no').show(1000);
            $('#phy_seri_no').show(1000);
            $('#phy_asset_no').show(1000);
            $('#phy_ipadd').show(1000);
            $('#phy_os').hide(1000);
            $('#phy_app').hide(1000);
            $('#phy_pur_year').show(1000);
            $('#server_option').hide(1000);
            $('#vir_server_data').hide(1000);
        }

        else if (x == "Switch" || x == "Router" || x == "Tape Loader" || x == "KVM") 
        {
            $('#virual_list').hide(1000);
            $('#phy_modal').show(1000);
            $('#phy_rack_u_no').show(1000);
            $('#phy_rack_no').show(1000);
            $('#phy_seri_no').show(1000);
            $('#phy_asset_no').show(1000);
            $('#phy_ipadd').hide(1000);
            $('#phy_os').hide(1000);
            $('#phy_app').hide(1000);
            $('#phy_pur_year').show(1000);
            $('#server_option').hide(1000);
            $('#vir_server_data').hide(1000);
        }
        

        
    });
</script>

<script>
    $(document).ready(function() 
    {
        count = 0;
      $("#btn_add_txtbox").click(function(){ 
          count ++;
          
          if (count <= 5) 
          {
               var html = $("#vir_text_div").html();
                $("#vir_text_div").after(html);
          }
          else
          {
              alert("Limit Exceed.")
          }
         
      });

    });

</script>

<script>
   $(document).ready(function() 
    {
        count2 = 0;
      $("#btn_add_plus").click(function(){ 
        count2 ++;
          var apps = $('#apps_val').val();
          if (count2 <= 5) 
          {
              //  var html = $("#text_div").html();
              //   $("#text_div").after(html);

            let currentId2 = new Date();
            let getid2 = currentId2.getTime();
            document.getElementById('sampleclone2').innerHTML += '<div class="row" id="'+getid2+'"><div class="col-11"><input type="text" class="form-control mb-2" name="apps" id="apps" value="'+apps+'" readonly> </div>'+
            '<button type="button" class="btn btn-danger mb-2 btn-sm" id="btn2_remove_txtbox_first" onclick="removethis_py_val('+getid2+');" style="background-color:red;"><i class="fas fa-minus"></i></button></div>';
            document.getElementById('apps_val').value="";
          }
          else
          {
              alert("Limit Exceed.");
          }
         
      });

    });
</script>

<script>
  function removethis_py_val(id)
 {
     var apps = document.getElementById("apps");
     var btn2_remove_txtbox = document.getElementById("btn2_remove_txtbox_first");

     apps.parentNode.removeChild(apps);
     btn2_remove_txtbox.parentNode.removeChild(btn2_remove_txtbox);
     count2 -= 1;

 }
 $(document).ready(function() 
 {
    count2 = 0;
 });


</script>


<script>
  $(document).ready(function() 
  {
      count = 0;
    $("#update_btn_add_txtbox").click(function(){ 
        count ++;
        
        if (count <= 5) 
        {
             var html = $("#update_vir_text_div").html();
              $("#update_vir_text_div").after(html);
        }
        else
        {
            alert("Limit Exceed.")
        }
       
    });

  });

</script>

<script>
 $(document).ready(function() 
  {
      count2 = 0;
    $("#update_btn_add_plus").click(function(){ 
      count2 ++;
        
        if (count2 <= 5) 
        {
             var html = $("#update_text_div").html();
              $("#update_text_div").after(html);
        }
        else
        {
            alert("Limit Exceed.")
        }
       
    });

  });
</script>

<script>
  $('#update_py_or_vir').change(function () 
  {
      var x = $('#update_py_or_vir').val();
      if (x == "Virtual") 
      {
          $('#update_virual_to_list').show(1000);
          $('#update_py_view').hide(1000);
          // $('#update_phy_os').hide(1000);
          // $('#update_phy_app').hide(1000);
          
      }
      else
      {
          $('#update_virual_to_list').hide(1000);
          $('#update_py_view').show(1000);
          // $('#update_phy_os').show(1000);
          // $('#update_phy_app').show(1000);
      }
  });
</script>

<script>
    $('#serv_option_in').change(function () 
    {
        var val = $('#serv_option_in').val();
        if (val == "Yes") 
        {
          $('#vir_server_data').show(1000);
        }
        else
        {
          $('#vir_server_data').hide(1000);
        }
    });
</script>


<script>
  $(document).ready(function()
  {   
      count = 0;
    $("#btn_add_txtbox_py").click(function(){ 
        count ++;
        var vir_application_py_main = $('#vir_application_py_main').val();
        
        if (count <= 5) 
        {
              // var html = $("#vir_text_div_py").html();
              // $("#vir_text_div_py").after(html);
            let currentId = new Date();
            let getid = currentId.getTime();
            document.getElementById('sampleclone').innerHTML += '<div class="row" id="'+getid+'"><div class="col-11"><input type="text" class="form-control mb-2" name="vir_application_py" id="vir_application_py" value="'+vir_application_py_main+'" readonly> </div>'+
            '<button type="button" class="btn btn-danger mb-2 btn-sm" id="btn_remove_txtbox" onclick="removethis('+getid+');" style="background-color:red;"><i class="fas fa-minus"></i></button></div>';
            document.getElementById('vir_application_py_main').value="";
        }
        else
        {
            alert("Limit Exceed.");
        }
       
    });
  });
</script>

<script>
  function removethis(id)
 {
     var vir_application_py = document.getElementById("vir_application_py");
     var btn_remove_txtbox = document.getElementById("btn_remove_txtbox");

     vir_application_py.parentNode.removeChild(vir_application_py);
     btn_remove_txtbox.parentNode.removeChild(btn_remove_txtbox);
      count -= 1;

 }
 $(document).ready(function() 
 {
     count = 0;
 });


</script>

<script>
  $('#insert_item_btn').click(function () 
  {
    var vir_name_py = $('#vir_name_py').val();
    var vir_ipadd_py = $('#vir_ipadd_py').val();
    var vir_os_py = $('#vir_os_py').val();
    vir_application_py = [];
    $("input[name='vir_application_py']").each(function() {
      vir_application_py.push($(this).val());
    });
    var vir_application_py = vir_application_py.join("|");

    if (vir_name_py == null || vir_name_py == "") {
      $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warnning&nbsp;!&nbsp;Virtual Machine Name is required..!',
      {
        type: 'danger',
        width: 500,
        delay: 5000,  
      });
      return false;
    }
    if (vir_ipadd_py == null || vir_ipadd_py == "") {
      $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warnning&nbsp;!&nbsp;Ip address is required..!',
      {
        type: 'danger',
        width: 500,
        delay: 5000,  
      });
      return false;
    }
    if (vir_os_py == null || vir_os_py == "") {
      $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warnning&nbsp;!&nbsp;Operating System is required..!',
      {
        type: 'danger',
        width: 500,
        delay: 5000,  
      });
      return false;
    }
    if (vir_application_py == null || vir_application_py == "") {
      $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warnning&nbsp;!&nbsp;Applications are required..!',
      {
        type: 'danger',
        width: 500,
        delay: 5000,  
      });
      return false;
    }

    let currentId = new Date();
    let getid = currentId.getTime();

    $('#tableshow_div').show(1000);

    $("#vir_inset_item_table tbody").append(
      "<tr id='row"+getid+"'>" +
        "<td style='text-align: center'>"+vir_name_py+"</td>" +
        "<td style='text-align: center'>"+vir_ipadd_py+"</td>" +
        "<td style='text-align: center'>"+vir_os_py+"</td>" +
        "<td style='text-align: center'>"+vir_application_py+"</td>" +
        "<td style='text-align: center'><button class='btn btn-danger' onclick='removerow("+getid+")' style='background-color:red;'><i class='fa fa-trash'></i></button></td>" +
      "</tr>"
  );

  document.getElementById('tablevalues').innerHTML += '<input type="hidden" class="form-control" name="vir_pyname[]" id="vir_pyname" value="'+vir_name_py+'" readonly />'+ 
        '<input type="hidden" class="form-control" name="vir_pyipadd[]" id="vir_pyipadd" value="'+vir_ipadd_py+'" readonly />'
        + '<input type="hidden" class="form-control" name="vir_pyos[]" id="vir_pyos" value="'+vir_os_py+'" readonly />'
        + '<input type="hidden" class="form-control" name="vir_pyapplication[]" id="vir_pyapplication" value="'+vir_application_py+'" readonly />';

        $('#vir_name_py').val('');
        $('#vir_ipadd_py').val('');
        $('#vir_os_py').val('');
        $('#sampleclone').empty();
        count = 0;
        $("input[name='vir_application_py']").val('');

  });
</script>

<script>
  function removerow(id) 
    {
        var idv = document.getElementById("row"+id);
        var vir_pyname = document.getElementById("vir_pyname");
        var vir_pyipadd = document.getElementById("vir_pyipadd");
        var vir_pyos = document.getElementById("vir_pyos");
        var vir_pyapplication = document.getElementById("vir_pyapplication");
    

        idv.parentNode.removeChild(idv);
        vir_pyname.parentNode.removeChild(vir_pyname);
        vir_pyipadd.parentNode.removeChild(vir_pyipadd);
        vir_pyos.parentNode.removeChild(vir_pyos);
        vir_pyapplication.parentNode.removeChild(vir_pyapplication);
        
    }
</script>

<script>
  $('#insert_vir_data_btn').click(function () 
  {
      var vir_torken = $('#vir_torken').val();
      var availble_vm = $('#availble_vm').val();
      var py_id = $('#py_id').val();
      var insert_vmname = $('#insert_vmname').val();
      var insert_vmip = $('#insert_vmip').val();
      var insert_vmos = $('#insert_vmos').val();
      
      insert_vmapp = [];
      $("input[name='insert_vmapp']").each(function() {
        insert_vmapp.push($(this).val());
      });
      var insert_vmapp= insert_vmapp.join('|');
      var str = $('#vir_data_form').serialize();

      if (insert_vmname == "" || insert_vmname == "" || insert_vmip == "" || insert_vmos == "" || insert_vmapp == "") 
      {
        $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;All fields are required..!',
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
           url:'{{url("/vir_data_insert")}}',
           data: {vir_torken:vir_torken, py_id:py_id, availble_vm:availble_vm,insert_vmname:insert_vmname, insert_vmip:insert_vmip, insert_vmos:insert_vmos, insert_vmapp:insert_vmapp},
           success:function(jsonData){
             console.log(jsonData.data);

             if (data.ip_errors != "") 
             {
              $.bootstrapGrowl('<i><span class = "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;Warning!&nbsp;'+data.ip_errors+'</i>',
                    {
                        type: 'danger',
                        width: 400,
                        delay: 10000,
                    });
                return false; 
             }



            $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+jsonData.success,
              {
                type: 'success',
                width: 500,
                delay: 5000,  
              });
              console.log(jsonData.vir_server_data);
              var table = $('#vm_data_table').DataTable();
              table.destroy();
              var myDataTable =  $('#vm_data_table').DataTable({
                data  :  jsonData.vir_server_data,
                columns : 
                [
                { data : "vir_machine_name" },
                { data : "virtual_machine_ip" },
                { data : "virtual_machine_os" },
                { data : "virtual_apps" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center> <button onclick=vir_remove('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i></button>  </center>"
                }},

                ],
           
            });

              $('#insert_vmname').val('');
              $('#insert_vmip').val('');
              $('#insert_vmos').val('');
              $('#vm_insert_card').hide(1000);
              $('#insert_vir_btn').show(1000);
              $('#clone_txt_input').empty();
              count = 0;
           },


        });
  });
</script>

<script>
  function vir_remove(id) 
  {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'GET',
           url:'{{url("/vir_data_delete")}}',
           data:{id:id},
           success:function(jsonData){
             console.log(jsonData.data);
            $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+jsonData.success,
              {
                type: 'success',
                width: 500,
                delay: 5000,  
              });
                console.log(jsonData.vir_server_data);
                var table = $('#vm_data_table').DataTable();
                table.destroy();
              var myDataTable =  $('#vm_data_table').DataTable({
                data  :  jsonData.vir_server_data,
                columns : 
                [
                { data : "vir_machine_name" },
                { data : "virtual_machine_ip" },
                { data : "virtual_machine_os" },
                { data : "virtual_apps" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center> <button onclick=vir_remove('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i></button>  </center>"
                }},

                ],
           
            });

           } 

        });
 
  }
</script>

<script>
  $(document).ready(function()
  {   
      count = 0;
    $("#btn_add_txtbox_vm").click(function(){ 
        count ++;
        var insert_vmapp_input = $('#insert_vmapp_input').val();
        
        if (count <= 5) 
        {
              // var html = $("#vir_text_div_py").html();
              // $("#vir_text_div_py").after(html);
            let currentId = new Date();
            let getid = currentId.getTime();
            document.getElementById('clone_txt_input').innerHTML += '<div class="row" id="'+getid+'"><div class="col-10"><input type="text" class="form-control mb-2" name="insert_vmapp" id="insert_vmapp" value="'+insert_vmapp_input+'" readonly> </div>'+
            '<button type="button" class="btn btn-danger mb-2 btn-sm" id="btn_remove_vm" onclick="removethis_vm('+getid+');" style="background-color:red;"><i class="fas fa-minus"></i></button></div>';
            document.getElementById('insert_vmapp_input').value="";
        }
        else
        {
            alert("Limit Exceed.");
        }
       
    });
  });
</script>


<script>
  function removethis_vm(id)
 {
     var insert_vmapp = document.getElementById("insert_vmapp");
     var btn_remove_vm = document.getElementById("btn_remove_vm");

     insert_vmapp.parentNode.removeChild(insert_vmapp);
     btn_remove_vm.parentNode.removeChild(btn_remove_vm);
      count -= 1;

 }
 $(document).ready(function() 
 {
     count = 0;
 });


</script>





<script>
    function editvir(token)
    {
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           type:'GET',
           url:'{{url("/view_vir_server_details")}}',
           data:{token:token},
           success:function(jsonData){

            $('#update_id').val(jsonData.viewdata.id);
            $('#update_py_or_vir').val(jsonData.viewdata.Physial_or_Virtual);
            $('#update_seri_no').val(jsonData.viewdata.Serial_No);
            $('#update_asset_no').val(jsonData.viewdata.Asset_No);
            $('#update_pur_year').val(jsonData.viewdata.Purchase_year);
            $('#update_rack_no').val(jsonData.viewdata.Rack_No);
            $('#update_rack_u_no').val(jsonData.viewdata.Rack_unit_No);
            $('#update_pro_model').val(jsonData.viewdata.product_and_modal);
            $('#update_ip_address').val(jsonData.viewdata.ip_address);
            $('#update_os').val(jsonData.viewdata.OS);
            $('#update_apps').val(jsonData.viewdata.Applications);

            if (jsonData.viewdata.Physial_or_Virtual == "Virtual") 
            {
              $('#update_vir_name').val(jsonData.viewdata.vir_name);
              $('#update_vir_ipadd').val(jsonData.viewdata.vir_ipadd);
              $('#update_vir_os').val(jsonData.viewdata.vir_os);
              var vir_application = jsonData.viewdata.vir_application;
              var array = vir_application.split('|');
              var textarea = document.getElementById("curr_app");
              textarea.value = array.join("\n");
                $('#update_virual_to_list').show();
                $('#update_py_view').hide();
                $('#nav-tab').hide();

            } 
            else 
            {
                $('#update_virual_to_list').hide();
                $('#update_py_view').show();
                $('#nav-tab').show();
                $('#vir_torken').val(jsonData.viewdata.virtual_serv_token);
                $('#availble_vm').val(jsonData.viewdata.availble_vm);
                $('#py_id').val(jsonData.viewdata.id);
                console.log(jsonData.vir_server_data);
                var table = $('#vm_data_table').DataTable();
                table.destroy();

                var myDataTable =  $('#vm_data_table').DataTable({
                data  :  jsonData.vir_server_data,
                columns : 
                [
                { data : "vir_machine_name" },
                { data : "virtual_machine_ip" },
                { data : "virtual_machine_os" },
                { data : "virtual_apps" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center> <button onclick=vir_remove('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i></button>  </center>"
                }},

                ],
           
            });

            }

            $('#update_modal').modal('show');
        
           }

        });
    }
   
</script>


<script>
  function viewvir(token) 
  {
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
         type:'GET',
         url:'{{url("/view_vir_server_details")}}',
         data:{token:token},
         success:function(jsonData){
          $('#view_id').val(jsonData.viewdata.id);
          $('#view_py_or_vir').val(jsonData.viewdata.Physial_or_Virtual);
          $('#view_seri_no').val(jsonData.viewdata.Serial_No);
          $('#view_asset_no').val(jsonData.viewdata.Asset_No);
          $('#view_pur_year').val(jsonData.viewdata.Purchase_year);
          $('#view_rack_no').val(jsonData.viewdata.Rack_No);
          $('#view_rack_u_no').val(jsonData.viewdata.Rack_unit_No);
          $('#view_pro_model').val(jsonData.viewdata.product_and_modal);
          $('#view_ip_address').val(jsonData.viewdata.ip_address);
          $('#view_os').val(jsonData.viewdata.OS);
          $('#view_apps').val(jsonData.viewdata.Applications);
          $('#view_create').val(jsonData.viewdata.Created_by);
          $('#view_modal').modal('show');

          console.log(jsonData.vir_server_data);
              var table = $('#view_vm_data_table').DataTable();
              table.destroy();
            var myDataTable =  $('#view_vm_data_table').DataTable({
              data  :  jsonData.vir_server_data,
              columns : 
              [
              { data : "vir_machine_name" },
              { data : "virtual_machine_ip" },
              { data : "virtual_machine_os" },
              { data : "virtual_apps" },
              
              ],
         
          });

      
         }

      });
  }
</script>


<script>
  function removevir(id) 
  {
    if (confirm('Are you sure you want to remove this record?')) 
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
           url:'{{url("/main_vir_data_delete")}}',
           data:{id:id},
           success:function(jsonData){
             console.log(jsonData.data);
            $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+jsonData.success,
              {
                type: 'success',
                width: 500,
                delay: 5000,  
              });
                console.log(jsonData.vir_server_data);
                var table = $('#vm_data_table').DataTable();
                table.destroy();
              var myDataTable =  $('#vm_data_table').DataTable({
                data  :  jsonData.vir_server_data,
                columns : 
                [
                { data : "vir_machine_name" },
                { data : "virtual_machine_ip" },
                { data : "virtual_machine_os" },
                { data : "virtual_apps" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center> <button onclick=vir_remove('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i></button>  </center>"
                }},

                ],
           
            });

           } 

        });
 
  }
</script>

<script>
  $('#assttype').change(function () 
  {
      var assttype = $('#assttype').val();

      if (assttype == "Virtual") 
      {
          $('#ser_no').prop('disabled', true);
          $('#asstno').prop('disabled', true);
      }
      else if (assttype == "Switch" || assttype == "Router" || assttype == "Tape Loader" || assttype == "KVM")  
      {
          $('#ip').prop('disabled', true);
      }
      else
      {
          $('#ser_no').prop('disabled', false);
          $('#asstno').prop('disabled', false);
          $('#ip').prop('disabled', false);
      }
  });
</script>