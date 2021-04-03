<?php
include('db.php');
if(isset($_GET['subj_id'])){
	$id = $_GET['subj_id'];
	$sql = $db->query("delete from stu_subjects where id='$id'") or die(mysqli_error());
	header("location:ad-view-subjects.php?del=del");	
}

if(isset($_GET['fac_id'])){
	$id = $_GET['fac_id'];
	$sql = $db->query("delete from faculty_register where id='$id'") or die(mysqli_error());
	header("location:view-faculty.php?del=del");	
}

if(isset($_GET['stu_id'])){
	$id = $_GET['stu_id'];
	$sql = $db->query("delete from student_register where id='$id'") or die(mysqli_error());
	header("location:view-students.php?del=del");	
}

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = $db->query("delete from alumni_reg where id='$id'") or die(mysqli_error());
	header("location:view-alumni.php?del=del");
}

if(isset($_GET['ref_books_id'])){
	$id = $_GET['ref_books_id'];
	$sql = $db->query("delete from books where id='$id'") or die(mysqli_error());
	header("location:ad-view-ref-books.php?del=del");	
}

if(isset($_GET['exam_id'])){
	$id = $_GET['exam_id'];
	$sql = $db->query("delete from exams where id='$id'") or die(mysqli_error());
	header("location:view-faculty-exam.php?del=del");	
}

if(isset($_GET['queries_id'])){
	$id = $_GET['queries_id'];
	$sql = $db->query("delete from queries where id='$id'") or die(mysqli_error());
	header("location:view-queries-complaints.php?del=del");	
}

if(isset($_GET['que_id'])){
	$id = $_GET['que_id'];
	$sql = $db->query("delete from questions where id='$id'") or die(mysqli_error());
	header("location:view-faculty-questions.php?del=del");	
}

?>