<html>
    <style>
    body {
        background-color: beige;
        }
    </style>
    <body>
        <h1>Enter Application Information.</h1>
        
        <form action="AddApplication.php" method="post">
            Student Name: <input type="text" name="name"><br>
            JobId: <input type="text" name="JobId"><br>
            <input name="submit" type="submit" >
        </form>
        <?php
            $command2 = 'java -cp .:mysql-connector-java-5.1.40-bin.jar PrintJobs ';
            system($command2);
        ?>
    <body>
<html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $name = escapeshellarg($_POST[name]);
    $JobId = escapeshellarg($_POST[JobId]);

    $command2 = 'java -cp .:mysql-connector-java-5.1.40-bin.jar AddApplication ' . $name . ' ' . $JobId;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command2);
    echo "<p>command: $command2 <p>"; 
    // run jdbc_insert_item.exe
    system($escaped_command);           
}
?>