<div class="modal fade" id="pbatch-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">


        <div></div>

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" id="pbatch-cancel" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Batch</h4>
            </div>

            <div class="modal-body">

                <div class="tab-content">
                    <form class="tab-pane fade active in modal-form" id="pbatch-form">

                        <input type="hidden" id="pbatch-id" />
                        <div class="form-group">
                            <label>Name  <span class="text-danger">*</span></label>
                            <input type="text"  maxlength="30" class="form-control modal-inputs" id="pbatch-name" placeholder="Enter Batch Name" />
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-xs-12 form-group">
                                <label>From  <span class="text-danger">*</span></label>
                                <select class="form-control modal-inputs" id="pbatch-from">
                                    <option value="" hidden="">Select Year</option>
                                    <?php foreach ($this->sg->availableYears() as $y): ?>
                                        <option><?=$y;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-sm-6 col-xs-12 form-group">
                                <label>To  <span class="text-danger">*</span></label>
                                <select class="form-control modal-inputs" id="pbatch-to">
                                    <option value="" hidden="">Select Year</option>
                                    <?php foreach ($this->sg->availableYears() as $y): ?>
                                        <option disabled><?=$y;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <p class="form-error-msg" id="pbatch-form-error"></p>
                        <div class="text-center">
                            <button class="btn btn-success modal-submit" type="button" id="pbatch-submit">Submit</button>
                        </div>
                    </form>

                    <a href="#enquiry-success" class="open-success" data-toggle="tab" style="display: none;"></a>
                    <a href="#pbatch-form" class="open-form" data-toggle="tab" style="display: none;"></a>

                    <div class="tab-pane fade success-tab" id="enquiry-success">
                        <div class="card__body">
                            <div class="submit-property__success">

                                <p class="success-icon text-center yes">
                                    <i class="fa fa-check check"></i>
                                    <i class="fa fa-exclamation-triangle error"></i>
                                </p>

                                <h2 class="text-center">Successfull!</h2>
                                <p class="success-alert text-center"></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      
    </div>
</div>

<div class="modal fade" id="select-batch" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div></div>

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select Batch</h4>
            </div>

            <div class="modal-body">

                <div class="tab-content">
                    <div class="tab-pane fade active in">
                        <div class="form-group">
                            <label>Batch</label>
                            <select class="form-control">
                                <option value="" hidden="">Select Batch</option>
                                <option value="all">All</option>
                                <?php foreach ($batchs as $b): ?>
                                    <option value="<?=$b->id;?>"><?=$b->from;?> - <?=$b->to;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-success" type="button" id="sb-submit">Open</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      
    </div>
</div>

<div class="modal fade" id="auser-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">


        <div></div>

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" id="auser-cancel" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add User</h4>
            </div>

            <div class="modal-body">

                <div class="tab-content">
                    <form class="tab-pane fade active in modal-form" id="auser-form">

                        <input type="hidden" id="auser-id" />

                        <div class="row">
                            <div class="col-sm-6 col-xs-12 form-group">
                                <label>First Name  <span class="text-danger">*</span></label>
                                <input type="text"  maxlength="30" class="form-control modal-inputs" id="auser-name" placeholder="Enter First Name" />
                            </div>

                            <div class="col-sm-6 col-xs-12 form-group">
                                <label>Last Name  <span class="text-danger">*</span></label>
                                <input type="text"  maxlength="30" class="form-control modal-inputs" id="auser-lname" placeholder="Enter Last Name" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Roll No <span class="text-danger">*</span></label>
                            <input type="text"  maxlength="20" class="form-control modal-inputs" id="auser-uname" placeholder="Enter Roll No" />
                        </div>

                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email"  maxlength="70" class="form-control modal-inputs" id="auser-email" placeholder="Enter Email Address" />
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-xs-12 form-group">
                                <input class="form-control" id="auser-password"  type="password" maxlength="15" required placeholder="Password" data-parsley-equalto="#auser-cpassword" />
                            </div>

                            <div class="col-sm-6 col-xs-12 form-group">
                                <input class="form-control" id="auser-cpassword"  type="password" maxlength="15" required placeholder="Confirm Password" data-parsley-equalto="#auser-password" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Batch</label>
                            <select class="form-control modal-inputs" type="text" id="auser-batch_id">
                                <option value="" hidden="">Select Batch</option>
                                <?php foreach ($batchs as $b): ?>
                                    <option value="<?=$b->id;?>"><?=$b->from;?> - <?=$b->to;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <p class="form-error-msg" id="auser-form-error"></p>
                        <div class="text-center">
                            <button class="btn btn-success modal-submit" type="button" id="auser-submit">Submit</button>
                        </div>
                    </form>

                    <a href="#auser-success" class="open-success" data-toggle="tab" style="display: none;"></a>
                    <a href="#auser-form" class="open-form" data-toggle="tab" style="display: none;"></a>

                    <div class="tab-pane fade success-tab" id="auser-success">
                        <div class="card__body">
                            <div class="submit-property__success">

                                <p class="success-icon text-center yes">
                                    <i class="fa fa-check check"></i>
                                    <i class="fa fa-exclamation-triangle error"></i>
                                </p>

                                <h2 class="text-center">Successfull!</h2>
                                <p class="success-alert text-center"></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      
    </div>
</div>


<div class="modal fade" id="ptest-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">


        <div></div>

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" id="ptest-cancel" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Test</h4>
            </div>

            <div class="modal-body">

                <div class="tab-content">
                    <form class="tab-pane fade active in modal-form" id="ptest-form">

                        <input type="hidden" id="ptest-id" />
                        <div class="form-group">
                            <label>Name  <span class="text-danger">*</span></label>
                            <input type="text"  maxlength="50" class="form-control modal-inputs" id="ptest-name" placeholder="Enter Test Name" />
                        </div>

                        <div class="form-group">
                            <label>Describtion <span class="text-danger">*</span></label>
                            <textarea class="textarea form-control modal-inputs" type="text" maxlength="255" id="ptest-desb" placeholder="Enter Describtion"></textarea>
                        </div>

                        <p class="form-error-msg" id="ptest-form-error"></p>
                        <div class="text-center">
                            <button class="btn btn-success modal-submit" type="button" id="ptest-submit">Submit</button>
                        </div>
                    </form>

                    <a href="#ptest-success" class="open-success" data-toggle="tab" style="display: none;"></a>
                    <a href="#ptest-form" class="open-form" data-toggle="tab" style="display: none;"></a>

                    <div class="tab-pane fade success-tab" id="ptest-success">
                        <div class="card__body">
                            <div class="submit-property__success">

                                <p class="success-icon text-center yes">
                                    <i class="fa fa-check check"></i>
                                    <i class="fa fa-exclamation-triangle error"></i>
                                </p>

                                <h2 class="text-center">Successfull!</h2>
                                <p class="success-alert text-center"></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      
    </div>
</div>