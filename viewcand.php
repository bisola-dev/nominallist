<?php
require_once('connection.php');


if (isset($_POST['submit'])){
  $progid= $_POST['prog'];
  $payid= $_POST['Payee'];
  $Sessid = $_POST['Sess'];
  $levid= $_POST['levlee'];
  $checkbox = $_POST['checkbox'];
  $progid.' '.$payid.' '. $Sessid.' '.$levid;

$selectedFields ="";
$fieldsChosen = $_POST['checkbox'];
$prefix = $fieldList = '';
foreach($fieldsChosen as $fieldChosen){

  $selectedFields .= $prefix .''. $fieldChosen. '';
  $prefix=', ';

 $testquery ="SELECT ".$selectedFields." FROM [EBPORTAL].[dbo].[vw_Transactions] WHERE progid=$progid AND Sessionid=$Sessid AND Translevel=$levid AND Paymentid=$payid";
  
}

}
else {
  $fieldsChosen =[];
  $testquery="";
}

// echo $selectedFields;
// var_dump($checkbox);
 // echo $letter =  $_POST['letter'];
  //print_r($_POST['checkbox']);}


 //echo $progid.' '.$payid.' '. $Sessid.' '.$levid.' '.$sname.''.$fname.''.$amunt2.''.$prog2.''.$skool2.''.$sex2.''.$lev2.''.$emal2.''.$fon2;

 // $skillzx = sqlsrv_query($conn, "UPDATE [Nysc].[dbo].[Transactions] SET title ='$progid2', News_body='$news2' WHERE id=$crease2");
  
   // echo'<script type="text/javascript">
        //alert("News successfully updated.")
        //</script>';
       
   
$fedr="SELECT *  FROM [EBPORTAL].[dbo].[Sessions]";
$luis=sqlsrv_query($conn, $fedr);


$fedr2="SELECT *  FROM [EBPORTAL].[dbo].[vw_Programs]";
$luis2=sqlsrv_query($conn, $fedr2);

$fedr3="SELECT *  FROM [EBPORTAL].[dbo].[YCTPAY_Payments] ORDER BY PaymentName ASC";
$luis3=sqlsrv_query($conn, $fedr3);



$fedr4="SELECT *  FROM [student].[dbo].[level]";
$luis4=sqlsrv_query($conn, $fedr4);



         
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>VIEW CANDIDATE </title>
		
	
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.css"/>
 
 

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		    <link rel="stylesheet" href="assets/css/new.css">
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.js"></script>
        <script src= "https://code.jquery.com/jquery-3.5.1.js" ></script>
        <script src = "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" > </script>
        <script src ="https://code.jquery.com/jquery-3.5.1.js" > </script>
        <script src ="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" > </script>
        <script src ="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" > </script>
        <script src ="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js" > </script>
        <script src ="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" > </script>
        <script src ="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" > </script>
        <script src ="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js" > </script>
       


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

    <script>
      var DataTableJQ = jQuery.noConflict(true);
      
      DataTableJQ(document).ready(function () {
        DataTableJQ('#example2').DataTable({
          dom:'Bfrtip',
          buttons: [
            'csv','excel','print'
          ],
         
    });
});
   

  </script>
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- /Header -->
			  <!-- Sidebar -->
          
      <!-- /Sidebar -->
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Select Parameters</h3>
								<ul class="breadcrumb">
					 				 
									<li class="breadcrumb-item active"></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<form method="post" action="" >
						  <div class="col-md-12">           
								<div class="row"> 
									<div class="col-sm-4 col-md-4">
                    
										<div class="form-group">
											<label>Programme<span class="text-danger"></span></label>
												<select name="prog" type="text" maxlength="200"  class="form-control" required>
                        <option value="">--- Choose a programme ---</option>
                        <?php        
                       while($row=sqlsrv_fetch_array($luis2)){//openning of while braces
                       $progid = $row['ProgramID'];
                       $prog= $row['program']; ?>
                      <option value="<?php echo $progid;?>"><?php echo $prog;?></option> 
                      <?php }?>
                        </select>
									  </div>              
									</div>  
                </div>
        
                
                
                	<div class="row">
                    <div class="col-sm-4 col-md-4">
                      <div class="form-group">
                        <label>Payment <span class="text-danger"></span></label>
                          <select  name="Payee"  rows = "5" cols = "50" class="form-control" required> 
                          <option value="">--- Choose a Payment---</option>
                            <?php
                            while($row=sqlsrv_fetch_array($luis3)){//openning of while braces
                            $payid = $row['PaymentID'];
                            $payName = $row['PaymentName'];  ?>   
                              <option value="<?php echo $payid;?>"><?php echo $payName;?></option>       
                            <?php  } ?>
                        </select>
                      </div>
                    </div>
								  </div>
                
                <div class="row">
                  <div class="col-sm-4 col-md-4">
										<div class="form-group">
											<label>Session <span class="text-danger"></span></label>
												<select  name="Sess"  rows = "5" cols = "50" class="form-control" required> 
                        <option value="">--- Choose a Session---</option>
                          <?php
                          while($row=sqlsrv_fetch_array($luis)){//openning of while braces
                            $Sessid = $row['SessionID'];
                            $Sess = $row['Session']; ?> 
                           <option value="<?php echo $Sessid;?>"><?php echo $Sess;?></option>       
                           <?php  } ?>
                      </select>
										</div>
								  </div>
								</div>
                
                <div class="row">
								<div class="col-sm-4 col-md-4">
										<div class="form-group">
											<label>Level  <span class="text-danger"></span></label>
												<select  name="levlee"  rows = "5" cols = "50" class="form-control" required> 
                        <option value="">--- Choose a Level---</option>
                          <?php
                          while($row=sqlsrv_fetch_array($luis4)){//openning of while braces
                            $levid = $row['LevelID'];
                            $lev = $row['Level'];  ?> 
                           <option value="<?php echo $levid;?>"><?php echo $lev;?></option>       
                           <?php  } ?>
                      </select>
										</div>
									</div>
								</div>
                            
          <div class="row">
          <label class="container">Surname           
          <input type="checkbox" value="Surname" name="checkbox[]">
           <span class="checkmark"></span>
            </label>
            </div>

<div class="row">
<label class="container">Firstname
<input type="checkbox" value="Firstname" name="checkbox[]">
<span class="checkmark"></span>
</label>
</div>

<div class="row">
<label class="container">Othername
  <input type="checkbox" value="Othername" name="checkbox[]">
  <span class="checkmark"></span>
</label>
</div>

<div class="row">
<label class="container">Matric no
  <input type="checkbox" value="Payeenum" name="checkbox[]">
  <span class="checkmark"></span>
</label>
</div>

<div class="row">
<label class="container">Amount
  <input type="checkbox" value="ApprovedAmount" name="checkbox[]">
  <span class="checkmark"></span>
</label>
</div>
<div class="row">
<label class="container">Programme
<input type="checkbox" value="prog" name="checkbox[]">
<span class="checkmark"></span>
</label>
</div>

<div class="row">
<label class="container">School
  <input type="checkbox" value="SchoolName" name="checkbox[]">
  <span class="checkmark"></span>
</label>
</div>

<div class="row">
<label class="container">Sex
  <input type="checkbox" value="Sex" name="checkbox[]">
  <span class="checkmark"></span>
</label>
</div>




<div class="row">
<label class="container">Email
<input type="checkbox" value="Email" name="checkbox[]">
<span class="checkmark"></span>
</label>
</div>

<div class="row">
<label class="container">Phone
  <input type="checkbox"  value="Phone" name="checkbox[]">
  <span class="checkmark"></span>
</label>
</div>
</div>


                    <div class="submit-section">
										<button  type="submit" name="submit" class="btn btn-info submit-btn">Submit</button>
									</div>
							</form>
		               

      <hr>

      <table id="example2" class="display" style="width:100%">
        <thead>
            <tr>
                <?php  
                                      print "<th>S/N</th>";
                                        foreach($fieldsChosen as $tableHeader)
                                        {
                                          echo "<th>".$tableHeader."</th>";
                                        }

                                        ?>
            </tr>
        </thead>
        <tbody>
                    <?php                   
                    $count=1;
                   
                    $selectedRecords = sqlsrv_query($conn,$testquery);

                    if( $selectedRecords === false) {
                      die( print_r( sqlsrv_errors(), true) );
                  }
                  else {
                    while($row = sqlsrv_fetch_array( $selectedRecords, SQLSRV_FETCH_ASSOC) ){

                      print "<tr>";
                      print "<td>". $count++;
                    foreach($row as $tableData){
                    
                    print "<td>";
                    echo $tableData; 
                    }
                    print "</tr>";
                    }
                  }

                

// ?>
        </tbody>

    </table>







			
				      
                                      



                                   
                                             

                                  
						
						</div>
					</div>

                                          
                                      
                                    </tr>
                                 
                                 </tbody>
                              </table>       
                           </div>
      </div>

                        </div>


                     </div>
                  </div>
               </div>
            </section>
			</div>
            </div>
			<!-- /Page Wrapper -->
      <div id="checck" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Class </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                           <form method="post" action="">

                    <div class="col-sm-6 col-md-12">
                  <div class="form-group">
                      <input type="hidden" name="crease" id ="clak1" value="<?php echo $crease;?>">
                   
                    </div>
                  </div>


                   <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>Title<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="title2" id="clak2">
                        
                    </div>
                  </div>

            
									<div class="col-sm-6 col-md-12">
										<div class="form-group">
											<label>News content <span class="text-danger"></span></label>
												<textarea name="news2"  rows = "5" cols = "50" id="clak3" class="form-control" required> </textarea>
										</div>
									</div>
								</div>
                 
               <div class="col-sm-6 col-md-12">
                <div class="submit-section">
            <button type="submit" name="uppy" class="btn btn-primary submit-btn m-r-10">Update</button>
            </div>
            </form>
            </div>
    <!-- <tr>
          <td>
            <button onclick="myFunction()">Print this page</button>
          </td>
        </tr> -->

<hr>

    <!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
      <script src="assets/js/app.js"></script>
       
		
    </body>

</html>