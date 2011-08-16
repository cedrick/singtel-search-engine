<html>
<head>
<title>View All Info</title>
<link rel="shortcut icon" href="templates/images/favicon.ico" type="image/x-icon" />
</head>
<body>
<?php include ("templates/style.css"); ?>
<?php include ("templates/template.php"); ?>
<div class="liner"></div>
<br>
<center>
	<div class = "content">
		<?php 
		 include 
		 ("includes/connection.php"); 
		 $connect =  new Connection();
		 if($connect->connectdb("NSI_SINGTEL"))
		{
				if(isset($_GET['id']))
				{
					$id = $_GET['id'];
					$query.= "PhoneNumber = '$id' ";
							$sql= "
									SELECT 'DEL' as Campaign,PhoneNumber,Name,CODE2,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from  NSI_SINGTEL.dbo.Calllist where $query 
									UNION 
									SELECT 'MIOHOME' as Campaign,PhoneNumber,Name,CODE2,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from  NSI_SINGTEL_MIO_HOME.dbo.Calllist where $query 
									UNION 
									SELECT 'SNBB' as Campaign,PhoneNumber,Name,CODE2,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,NULL,NULL,NULL from NSI_SINGTEL_SNBB.dbo.Calllist where $query 
									UNION 
									SELECT 'ACQ_STM' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,NULL,NULL,NULL from NSI_SINGTEL_ACQ_STM.dbo.Calllist where $query
									UNION 
									SELECT 'BPL' as Campaign,PhoneNumber,CUST_NAME,Cust_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from  NSI_SINGTEL_BPL.dbo.Calllist where $query
									UNION
									SELECT 'FTTH' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_FTTH.dbo.Calllist where $query
									UNION
									SELECT 'HR_STM_DEL' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_HR_STM_DEL.dbo.Calllist where $query
									UNION
									SELECT 'MID_ARPU' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_MID_ARPU.dbo.Calllist where $query
									UNION
									SELECT 'MID_ARPU_GRPC' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_MID_ARPU_GRPC.dbo.Calllist where $query
									UNION
									SELECT 'MID_ARPU_GRPD' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_MID_ARPU_GRPD.dbo.Calllist where $query
									UNION
									SELECT 'NEWBORN_GRP1' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_NEWBORN_GRP1.dbo.Calllist where $query2
									UNION
									SELECT 'NEWBORN_GRP2' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_NEWBORN_GRP2.dbo.Calllist where $query2
									UNION
									SELECT 'NEWBORN_GRP3' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_NEWBORN_GRP3.dbo.Calllist where $query2
									";
							$result=mssql_query($sql);
							echo "<table border=0 width=1000 align=center cellspacing=1 cellpadding=2 bgcolor=#E9E9E9 style='font-size:12px'>";
							
			
							while($row=mssql_fetch_array($result))
											{
												
												if($x%2==0)
												{
													$color = " bgcolor = '#C6DEFF' ";
												}else
												{
													$color=" bgcolor='#FFF5EE'";
											  	}
												 $x++;
											  	 echo '<tr'.$color.'>';
											  	 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Campaign"."</b>"."</td>";
												 echo"<td>". $row['Campaign'] ."</td>";
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."PhoneNumber"."</b>"."</td>";
											  	 echo"<td>". $row['PhoneNumber'] ."</td>";
											  	 echo '<tr'.$color.'>';
											  	 echo"<td>"."<b>"."Name"."</b>"."</td>";
											  	 echo"<td>". $row['Name']."</td>";
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."NRIC"."</b>"."</td>";
												 echo"<td>". $row['CODE2'] ."</td>";
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Address" ."</b>"."</td>";
												 echo"<td>". $row['Address'] ."</td>";
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Application Date" ."</b>"."</td>";
												 echo"<td>".$row['Application_Date'] ."</td>";
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Activation Date" ."</b>"."</td>";
												 echo"<td>". $row['Activation_Date'] ."</td>";
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"." Appointment Time" ."</b>"."</td>";
												 echo"<td>". $row['Appointment_Time'] ."</td>";
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."ADSL No" ."</b>"."</td>";
												 echo"<td>".$row['ADSL_No'] ."</td>";
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Mobile No" ."</b>"."</td>";
												 echo"<td>".$row['Mobile_No'] ."</td>";
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."IPTV_NO" ."</b>"."</td>";
												 echo '<td>'.$row['IPTV_No'] .'</td>';
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Installation Address" ."</b>"."</td>";
												 echo '<td>'.$row['Installation_Address'] .'</td>';
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Applicant Name" ."</b>"."</td>";
												 echo '<td>'.$row['Applicant_Name'].'</td>';
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Product" ."</b>"."</td>";
												 echo '<td>'.$row['Product'].'</td>';
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Speed" ."</b>"."</td>";
												 echo '<td>'. $row['Speed'].'</td>';
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."SSP" ."</b>"."</td>";
												 echo '<td>'.$row['SSP'] .'</td>';
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Product Officer" ."</b>"."</td>";
												 echo '<td>'.$row['Product_Offer'] .'</td>';
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Secondary Contact" ."</b>"."</td>";
												 echo '<td>'. $row['Secondary_Contact'] .'</td>';
												 echo '<tr'.$color.'>';
												 echo"<td>"."<b>"."Customer Request" ."</b>"."</td>";
												 echo '<td>'.$row['Customer_Request'] .'</td>';
												 
											}
													echo '</tr>';
													echo '</table>';
				}
		}
		?>
		</div>
  <br>
  <?php include ("templates/footer.php"); ?>
 </center>
 </body>
 </html>
