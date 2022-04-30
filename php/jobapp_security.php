<?php 
    include("jobapp_database.php");

    function security_validate() {
        // creating status variable
        $status = false;
        // Validation Booleans
        $validated = [false,false,false,false,false,false];
        // User Input
        $inputs = array("first_name","last_name","phone","email","job");
        // Regex for String Comp
        $regex = array("/^[a-zA-Z0-9]+$/","/^[a-zA-Z0-9]+$/","/\d\d\d-\d\d\d-\d\d\d\d/","/^[a-zA-Z0-9 ]+\@[a-zA-Z0-9 ]+\.[a-zA-Z0-9 ]+$/","/^[a-zA-Z0-9 ]+$/");
        // Comparing user input to regex and recording if true
        for($i = 0; $i < 5; $i++) {
            if(isset($_POST[$inputs[$i]]) && $_POST[$inputs[$i]] != "") {
                if(preg_match($regex[$i], $_POST[$inputs[$i]])) {
                   $validated[$i] = true;
                }  
            }
        }
        //checking if date is set
        if(isset($_POST["date"]) && $_POST["date"] != "") {
            $validated[5] = true;
        } 
        // checking to see if all inputs were true
        for ($i = 0; $i < 6; $i++) {
            if($validated[$i] == true) {
                $status = true;
            } else {
                $status = false;
                break;
            }
        }
        // returning whether function is true or false
        return $status;
    }

    function security_validate_view() {
        $status = false;
        if(isset($_POST["email"]) && $_POST["email"] != "") {
            if (preg_match("/^[a-zA-Z0-9 ]+\@[a-zA-Z0-9 ]+\.[a-zA-Z0-9 ]+$/", $_POST["email"])) {
                $status = true;
            }
        }
        return $status;
    }

    function security_addApp() {
        // validate and sanitize input
        $result = security_sanitize();
        // open connection
        database_connect();
        if (security_validate()) {
            if(!database_verifyApp($result["email"])) {
                database_addApp(
                    $result["first_name"],
                    $result["last_name"],
                    $result["date"],
                    $result["phone"],
                    $result["email"],
                    $result["job"]
                );
                echo("<p>Thank you for submitting an application</p>");
            } else {
                echo("<p>You already have an application on file with us.</p>");
            }
        } else {
            echo("There was an error in your application.");
        }
        database_close();
    }

    function security_ViewApp() {
        $result = security_sanitize_view();
        
        database_connect(); 
        
        if(security_validate_view()) {
            if (database_verifyApp($result)) {
                database_postapp($result);
            } else {
                echo("You don't have an application on file");
            }
        } else {
            echo("You don't have an application on file");
        }

        database_close();
    }

    function security_sanitize() {
        // resets all values
        $result = ["first_name" => null, "last_name" => null, "date" => null,"phone" => null, "email" => null, "job" => null];
        // validates and santizes inputs
        if(security_validate()) {
            $result["first_name"] = htmlspecialchars($_POST["first_name"]);
            $result["last_name"] = htmlspecialchars($_POST["last_name"]);
            $result["date"] = htmlspecialchars($_POST["date"]);
            $result["phone"] = htmlspecialchars($_POST["phone"]);
            $result["email"] = htmlspecialchars($_POST["email"]);
            $result["job"] = htmlspecialchars($_POST["job"]);
        }
        return $result;
    }

    function security_sanitize_view() {
        $result = null;

        if(security_validate_view()) {
            $result = htmlspecialchars($_POST["email"]);
        }
        return $result;
    }
?>