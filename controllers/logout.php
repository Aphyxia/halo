<?php

class logout extends Controller
{
    public $requires_auth = false;

    function index()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
        exit();
    }
} 