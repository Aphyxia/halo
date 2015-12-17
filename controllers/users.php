<?php

class users extends Controller
{
    public $requires_auth = true;

    function index()
    {
        $this->users = get_all("SELECT * FROM user WHERE deleted=0");

    }

    function view()
    {
        $user_id = $this->params[0];
        if (empty($user_id))
            error_out('Check user ID in address bar');
        $this->user = get_first("SELECT * FROM user WHERE user_id = '$user_id'");

    }

    function edit()
    {
        $user_id = $this->params[0];
        $this->user = get_first("SELECT * FROM user WHERE user_id = '$user_id'");
    }

    function POST_index()
    {
        $data = $_POST['data'];

        $data['active'] = isset($data['active']) ? 1 : 0;
        $user_id = insert('user', $data);
        header('Location: ' . BASE_URL . 'users/view/' . $user_id);
    }

    function POST_edit()
    {
        $data = $_POST['data'];
        $data['user_id'] = $this->params[0];
        $data['active'] = isset($data['active']) ? 1 : 0;
        insert('user', $data);
        header('Location: ' . BASE_URL . 'users/view/' . $this->params[0]);
    }

    function POST_delete()
    {
        $user_id = $_POST['user_id'];
        update('user', ['deleted' => '1'], "user_id = '$user_id'");
        exit("1");
    }


} 