<style type="text/css">

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
  min-height: 450px;
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

</style>