<?php
error_reporting(0);
if ($details_fetch) {
	$Adm_Date = $details_fetch[0]->Adm_Date;
	$End_DATE = $details_fetch[0]->End_DATE;
	$adm_date1 = date('d-M-Y', strtotime($Adm_Date));
	$End_DATE1 = date('d-M-Y', strtotime($End_DATE));
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Character Certificate</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.0.js"></script>
	<style media="print">
		body {
			marging: 0px !important;
			paddging: 0px !important;
		}

		#border {
			width: 100%;
			height: 100%;
			padding: 5px 20px 0px 20px;
			border: solid 3px black;
		}

		#image {
			height: 100px;
			width: 100px;
			float: right;
		}

		#heading {
			float: right;
		}

		#content {
			border: solid 1px black;
			border-radius: 10px;
		}

		.text-content {
			text-align: right;
		}

		@page {
			size: auto;/ auto is the initial value / margin-top: -10px;/ this affects the margin in the printer settings / margin-bottom: 0;
			margin-right: 20px;
			margin-left: 20px;
		}

		.f-s {
			font-size: 26px;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<div id="border">
			<table style='width:100%' class='table'>
				<tr>
					<td style='text-align:left'><img src="<?php echo base_url($school_setting[0]->SCHOOL_LOGO); ?>" id="image" style='width:110px'></td>
					<td>
						<center><span style='font-size:19px; font-weight:bold;'><?php echo $school_setting[0]->School_Name; ?></span></center>
						<center><?php echo $school_setting[0]->School_Address; ?></center>
						<center>Session (<?php echo $school_setting[0]->School_Session; ?>)</center>
						<center><span style='font-size:14px;'>Managed By: D.A.V College Managing Committee, New Delhi-55</span></center>
						<center><span style='font-size:14px;'>Affiliated To: C.B.S.E. New Delhi vide Affln. No.: 3430103</span></center>
						<center>(School No.: 66302)</center>
					</td>
					<td style='text-align:right'>
						<div style='width:100px; margin:5px;'> &nbsp;&nbsp;</div>
					</td>
				</tr>
				<tr>

				</tr>
			</table>
			<div class="row">
				<div class="col-md-3 col-sm-3 col-lg-3">
				</div>
				<div class="col-md-6 col-sm-6 col-lg-6">

				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
				</div>
			</div><br /><br /><br />
			<center>
				<h3><u>CHARACTER CERTIFICATE</u></h3>
			</center>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<b><i>Certificate No</i>.:- <?php echo $details_fetch[0]->CERT_NO; ?></b>
				</div>
			</div><br /><br /><br /><br />
			<table class="table">
				<tr>
					<td class="f-s">
						<center><b><i>This is to certify that Master/Miss :</i> &nbsp;&nbsp;&nbsp;&nbsp; <u><?php echo $details_fetch[0]->S_NAME; ?></u></b></center>
					</td>
				</tr>
				<tr>
					<td class="f-s">
						<center><b><i>S/O/D/O :</i> &nbsp;&nbsp;&nbsp;&nbsp; <u><?php echo $details_fetch[0]->F_NAME; ?></u></b>&nbsp;&nbsp;<b> & </b>&nbsp;&nbsp; <b><u><?php echo $details_fetch[0]->M_Name; ?></b></u></center>
					</td>
				</tr>
				<tr>
					<td class="f-s">
						<center><b><i>Admission No.:</i> &nbsp;&nbsp;&nbsp;&nbsp; <u><?php echo $details_fetch[0]->ADM_NO; ?></u></b>&nbsp;&nbsp;<b>, Class </b>&nbsp;&nbsp; <u><b><?php echo $details_fetch[0]->class_name; ?></b></u>&nbsp;&nbsp;<b><i>is a</i></b></center>
					</td>
				</tr>
				<tr>
					<td class="f-s">
						<center><b><i>bonafide student of this school from :</i> &nbsp; <u><?php echo $adm_date1; ?></u></b>&nbsp;<b> To </b>&nbsp; <u><b><?php echo $End_DATE1; ?></b></u></center>
					</td>
				</tr>
				<tr>
					<td class="f-s">
						<center><b><i>To the best of my knowledge he/she bears a Good Moral Character. </i> </b></center>
					</td>
				</tr>
				<tr>
					<td class="f-s">
						<center><b><i>I wish him/her every success in life. </i> </b></center>
					</td>
				</tr>
			</table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
			<div class="row">
				<table width="100%">
					<tr>
						<td>
							<center><b>Issue Date: <?php echo date('d-M-Y', strtotime($this->input->post('issue_date'))); ?></b></center>
						</td>
						<td>
							<center><b>Dealing Clerk <br /> Signature</b></center>
						</td>
						<td>
							<center><b>Principal <br /> Signature</b></center>
						</td>
					</tr>
				</table>
			</div>
		</div><br />
		<?php
		// foreach ($str as $p) {
			// 	$final_adm .= $p . "_";
			// }
			// $adm_str = rtrim($final_adm, "_");
			$adm_str = str_replace('/', '_', $details_fetch[0]->ADM_NO);
			// echo $adm_str;die;
		?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<center>
					<span>
						<a href="<?php echo base_url('Certificate/char_details_pdf/' . $adm_str); ?>" target="_blank" class="btn btn-primary" id="generate_pdf" style='display:non'><i class="fa fa-file-pdf-o"></i>&nbsp;GENERATE & DOWNLOAD PDF</a>&nbsp;
					</span>
					<!-- <button class="btn btn-primary" id="printing_button" onclick="printl()"><i class="fa fa-print"></i>&nbsp;PRINT</button>&nbsp; -->
					<a class="btn btn-danger" id="print_cancel" href="<?php echo base_url('Certificate/char_show'); ?>">BACK</a>
				</center>
			</div>
		</div><br /><br />
	</div>
	<script type="text/javascript">
		function printl() {
			var printButton = document.getElementById("printing_button");
			var print_cancel = document.getElementById('print_cancel');
			print_cancel.style.visibility = 'hidden';
			printButton.style.visibility = 'hidden';
			window.print();
			printButton.style.visibility = 'visible';
			print_cancel.style.visibility = 'visible';
		}
		$(document).ready(function() {
			function disableBack() {
				window.history.forward()
			}
			window.onload = disableBack();
			window.onpageshow = function(evt) {
				if (evt.persisted) disableBack()
			}

			function preventBack() {
				window.history.forward();
			}
			setTimeout("preventBack()", 0);
			window.onunload = function() {
				null
			};
		});
	</script>
</body>

</html>