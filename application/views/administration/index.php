 <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Administration</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row administration-search">
                          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label>Status</label>
                              <select class="form-control" name ="status">
                                <option value="">-- Select Status --</option>
                                <option value="1">Active</option>
                                <option value="2">In active</option>
                              </select>
                            </div>
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label>Device Derails</label>
                              <select class="form-control" name ="status">
                                <option value="">-- Select Device --</option>
                                <option value="1">Device 1</option>
                                <option value="2">Device 2</option>
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
                    </div>
                    <table id="datatable" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>Unique ID</th>
                          <th>Status</th>
                          <th>Phone Number</th>
                          <th>Verified</th>
                          <th>Paid Account</th>
                          <th>Device Details</th>
                          <th>Subscription</th>
                          <th>Monthly Recurring Rev</th>
                          <th>Profit</th>
                          <th>More Info</th>
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
    var start = '';
    var end = '';
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
                d.minDate = start;
                d.maxDate = end;
            },
            "url": "<?php echo base_url();?>Administration/ajaxTablelist",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            
            "targets": [8],
            "orderable": false, //set not orderable
        }, ],

    });
	
});
</script>