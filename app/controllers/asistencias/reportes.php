<?php
$sql_asistencias = "SELECT * FROM tbl_attendance as attendance INNER JOIN tbl_student as student ON attendance.tbl_student_id = student.tbl_student_id ORDER BY attendance.tbl_attendance_id DESC";
$query_asistencias= $pdo->prepare($sql_asistencias);
$query_asistencias->execute();
$asistencias = $query_asistencias->fetchAll(PDO::FETCH_ASSOC);

?>