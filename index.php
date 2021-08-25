<?php

spl_autoload_register(function ($class) {
    $b = '.' . DIRECTORY_SEPARATOR;
    $classes_dir = [$b . 'models', $b . 'controllers'];
    foreach($classes_dir as $dir) {
        $path = $dir . DIRECTORY_SEPARATOR . $class . '.php';
        if(is_file($path)) {
            require_once($path);
            break;
        }
    }
});

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <!--    <link href="assets/css/a" rel="stylesheet">-->
</head>

<body class="fon">

<div class="sticky">
    <ul class="nav">
        <li><a href="inddex.html">Home</a></li>
        <li><a href="#">Setings</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">New</a></li>
    </ul>
</div>

<div id="contentPos">

    <h1 class="center" title="About wtf is this.">CSS begin</h1>
    <div id="link">
        <a href="https://www.go.com/">Apasa aici pentru a cunoaste lumea durerii.</a><br/>
        <a href="https://www.facebook.com">Apasa aici pentru a cunoaste lumea placerii.</a>
    </div>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
        in culpa qui officia deserunt mollit anim id est laborum.
    </p> <br/>

    <div class="responsive">
        <div class="boxForm">
            <span style="background-color: #3c763d; padding: 6px; font-size: 20px; margin-bottom: 20px; border-radius: 5px; cursor: pointer"> Hover here for visualize \/ </span><br/>

            <form action="controllers/IndexController.php" method="post" class="form">
                <div style="color: black; font-size: 2em">
                    Introduceti un User in db:
                </div>
                Numele: <br/> <input type="text" name="fName"><br/>
                Prenumele:<br/> <input type="text" name="lName"><br/>
                Varsta:<br/> <input type="number" name="age"><br/>
                <input title="asdf" type="submit">
            </form>
        </div>

    </div>
    <div class="responsive">
        <div id="tableResp">
            <table>
                <th colspan="5" style="text-align: center">Users</th>
                <tr>
                    <td>Id</td>
                    <td>Numele</td>
                    <td>Prenumele</td>
                    <td>Varsta</td>
                    <td></td>
                </tr>
                <?php
                         require_once 'models/DataBase.php';
                         $obj = new DataBase();
                         $users= $obj->getAllUser();
                foreach($users as $id => $user):
                ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $user['fName'] ?></td>
                    <td><?= $user['lName'] ?></td>
                    <td><?= $user['age'] ?></td>
                    <td>
                        <form action="controllers/IndexController.php" method="get">
                            <button name="id" value="<?= $id ?>">Delete</button>
                        </form>
                    </td>
                </tr>

                <?php endforeach; ?>

            </table>
        </div>
    </div>

    <div class="clearfix"></div>

    <p>Lorem ipsum</p>
    <div class="clearfix">
        <div class="box">
            Lorem Ipsum.
        </div>
        <div class="box">
            Lorem Ipsum.
        </div>
        <div class="box">
            Lorem Ipsum.
        </div>
    </div>
</div>
</body>

<footer>
    <br/><br/><br/>
</footer>

</html>