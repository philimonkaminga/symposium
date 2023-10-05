<?php

class db
{
    private $db_server = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "national_symposium";

    private $conn = null;

function __construct()
{
    $this->conn = $this->connect();
}

    function connect()
    {

        $conn = mysqli_connect($this->db_server, $this->db_user, $this->db_pass, $this->db_name);

        if ($conn) {

           // echo "You are connected!";
        } else {
            //echo "Could not connect!";
            return true;
        }

       // $this->conn = $conn;
        //mysqli_close($conn);

        return $conn;
    }

    function insertUser($query,$registration_id,$file)
    {
        

        $result = mysqli_query($this->conn, $query);
        $last_id = $this->conn->insert_id;

        $type_result = mysqli_query($this->conn,"SELECT * FROM registration_type WHERE id = '$registration_id'");          //query
        $array = mysqli_fetch_row($type_result);                          //fetch result    
      
        $reg_type = strtolower($array[0]);

            $array["id"] = $last_id;
            $array["type"] = $reg_type;
            return $array;

        


    }
    function insertStudent($query)
    {
       
        $result = mysqli_query($this->conn, $query);
        echo json_encode($result);

    }
    function getUsers($query){

        $result = mysqli_query($this->conn, $query);          //query
        $array = mysqli_fetch_all($result);                   //fetch result    

        //--------------------------------------------------------------------------
        // 3) echo result as json 
        //--------------------------------------------------------------------------
        
        echo json_encode($array);
    }

    function getRegTypes($query){

        $result = mysqli_query($this->conn, $query);          //query
        $array = mysqli_fetch_all($result);                   //fetch result    

        //--------------------------------------------------------------------------
        // 3) echo result as json 
        //--------------------------------------------------------------------------
        
        echo json_encode($array);
}
}

?>