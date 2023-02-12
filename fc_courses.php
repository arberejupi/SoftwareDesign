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
		<div class="hdinfo"><h3>Courses and their schedules</h3></div>
		
		
	</div>
		
		<table class="tab_one">
			<tr>
				<th>Course ID</th>
				<th>Name</th>
				<th>Schedule ID</th>
				<th>Day</th>
				<th>Time</th>
				<th>Room</th>
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
			</tr>
			<?php }?>
			<?php }?>
            
		</table>
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>