
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

function current_time() {
  var time = new Date();
  var date = time.getFullYear()+'-'+(time.getMonth() + 1)+'-'+time.getDate();
  var format = 
    ("0" + time.getHours()).slice(-2)   + ":" + 
    ("0" + time.getMinutes()).slice(-2) + ":" + 
    ("0" + time.getSeconds()).slice(-2);
  return date+' '+format;
}

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
  tquest.init();
  if($('.sg-rich-txt').length > 0)
    $('.sg-rich-txt').jqte();
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
    var windowScroll = function(event){
      var st = $(this).scrollTop();
      var rch = $(document).outerHeight() - $(window).height();
      if(st < rch || !test.loadmore)
        return;
      if($('.active.in#test-content').length > 0)
        test.getData(true);
      else if($('.active.in#quest-content').length > 0)
        quest.getData(true);
    };
    $(window).off('scroll').scroll(windowScroll);
    $(document.body).off('touchmove').on('touchmove', windowScroll);
    $('.custom-tab#make-test-tabs li a').off('click').click(function(){
      $('#make-test-header .tab-pane.active.in').removeClass('active in');
      var id = this.getAttribute('href').replace(/#/, '');
      $('#make-test-header .tab-pane[content-id="'+id+'"]').addClass('active in');
      if(id == 'test-content' && $('#test-content').children().length == 0)
        test.getData();
      else if(id == 'quest-content' && $('#quest-content').children().length == 0)
        quest.getData();
    });
    if($('.active.in#test-content').length > 0)
      test.getData();
    else if($('.active.in#quest-content').length > 0)
      quest.getData();
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
  loadMoreBtn: $('#t-load-more'),
  loadmore: true,
  panelLength: function(){return $('#test-content').children().length;},
  dataTotal: 0,
  getData: function(loadmore = false){
    var post = {offset: test.panelLength()};
    if(post.offset >= test.dataTotal && loadmore)
      return;
    $('div#loading').show();  
    if(loadmore)
      test.loadMoreBtn.show();
    test.loadmore = false;
    $.ajax({
      type: 'post',
      url: base_url+'api/test_api?get',
      data: post,
      dataType: 'json',
      success: function(data){
        $('div#loading').hide();
        if(loadmore)
          test.loadMoreBtn.hide();
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
        test.loadmore = true;
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
  d.m = typeof d.m !== 'undefined' ? d.m : 'test';
  var ui = $('#test-panel');
  ui.children().attr('id', d.id);
  ui.find('[ui-element="test-name"]').text(d.name.replace(/<\/?[^>]+(>|$)/g, "").short_string(25));  
  ui.find('[ui-element="test-desb"]').html(d.desb);
  var testAddQuest = ui.find('[ui-element="test-add-quest"]');
  var testAssign = ui.find('[ui-element="test-assign-btn"]');
  var edit = ui.find('[ui-element="test-edit-btn"]');
  var delBtn = ui.find('[ui-element="test-delete-btn"]');
  edit.attr('onclick', d.m+'.trigger("'+d.id+'");');
  delBtn.attr('onclick', d.m+'.delete("'+d.id+'");');
  testAddQuest.parent().removeClass('hidden');
  testAddQuest.parent().next().removeClass('hidden');
  testAddQuest.attr('href', base_url+'test/'+d.id);
  testAssign.parent().removeClass('hidden');
  testAssign.parent().next().removeClass('hidden');
  testAssign.attr('href', base_url+'test/'+d.id+'?assign');
  if(typeof ele === 'object')
    ele.append(ui.html());
  return ui;
};


var quest = {
  init: function(){

  },
  get: function(id = ''){    
    $('div#loading').hide();
    $('[name="question-type"][value="0"]').prop('checked', true);
    $('[name="quest-tf"][value="0"]').prop('checked', true);
    quest.toggleType();
    $('#pquest-modal .tab-pane.fade.active.in:not(.sub-tab)').removeClass('active in');
    $('#pquest-modal #pquest-form').addClass('active in');
    $('#pquest-id').val(id);
    quest.popup = $('#pquest-modal').initPopup({
      shortKey: 'pquest-',
      afterSubmit: function(d, v){
        d = {};
        d.id = $('#pquest-id').val();
        d.qtype = $('[name="question-type"]:checked').val();
        d.content = $('#pquest-content').val();
        d.tf = $('[name="quest-tf"]:checked').val();
        d.choises = [];
        if($('#quest-choises').children().length == 4){
          $.each($('#quest-choises').children(), function(){
            var $this = $(this)
            var optVal = $this.find('.quest-choices').val();
            var optVal = optVal != '' && typeof optVal === 'string' ? optVal : 'Option '+$this.attr('opt');
            var ch = {id: $this.find('input[type="hidden"]').val(), value: optVal};
            ch.crt = $this.find('input[type="radio"]').prop('checked') ? 1 : 0;
            d.choises.push(ch);
          });
        }
        quest.update(d);
      } 
    });
    
    $('#pquest-submit').prop('disabled', false);
    $('.pquest-content').children('.jqte').remove();
    $('.pquest-content').append('<textarea id="pquest-content"></textarea>');
    if($('.jqte_source #pquest-content').length == 0)
      $('#pquest-content').jqte();
  },
  trigger: function(id = ''){
    $('#quest-choises').html('');
    $('#pquest-modal .modal-title').text('Create Question');
    $('#pquest-form').parsley().reset();
    $('div#loading').show();
    if(id != ''){
      $('#pquest-modal .modal-title').text('Edit Question');
      $.ajax({
        type: 'post',
        url: base_url+'api/quest_api?get_single='+id,
        dataType: 'json',
        success: function(data){
          if($.isEmptyObject(data)){
            $('#pquest-id').val('');
            Command: toastr["error"]("Data Not Found!");
            return;
          }
          quest.get(id);
          var ch = typeof data.choises === 'string' && data.choises.isJson() ? JSON.parse(data.choises) : ch;
          quest.initChoises(ch);
          $('[name="question-type"][value="'+data.qtype+'"]').prop('checked', true);
          quest.toggleType(data.qtype == 1);
          $('[name="quest-tf"][value="'+data.tf+'"]').prop('checked', true);
          $('#pquest-content').jqteVal(data.content); 
        }
      });
    }else{
      quest.get();
      quest.initChoises();  
    }
  },
  update: function(data){
    if($.isEmptyObject(data))
      return;
    $('#pquest-submit').off('click').html(Spinner);
    $.ajax({
      type: 'post',
      url: base_url+'api/quest_api?update',
      dataType: 'json',
      data: data,
      success: function(resp){
        $('#pquest-id').val('');
        quest.popup.ajaxComplete(resp);
        $('#pquest-modal .modal-body.scrolable-content').css('height','270px');
        $('#pquest-submit').html('Submit');
        if(resp.id)
          data.id = resp.id;
        if($('#quest-content').length > 0)
          var panel = $('#quest-content').children('#'+data.id);
        else
          var panel = $('#tquest-content').children('#'+data.id);
        data.choises = JSON.stringify(data.choises);
        var d = quest.panelUI(data);
        var ui = quest.uipanels(d);
        if(panel.length > 0)
          panel.html(ui.children().html());
        else{
          if($('#quest-content').length > 0)
            $('#quest-content').prepend(ui.html());
          $('#quest-list').html('');
          if(tquest.autoAdd){
            if($('#quest-content').length == 0)
              $('#tquest-content').prepend(ui.html());
            tquest.addQuest(resp.req_volume);
            $('div#loading').show();
            tquest.update(tquest.listDone);          
          }
        }        
      }
    });
  },
  panelLength: function(){return $('#quest-content').children().length;},
  dataTotal: 0,
  getData: function(loadmore = false){
    var post = {offset: quest.panelLength()};
    if(post.offset >= quest.dataTotal && loadmore)
      return;
    $('div#loading').show();
    if(loadmore)
      test.loadMoreBtn.show();  
    test.loadmore = false;
    $.ajax({
      type: 'post',
      url: base_url+'api/quest_api?get',
      data: post,
      dataType: 'json',
      success: function(data){
        $('div#loading').hide();
        if(loadmore)
          test.loadMoreBtn.hide();
        if(data.length > 0){
          quest.dataTotal = data[0].total;
          $.each(data, function(k, obj){
            var d = quest.panelUI(obj);
            quest.uipanels(d, $('#quest-content'));
          });
        }
        if(quest.dataTotal == 0){
          var msg = $('<h2 class="text-center">There\'s no Questions</h2>');
          msg.css({
            color: '#c57e7e',
            'font-weight' : 'bold'
          });
          $('#quest-content').html(msg);
        }
        test.loadmore = true;
      }
    })
  },
  panelUI: function(data){
    if($.isEmptyObject(data))
      return {};
    var rt = {id: data.id, name: data.content, m: 'quest'};
    rt.desb = '<div class="panel-question">'+data.content+'</div>';
    rt.desb += '<ul class="panel-answer">';
    if(data.qtype == 0 && data.choises.isJson()){
      var ch = JSON.parse(data.choises);
      var options = ['A','B','C','D'];
      if(ch.length == 4){
        $.each(ch, function(k, opt){
          rt.desb += '<li><span>'+options[k]+'. '+opt.value.short_string(50)+'</span></li>';
        });
      }
    }else if(data.qtype == 1)
      rt.desb += '<li><span>1. True</span></li><li><span>2. False</span></li>';
    rt.desb += '</ul>';
    return rt;
  },
  toggleType: function(b = false){
    var tabEle = $('#pquest-form').children('.tab-content');
    tabEle.children('.tab-pane.active.in').removeClass('active in');
    if(b){
      $('#pquest-modal .modal-body.scrolable-content').css('height','540px');
      tabEle.children('#quest-tf').addClass('active in');
    }
    else{
      $('#pquest-modal .modal-body.scrolable-content').css('height','780px');
      tabEle.children('#quest-choises').addClass('active in');
    }
  },
  initChoises: function(ch = []){
    $('#quest-choises').html('');
    var options = [
      $('<div class="form-group" opt="A"></div>'),
      $('<div class="form-group" opt="B"></div>'),
      $('<div class="form-group" opt="C"></div>'),
      $('<div class="form-group" opt="D"></div>')
    ];
    $.each(options, function(k, ele){
      var uid = typeof ch[k] === 'undefined' ? 'opt-'+ele.attr('opt').toLowerCase() : ch[k].id;
      var value = typeof ch[k] !== 'undefined' ? ch[k].value : '';
      var crt = typeof ch[k] !== 'undefined' ? parseInt(ch[k].crt) : 0;
      crt = crt == 1 ? 'checked' : '';
      var radio = '&nbsp<input type="radio" name="quest-choises" id="'+uid+'" '+crt+' />'
      ele.append($('<label>Option '+ele.attr('opt')+' <span class="text-danger">*</span>'+radio+'</label>'));
      ele.append($('<input type="hidden" value="'+uid+'" />'));
      ele.append($('<textarea class="quest-choices">'+value+'</textarea>'));
      $('#quest-choises').append(ele);
    });
    if($('[name="quest-choises"]:checked').length == 0)
      $('[name="quest-choises"]').eq(0).prop('checked', true);
    $('.quest-choices').jqte();
  },
  delete: function(id = ''){
    sweet_alert(() => {
      swal.close();
      $('div#loading').show();
      $.ajax({
        type: 'post',
        url: base_url+'api/quest_api?delete='+id,
        success: function(data){
          $('div#loading').hide();
          Command: toastr['success']('Questions Deleted Successfull');
          $('#quest-content').children('#'+id).remove();
          test.dataTotal--;
        }
      });
    });
  }
};


quest.uipanels = function(d, ele = ''){
  if($.isEmptyObject(d))
    d = {id: uniqueid(),name: '',desb: ''};
  d.m = typeof d.m !== 'undefined' ? d.m : 'test';
  var ui = $('#test-panel');
  ui.children().attr('id', d.id);
  ui.find('[ui-element="test-name"]').text(d.name.replace(/<\/?[^>]+(>|$)/g, "").short_string(25));  
  ui.find('[ui-element="test-desb"]').html(d.desb);
  if(typeof testSingle === 'undefined') {
    var edit = ui.find('[ui-element="test-edit-btn"]');
    var delBtn = ui.find('[ui-element="test-delete-btn"]');
    var aq = ui.find('[ui-element="test-add-quest"]').parent();
    var as = aq.next().next();
    edit.attr('onclick', d.m+'.trigger("'+d.id+'");');
    delBtn.attr('onclick', d.m+'.delete("'+d.id+'");');
    aq.addClass('hidden');
    aq.next().addClass('hidden');
    as.addClass('hidden');
    as.next().addClass('hidden');
  }else{
    ui.children().attr('data-index', d.index);
    ui.find('[ui-element="test-rm-btn"]').attr('onclick', 'tquest.remove("'+d.id+'")');
  }
  if(typeof ele === 'object')
    ele.append(ui.html());
  return ui;
};

var tquest = {/*test single page handler*/
  init: function(){
    if(typeof testSingle === 'undefined')
      return;
    assign.init();
    var windowScroll = function(event){
      var st = $(this).scrollTop();
      var rch = $(document).outerHeight() - $(window).height();
      if(st < rch || !test.loadmore)
        return;
      if($('.active.in#tquest-content').length > 0)
        tquest.getData({loadmore: true});
      else if($('.active.in#assign-content').length > 0)
        assign.getData(true);
    };
    $(window).off('scroll').scroll(windowScroll);
    $(document.body).off('touchmove').on('touchmove', windowScroll);
    $('.custom-tab#make-test-tabs li a').off('click').click(function(){
      $('#make-test-header .tab-pane.active.in').removeClass('active in');
      var id = this.getAttribute('href').replace(/#/, '');
      $('#make-test-header .tab-pane[content-id="'+id+'"]').addClass('active in');
      if(id == 'tquest-content' && $('#tquest-content').children().length == 0)
        tquest.getData();
      else if(id == 'assign-content' && $('#assign-content').children().length == 0)
        assign.getData();
    });
    if($('.active.in#tquest-content').length > 0)
      tquest.getData();
    else if($('.active.in#assign-content').length > 0)
      assign.getData();
    $('#ptquest-action').off('click').click(function(){
      if($(this).hasClass('btn-warning')){
        if($('#ptquest-modal').hasClass('in'))
          $('#ptquest-modal').modal('toggle');
        return;
      }else{
        $('div#loading').show();
        tquest.update(tquest.listDone);
      }
    });
  },
  listDone: function(data){
    Command: toastr["success"]("Questions Added Successfull");
    tquest.isModified = tquest.autoAdd = false;
    if($('#ptquest-modal').hasClass('in'))
      $('#ptquest-modal').modal('toggle');
    tquest.changeSubmitActionUi();          
    $('#tquest-content').html('');
    tquest.getData();
  },
  createNew: function(){
    swal({
      title: 'After Created. Are You Sure?',
      text: 'You Want to Add Question to this Test.',
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: changeLang('Yes'),
      cancelButtonText: changeLang('No'),
      closeOnConfirm: false
    },function(c){
      tquest.autoAdd = c;
      quest.trigger();
      swal.close();
      if($('#ptquest-modal').hasClass('in'))
        $('#ptquest-modal').modal('toggle');
    });
  },
  update: function(callback){
    if(typeof callback !== 'function')
      return;
    $.ajax({
      url: base_url+'api/test_api?update_questions='+test_id,
      type: 'post',
      data: {quest:testQuest},
      success: callback
    });
  },
  remove: function(id = ''){
    var enid = id;
    var confirm = function(){
      var ele = $('#tquest-content').children('#'+enid);
      var id = ele.attr('data-index');      
      tquest.removeQuest(id);
      swal.close();
      $('div#loading').show();
      tquest.update(function(d){
        Command: toastr["success"]("Question Removed Successfull");
        $('div#loading').hide();
         ele.remove();
        $('#quest-list').children('[data-index="'+id+'"]').removeClass('selected');
      });
    };
    sweet_alert(confirm, 'You Want to Remove it from this Test.');
  },
  panelLength: function(){return $('#tquest-content').children().length;},
  listLength: function(){return $('#quest-list').children().length;},
  dataTotal: 0,
  listTotal: 0,
  isModified: false,
  autoAdd: false,
  getData: function(opt = {loadmore: false, list: false}){
    var loadmore = opt.loadmore;
    var post = {offset: tquest.panelLength(), reverse: false, keyword: ''};
    var dataTotal = tquest.dataTotal;
    if (opt.list){
      post.offset = tquest.listLength();
      post.reverse = true;
      post.keyword = opt.keyword;
      dataTotal = tquest.listTotal; 
    }
    if(post.offset >= dataTotal && loadmore)
      return;
    $('div#loading').show();  
    if(loadmore)
      test.loadMoreBtn.show();
    test.loadmore = false;
    $.ajax({
      type: 'post',
      url: base_url+'api/test_api?get_questions='+test_id,
      data: post,
      dataType: 'json',
      success: function(data){
        $('div#loading').hide();
        if(loadmore)
          test.loadMoreBtn.hide();
        if (opt.list){
          opt.callback(data);
          test.loadmore = true;
          return;
        }
        if(data.length > 0){
          tquest.dataTotal = data[0].total;
          $.each(data, function(k, obj){
            var d = quest.panelUI(obj);
            d.index = obj.index;
            quest.uipanels(d, $('#tquest-content'));
          });
        }
        if(tquest.dataTotal == 0){
          var msg = $('<h2 class="text-center">There\'s no Questions</h2>');
          msg.css({
            color: '#c57e7e',
            'font-weight' : 'bold'
          });
          $('#tquest-content').html(msg);
        }
        test.loadmore = true;
      }
    });
  },
  pushui: function(data, ele = $('#quest-list')){
    if(data.length == 0)
      return;
    $.each(data, function(k, obj){
      obj.content = obj.content.replace(/<\/?[^>]+(>|$)/g, "");
      var li = $('<li id="'+obj.id+'" data-index="'+obj.index+'"><h3 class="head">'+obj.content+'</h3>'
                +'<div class="checked">'
                +'<i class="fa fa-check"></i>'
                +'</div></li>');
      var opt_ui = $('<ul class="options"></ul>');
      if(obj.qtype == 0 && obj.choises.isJson()){
        var ch = JSON.parse(obj.choises);
        var options = ['A','B','C','D'];
        if(ch.length == 4){
          $.each(ch, function(k, opt){
            opt = $('<li><span>'+options[k]+'. '+opt.value.short_string(35)+'</span></li>');
            opt_ui.append(opt);
          });
        }
      }
      else if(obj.qtype == 1){
        var opt = $('<li><span>1. True</span></li>');
        opt_ui.append(opt);
        opt = $('<li><span>2. False</span></li>');
        opt_ui.append(opt);
      }
      li.append(opt_ui);
      if(testQuest.length > 0){
        $.each(testQuest, function(ke, j){
          if(String(j.id) === obj.index)
            li.addClass('selected');
        });
      }
      ele.append(li);      
    });
    tquest.initSelectListEvent();
    tquest.changeSubmitActionUi();
  },
  initSelectListEvent: function(){
    $('#quest-list').children().off('click').click(function(){
      var $this = $(this);
      var id = $this.attr('data-index');
      if($this.hasClass('selected')){
        $this.removeClass('selected');        
        if(testQuest.length > 0)
          tquest.removeQuest(id);
      }
      else{
        $this.addClass('selected');
        tquest.addQuest(id);
      }
      tquest.isModified = true;
      tquest.changeSubmitActionUi();
    });
  },
  removeQuest: function(id){
    var rm = [];
    $.each(testQuest, function(k, obj){
      if(obj.id != id)
        rm.push(obj);
    });
    testQuest = rm;
  },
  addQuest: function(id){
    var add = true;
    if(testQuest.length > 0){
      $.each(testQuest, function(k, obj){
        if(obj.id === id)
          add = false;
      });
    }
    if(add)
      testQuest.push({id: id, created: current_time()});
  },
  changeSubmitActionUi: function(){
    if(!tquest.isModified)
        $('#ptquest-action').removeClass('btn-success')
      .addClass('btn-warning').html('<i class="fa fa-close"></i>');
    else
      $('#ptquest-action').removeClass('btn-warning')
    .addClass('btn-success').html('Done');
  },
  listOptions: {
    loadmore: false,list: true,keyword: '',
    callback: function(data){
      if(data.length > 0){
        tquest.listTotal = data[0].total;
        tquest.pushui(data);
      }
      if(tquest.listTotal == 0){
        var msg = $('<h2 class="text-center">There\'s no Questions</h2>');
        msg.css({
          color: '#c57e7e',
          'font-weight' : 'bold'
        });
        $('#quest-list').html(msg);
      }
      if(!$('#ptquest-modal').hasClass('in'))
        $('#ptquest-modal').modal();
    }
  },
  trigger: function(){
    if($('#quest-list').children().length > 0){
      if(!$('#ptquest-modal').hasClass('in'))
        $('#ptquest-modal').modal();
      return;
    }
    $('#quest-list').html('');
    tquest.listOptions.loadmore = false;
    tquest.listOptions.keyword = '';
    tquest.getData(tquest.listOptions);
    $('#quest-list').off('scroll').scroll(tquest.listScroll);
    $('#quest-list').off('touchmove').on('touchmove', tquest.listScroll);
    $('#ptquest-keyword').off('keyup').keyup(function(){      
      if(this.value.length > 3 && test.loadmore){
        $('#quest-list').html('');
        tquest.listOptions.loadmore = false;
        tquest.listOptions.keyword = this.value;
        tquest.getData(tquest.listOptions);
      }
      if(tquest.listOptions.keyword.trim() != '' && this.value.trim() == ''){
        $('#quest-list').html('');
        tquest.listOptions.loadmore = false;
        tquest.listOptions.keyword = '';
        tquest.getData(tquest.listOptions);
      }
    });
  },
  listScroll: function(){    
    var scroll_height = this.scrollHeight - $(this).outerHeight();
    if(this.scrollTop < scroll_height || !test.loadmore)
        return;
    tquest.listOptions.loadmore = true;
    tquest.getData(tquest.listOptions); 
  }
};

var assign = {
  init: function(){

  },
  getData: function(loadmore = false){
    
  }
};