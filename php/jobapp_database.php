<?php 
    $connection = null;

    function database_connect() {
        // Global Connection
        global $connection;
        // Server
        $server = "localhost";
        // username
        $username = "root";
        // password
        $password = "";
        // Database
        $database = "job_app_mock_up";

        if($connection == null) {
            $connection = mysqli_connect($server, $username, $password, $database);
        }
    }

    function database_addApp($first_name, $last_name, $date, $phone, $email, $job) {
        global $connection;

        if ($connection != null) {
            mysqli_query($connection, "INSERT INTO jobapp (first_name, last_name, date, phone, email, job) VALUES ('{$first_name}','{$last_name}','{$date}','{$phone}','{$email}','{$job}');");
        }
    }

    function database_verifyApp($email) {
        // connects to database
        global $connection;
        // sets status to false
        $status = false;
        // tries to see if the email is in the database already or not
        if($connection != null) {
            $results = mysqli_query($connection, "SELECT id FROM jobapp WHERE email = '{$email}';");
            // will return data or null
            $row = mysqli_fetch_assoc($results);
            if ($row != null) {
                // if row is not null, status returns true 
                $status = true;
            }
        }
        
        return $status;
    }

    function database_postapp($email) {
        global $connection;

        if ($connection != null) {
            $results = mysqli_query($connection, "SELECT * FROM jobapp WHERE email = '{$email}';");
            $row = mysqli_fetch_array($results);
            echo("
                <p>Name: {$row['first_name']} {$row['last_name']}</p>
                <p>Date Applied: {$row['date']}</p>
                <p>Phone Number: {$row['phone']}</p>
                <p>Email: {$row['email']}</p>
                <p>Job Applied for: {$row['job']}</p>
            ");
        }
    }
    //https://www.php.net/manual/en/mysqli-result.fetch-array.php --- used this to learn how to insert items from the database back into the page
    function database_close() {
        global $connection;

        if($connection != null) {
            mysqli_close($connection);
        }
    }
?>