<?php

spl_autoload_register(function ($class) {
    $b = '.' . DIRECTORY_SEPARATOR;
    $classes_dir = [$b . 'models', $b . 'controllers'];
    foreach ($classes_dir as $dir) {
        $path = $dir . DIRECTORY_SEPARATOR . $class . '.php';
        if (is_file($path)) {
            require_once($path);
            break;
        }
    }
});
function view($view, $ar){
    ob_start();
    extract($ar);
    require_once $view;
    return ob_get_clean();
}
DB::connect("127.0.0.1", "root", "", "test");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $users = UserModel::findAll();
        $view_users = view("view/users.php", ["users"=>$users]);
        $view_body = view("view/main.php", ["body"=>$view_users]);
        echo view("view/layout.php", [
            "title"=>"users_page",
            "body"=>$view_body
        ]);
        break;
    case 'POST':
        switch ($_POST['action']){
            case 'new_user':
                $user = new UserModel([
                    "fName"=>$_POST['fName'],
                    "lName"=>$_POST['lName'],
                    "age"=>$_POST['age'],
                ]);
                $save = $user->save();
                if ($save){
                    echo json_encode([
                        'done'=> true,
                        'data'=> [
                            'id'=>$save,
                            "fName"=>$user->fName,
                            "lName"=>$user->lName,
                            "age"=>$user->age,
                        ]
                    ]);
                } else {
                    echo json_encode([
                        'done'=> false,
                        'error'=>"something bad"
                    ]);
                }
                break;
            case 'delete_user':
                $user = UserModel::findByPk($_POST['user_id']);
                if($user){
                    $user->delete();
                    echo json_encode([
                        'done'=> true,
                        'data'=> []
                    ]);
                } else {
                    echo json_encode([
                        'done'=> false,
                        'error'=>"something bad 1"
                    ]);
                }
        }
        break;
}
?>
