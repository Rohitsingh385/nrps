<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Add House</a> <i class="fa fa-angle-right"></i></li>
</ol>
<!--four-grids here-->
		<div style="padding: 10px; background-color: white">
        <div class='col-sm-12'>		
		  <a href="<?php echo base_url('Fees_master/house_master'); ?>" class='btn btn-danger pull-right'>BACK</a><br /><br /><br />
        </div>
		  <form action="<?php echo base_url('Fees_master/house_save'); ?>" method="post" onsubmit="return validation()">
		  <table class="table table-bordered" id="class_table">
			<tr>
			  <td><b>House Name</b></td>
			  <td><input type="text" id="housename" name="housename" class="form-control" autocomplete="off"></td>
			</tr>
			<tr>
			  <td colspan='2' align='center'><input type="submit" name="class_save" value="SAVE" class="btn btn-success"></td>
			</tr>
		  </table>
		  </form>
		</div><br /><br />
        <div class="clearfix"></div>
                   
	
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		function validation()
		{
			var name=document.getElementById('housename').value;
			var valhouse=/^[a-zA-Z]{2,}$/;
			if(valhouse.test(name)){

			}
			else{
				alert('Please Fill House And Should Not Contain Numeric Value');
				return false;
			}
		}
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->

<script>
$(document).ready( function () {
    $('#class_table').DataTable();
} );
</script>
