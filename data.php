<html>
<head>
<title>View Call History</title>
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
					$campaign = $_GET['campaign'];
					if($campaign == 'DEL')
					{
						$sql = "SELECT
								'DEL' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from  NSI_SINGTEL.dbo.I3_NSI_SINGTEL_DEL_CH0 
								where PhoneNumber = '$id' order by callplacedtime ";
					}elseif($campaign == 'MIOHOME')
					{
						 $sql = "SELECT
								'MIOHOME' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from  NSI_SINGTEL_MIO_HOME.dbo.I3_NSI_SINGTEL_MIO_HOME_CH0
								where PhoneNumber = '$id' order by callplacedtime ";
								
					}elseif($campaign == 'SNBB')
					{
						$sql = "SELECT
								'SNBB' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from  NSI_SINGTEL_SNBB.dbo.I3_NSI_SINGTEL_SNBB_CH0
								where PhoneNumber = '$id' order by callplacedtime ";
								
					}elseif($campaign == 'ACQ_STM' )
					{
						$sql = "SELECT
						 		'ACQ_STM' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from  NSI_SINGTEL_ACQ_STM.dbo.I3_NSI_SINGTEL_ACQ_STM_CH0
								where PhoneNumber = '$id' order by callplacedtime ";
					}elseif($campaign == 'BPL')
					{
						 $sql = "SELECT
								'BPL' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from  NSI_SINGTEL_BPL.dbo.I3_NSI_SINGTEL_BPL_CH0
								where PhoneNumber = '$id' order by callplacedtime 
								";
					}elseif($campaign == 'FTTH')
					{
						
						$sql = "SELECT
								'FTTH' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from  NSI_SINGTEL_FTTH.dbo.I3_NSI_SINGTEL_FTTH_CH0
								where PhoneNumber = '$id' order by callplacedtime 
								";
					}elseif($campaign == 'HR_STM_DEL')
					{
						 $sql = "SELECT
								'HR_STM_DEL' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from  NSI_SINGTEL_HR_STM_DEL.dbo.I3_NSI_SINGTEL_HR_STM_DEL_CH0
								where PhoneNumber = '$id' order by callplacedtime 
								";
					}elseif($campaign == 'MID_ARPU')
					{
						 $sql = "SELECT
								'MID_ARPU' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from  I3_NSI_SINGTEL_MID_ARPU_GRPD_CH0
								where PhoneNumber = '$id' order by callplacedtime 
								";
					}elseif($campaign == 'MID_ARPU_GRPC')
					{
						 $sql = "SELECT
								'MID_ARPU_GRPC' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from NSI_SINGTEL_MID_ARPU_GRPC.dbo.I3_NSI_SINGTEL_MID_ARPU_GRPC_CH0
								where PhoneNumber = '$id' order by callplacedtime 
								";
					}elseif($campaign == 'MID_ARPU_GRPD')
					{
						 $sql = "SELECT
								'MID_ARPU_GRPD' as Campaign,reason,finishcode,length,agentid,callid,callplacedtime,PhoneNumber
								from NSI_SINGTEL_MID_ARPU_GRPD.dbo.I3_NSI_SINGTEL_MID_ARPU_GRPD_CH0
								where PhoneNumber = '$id' order by callplacedtime 
								";
					}
						
						
						
								
							$result=mssql_query($sql);
							echo "<table border=0 width=1000 align=center cellspacing=1 cellpadding=2 bgcolor=#E9E9E9 style='font-size:12px'>";
							echo"<td>"."<b>"."ID"."</b>"."</td>";
							echo"<td>"."<b>"."Campaign"."</b>"."</td>";
							echo"<td>"."<b>"."Phone Number"."</b>"."</td>";
							echo"<td>"."<b>"."Reason"."</b>"."</td>";
							echo"<td>"."<b>"."Finish Code"."</b>"."</td>";
							echo"<td>"."<b>"."Length"."</b>"."</td>";
							echo"<td>"."<b>"."AgentID"."</b>"."</td>";
							echo"<td>"."<b>"."Call ID"."</b>"."</td>";
							echo"<td>"."<b>"."Call Placed Time"."</b>"."</td>";
			
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
												 echo '<td>'.$row['Campaign'] .'</td>';
												 echo '<td>'.$row['PhoneNumber'] .'</td>';
											  	 echo '<td>'.$row['reason'] .'</td>';
											  	 echo '<td>'.$row['finishcode'] .'</td>';
											  	 echo '<td>'. $row['length'] .'</td>';
												 echo '<td>'.$row['agentid'] .'</td>';
												 echo '<td>'.$row['callid'] .'</td>';
												 echo '<td>'.$row['callplacedtime'] .'</td>';
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
