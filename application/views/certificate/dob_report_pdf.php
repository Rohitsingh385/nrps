<?php
error_reporting(0);
if ($details_fetch) {
    $Birth_Date = $details_fetch[0]->Birth_Date;
    $Birth_Date1 = date('d-M-Y', strtotime($Birth_Date));
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>DOB Certificate</title>
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
            <table class="table" id='example' style="width: 100%;margin-left:-15px !important;" cellpadding='0' cellspacing='0'>
                <tr>
                    <td width="3%"><img src="<?php echo $school_setting[0]->SCHOOL_LOGO; ?>" id="image" style='width:90px;'></td>
                    <td style="margin-left:-15% !important;">
                        <center><span style='font-size:19px; font-weight:bold;'><?php echo $school_setting[0]->School_Name; ?></span></center>
                        <center><?php echo $school_setting[0]->School_Address; ?></center>
                        <center>Affillated to CBSE, New Delhi </center>
                        <center><span style='font-size:14px;'>(Aff No. :3430154, School Code: 66348)</span></center>
                        <center><span style='font-size:14px;'>Session (<?php echo $school_setting[0]->School_Session; ?>)</span></center>
                    </td>
                </tr>
            </table>
            <center><b>DATE OF BIRTH CERTIFICATE</b></center>
            <br><br>
            <center>
                <h3><u>TO WHOMSOEVER IT MAY CONCERN</u></h3>
            </center>
            <br><br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <b><i>Certificate No</i>.:- <?php echo $details_fetch[0]->CERT_NO; ?></b>
                </div>
            </div><br /><br /><br />
            <table class="table">
                <tr>
                    <td class="f-s">
                        <p>
                            <center><b><i>This is to certify that Date of Birth of Master/Miss </i> <u><?php echo $details_fetch[0]->S_NAME; ?></u></b></center>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td class="f-s">
                        <center><b><i>S/O/D/O</i> &nbsp; <u><?php echo $details_fetch[0]->F_NAME; ?></u></b>&nbsp;<b> & </b>&nbsp; <u><b><?php echo $details_fetch[0]->M_Name; ?></b></u></center>
                    </td>
                </tr>
                <tr>
                    <td class="f-s">
                        <center><b><i>Admission No.:</i> &nbsp; <u><?php echo $details_fetch[0]->ADM_NO; ?></u></b>&nbsp;<b>, Class </b>&nbsp; <u><b><?php echo $details_fetch[0]->class_name; ?></b></u>&nbsp;<b><i>is </i></b>&nbsp;&nbsp;<u><b><?php echo $Birth_Date1; ?></b></u></center>
                    </td>
                </tr>
                <tr>
                    <td class="f-s">
                        <center><b><i>as per our School Admission Register.</i></b></center>
                    </td>
                </tr>
                <!--<tr>
				<td class="f-s"><center><b><i>To the best of my knowledge he/she bears a Good moral character. </i> </b></center></td>
			</tr>
			<tr>
				<td class="f-s"><center><b><i>I wish him/her every success in life. </i> </b></center></td>
			</tr>-->
            </table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            <div class="row">
                <table width="100%">
                    <tr>
                        <td>
                            <center><b>Issue Date</b></center>
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
        </div>
    </div>
</body>

</html>