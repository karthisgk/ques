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

                                <p class="success-icon text-center"><i class="fa fa-check"></i></p>

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