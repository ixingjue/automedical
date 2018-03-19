<?php
/**
 * Created by PhpStorm.
 * User: tete
 * Date: 2017/2/12
 * Time: 13:44
 */
require_once '../include.php';
checkLogined();
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];
$rid=$_REQUEST['rid'];
$uid=$_REQUEST['uid'];
$mid=$_REQUEST['mid'];
if ($act == "logout") {
    logout();
} elseif ($act == "addAdmin") {
    $mes = addAdmin();
} elseif ($act == "editAdmin") {
    $mes = editAdmin($id);
} elseif ($act == "delAdmin") {
    $mes = delAdmin($id);
} elseif ($act == "addCate") {
    $mes = addCate();
} elseif ($act == "editCate") {
    $mes = editCate($id);
} elseif ($act == "delCate") {
    $mes = delCate($id);
} elseif ($act == "addPro") {
    $mes = addPro();
} elseif ($act == "editPro") {
    $mes = editPro($id);
} elseif ($act == "delPro") {
    $mes = delPro($id);
} elseif ($act == "addUser") {
    $mes = addUser();
} elseif ($act == "delUser") {
    $mes = delUser($uid);
} elseif ($act == "editUser") {
    $mes = editUser($uid);
} elseif ($act == "delReply") {
    $mes = delReply($rid);
}
elseif ($act == "delMessage") {
    $mes = delMessage($mid);
}
elseif ($act == "actAdmin") {
    $mes = actAdmin($id);
}
elseif ($act == "fobUser") {
    $mes = fobUser($uid);
}elseif ($act == "actUser") {
    $mes = actUser($uid);
}
elseif ($act == "addUsernotice") {
    $mes = addUsernotice();
}
elseif ($act == "addAdminnotice") {
    $mes = addAdminnotice();
}
elseif ($act == "delGonggao") {
    $mes = delGonggao($id);
}
elseif($act=="readGonggao") {
    $mes = readGonggao($id);
}
elseif($act=="editrecipelist") {
    $mes = editrecipelist($did,$rid);
}
elseif($act=="editYuzhi"){
    $mes = editYuzhi();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
<?php
if ($mes) {
    echo $mes;
}
?>
</body>
</html>