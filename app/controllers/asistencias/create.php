<?php include ('../../../app/config.php'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $ci = $_POST['ci']; // Cédula de identidad 
    $time_in = $_POST['time_in']; 
    $time_out = $_POST['time_out']; 
    
    try { 
        
    $pdo->beginTransaction(); // Verificar si la cédula ya existe y obtener el ID de usuario 
    $sentencia = $pdo->prepare('SELECT usuario_id FROM personas WHERE ci = :ci'); 
    $sentencia->bindParam(':ci', $ci); 
    $sentencia->execute(); 
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC); 
    
    if ($resultado) { // La cédula existe, obtenemos el ID de usuario 
    $id_usuario = $resultado['usuario_id']; // Ahora registramos la asistencia 
    $sentencia = $pdo->prepare('INSERT INTO asistencias (tbl_student_id, time_in, time_out) VALUES (:tbl_student_id, :time_in, :time_out)'); 
    $sentencia->bindParam(':tbl_student_id', $id_usuario); // Usar el ID de usuario correspondiente 
    $sentencia->bindParam(':time_in', $time_in); $sentencia->bindParam(':time_out', $time_out); 
   
    if ($sentencia->execute()) { 
    $pdo->commit(); 
    session_start();
     $_SESSION['mensaje'] = "Asistencia registrada con éxito"; 
     $_SESSION['icono'] = "success"; 
     header('Location: ' . APP_URL . "/admin/asistencias"); 
     exit(); 
     } else { 
    throw new Exception("Error al registrar la asistencia"); 
    } 
    } else { // La cédula no existe 
    throw new Exception("La cédula no está registrada en el sistema."); 
    } 
    } catch (Exception $e) { 
        $pdo->rollBack(); 
        session_start(); 
        $_SESSION['mensaje'] = "Error: " . $e->getMessage(); 
        $_SESSION['icono'] = "error"; 
        echo "<script>window.history.back();</script>"; 
        exit(); 
        } 
        } 
        ?>