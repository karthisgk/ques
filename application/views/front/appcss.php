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

.submit-property__success > h2 {
  color: #69b97a;
}

.panel-body table.table th, .panel-body table.table td {
  text-align: center;
}

table.table tbody > tr:last-child > td {
  border-bottom: 1px solid #e6e7e8;
}

</style>