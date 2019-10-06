<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

function loadRegistration($filename)
{
    $jsondata = file_get_contents($filename);
    $arr_data = json_decode($jsondata, true);
    return $arr_data;
}

function saveDataJSON($filename, $name, $email, $phone)
{
    try {
        $contact = [
            "name" => $name,
            "email" => $email,
            "phone" => $phone
        ];
        $arr_data = loadRegistration($filename);
        array_push($arr_data, $contact);
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        file_put_contents($arr_data, $jsondata);
        echo "Lưu dữ liệu thành công!";
    } catch (Exception $e) {
        echo "Lỗi: ", $e->getMessage(), "\n";
    }
}

$nameErr = null;
$emailErr = null;
$phoneErr = null;
$name = null;
$email = null;
$phone = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $has_error = false;

    if (empty($name)) {
        $nameErr = "Tên đăng nhập không được để trống!";
        $has_error = true;
    }

    if (empty($email)) {
        $emailErr = "Email không được để trống!";
        $has_error = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Định dạng email sai (xxx@xxx.xxx.xxx)!";
        $has_error = true;
    }

    if (empty($phone)) {
        $phoneErr = " Số điện thoại không được để trống!";
        $has_error = true;
    }

    if ($has_error === false) {
        saveDataJSON("users.json", $name, $email, $phone);
        $name = null;
        $email = null;
        $phone = null;
    }
}


?>

<form method="post">
    <h1>Registration User</h1>
    <label>Name: </label>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error" style="color: red">*<?php echo $nameErr; ?></span><br>
    <label>Email: </label>
    <input type="text" name="email" value="<?php echo $email ?>">
    <span class="error" style="color: red">*<?php echo $emailErr; ?></span><br>
    <label>Phone: </label>
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    <span class="error" style="color: red">*<?php echo $phoneErr; ?></span><br>
    <input type="submit" name="submit" value="Register">
    <p><span class="error" style="color: red">* required field.</span></p>
</form>


<?php
$registrations = loadRegistration('users.json')
?>
<h2>Registration List</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php foreach ($registrations as $registration): ?>
        <tr>
            <td><?php $registration['name']; ?></td>
            <td><?php $registration['email']; ?></td>
            <td><?php $registration['phone']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
