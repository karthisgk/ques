<style type="text/css">

.text-warning {
  color: #c3d000;
}

.online-circle {
  color: #9ccb20;
}

.text-success {
  color: #4eb96f;
}

.text-bold {
  font-weight: bold;
}

.scrolable-content {
  width: 100%;
  margin: 0px;
  height: 400px;
  overflow: auto;
}

.scrolable-bar::-webkit-scrollbar  {
  width: 3px;
}
 
.scrolable-bar::-webkit-scrollbar-thumb {
  background: #e5e5e5; 
  border-radius: 10%;
}

.scrolable-bar::-webkit-scrollbar-track {
  background: #fff;
}

.bg-404 {
	background-image: url(<?=base_url();?>media/404-error.png);
	background-repeat: no-repeat;
	background-position: center;
	background-size: contain;
	min-height: 500px;
}

.batch-filed {
  position: relative;
}

.batch-filed > span.icon {
  position: absolute;
  top: 10px;
}

ul.parsley-errors-list {
  list-style: none;
  padding: 0;
  margin-top: 10px;
  color: #c15f5f;
}

.login-panel {
  width: 30%;
  margin: auto;
}

@media (max-width: 800px) {
  .login-panel {
    width: 50%;
  }
}

@media (max-width: 500px) {
  .login-panel {
    width: 100%;
  }
}

.float-left {
  float: left;
}

.float-right {
  float: right;
}

.float-left > .fix-float-btn,  .float-right > .fix-float-btn {
  margin-top: 27px;
}

.modal-title {
  font-weight: bold;
}

.success-icon > .fa {
  padding: 30px;
  border-radius: 50%;
  background: #5cb85c;
  font-size: 40px;
  color: #fff;
}

.success-icon > .fa.error {
  background: #f95a2a;
}

.success-icon.yes > .fa.error {
  display: none;
}

.success-icon:not(.yes) > .fa.error {
  display: inline-block;
}

.success-icon:not(.yes) > .fa.check {
  display: none;
}

.submit-property__success > h2 {
  color: #69b97a;
}

.panel-body table.table th, .panel-body table.table td {
  text-align: center;
}

table.table tbody > tr:last-child > td {
  border-bottom: 1px solid #e6e7e8;
}

@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(1600deg); } }

div#loading {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    z-index: 10000;
    display: none;
}

div#loading img.image {
    position: fixed;
    z-index: 10140;
    top: 50%;
    left: 50%;
    width: 120px;
    height: 120px;
    margin: -60px 0 0 -60px;
    -webkit-animation: spin 4s linear infinaite;
    -moz-animation: spin 4s linear infinite;
    animation: spin 4s linear infinite;
}

textarea.textarea {
  resize: none;
}

textarea.textarea[maxlength="255"] {
  height: 100px;
}

.make-test-contents {
  min-height: 350px;
}

.make-test-contents .tab-pane .panel-body{
  border: 1px solid #f5f5f5;
}

.checkbox > .checkbox-item, .radio > .radio-item {
  margin-left: 45px;
}

ul.panel-answer {
  list-style: none;
  padding-left: 20px;
}

.jqte {
  margin: 0px;
}

#t-load-more {
  display: none;
}

ul.list-view {
  padding: 0;
}

ul.list-view li {
  list-style: none;
}

ul.list-view > li {
  padding: 10px 5px 10px 0px;
  border-bottom: 1px solid #eee;
  min-height: 85px;
  cursor: pointer;
  border-radius: 5px;
  position: relative;
}

ul.list-view > li.selected {
  background: #f2f2f2;
}

ul.list-view > li:hover {
  background: #f9f9f9;
}

ul.list-view > li .time {
  font-size: 10px;
  float: right;
}

ul.list-view > li p, ul.list-view > li span {
  color: #666;
  font-size: 15px;
  margin-bottom: 0px;
  line-height: 1.3;
}

ul.list-view > li .head {
  font-size: 14px;
  font-weight: bold;
  margin-top: 0;
}

ul.list-view > li .message {
  font-size: 13px;
  max-width: 90%;
}

ul.list-view > li .checked{
  display: none;
  color: #4eb96f;
  position: absolute;
  right: 5px;
  font-size: 45px;
  top: 0;
}

ul.list-view > li.selected .checked {
  display: block;
}

button#ptquest-action {
  float: right;
}

#quest-list {
  height: 500px;
}

.make-test-contents .panel-body {
  word-wrap: break-word;
  word-break: break-all;
}

.dropdown-settings li a {
  text-decoration: none;
}

.input-group-addon {
  padding: 15px 12px;
}

.input-group-addon > .fa-edit {
  font-size: 16px;
}

.input-group.date ul.parsley-errors-list {
  position: absolute;
  top: 45px;
  font-size: 11px;
  margin-top: 0;
}

.switch {
  position: relative;
  display: inline-block;
  width: 53px;
  height: 24px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 17px;
  width: 20px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.bootstrap-switch {
  position: relative;
  padding: 20px 0;
  width: 50%;
}

.bootstrap-switch > .switch {
  position: absolute;
  right: 0;
}

@media (max-width: 450px) {
  .bootstrap-switch {
    width: 100%;
  }
}


.test-timeline .timeline-title {
  font-weight: bold;
  font-size: 25px;
}

.test-timeline .timeline-sub-head {
  font-size: 18px;
}

.test-timeline .timeline-body span {
  word-wrap: break-word;
}

.test-timeline .timeline-panel {
  cursor: pointer;
}

ul.test-timeline > li.active .timeline-badge {
  background: #9ccb20;
}

ul.test-timeline > li.danger .timeline-badge {
  background: #cb4720;
}

.ques-btn > ul {
  list-style: none;
  padding: 0;
}

.ques-btn > ul > li {
  margin:  17px 0px;
  text-align: center;
  padding: 0;
  display: table;
}

.ques-btn > ul > li > a {
  padding: 11px 14px;
  border: 1px solid #f5f5f5;
  color: #AAA;
  text-decoration: none;
  cursor: pointer;
  border-radius: 15px;
}

.ques-btn > ul > li.active > a {
  background: #30a5ff !important;
  color: #fff;
}

.isNegative .ques-btn > ul > li.loaded > a {
  cursor: pointer;
}

.isNegative .ques-btn > ul > li.loaded + li > a{
  cursor: pointer;
  background: #fff;
}

.isNegative .ques-btn > ul > li:not(.loaded) > a {
  cursor: not-allowed;
  background: #f5f5f5;
}

#stud-quest {
  padding: 20px 40px;
  position: relative;
  width: 100%;
}

#stud-quest > div.tab-pane {
  margin: auto;
  width: 80%;
}

#stud-quest > div.tab-pane .action-btns > div {
  position: absolute;
  bottom: 5%;
}

#stud-quest > div.tab-pane .action-btns > div.prev {
  left:5%;
}

#stud-quest > div.tab-pane .action-btns > div.next {
  right:5%;
}

#questions-content-loading {
  position: absolute;
  font-size: 50px;
  left: 50%;
  top: 40%;
}

#stud-quest .q-content {
  font-size: 20px;
  word-wrap: break-word;
  margin-bottom: 10px;
}

.q-options {
  list-style: none;
}

.q-options > li {
  margin-top: 5px;
  font-size: 20px;
}

.q-options > li i.fa.fa-dot-circle-o {
  color: #79a700;
}

.q-options > li input[type="radio"] {
  display: none;
}

.q-options > li input[type="radio"]:not(:checked) + i.fa.fa-circle-o + i.fa.fa-dot-circle-o {
  display: none;
}

.q-options > li input[type="radio"]:not(:checked) + i.fa.fa-circle-o {
  display: inline;
}

.q-options > li input[type="radio"]:checked + i.fa.fa-circle-o + i.fa.fa-dot-circle-o {
  display: inline;
}

.q-options > li input[type="radio"]:checked + i.fa.fa-circle-o {
  display: none;
}

#test-timer {
  font-weight: bold;
  font-size: 20px;
}

.sidebar ul.nav .active a, .sidebar ul.nav li.parent a.active, .sidebar ul.nav .active > a:hover, .sidebar ul.nav li.parent a.active:hover, .sidebar ul.nav .active > a:focus, .sidebar ul.nav li.parent a.active:focus {
  background: #313435;
}

.sidebar ul.nav li.parent a.active {
  /*margin-left: 20px;*/
  background: #525a55;
}


@media (max-width: 500px) {
  .panel-body {
    padding: 0;
  }

  .make-test-contents, .make-test-contents > .tab-pane{
    padding-left: 0;
    padding-right: 0;
  }

  .make-test-contents > .tab-pane > .panel-child {
    padding-left: 5px;
    padding-right: 5px;
  }
}

</style>