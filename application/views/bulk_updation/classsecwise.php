<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  margin: 0px auto;
  z-index:999;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
.modal-header,.modal-footer{
		background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
	}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Student Details Update</a> <i class="fa fa-angle-right"></i></li>
</ol>

<div class="loader" style="display:none;"></div>
<div style="padding: 10px; background-color: white;  border-top:3px solid #5785c3;">
	<form id="form" method="post">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 form-group">
				<label>Select Class</label>
				<select class="form-control" required name="class_name" onchange="selectsec(this.value)">
					<option value="">Select Class</option>
					<?php
						if($class){
							foreach($class as $class_data){
								?>
									<option value="<?php echo $class_data->Class_No; ?>"><?php echo $class_data->CLASS_NM; ?></option>
								<?php
							}
						}
					?>
				</select>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 form-group">
				<label>Select Sec</label>
				<select class="form-control" required name="sec_name" id="sec">
				</select>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 form-group">
				<label>Sort By</label>
				<select class="form-control" required name="short_by">
					<option value="">Select Option</option>
					<option value="ADM_NO">Admission No</option>
					<option value="FIRST_NM">Name</option>
					<option value="ROLL_NO">Roll No</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
				<center>
					<button type="submit" class="btn btn-success">DISPLAY</button>
				</center>
			</div>
		</div>
	</form>
	<br />
<div id="load_data" style="overflow:auto;"></div>
</div><br />

<div id="myModal" class="modal fade" data-backdrop='static' data-keyword='false' role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ENTER PASSWORD</h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class='col-md-8 col-sm-8 col-lg-8'>
				<input type='password' class='form-control' name='pass' id='pass' placeholder='Enter Password'>
			</div>
			<div class="col-md-2 col-sm-2 col-lg-2">
				<button class='btn btn-success btn-sm' onclick='passwordvalidate()'>SUBMIT</button>
			</div>
			<div class="col-md-2 col-sm-2 col-lg-2">
				<a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>">BACK</a>
			</div>
		</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
	$(window).on('load',function() {
      $("#myModal").modal('show');
    });
	function passwordvalidate(){
		var pass = $('#pass').val();
		$.ajax({
			type: 'POST',
			data: {pass:pass},
			url: "<?php echo base_url('bulk_updation/Classsecwise/match_password'); ?>",
			success:function(data){
				if(data == 1){
					$("#myModal").modal('hide');
				}else{
					alert("Password Is Incorrect");
					$('#pass').val('');
				}
			},
		});
	}
	function selectsec(val){
		$.ajax({
			url: "<?php echo base_url('bulk_updation/Classsecwise/find_sec'); ?>",
			type: "POST",
			data: {val:val},
			beforeSend:function(){
				$('.loader').show();
				$('body').css('opacity', '0.5');
			},
			success: function(data){
				$('.loader').hide();
				$('body').css('opacity', '1.0');
				$("#sec").html(data);
			},
		});
	}
	$("#form").on("submit", function (event) {
	event.preventDefault();
		$.ajax({
			url: "<?php echo base_url('bulk_updation/Classsecwise/find_detailsstudentinformation'); ?>",
			type: "POST",
			data: $('#form').serialize(),
			beforeSend:function(){
				$('.loader').show();
				$('body').css('opacity', '0.5');
			},
			success: function(data){
				$('.loader').hide();
				$('body').css('opacity', '1.0');
				$("#load_data").html(data);
			},
		});
	});
</script>