<?php
session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$fid = $_SESSION['f_id'];
	$funame = $_SESSION['f_uname'];
	$fname = $_SESSION['f_name'];
	if(!$user->get_faculty_session()){
		header('Location: facultylogin.php');
		exit();
	}
?>	
<?php 
$pageTitle = "My courses";
include "php/headertop.php";
?>


<div class="all_student">
	<div class="search_st">
		<div class="hdinfo"><h3>Schedules</h3></div>
		
		
	</div>
		<?php
			if(isset($_REQUEST['res'])){
				if($_REQUEST['res']==1){
					echo "<h3 style='color:green;text-align:center;margin:0;padding:10px;'>Data deleted successfully</h3>";
				}
			}
			
		?>
		<table class="tab_one">
			<tr>
				<th>Schedule ID</th>
				<th>Day</th>
				<th>Time</th>
				<th>Room</th>
				
			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_schedules();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
                
			?>
			<tr>
				<td><?php echo $rows['schedule_id']; ?></td>
				<td><?php echo $rows['day'];?></td>
				<td><?php echo $rows['time'];?></td>
                <td><?php echo $rows['room'];?></td>
			</tr>
			<?php }?>
            
		</table>
</div>
<?php include "php/footerbottom.php";?>