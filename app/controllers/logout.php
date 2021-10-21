<?php
class Logout extends Controller
{
    function index()
    {
        $user = $this->load_model("user");
        $user->logout();
    }
    function logout_admin()
    {
        $user = $this->load_model("user");
        $user->logout_Admin();
    }

}
