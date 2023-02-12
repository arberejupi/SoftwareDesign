<?php
session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$sid = $_SESSION['sid'];
	$sname = $_SESSION['sname'];
	if(!$user->getsession()){
		header('Location: st_login.php');
		exit();
	}
?>	
<?php 
$pageTitle = "Student Profile";
include "php/headertop.php";
?>

	
</div>
		
		<table class="tab_one">
			<tr>
				<th>Course ID</th>
				<th>Name</th>
				<th>Schedule ID</th>
				<th>Day</th>
				<th>Time</th>
				<th>Room</th>
				<th>Enroll</th>
			</tr>
			<?php 
			
				$alluser = $user->get_fc_courses();
				
				while($rows = $alluser->fetch_assoc()){
                $a=$rows['schedules'];
                
                
			?>
			<tr>
				<td><?php echo $rows['course_id']; ?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['schedules'];?></td>
                <?php 
                $allschedules=$user->get_schedules_by_course_id($a);
                while($rows = $allschedules->fetch_assoc()){
				
                
                
			?>
				<td><?php echo $rows['day'];?></td>
				<td><?php echo $rows['time'];?></td>
                <td><?php echo $rows['room'];?></td>

				<td><button>Enroll</button></td>
			</tr>
			<?php }?>
			<?php }?>
            
		</table>
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>