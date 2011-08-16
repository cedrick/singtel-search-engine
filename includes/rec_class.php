<?php
 
include ("connection.php");
Class Check extends Connection
{
    
	
	
	
	//function escape string
	function escape_string($string)
	{
	  
	 	return str_replace("'","''",$string);
	}
	 
	
	
	 //function for search
	 function main($search,$rad_id)
	 { 
		
	    if($this->connectdb("NSI_SINGTEL"))
		{
	       
			//$permission=$_COOKIE['allowsave'];
			$escape=$this->escape_string($search);
			//$explode=explode(',',$escape);
		
		
	if($escape != NULL)
	{
		if($escape!= NULL && $rad_id == 3)
		{
			$query.= "NRIC = '$escape' or  CODE2 = '$escape' ";	
			$query2.= "CUST_NRIC = '$escape' OR NRIC = '$escape' ";	
			$query3.= " Cust_NRIC = '$escape' OR NRIC = '$escape' ";	
			
		
		}elseif($escape!= NULL && $rad_id == 2)
		{
			$query.= "NAME like '%$escape%' ";
			$query2.= "CUST_NAME like '%$escape%' ";
			$query3.= "CUST_NAME like '%$escape%' ";		
			
		
		}elseif($escape!= NULL && $rad_id == 1)
		{
			$query.= "PhoneNumber = '$escape' ";
			$query2.= "PhoneNumber = '$escape' ";
			$query3.= "PhoneNumber = '$escape' ";	
			
		
		}//elseif($escape!= NULL && $rad_id == 0)
		//{
			//$query.= "Customer_Request = '$escape' ";	
		
		//}
				
			$sql= "
				SELECT 'DEL' as Campaign,PhoneNumber,Name,CODE2,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from  NSI_SINGTEL.dbo.Calllist where $query 
				UNION 
				SELECT 'MIOHOME' as Campaign,PhoneNumber,Name,CODE2,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from  NSI_SINGTEL_MIO_HOME.dbo.Calllist where $query 
				UNION 
				SELECT 'SNBB' as Campaign,PhoneNumber,Name,CODE2,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,NULL,NULL,NULL from NSI_SINGTEL_SNBB.dbo.Calllist where $query 
				UNION 
				SELECT 'ACQ_STM' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,NULL,NULL,NULL from NSI_SINGTEL_ACQ_STM.dbo.Calllist where $query2
				UNION 
				SELECT 'BPL' as Campaign,PhoneNumber,CUST_NAME,Cust_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from  NSI_SINGTEL_BPL.dbo.Calllist where $query3
				UNION
				SELECT 'FTTH' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_FTTH.dbo.Calllist where $query2
				UNION
				SELECT 'HR_STM_DEL' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_HR_STM_DEL.dbo.Calllist where $query2
				UNION
				SELECT 'MID_ARPU' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_MID_ARPU.dbo.Calllist where $query2
				UNION
				SELECT 'MID_ARPU_GRPC' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_MID_ARPU_GRPC.dbo.Calllist where $query2
				UNION
				SELECT 'MID_ARPU_GRPD' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_MID_ARPU_GRPD.dbo.Calllist where $query2
				UNION
				SELECT 'NEWBORN_GRP1' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_NEWBORN_GRP1.dbo.Calllist where $query2
				UNION
				SELECT 'NEWBORN_GRP2' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_NEWBORN_GRP2.dbo.Calllist where $query2
				UNION
				SELECT 'NEWBORN_GRP3' as Campaign,PhoneNumber,CUST_NAME,CUST_NRIC,NRIC,Address,Application_Date,Activation_Date,Appointment_Time,ADSL_No,Mobile_No,IPTV_No,Installation_Address,Applicant_Name,Product,Speed,SSP,Product_Offer,Secondary_Contact,Customer_Request from NSI_SINGTEL_NEWBORN_GRP3.dbo.Calllist where $query2
				";
				
				$result=mssql_query($sql);
			 	$count=mssql_num_rows($result);
			 	$counter="<b>Result</b>".":"." ".$count." "."Record Found!";
			 	echo '<div class="search_result">'.'<font color="#800000" face="Arial">'.'<center>'.$counter.'</center>'.'</font>'.'</div>';
				
				  	if($count>0)
						{   
					    $x=0; 
						echo "<table width=1100 border=0 align=center cellspacing=1 cellpadding=2 bgcolor=#E9E9E9 style='font-size:12px'>";
						echo"<td>"."<b>"."#"."</b>"."</td>";
						echo"<td>"."<b>"."Campaign"."</b>"."</td>";
						echo"<td>"."<b>"."PhoneNumber"."</b>"."</td>";
						echo"<td>"."<b>"."Name"."</b>"."</td>";
						echo"<td>"."<b>"."NRIC"."</b>"."</td>";
						echo"<td>"."<b>"."Address" ."</b>"."</td>";
						echo"<td>"."<b>"."Application Date" ."</b>"."</td>";
						echo"<td>"."<b>"."Activation Date" ."</b>"."</td>";
						echo"<td>"."<b>"." Appointment Time" ."</b>"."</td>";
						echo"<td>"."<b>"."ADSL No" ."</b>"."</td>";
						echo"<td>"."<b>"."Mobile No" ."</b>"."</td>";
						echo"<td>"."<b>"."Customer Request" ."</b>"."</td>";
						echo"<td>"."<b>"."View All Info" ."</b>"."</td>";
						echo "<td>"."<b>"." View Call History"."</b>"."</td>";
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
								echo"<td>".$x."</td>";
								echo"<td>". $row['Campaign'] ."</td>";
								echo"<td>". $row['PhoneNumber'] ."</td>";
								echo"<td>". $row['Name']."</td>";
								echo"<td>". $row['CODE2'] ."</td>";
								echo"<td>". $row['Address'] ."</td>";
								echo"<td>".$row['Application_Date'] ."</td>";
								echo"<td>". $row['Activation_Date'] ."</td>";
								echo"<td>". $row['Appointment_Time'] ."</td>";
								echo"<td>".$row['ADSL_No'] ."</td>";
								echo"<td>".$row['Mobile_No'] ."</td>";
								echo"<td>".$row['Customer_Request'] ."</td>";
								echo "<td>".'<a target="_blank" href="data_view.php?id='.$row['PhoneNumber'].' ">View All Info</a>'."</td>";
								echo "<td>".'<a target="_blank" href="data.php?id='.$row['PhoneNumber'].'&campaign='.$row['Campaign'] .'  ">View Call History</a>'."</td>";
								
								
								echo"</tr>";

							}
	    				 	echo "</table>";
							
						}else
						{
							echo $_COOKIE['error_msg']='<div class="search_result">'.'<font color="#800000" face="Arial">'.'<center>'.'<b>'."Record is not Existing!".'</b>'.'</center>'.'</font>'.'</div>';;
						}
								
		}else 
		{
			echo $_COOKIE['error_msg']='<div class="search_result">'.'<font color="#800000" face="Arial">'.'<center>'.'<b>'."You Searched for Nothing!".'</b>'.'</center>'.'</font>'.'</div>';;
			
		}
					
				
		   $this->closedb();
				
		}
		else
			{
				echo'<div class="counter">'. "Database error".'</div>';
			}
	 }
	 
	 
}
?>
