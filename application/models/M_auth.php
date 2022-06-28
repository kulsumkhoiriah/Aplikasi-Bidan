<?php
class M_auth extends CI_Model
{
    public function cekadmin($username, $password)
    {
        $query = $this->db->query("SELECT * FROM admin WHERE username = '$username' AND password = MD5('$password')");
        return $query;
    }
}
