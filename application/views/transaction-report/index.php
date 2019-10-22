<div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customer Reports</small></h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="administration-search">
                    <div class="row ">
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label>Start date</label>
                              <div class='input-group date' id='startdate'>
                                  <input type='text' class="form-control" value="12/10/2019" />
                                  <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                          </div>
                        </div>
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                             <div class="form-group">
                            <label>End date</label>
                              <div class='input-group date' id='enddate'>
                                  <input type='text' class="form-control" value="12/10/2019" />
                                  <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                          </div>
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 buttontop">
                            <div class="form-group">
                              <button class="btn btn-primary" type="button">Generate</button>
                            </div>
                         </div>
                       </div>
                         <div class="row ">
                          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label>Customer ID</label>
                              <select class="form-control" name ="status">
                                <option value="">-- Select Status --</option>
                                <option value="1">C001</option>
                                <option value="2">C002</option>
                              </select>
                            </div>
                         </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label>Status</label>
                              <select class="form-control" name ="status">
                                <option value="">-- Select Status --</option>
                                <option value="1">Active</option>
                                <option value="2">In active</option>
                              </select>
                            </div>
                         </div>
                         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label>Device Derails</label>
                              <select class="form-control" name ="status">
                                <option value="">-- Select Device --</option>
                                <option value="1">Device 1</option>
                                <option value="2">Device 2</option>
                              </select>
                            </div>
                         </div>
                         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
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
                    </div>
                    <div class="administration-search">
                      <div class="row">
                          <div class="col-md-12 col-lg-12 col-sm-12">
                            <span class="report-sec">Yearly Customer Report From 12/10/2019 to 22/10/2019  <button class="btn btn-success" type="button" onclick="myFunction()">Print</button></span>
                          </div>
                      </div>
                    </div>
                    <table class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Customer ID</th>
                          <th>Transaction ID</th>
                          <th>Transaction Status</th>
                          <th  class="text-center">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>07/05/2019</td>
                          <td>12:00AM </td>
                          <td>C001</td>
                          <td>T001</td>
                          <td><span class="label label-success"> Settled Successfully </span></td>
                           <td class="text-right">$4</td>
                        </tr>
                       <tr>
                          <td>07/05/2019</td>
                          <td>12:00AM </td>
                          <td>C002</td>
                          <td>T002</td>
                          <td><span class="label label-info">Settlement in Progress </span></td>
                          <td class="text-right">$4</td>
                        </tr>
                        <tr>
                          <td>07/05/2019</td>
                          <td>04:00AM </td>
                          <td>C003</td>
                          <td>T003</td>
                          <td><span class="label label-danger">Settlement pending</span></td>
                          <td class="text-right">$4</td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <th class="text-right" colspan="5"> TOTAL TRANSACTION AMOUNT</th>
                        <th  class="text-right"> $12</th>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>