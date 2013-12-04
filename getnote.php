<?php
// create connection
$con = mysqli_connect("localhost", "admin", "admin", "2nd_classroom_db");

//check connection
if(mysqli_connect_errno($con)) {
	//echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {

	//get username and initialize a new empty array to return
	$id = $_GET["note_id"];

	//grab the courses that $username is taking
	$content = mysqli_query($con, "SELECT COURSES.course_name, NOTES.title, NOTES.time, NOTES.note FROM NOTES, COURSES WHERE NOTES.note_id = '$id' and NOTES.course_id = COURSES.course_id");


	if(!$content) {
			echo "bad query";
		} else if(mysqli_num_rows($content) > 0) {

			$result = mysqli_fetch_array($content);
			$arr = array('course_name' =>$result["course_name"],
						 'title' => $result["title"], 
						 'time' => $result["time"], 
						 'note' => $result["note"]
						 );


			//encode the array in javascript format
			echo json_encode($arr);
		}
}

?>
