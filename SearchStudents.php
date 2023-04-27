<html>
    <body>
        <h1>Enter Student Major.</h1>
        
        <form action="SearchStudents.php" method="post">
            Major: 
            <input list="majors" name="major">
            <datalist id="majors"></datalist>
            <input name="submit" type="submit" >
        </form>

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

    <body>
<html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $major = escapeshellarg($_POST[major]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar SearchStudents ' . $major;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run jdbc_insert_item.exe
    system($escaped_command);           
}
?>
