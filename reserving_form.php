<?php
$ticketId = $_GET['id'];
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Reserving
    </title>
    <?php
    require_once 'php/blocks/head.php';
    ?>
    <nav class="navbar navbar-expand-md navbar-dark static-top bg-dark">
        <a class="navbar-brand" href="index.php">TRAVEL</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="reserving.php">RESERVING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">CONTACT</a>
                </li>
            </ul>
        </div>
    </nav>
</head>
<body>

<form class="form-signin" action="reserving_sell_ticket.php" method="post">
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">БУДЬ ЛАСКА, ЗАЛИШТЕ ВАШІ ДАНІ</h1>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="ПОВНЕ ІМ'Я" required autofocus>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="ЕЛЕКТРОННА ПОШТА" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="passport" name="passport" placeholder="ПАСПОРТ" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="credit_card" name="credit_card" placeholder="KРЕДИТНА КАРТКА" required>
    </div>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Запам'ятати
        </label>
    </div>
    <input type="hidden" name="ticket_id" value="<?php echo $ticketId;?>">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <button type="submit" class="btn btn-lg btn-primary btn-block">Купити</button>
</form>


</body>
</html>