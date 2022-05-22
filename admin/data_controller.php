<?php
class DataController
{
    public function getdeptcode()
    {
        $conn = mysqli_connect("localhost", "root", "", "srms");
        if ($conn === false) {
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        $data            =           array();
        $sql             =           "SELECT * FROM class_srms";
        $result          =           $conn->query($sql);
        if ($result->num_rows > 0) {
            $data        =           mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $data;
    }
    public function semListing($SemesterId)
    {
        $conn = mysqli_connect("localhost", "root", "", "srms");
        if ($conn === false) {
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        $data           =            array();
        $sql            =            "SELECT * FROM sem_srms WHERE class_id = '$SemesterId'";
        $result         =            $conn->query($sql);
        if ($result->num_rows > 0) {
            $data       =            mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $data;
    }
    public function studentListing($SemesterId)
    {
        $conn = mysqli_connect("localhost", "root", "", "srms");
        if ($conn === false) {
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        $data           =            array();
        $sql            =            "SELECT * FROM student_srms WHERE sem_id = '$SemesterId'";
        $result         =            $conn->query($sql);
        if ($result->num_rows > 0) {
            $data       =            mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $data;
    }
}
