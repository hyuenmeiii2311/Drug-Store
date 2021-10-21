<?php
class Logout extends Controller
{
    function index()
    {
        $user = $this->load_model("user");
        $user->logout();
    }
}
