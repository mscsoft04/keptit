 <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Appointment</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <!-- <div class="row administration-search">
                          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label>Status</label>
                              <select class="form-control status" name ="status">
                                <option value="">-- Select Status --</option>
                                <option value="1">Active</option>
                                <option value="'0'">Inactive</option>
                              </select>
                            </div>
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label>Device Derails</label>
                              <select class="form-control device" name ="status">
                                <option value="">-- Select Device --</option>
                                <option value="android">Android</option>
                                <option value="ios">Ios</option>
                              </select>
                            </div>
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label>Subscription</label>
                              <select class="form-control" name ="status">
                                <option value="">-- Select Subscription --</option>
                                <option value="1">Subscription 1</option>
                                <option value="2">Subscription 2</option>
                              </select>
                            </div>
                         </div>
                    </div>---->
                    <table id="datatable" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>Unique ID</th>
                          <th>AppointmentId</th>
                          <th>AppointmentName</th>
                          <th>Scheduled</th>
                          <th>ScheduleType</th>
                          <th>MobileNo</th>
						  <th>isWeekly</th>
						  <th>isMonthly</th>
						  <th>isYearly</th>
                          
                     
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
		  
<script>
$(document).ready(function() {
    var property = '';
    var table;
    var status = '';
    var device = '';
    table = $('#datatable').DataTable({
        oLanguage: {
            sLoadingRecords: "<img src='<?php echo base_url();?>assets/image/loads.gif'>"
        },
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        'autoWidth': false,
        
        "ajax": {
            "data": function(d) {
                d.status = status;
                d.device = device;
            },
            "url": "<?php echo base_url();?>Appointment/ajaxTablelist",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            
            //"targets": [],
            //"orderable": false, //set not orderable
        }, ],

    });
	
	$(document).on('change','.status',function(){
		status=$(this).val();
		table.ajax.reload();
	});
	$(document).on('change','.device',function(){
		device=$(this).val();
		table.ajax.reload();
	});
	
});
</script>