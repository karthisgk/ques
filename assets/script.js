
window.onload = function () {
	var chart1 = document.getElementById("line-chart");
	if(chart1 != null) {
		chart1 = chart1.getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
		});
	}
};

String.prototype.isURL = function(){
  var urlregex = /^(http|https):\/\/(([a-zA-Z0-9$\-_.+!*'(),;:&=]|%[0-9a-fA-F]{2})+@)?(((25[0-5]|2[0-4][0-9]|[0-1][0-9][0-9]|[1-9][0-9]|[0-9])(\.(25[0-5]|2[0-4][0-9]|[0-1][0-9][0-9]|[1-9][0-9]|[0-9])){3})|localhost|([a-zA-Z0-9\-\u00C0-\u017F]+\.)+([a-zA-Z]{2,}))(:[0-9]+)?(\/(([a-zA-Z0-9$\-_.+!*'(),;:@&=]|%[0-9a-fA-F]{2})*(\/([a-zA-Z0-9$\-_.+!*'(),;:@&=]|%[0-9a-fA-F]{2})*)*)?(\?([a-zA-Z0-9$\-_.+!*'(),;:@&=\/?]|%[0-9a-fA-F]{2})*)?(\#([a-zA-Z0-9$\-_.+!*'(),;:@&=\/?]|%[0-9a-fA-F]{2})*)?)?$/;
  return urlregex.test(this);
};

String.prototype.isEmail = function(){
  var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
  return pattern.test(this);
};

String.prototype.isJson = function(){
  try {
      JSON.parse(this);
  } catch (e) {
      return false;
  }
  return true;
};

String.prototype.input_validate = function(){
  return this.replace(/["'<>`{}|\\]/g, '');
};

String.prototype.alpha_numeric = function(){
  return this.replace(/\W+/g, '');
};

String.prototype.num_validate = function(opt = 0){

  if(this.trim() === '')
    return '';

  if(opt == 0) /*return integer*/
    return parseInt(this.replace(/[^0-9]/g, ""));
  else /*return float*/
    return parseFloat(this.replace(/[^0-9-.]/g, ""));
};

String.prototype.isNumeric = function(){
  return /^[0-9]+$/.test(this);
};

var Spinner = $('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');

(function($, undefined) {

    $.fn.checkInput = function() {
      var rt = true;      
      $.each(this, function(k, ele){
        if(ele.value == '')
          rt = false;
        else{
          if($(ele).attr('type') == 'text')
            ele.value = ele.value.input_validate();
          else if($(ele).attr('type') == 'num' || $(ele).attr('type') == 'number'){
            ele.value = ele.value.num_validate();
            if(ele.value.match(/^[0-9]+$/) == null)
              rt = false;
          }
          else if($(ele).attr('type') == 'email'){
            if(!ele.value.isEmail())
              rt = false;
          }
          else if($(ele).attr('type') == 'url'){
            if(!ele.value.isURL())
              rt = false;
          }
          else if($(ele).attr('type') == 'password'){
            var eq_id = $(ele).attr('data-equalto');
            if(ele.value != $(eq_id).val())
              rt = false;
          }
        }
      });
      return rt;
    };

    $.fn.initPhoneCode = function(px = '22px'){
      this.off('focusin focusout');
      this.parent().find('.country-phone-code').hide();
      this.css('padding-left', px);
      this.focusin(function(){
          $(this).parent().find('.country-phone-code').show();
      });

      this.focusout(function(){
        if(this.value == '')
          $(this).parent().find('.country-phone-code').hide();
      });
    };

})(jQuery);

var Myevent = 'keyup keypress blur change mouseenter mouseleave click';

$.fn.makeFormData = function(reqlx) {
  var post = {};
  $.each(this, function(k, ele){
    var ind = $(ele).attr('id').replace(reqlx, '');
    post[ind] = ele.value;
  });
  return post;
};

$.fn.setValue = function(d, reqlx) {
  $.each(this, function(k, ele){
    var ind = $(ele).attr('id').replace(reqlx, '');
    if($('select#'+$(ele).attr('id')).length == 0)
      ele.value = d[ind];
    else
      $(ele).val(d[ind]).change();
  });
};

$.fn.initPopup = function(opt = {}){
  var main = this;
  var option = {
    dummyForm: main.find('form.modal-form').length > 0 ? main.find('form.modal-form') : $(document.createElement('form')),
    dummyInputs: main.find('form.modal-form .modal-inputs').length > 0 ? main.find('form.modal-form .modal-inputs') : $(document.createElement('input')),
    dummySubmit: main.find('form.modal-form .modal-submit').length > 0 ? main.find('form.modal-form .modal-submit') : $(document.createElement('button')),
    modal: main
  };
  if(opt.form)
    option.form = option.modal.find(opt.form).length > 0 ? option.modal.find(opt.form) : option.dummyForm;
  else
    option.form = option.dummyForm;
  if(opt.inputs)
    option.inputs = option.form.find(opt.inputs).length > 0 ? option.form.find(opt.inputs) : option.dummyInputs;
  else
    option.inputs = option.dummyInputs;
  if(opt.submit)
    option.submit = option.form.find(opt.submit).length > 0 ? option.form.find(opt.submit) : option.dummySubmit;
  else
    option.submit = option.dummySubmit;
  option.isPhone = opt.isPhone ? true : false;
  option.shortKey = '';
  if(opt.shortKey)
    option.shortKey = opt.shortKey;
  var basic = {
    ele: {
      form: option.form,
      inputs: option.inputs,
      submit: option.submit,
      modal: option.modal,
      isPhone: option.isPhone,
    },
    formKey: option.shortKey,
    Events: 'keyup keypress blur change mouseenter mouseleave click',
    validate: function(){
      var rt = basic.ele.inputs.checkInput();    
      if(!rt)
        basic.ele.submit.prop('disabled', true);
      else
        basic.ele.submit.prop('disabled', false);
      return rt;
    },
    submit: function(){
      var validate = (!basic.ele.submit.prop('disabled') && basic.validate());
      if(validate)
        basic.ele.form.find('p.form-error-msg').text('').hide();
      var rt = validate ? basic.ele.inputs.makeFormData(new RegExp(basic.formKey)) : {};
      if(opt.afterSubmit)
        opt.afterSubmit(rt, validate);
    },
    resetForm: function(){
      basic.ele.inputs.parent().removeClass('form-group--active');
      basic.ele.inputs.val('');
      basic.ele.modal.find('*').off(basic.Events);
    },
    init: function(){
      basic.resetForm();
      basic.ele.modal.modal();
      basic.ele.submit.prop('disabled', true).click(basic.submit);
      basic.ele.inputs.on(Myevent, function(){
        basic.validate();
      }).change(function(){
        if(!$(this).checkInput())
          $(this).parent().addClass('has-error');
        else
          $(this).parent().removeClass('has-error');
        if($(this).attr('type') == 'password'){
          if(typeof $(this).attr('data-equalto') !== 'undefined' && $(this).checkInput())
            $($(this).attr('data-equalto')).removeClass('has-error');
        }
      });
      if(basic.ele.isPhone) {
        basic.ele.form.find('.country-phone-code').hide();
        basic.ele.form.find('[type="number"]').initPhoneCode('32px');
      }
    }
  };
  basic.init();
  var rt = {reset: basic.resetForm, validate: basic.validate};
  rt.ajaxComplete = function(resp = {}){
    if($.isEmptyObject(resp))
      return;

    if(resp.result == 'success'){
      basic.ele.form.find('p.form-error-msg').text('').hide();
      basic.ele.modal.find('a.open-success').click();
      basic.resetForm();
      basic.ele.modal.find('.success-tab p.success-alert').text(changeLang(resp.message)).show();
    }else
      basic.ele.form.find('p.form-error-msg').text(changeLang(resp.message)).show();
  };
  rt.open = function(){
    basic.ele.modal.find('a.open-form').click();
  };
  return rt;
};

function changeLang(msg = ''){return msg};

String.prototype.short_string = function(len) {
    return this.length > len ? this.substring(0, len)+'...' : this;
}

function timerCallback(interval, callback) {
  var i = 1;
  setTimeout(function(){
    if(i == 1)
      callback();
  },  interval);
}

function sweet_alert(callback, msg = ''){
  swal({
    title: changeLang('Are you sure?'),
    text: msg == '' ? changeLang('You Want to Delete it.') : changeLang(msg),
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: changeLang('Yes'),
    cancelButtonText: changeLang('No'),
    closeOnConfirm: false
  },callback);
}

function uniqueid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4();
}

$(document).ready(function() {

  if($('#datatable').length > 0){
      $('#datatable').DataTable({
          rowReorder: {
              selector: 'td:nth-child(0)'
          },
          "aaSorting": [[ 0, 'desc' ]],
      });
  }

  $('#sidebar-collapse .menu').find('.'+activeMenu).addClass('active');
  signup.init();
  batch.init();
  user.init();
  test.init();
});

var signup = {
  init: function(){
    if(typeof signup.trigger === 'undefined')
      return;

    $('#sign-up-submit').off('click').click(function(){
      if(!$('#s-form').parsley().validate() || !$('#s-form input.form-control').checkInput())
        return;

      if($('#s-form [name="uname"][rno="true"]').length < 1)
        return;

      $('#sign-up-submit').off('click');
      $('#s-form').submit();
    });

    $('#s-form [name="uname"]').off('keyup').keyup(function(){
      if(this.value.trim() != ''){
        if(this.value.match(/^[0-9]+$/) == null)
          this.value = this.value.replace(/[^0-9]/g, "");

        var rno = $(this).parsley();                
        RollnoExist((b) => {
          rno.reset();
          if(b){       
            window.ParsleyUI.addError(rno, "myCustomError", 'This Roll No Already Exist!');
            rno.$element.attr('rno', 'false');
          }else
            rno.$element.attr('rno', 'true')
        }, this.value);
      }
    });
  }
};

function RollnoExist(callback, rno, id = ''){
  $.ajax({
    type: 'post',
    url: base_url+'login/check_rno',
    data: {rno: rno, id: id},
    success: function(data){
      var bool = data == '1';
      callback(bool);
    }
  });
}

var batch = {
  init: function(){
    if(!/batch/i.test(window.location.pathname))
      return;
    this.ajax_table();
  },
  get: function(id = ''){
    $('div#loading').hide();
    $('#pbatch-modal .tab-pane.fade.active.in').removeClass('active in');
    $('#pbatch-modal #pbatch-form').addClass('active in');
    $('#pbatch-id').val(id);
    batch.popup = $('#pbatch-modal').initPopup({
      shortKey: 'pbatch-',
      afterSubmit: function(d, v){
        d.id = $('#pbatch-id').val();
        batch.update(d);
      } 
    });
    $('#pbatch-from').off('change').change(function(){
      if(this.value != '') {
        $('#pbatch-to').children(':not([value=""])').remove();
        var frm = parseInt(this.value) + 2;
        for(var i = frm; i < (frm + 2); i++)
          $('#pbatch-to').append($('<option>'+i+'</option>'));

        $('#pbatch-to').val((frm + 1)).change();
      }
    });
  },
  update: function(data){
    if($.isEmptyObject(data))
      return;
    $('#pbatch-submit').off('click').html(Spinner);
    $.ajax({
      type: 'post',
      url: base_url+'api/batch',
      dataType: 'json',
      data: data,
      success: function(resp){
        $('#pbatch-id').val('');
        batch.popup.ajaxComplete(resp);
        batch.table.ajax.reload();
        $('#pbatch-submit').html('Submit');
      }
    });
  },
  trigger: function(id = ''){
    $('div#loading').show();
    if(id != ''){
      $('#pbatch-modal .modal-title').text('Edit Batch');
      $.ajax({
        type: 'post',
        url: base_url+'api/get_batch/'+id,
        dataType: 'json',
        success: function(data){
          if($.isEmptyObject(data)){
            $('#pbatch-id').val('');
            Command: toastr["error"]("Data Not Found!");
            return;
          }
          batch.get(id);
          $('#pbatch-modal .modal-inputs').setValue(data, 'pbatch-');          
        }
      })
    }else{
      $('#pbatch-modal .modal-title').text('Add Batch');
      batch.get();
    }
  },
  delete: function(id = ''){
    sweet_alert(() => {
      $.ajax({
        type: 'post',
        url: base_url+'api/delete_batch/'+id,
        success: function(data){
          swal.close();
          Command: toastr['success']('Batch Deleted Successfull');
          batch.table.ajax.reload();
        }
      });
    }, 'You Want to Delete it.\n !Caution: Students will be Deleted Automaically');
  }
};

batch.ajax_table = function(){
    var user_col = [];
    $.each($('#ajax-table thead tr').children(), function(){
      var col_name = $(this).text().toLowerCase().replace(/ /g, '_');
      user_col.push({data: col_name});
    });
    batch.table = $('#ajax-table').DataTable({
        aaSorting : [[0, 'desc']],
        "aoColumnDefs": [{ 'bSortable': false, 'aTargets':  [1,5]}],
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
                  "url": base_url+'api/batch_ajax_table',
                  "type": "POST",
                  "dataSrc": function ( json ) {
                    return json.data;
                  }
                },
        "columns": user_col
    });    
};

var user = {
  init: function(){
    if(!/user/i.test(window.location.pathname))
      return;
    this.ajax_table();    
    $('#change-batch').off('click').click(function(){
      $('#select-batch').modal();
      $('#sb-submit').off('click').click(user.changeBatch);
    });
    if(mu_batch_id == '0')
      $('#change-batch').click();
  },
  changeBatch: function(){
    var btEle = $('#select-batch select.form-control')[0];
    if(btEle.value == ''){
      Command: toastr['info']('Select Batch!');
      return;
    }
    $('#ajax-table').DataTable().clear();
    $('#ajax-table').DataTable().destroy();
    mu_batch_id = btEle.value;
    user.ajax_table();
    history.pushState({urlPath: base_url+'user'},'', base_url+'user?bid='+mu_batch_id);
    $('#select-batch').modal('toggle');
  },
  ajax_table: function(){
    var user_col = [];
    $.each($('#ajax-table thead tr').children(), function(){
      var col_name = $(this).text().toLowerCase().replace(/ /g, '_');
      col_name = col_name == 'roll_no' ? 'uname' : col_name;
      user_col.push({data: col_name});
    });
    user.table = $('#ajax-table').DataTable({
        aaSorting : [[0, 'desc']],
        "aoColumnDefs": [{ 'bSortable': false, 'aTargets':  [5]}],
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
                  "url": base_url+'api/user_ajax_table?bid='+mu_batch_id,
                  "type": "POST",
                  "dataSrc": function ( json ) {
                    return json.data;
                  }
                },
        "columns": user_col
    }); 
  },
  get: function(id = ''){
    $('div#loading').hide();
    $('#auser-modal .tab-pane.fade.active.in').removeClass('active in');
    $('#auser-modal #auser-form').addClass('active in');
    $('#auser-id').val(id);
    user.popup = $('#auser-modal').initPopup({
      shortKey: 'auser-',
      afterSubmit: function(d, v){
        d.id = $('#auser-id').val();
        d.password = $('#auser-password').val();
        d.cpassword = $('#auser-cpassword').val();
        user.update(d);
      } 
    });
    if(id == '')
      $('#auser-modal input[type="password"]').attr('required','required');
    else
      $('#auser-modal input[type="password"]').removeAttr('required');
    $('#auser-modal #auser-uname').off('keyup').keyup(function(){
      if(this.value.trim() != ''){
        if(this.value.match(/^[0-9]+$/) == null)
          this.value = this.value.replace(/[^0-9]/g, "");

        var rno = $(this).parsley();                
        RollnoExist((b) => {
          rno.reset();
          rno.$element.parent().removeClass('has-error');
          if(b){       
            rno.$element.parent().addClass('has-error');
            window.ParsleyUI.addError(rno, "myCustomError", 'This Roll No Already Exist!');
            rno.$element.attr('rno', 'false');
          }else
            rno.$element.attr('rno', 'true')
        }, this.value, $('#auser-id').val());
      }
    });
  },
  update: function(data){
    if($.isEmptyObject(data))
      return;
    if($('#auser-modal #auser-uname[rno="true"]').length < 1){
      $('#auser-modal #auser-uname').keyup();
      return;
    }
    if(!$('#auser-form').parsley().validate())
      return;
    $('#auser-submit').off('click').html(Spinner);
    $.ajax({
      type: 'post',
      url: base_url+'api/update_user',
      dataType: 'json',
      data: data,
      success: function(resp){
        $('#auser-id').val('');
        user.popup.ajaxComplete(resp);
        user.table.ajax.reload();
        $('#auser-submit').html('Submit');
      }
    });
  },
  trigger: function(id = ''){
    $('#auser-modal .modal-title').text('Add User');
    $('#auser-form').parsley().reset();
    $('div#loading').show();
    if(id != ''){
      $('#auser-modal .modal-title').text('Edit User');
      $.ajax({
        type: 'post',
        url: base_url+'api/get_user/'+id,
        dataType: 'json',
        success: function(data){
          if($.isEmptyObject(data)){
            $('#auser-id').val('');
            Command: toastr["error"]("Data Not Found!");
            return;
          }
          user.get(id);
          $('#auser-modal .modal-inputs').setValue(data, 'auser-');
          $('#auser-modal #auser-uname').keyup();
        }
      });
    }else{
      user.get();   
    }
  },
  delete: function(id = ''){
    sweet_alert(() => {
      $.ajax({
        type: 'post',
        url: base_url+'api/delete_user/'+id,
        success: function(data){
          swal.close();
          Command: toastr['success']('User Deleted Successfull');
          user.table.ajax.reload();
        }
      });
    });
  }
};

var test = {
  init: function(){
    if(typeof testpage === 'undefined')
      return;
    quest.init();
    $('#t-load-more').off('click').click(function(){
      if($('.active.in#test-content').length > 0)
        test.getData(true);
      else if($('.active.in#quest-content').length > 0);
    });
    $('.custom-tab#make-test-tabs li a').off('click').click(function(){
      $('#make-test-header .tab-pane.active.in').removeClass('active in');
      var id = this.getAttribute('href').replace(/#/, '');
      $('#make-test-header .tab-pane[content-id="'+id+'"]').addClass('active in');
      if(id == 'test-content' && $('#test-content').children().length == 0)
        test.getData();
      else if(id == 'quest-content' && $('#quest-content').children().length == 0);/*quest.getdata();*/
    });
    if($('.active.in#test-content').length > 0)
      test.getData();
    else if($('.active.in#quest-content').length > 0);
  },
  get: function(id = ''){
    $('div#loading').hide();
    $('#ptest-modal .tab-pane.fade.active.in').removeClass('active in');
    $('#ptest-modal #ptest-form').addClass('active in');
    $('#ptest-id').val(id);
    test.popup = $('#ptest-modal').initPopup({
      shortKey: 'ptest-',
      afterSubmit: function(d, v){
        d.id = $('#ptest-id').val();
        test.update(d);
      } 
    });
  },
  update: function(data){
    if($.isEmptyObject(data))
      return;
    $('#ptest-submit').off('click').html(Spinner);
    $.ajax({
      type: 'post',
      url: base_url+'api/test_api?update',
      dataType: 'json',
      data: data,
      success: function(resp){
        $('#ptest-id').val('');
        test.popup.ajaxComplete(resp);
        $('#ptest-submit').html('Submit');
        if(resp.id)
          data.id = resp.id;
        var panel = $('#test-content').children('#'+data.id);
        if(panel.length > 0){
          panel.find('[ui-element="test-name"]').text(data.name.short_string(25));  
          panel.find('[ui-element="test-desb"]').text(data.desb);
        }
        else{
          var ui = test.uipanels(data);
          $('#test-content').prepend(ui.html());
        }
      }
    });
  },
  trigger: function(id = ''){
    $('#ptest-modal .modal-title').text('Add Test');
    $('#ptest-form').parsley().reset();
    $('div#loading').show();
    if(id != ''){
      $('#ptest-modal .modal-title').text('Edit Test');
      $.ajax({
        type: 'post',
        url: base_url+'api/test_api?get_single='+id,
        dataType: 'json',
        success: function(data){
          if($.isEmptyObject(data)){
            $('#ptest-id').val('');
            Command: toastr["error"]("Data Not Found!");
            return;
          }
          test.get(id);
          $('#ptest-modal .modal-inputs').setValue(data, 'ptest-');
        }
      });
    }else{
      test.get();   
    }
  },
  panelLength: function(){return $('#test-content').children().length;},
  dataTotal: 0,
  getData: function(loadmore = false){
    var post = {offset: test.panelLength()};
    if(post.offset >= test.dataTotal && loadmore)
      return;
    $('div#loading').show();    
    $.ajax({
      type: 'post',
      url: base_url+'api/test_api?get',
      data: post,
      dataType: 'json',
      success: function(data){
        $('div#loading').hide();
        if(data.length > 0){
          test.dataTotal = data[0].total;
          $.each(data, function(k, obj){
            test.uipanels(obj, $('#test-content'));
          });
        }
        if(test.dataTotal == 0){
          var msg = $('<h2 class="text-center">There\'s no Test</h2>');
          msg.css({
            color: '#c57e7e',
            'font-weight' : 'bold'
          });
          $('#test-content').html(msg);
        }
      }
    })
  },
  delete: function(id = ''){
    sweet_alert(() => {
      $.ajax({
        type: 'post',
        url: base_url+'api/test_api?delete='+id,
        success: function(data){
          swal.close();
          Command: toastr['success']('Test Deleted Successfull');
          $('#test-content').children('#'+id).remove();
          test.dataTotal--;
        }
      });
    });
  }
}

test.uipanels = function(d, ele = ''){
  if($.isEmptyObject(d))
    d = {id: uniqueid(),name: '',desb: ''};
  var ui = $('#test-panel');
  ui.children().attr('id', d.id);
  ui.find('[ui-element="test-name"]').text(d.name.short_string(25));  
  ui.find('[ui-element="test-desb"]').text(d.desb);
  var edit = ui.find('[ui-element="test-edit-btn"]');
  var delBtn = ui.find('[ui-element="test-delete-btn"]');
  edit.attr('onclick', 'test.trigger("'+d.id+'");');
  delBtn.attr('onclick', 'test.delete("'+d.id+'");');
  if(typeof ele === 'object')
    ele.append(ui.html());
  return ui;
};


var quest = {
  init: function(){
    $('.sg-rich-txt').jqte();
  }
}