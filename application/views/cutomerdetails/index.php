<?php //print_r($row);?>

<div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customer Details</small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered bulk_action">
                      <tr>
                        <th colspan="2"><h3>View Customer ID: <?php echo $row->userId; ?> </h3></th>
                      </tr>
                      <tr>
                        <th>unique ID</th>
                        <td><?php echo $row->userId; ?></td>
                      </tr>
                      <tr>
                        <th>Status</th>
						<?php if($row->active_status==1) {?>
                        <td>Active</td>
						<?php } elseif($row->active_status==0) {?>
						 <td>Inactive</td>
						<?php } ?>
                      </tr>
                      <tr>
                        <th>Phone Number</th>
                        <td><?php echo $row->mobileNo; ?></td>
                      </tr>
                      <tr>
                        <th>Verified</th>
                        <td>Yes</td>
                      </tr>
                      <tr>
                        <th>Paid Account</th>
                        <td>Yes</td>
                      </tr>
                      <tr>
                        <th>Device Type</th>
                        <td><?php echo $row->deviceType; ?></td>
                      </tr>
                    </table>
                    
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered bulk_action">
                      <tr>
                        <th colspan="2"><h3>Payment Details</h3></th>
                      </tr>
                      <tr>
                        <th>Credit Card</th>
                        <td>VISA</td>
                      </tr>
                      <tr>
                        <th>CC Last 4</th>
                        <td>0879</td>
                      </tr>
                      <tr>
                        <th>Exp Date</th>
                        <td>08/21/2022</td>
                      </tr>
                      
                    </table>
                    
                  </div>
                   <div class="x_content">
                    <table class="table table-striped table-bordered bulk_action">
                      <tr>
                        <th colspan="2"><h3>Services</h3></th>
                      </tr>
                      <tr>
                        <td>Unlimited $99</td>
                       <td><input type="checkbox" id="check-all" class="flat"  checked="checked"></td>
                      </tr>
                      <tr>
                        <td>Basic (Call Remainders) $2</td>
                        <td><input type="checkbox" id="check-all" class="flat"  checked="checked"></td>
                      </tr>
                      <tr>
                        <td>SMS (Call Remainders) $1</td>
                        <td><input type="checkbox" id="check-all" class="flat" checked="checked"></td>
                      </tr>
                      <tr>
                        <td>Recordings (Call Recordings )$2 </td>
                        <td><input type="checkbox" id="check-all" class="flat"></td>
                      </tr>
                      <tr>
                        <td>Monthly Recurring(MRR)</td>
                        <td>$3</td>
                      </tr>
                      <tr>
                        <td>Recurring Billing Date</td>
                        <td>28th</td>
                      </tr>
                      <tr>
                        <td>Appointment</td>
                        <td>Unlimited</td>
                      </tr>
                    </table>
                    
                  </div>
                   <div class="x_content">
                    <table class="table table-striped table-bordered bulk_action">
                      <tr>
                        <th colspan="2"><h3>Qty of Voice Minutes & SMS</h3></th>
                      </tr>
                      <tr>
                        <td>Qty Appointments Last Month</td>
                        <td>8</td>
                      </tr>
                      <tr>
                        <td>Qty Appointments Current Month</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Qty Voice Minutes Last Month</td>
                        <td>31</td>
                      </tr>
                      <tr>
                        <td>Qty Voice Minutes Current Month</td>
                        <td>16</td>
                      </tr>
                      <tr>
                        <td>Qty Voice Minutes Last Month Projected</td>
                        <td>38</td>
                      </tr>
                      <tr>
                        <td>Qty SMS Last Month</td>
                        <td>8</td>
                      </tr>
                      <tr>
                        <td>Qty SMS Current Month</td>
                        <td>7</td>
                      </tr>
                      <tr>
                        <td>Qty SMS Current Month Projection</td>
                        <td>12</td>
                      </tr>
                      
                    </table>
                    
                  </div>
                   <div class="x_content">
                    <table class="table table-striped table-bordered bulk_action">
                      <tr>
                        <th colspan="2"><h3>Cost Details</h3></th>
                      </tr>
                      <tr>
                        <td>Voice Minutes Cost Last Month</td>
                        <td>$0.12</td>
                      </tr>
                      <tr>
                        <td>Voice Minutes Cost Current Month</td>
                        <td>$0.06</td>
                      </tr>
                      <tr>
                        <td>Voice Minutes Cost Current Month Projected</td>
                        <td>$0.15</td>
                      </tr>
                      <tr>
                        <td>SMS Cost Last Month </td>
                        <td>$0.12</td>
                      </tr>
                      <tr>
                        <td>SMS Cost Current Month </td>
                        <td>$0.08</td>
                      </tr>
                      <tr>
                        <td>SMS Cost Current Month Projected</td>
                        <td>$0.18</td>
                      </tr>
                      <tr>
                        <td>TOTAL COST LAST MONTH</td>
                        <td>$0.48</td>
                      </tr>
                      <tr>
                        <td>TOTAL COST CURRENT MONTH</td>
                        <td>$0.22</td>
                      </tr>
                      <tr>
                        <td>TOTAL COST CURRENT MONTH  PROJECTED</td>
                        <td>$0.56</td>
                      </tr>
                      <tr>
                        <th><strong>TOTAL PROFIT LAST MONTH</strong></th>
                        <td><strong>$2.52</strong></td>
                      </tr>
                      <tr>
                        <th></strong>TOTAL PROFIT CURRENT MONTH PROJECTED</strong></th>
                        <td><strong>$2.44</strong></td>
                      </tr>
                    </table>
                    
                  </div>
                </div>
              </div>

            </div>
          </div>