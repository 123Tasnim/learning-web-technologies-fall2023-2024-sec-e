<?php
    require_once("db.php");

    function login($user, $pass){
        $conn = getConnection();
        $sql = "SELECT * FROM login WHERE user ='$user' AND pass = '$pass';";
        $res = mysqli_query($conn, $sql);
        return array(mysqli_fetch_assoc($res), mysqli_num_rows($res));
    }

    function get_complaint_history_table($user){
        $conn = getConnection();
        $sql = "select * from cmplist where user='$user' order by date desc";
        $res = mysqli_fetch_all(mysqli_query($conn, $sql),MYSQLI_ASSOC);
        return $res;
    }

    function get_complaint_history_row($comno){
        $conn = getConnection();
        $sql = "select * from cmplist where comno='$comno'";
        $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        return $res;
    }

    function delete_complaint_history_row($comno){
        $conn = getConnection();
        $sql = "delete from cmplist where comno='$comno'";
        mysqli_query($conn, $sql);
    }

    function update_complaint_history_row($comno, $category, $subcat, $complaintype, $state, $noc, $complaintdetials){
        $conn = getConnection();
        $sql = "UPDATE cmplist SET category='$category',subcat='$subcat',complaintype='$complaintype',state='$state',noc ='$noc',complaintdetials='$complaintdetials' WHERE comno='$comno'";
        mysqli_query($conn, $sql);
    }

    function update_complaint_history_status($comno,$status){
        $conn = getConnection();
        $sql = "UPDATE `cmplist` SET `status`='$status' WHERE comno='$comno'";
        mysqli_query($conn, $sql);
    }

    function insert_complaint_history_row($user, $category, $subcat, $complaintype, $state, $noc, $complaintdetials, $compfile){
        $conn = getConnection();
        $sql = "insert into cmplist (category,subcat,complaintype,state,noc,complaintdetials,compfile,user) VALUES ('$category','$subcat','$complaintype','$state','$noc','$complaintdetials','','$user');";
        mysqli_query($conn, $sql);
    }

    function get_notification_table($user){
        $conn = getConnection();
        $sql = "SELECT * FROM notifications WHERE user = '$user' ORDER BY status, timestamp DESC";
        $res = mysqli_fetch_all(mysqli_query($conn, $sql),MYSQLI_ASSOC);
        return $res;
    }

    function update_notification_table($user){
        $conn = getConnection();
        $sql = "UPDATE notifications SET status = 'read' WHERE user = '$user'";
        mysqli_query($conn, $sql);
    }

    function insert_notification_status($user, $message){
        $conn = getConnection();
        $sql = "INSERT INTO notifications (user, message) VALUES ('$user', '$message')";//for notification when view 
        mysqli_query($conn, $sql);
    }

    function get_complaint_details_table(){
        $conn = getConnection();
        $sql = "select * from cmplist order by date desc";
        $res = mysqli_fetch_all(mysqli_query($conn, $sql),MYSQLI_ASSOC);
        return $res;
    }


    class UserModel {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getUser($user, $pass) {
            $sql = "SELECT * FROM login WHERE user ='$user' AND pass = '$pass';";
            $res = mysqli_query($this->conn, $sql);
            return mysqli_fetch_assoc($res);
        }
    }
?>
