<?php
require_once 'view/vwheader.php';
require_once 'model/database.php';


if (isset($_POST["username"])) {

    $sqlText = "SELECT * FROM users where username = :username";
    $connection = Database::getConnection();
    try {
        $sql = $connection->prepare($sqlText);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->bindParam(':username', $_POST["username"]);
        $result = $sql->execute();
        $result = $sql->fetch(0);
    } catch (PDOException $e) {
        $e->getMessage();
    }


    if (password_verify($_POST["password"], $result['password'])) {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["type"] = (int)$result['type'];
        header('Refresh: 0;');
    }
}

?>

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>


<!-- 
<form method="post" action="index.php">
    <input type="text" name="username" placeholder="username" required>
    <input type="text" name="password" placeholder="password" required>
    <button type="submit">Send</button>
</form> -->
<div class="container d-flex mx-auto border m-0 p-0">
    <canvas id="myCanvas" class="d-flex align-self-center mx-auto img-responsive"></canvas>
</div>

<div class="container w-50 mx-auto my-4 border rounded p-4">

    <form class="form-signin" method="post" action="index.php">

        <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
        <span><b>admin:admin</b> or <b>operator:operator</b> for login</span>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>
<?php
require_once 'view/vwfooter.php';



?>