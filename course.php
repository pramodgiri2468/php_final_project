<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Form</title>
</head>
<body>
    <h2>Enrollment Form</h2>
    <form method="post" action="course.php">
        <label for="student_email">Your Email:</label><br>
        <input type="email" id="student_email" name="student_email" required><br><br>
        
        <label for="course_name">Course Name:</label><br>
        <input type="text" id="course_name" name="course_name" required><br><br>
        
        <label for="teacher_email">Teacher's Email:</label><br>
        <input type="email" id="teacher_email" name="teacher_email" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    // Assuming you've already established a database connection

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $student_email = $_POST['student_email'];
        $course_name = $_POST['course_name'];
        $teacher_email = $_POST['teacher_email'];
        
        // Query the database for student information
        $student_query = "SELECT * FROM users WHERE email = '$student_email'";
        $student_result = mysqli_query($connection, $student_query);
        
        if ($student_result && mysqli_num_rows($student_result) > 0) {
            $student_row = mysqli_fetch_assoc($student_result);
            $student_id = $student_row['id'];
            $is_student = !$student_row['is_teacher']; // Assuming 'is_teacher' is a boolean field
            
            // Query the database for teacher information
            $teacher_query = "SELECT * FROM users WHERE email = '$teacher_email'";
            $teacher_result = mysqli_query($connection, $teacher_query);
            
            if ($teacher_result && mysqli_num_rows($teacher_result) > 0) {
                $teacher_row = mysqli_fetch_assoc($teacher_result);
                $teacher_id = $teacher_row['id'];
                $is_teacher = $teacher_row['is_teacher']; // Assuming 'is_teacher' is a boolean field
                
                // Output enrollment information
                echo "<h2>Enrollment Information</h2>";
                echo "Student ID: " . $student_id . "<br>";
                echo "Course Name: " . $course_name . "<br>";
                echo "Teacher ID: " . $teacher_id . "<br>";
                
                // You can also check if the user is a teacher or not
                echo "Is Student: " . ($is_student ? "Yes" : "No") . "<br>";
                echo "Is Teacher: " . ($is_teacher ? "Yes" : "No");
            } else {
                echo "Teacher not found.";
            }
        } else {
            echo "Student not found.";
        }
    }
    ?>
</body>
</html>
