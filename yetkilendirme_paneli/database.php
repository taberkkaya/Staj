<?php 
    $database_name = "kullanici";
    $username = "root";
    $password = "";
    $table_name = "employee";

    function connection(){
        $conn = new PDO("mysql:host=localhost;dbname={$GLOBALS['database_name']};",$GLOBALS['username'],$GLOBALS['password']);
        
        return $conn;
    }

    function search_employee(int $employee_no){
        $conn = connection($GLOBALS['database_name'],$GLOBALS['username'],$GLOBALS['password']);
        $query = $conn->query("SELECT * FROM {$GLOBALS['table_name']} WHERE employee_no = {$employee_no}")->fetch(PDO::FETCH_ASSOC);
        if($query){
            $exist = true;
        }
        else $exist = false;

        return $exist;
    }

    function for_access(int $employee_no){
        $conn = connection($GLOBALS['database_name'],$GLOBALS['username'],$GLOBALS['password']);
        $query = $conn->query("SELECT permission FROM {$GLOBALS['table_name']} WHERE employee_no = {$employee_no}")->fetch(PDO::FETCH_ASSOC);
        
        if($query['permission']==1) $access = true; 
        else $access = false;

        return $access;
    }

    function update(string $request_no){
        $conn = connection($GLOBALS['database_name'],$GLOBALS['username'],$GLOBALS['password']);    
        $update = $conn->query("UPDATE employee SET permission = 1 WHERE employee_no = {$request_no}"); 
        
        if($update){
            return true;
        }
        else return false;
    }
?>