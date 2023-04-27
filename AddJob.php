<html>
    <style>
    body {
        background-color: beige;
        }
    </style>
    <body>
        <h1>Enter Job Information.</h1>
        
        <form action="AddJob.php" method="post">
            Company Name: <input type="text" name="CompanyName"><br>
            Job Title: <input type="text" name="JobTitle"><br>
            Salary: <input type="text" name="Salary"><br>
            Desired Major: <input type="text" name="major"><br>
            <input name="submit" type="submit" >
        </form>
    <body>
<html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $CompanyName = escapeshellarg($_POST[CompanyName]);
    $JobTitle = escapeshellarg($_POST[JobTitle]);
    $Salary = escapeshellarg($_POST[Salary]);
    $major = escapeshellarg($_POST[major]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar AddJob ' . $CompanyName . ' ' . $JobTitle . ' ' . $Salary . ' ' . $major;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run jdbc_insert_item.exe
    system($escaped_command);           
}
?>