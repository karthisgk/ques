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
                            <label>Note <span class="text-danger">*</span></label>
                            <textarea class="textarea form-control modal-inputs" type="text" maxlength="255" id="ptest-desb" placeholder="Enter Note"></textarea>
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

<div class="modal fade" id="pquest-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">


        <div></div>

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" id="pquest-cancel" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Question</h4>
            </div>

            <div class="modal-body scrolable-bar scrolable-content" style="height: 780px;">

                <div class="tab-content">
                    <form class="tab-pane fade active in modal-form" id="pquest-form">

                        <input type="hidden" id="pquest-id" />
                        <div class="form-group">
                            <label>Question Type <span class="text-danger">*</span></label>
                            <div class="radio">
                                <div class="radio-item">
                                    <input type="radio" id="qtype-ch" name="question-type" value="0" onclick="quest.toggleType();" checked />
                                    <label for="qtype-ch">Multiple Choices</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" id="qtype-tf" name="question-type" value="1" onclick="quest.toggleType(true);" />
                                    <label for="qtype-tf">True / False</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group pquest-content">
                            <label>Question <span class="text-danger">*</span></label>                            
                        </div>

                        <div class="tab-content">
                            <div class="sub-tab tab-pane fade active in" id="quest-choises">

                            </div>
                            <div class="sub-tab tab-pane fade form-group" id="quest-tf">
                                <div class="form-group">
                                    <label>Which is Correct?</label>
                                    <div class="radio">
                                        <div class="radio-item">
                                            <input type="radio" id="tf-true" name="quest-tf" value="1" />
                                            <label for="tf-true">True</label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="tf-false" name="quest-tf" value="0" />
                                            <label for="tf-false">False</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="form-error-msg" id="pquest-form-error"></p>
                        <div class="text-center">
                            <button class="btn btn-success modal-submit" type="button" id="pquest-submit">Submit</button>
                        </div>
                    </form>

                    <a href="#pquest-success" class="open-success" data-toggle="tab" style="display: none;"></a>
                    <a href="#pquest-form" class="open-form" data-toggle="tab" style="display: none;"></a>

                    <div class="tab-pane fade success-tab" id="pquest-success">
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

<div class="modal fade" id="ptquest-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">


        <div></div>

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" id="ptquest-action" class="btn-warning btn"><i class="fa fa-close"></i></button>
                <h4 class="modal-title">Add Question to Test <a title="Create New Question" onclick="tquest.createNew();" href="#">(create)</a></h4>
            </div>

            <div class="form-group">
                <input type="text"  maxlength="50" class="form-control modal-inputs" id="ptquest-keyword" placeholder="Search" />
            </div>

            <div class="modal-body" style="padding: 0 20px;">

                <div class="tab-content" style="padding: 0;">
                    <form class="tab-pane fade active in modal-form" id="ptquest-form">

                        <ul class="list-view scrolable-content scrolable-bar" id="quest-list">
                            
                        </ul>
                    </form>

                    <a href="#ptquest-success" class="open-success" data-toggle="tab" style="display: none;"></a>
                    <a href="#ptquest-form" class="open-form" data-toggle="tab" style="display: none;"></a>

                    <div class="tab-pane fade success-tab" id="ptquest-success">
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

<div class="modal fade" id="passign-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">


        <div></div>

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" id="passign-cancel" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Assign Test</h4>
            </div>

            <div class="modal-body">

                <div class="tab-content">
                    <form class="tab-pane fade active in modal-form" id="passign-form">

                        <input type="hidden" id="passign-id" />

                        <div class="form-group">
                            <label>Test Name</label>
                            <div class='input-group date'>
                                <input type='text' class="form-control modal-inputs" value="<?=isset($data->name) ? $data->name : '';?>" placeholder="Enter Name" disabled id="passign-name" />
                                <span class="input-group-addon">
                                    <span class="fa fa-edit"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Batch</label>
                            <select class="form-control modal-inputs" type="text" id="passign-batch_id">
                                <option value="" hidden="">Select Batch</option>
                                <?php foreach ($batchs as $b): ?>
                                    <option value="<?=$b->id;?>"><?=$b->from;?> - <?=$b->to.' ('.$b->name.')';?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date  <span class="text-danger">*</span></label>
                            <div class='input-group date' id='passign-date'>
                                <input type='text' class="form-control modal-inputs" placeholder="dd-mm-yyyy" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="row assign-datetime-picker">
                            <div class="form-group col-sm-6 col-xs-12">   
                                <label>From  <span class="text-danger">*</span></label>
                                <div class='input-group date' id='passign-from'>
                                    <input type='text' class="form-control modal-inputs" placeholder="hh:mm AM/PM" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label>To  <span class="text-danger">*</span></label>
                                <div class='input-group date' id='passign-to'>
                                    <input type='text' class="form-control modal-inputs" placeholder="hh:mm Am/pm" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>                        

                        <div class="form-group bootstrap-switch">
                            <label>Result Publish</label>
                            <label class="switch">
                                <input type="checkbox" id="passign-publish" />
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <p class="form-error-msg" id="passign-form-error"></p>
                        <div class="text-center">
                            <button class="btn btn-success modal-submit" type="button" id="passign-submit">Submit</button>
                        </div>
                    </form>

                    <a href="#passign-success" class="open-success" data-toggle="tab" style="display: none;"></a>
                    <a href="#passign-form" class="open-form" data-toggle="tab" style="display: none;"></a>

                    <div class="tab-pane fade success-tab" id="passign-success">
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
