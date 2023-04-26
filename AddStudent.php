<html>
    <body>
        <h1>Enter Student Information.</h1>
        
        <form action="AddStudent.php" method="post">
            Student Name: <input type="text" name="name"><br>
            Student ID: <input type="text" name="student_id"><br>
            Major: <input type="text" name="major"><br>
            <input name="submit" type="submit" >
        </form>
    <body>
<html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $name = escapeshellarg($_POST[name]);
    $student_id = escapeshellarg($_POST[student_id]);
    $major = escapeshellarg($_POST[major]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar AddStudent ' . $name . ' ' . $student_id . ' ' . $major;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run jdbc_insert_item.exe
    system($escaped_command);           
}
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            