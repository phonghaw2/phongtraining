<?php
class AdminModel extends DB{
    
    protected $_table = 'user';
    
    public function create($fullname, $email, $password ,$role){

        $sql = "SELECT count(*) from user where email = '$email'";
        $result = mysqli_query($this->con,$sql);
        $number_rows = mysqli_fetch_array($result)['count(*)'];

        if($number_rows == 1) {
            session_start();
            $_SESSION['error'] = 'Email already used';
            header('location:'. $_SERVER['HTTP_REFERER']);
            exit;
        }
        $sql = "INSERT INTO user (fullname,email,password,role)
                VALUES  ('$fullname','$email','$password','$role')";
        mysqli_query($this->con,$sql);

        header('location:login');
        mysqli_close($this->con);

    }

    public function loginProcess($email, $password){ 
        $sql = "SELECT * from user 
                where email = '$email' and password = '$password'";
        $result = mysqli_query($this->con,$sql);
        $number_rows = mysqli_num_rows($result);

        if($number_rows == 1) {
            session_start();
            $each = mysqli_fetch_array($result);

            $id = $each['id'];
            $_SESSION['fullname'] = $each['fullname'];
            $_SESSION['id'] = $id;

            // Token & set cookie
            $token = uniqid('user_', true) . time();
            $sql = "UPDATE user
                    SET
                    token = '$token' where id = '$id'";
            mysqli_query($this->con,$sql);

            setcookie('remember', $token, time() + 86400*30, '/');
            header("location:../Admin/dashboard");
            exit;

        } else {

            session_start();
            $_SESSION['error'] = 'Login False';
            header('location:login?error=Login False');

        };
    }


    public function getUser(){
        
        $qr = "SELECT * FROM user";
        $result = mysqli_query($this->con, $qr);

        return $result;
    }

    public function export(){
        $filename = "members_" . date('Y-m-d') . ".csv"; 
        $delimiter = ","; 
        
        // Create a file pointer 
        $f = fopen('php://memory', 'w'); 
        
        // Set column headers 
        $fields = array('ID', 'Name', 'Email', 'Role'); 
        fputcsv($f, $fields, $delimiter); 
        
        // Get records from the database 

        $qr = "SELECT * FROM user ORDER BY id DESC";
        $result = mysqli_query($this->con, $qr);
        if($result->num_rows > 0){ 
            // Output each row of the data, format line as csv and write to file pointer 
            while($row = $result->fetch_assoc()){ 
                $lineData = array($row['id'], $row['fullname'], $row['email'], $row['role']); 
                fputcsv($f, $lineData, $delimiter); 
            } 
        } 
        
        // Move back to beginning of file 
        fseek($f, 0); 
        
        // Set headers to download file rather than displayed 
        header('Content-Type: text/csv'); 
        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
        
        // Output all remaining data on a file pointer 
        fpassthru($f); 
        
        // Exit from file 
        exit();

    }

    public function importData(){
        
    
        if(isset($_POST['importSubmit'])){
    
            // Allowed mime types
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain' ,'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel');
            
            // Validate whether selected file is a CSV file
            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
                
                // If the file is uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    
                    // Open uploaded CSV file with read-only mode
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    
                    // Skip the first line
                    fgetcsv($csvFile);
                    
                    // Parse data from CSV file line by line
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        // Get row data
                        $name   = $line[0];
                        $email  = $line[1];
                        $role  = $line[2];
                        
                        // Check whether member already exists in the database with the same email
                        $prevQuery = "SELECT id FROM members WHERE email = '".$line[1]."'";
                        $prevResult = mysqli_query($this->con, $prevQuery);
                        
                        if($prevResult->num_rows > 0){
                            $qr = "UPDATE user SET fullname = '".$name."', role = '".$role."' WHERE email = '".$email."'";
                            mysqli_query($this->con, $qr);
                        
                        }else{
                            // Insert member data in the database
                            $query = "INSERT INTO user (fullname, email, role) VALUES ('".$name."', '".$email."', '".$role."')";
                            mysqli_query($this->con, $query);
                        }
                    }
                    
                    // Close opened CSV file
                    fclose($csvFile);
                    session_start();
                    $_SESSION['importSuccess'] = 'Success!';
                }else{
                    session_start();
                    $_SESSION['importError'] = 'Error!';
                }
            }else{
                session_start();
                $_SESSION['invalid'] = 'Invalid!';
            }
        }
        
        // Redirect to the listing page
        header('location:'. $_SERVER['HTTP_REFERER']);
        exit;
        
    }

}
?>