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
		
	    if($this->connectdb("NSI_MEDIA_3"))
		{
	       
			//$permission=$_COOKIE['allowsave'];
			$escape=$this->escape_string($search);
			//$explode=explode(',',$escape);
		
		
	if($escape != NULL)
	{
		if($escape!= NULL && $rad_id == 1)
		{
			$query.= "PhoneNumber = '$escape' ";	
			
			
		
		}elseif($escape!= NULL && $rad_id == 2)
		{
			$query.= "First_Name like '%$escape%' ";
			
			
		
		}//elseif($escape!= NULL && $rad_id == 1)
		//{
			//$query.= "PhoneNumber = '$escape' ";
			//$query2.= "PhoneNumber = '$escape' ";
			//$query3.= "PhoneNumber = '$escape' ";	
			
		
	//}elseif($escape!= NULL && $rad_id == 0)
		//{
			//$query.= "Customer_Request = '$escape' ";	
		
		//}
				
			$sql= "
					SELECT PhoneNumber,First_Name,Last_Name,Title,Company,Address,Address2,State,Zip_Code from Calllist where $query
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
						echo"<td>"."<b>"."PhoneNumber"."</b>"."</td>";
						echo"<td>"."<b>"."First Name"."</b>"."</td>";
						echo"<td>"."<b>"."Last Name"."</b>"."</td>";
						echo"<td>"."<b>"."Company"."</b>"."</td>";
						echo"<td>"."<b>"."Title"."</b>"."</td>";
						echo"<td>"."<b>"."Address" ."</b>"."</td>";
						echo"<td>"."<b>"."Adress2" ."</b>"."</td>";
						echo"<td>"."<b>"."State" ."</b>"."</td>";
						echo"<td>"."<b>"." Zip Code" ."</b>"."</td>";
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
								echo"<td>". $row['PhoneNumber'] ."</td>";
								echo"<td>". $row['First_Name'] ."</td>";
								echo"<td>". $row['Last_Name']."</td>";
								echo"<td>". $row['Company'] ."</td>";
								echo"<td>". $row['Title'] ."</td>";
								echo"<td>".$row['Address'] ."</td>";
								echo"<td>". $row['Address2'] ."</td>";
								echo"<td>". $row['State'] ."</td>";
								echo"<td>".$row['Zip_Code'] ."</td>";
								
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
