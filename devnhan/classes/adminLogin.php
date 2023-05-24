<?php
class adminLogin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->fm = new Format();
        $this->db = new Database();
    }

    public function login_admin($user, $pass)
    {
        $user = $this->fm->validation($user);
        $pass = $this->fm->validation($pass);
        $query = "SELECT * FROM tbl_admin where adminUser = ? and adminPass = ? limit 1";
        $result = $this->db->testPassAdmin($query, $user, $pass);
        if ($result) {
            Session::set('adminlogin', true);
            foreach ($result as $item) {
                Session::set('Id',  $item['adminId']);
                Session::set('Name', $item['adminName']);
                Session::set('User', $item['adminUser']);
            }
            return true;
        } else return false;
    }
}
