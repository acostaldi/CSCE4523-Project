<html>
    <style>
        body {
            background-color: beige;
        }
    
        form { display: inline; }
    </style>
    <body>
        <h2>All Applications&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;Applications by Major
            &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Applications by Job ID
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;Applications by Student ID</h2>
            &emsp;&emsp;
        <form action="SearchApplications.php" method="post">
            <input name="all" type="submit">
    </form>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <form action="SearchApplications.php" method="post">
        Major: 

            <input list="majors" name="major">
            <datalist id="majors"></datalist>
            <input name="submit" type="submit" >
        </form>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <form action="SearchApplications.php" method="post">
        Job ID: 
            <input type="text" name="job_id">
            <input name="job" type="submit" >
    </form>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <form action="SearchApplications.php" method="post">
        Student ID:
            <input type="text" name="student_id">
            <input name="student" type="submit" >
    </form>
    <body>
<html>

<script>
    // Fetch the list of all majors from a JSON file
    fetch('majors.json')
        .then(response => response.json())
        .then(majors => {
        const datalist = document.getElementById('majors');
                // Add each major as an option to the datalist
                majors.forEach(major => {
                const option = document.createElement('option');
                option.value = major;
                datalist.appendChild(option);
                });
            })
        .catch(error => console.error(error));
</script>

<?php
if (isset($_POST['all'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $flag = "-a";

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar SearchApplications ' . $flag;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run jdbc_insert_item.exe
    system($escaped_command);           
}
else if (isset($_POST['major'])){
    $major = escapeshellarg($_POST[major]);
    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar SearchApplications ' . $major;
    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run jdbc_insert_item.exe
    system($escaped_command);    
}

else if (isset($_POST['student'])){
    $student_id = escapeshellarg($_POST[student_id]);
    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar SearchApplications ' . $student;
    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run jdbc_insert_item.exe
    system($escaped_command); 
}
else if (isset($_POST['job'])){
    $job_id = escapeshellarg($_POST[job_id]);
    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar SearchApplications ' . $job_id;
    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run jdbc_insert_item.exe
    system($escaped_command); 
}
?>
