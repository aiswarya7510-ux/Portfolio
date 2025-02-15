
<?php 
    $nameErr=$emailErr="";
    $name=$email=$subject=$message="";
    $isvalid=1;

    if($_SERVER ["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["name"])){
            $nameErr ="Name is Required";
            $isvalid=0; 
        }else{
            $name=test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
                $isvalid=0;
            }
        }

        if (empty($_POST["email"])){
            $emailErr="email is required";
            $isvalid=0;
        }else{
            $email =test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $isvalid=0;
            }
        }
        
        if (empty($_POST["subject"])) {
            $subject = "";
        } else {
            $subject = test_input($_POST["subject"]);
        } 
        if (empty($_POST["message"])) {
            $message = "";
        } else {
            $message = test_input($_POST["message"]);
        } 
        // After successful insert, redirect to the thankyou page
        header("Location: thank-you.html");
        exit(); // Make sure to call exit to stop further code execution
        
    
    }
        
    
//     if($isvalid){

//         $host="localhost";
//         $user="root";
//         $pass="";
//         $database="portfolio";

//         $connection = mysqli_connect($host,$user,$pass,$database);
        
//         // if($connection){
//         //     echo " Database successfully connected<br><br>";
//         // }else{
//         //     die("could not connect");
//         // }
       
//        if ($_SERVER["REQUEST_METHOD"] == "POST"){
//         $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
//         if (mysqli_query($connection, $sql)) {
//             // After successful insert, redirect to the thankyou page
//             header("Location: thank-you.html");
//             exit(); // Make sure to call exit to stop further code execution
//         } else {
//             echo "Error: " . mysqli_error($connection);
//         }

//         mysqli_close($connection);
   

        
//     }
// }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
        ?>

        
