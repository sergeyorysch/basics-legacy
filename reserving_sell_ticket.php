<?php
include_once './php/Tickets.php';
$ticketId = $_POST['ticket_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$passport = $_POST['passport'];
$creditCard = $_POST['credit_card'];
$status = Tickets::sellTicket($ticketId, $name, $email, $passport, $creditCard);
$id = $_POST['id'];
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
<?php
if ($status) {
include_once './php/Tickets.php';
$ticketTable = Tickets::showTicket($id);
foreach ($ticketTable as $ticket) {
?>
<div class="row">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">ВАШЕ ЗАМОВЛЕННЯ ГОТОВЕ</span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">ДАТА ВІДПРАВЛЕННЯ</h6>
                </div>
                <span class="text-muted"><?php echo $ticket['date_departure']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">МІСТО ВИЛЬОТУ</h6>
                </div>
                <span class="text-muted"><?php echo $ticket['town_from']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">ДАТА ПРИБУТТЯ</h6>
                </div>
                <span class="text-muted"><?php echo $ticket['date_arrive']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">МІСТО ПРИЗНАЧЕННЯ</h6>
                </div>
                <span class="text-muted"><?php echo $ticket['town_to']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">ТИП БІЛЕТУ</h6>
                </div>
                <span class="text-muted"><?php echo $ticket['ticket_type']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">ЛІТАК</h6>
                </div>
                <span class="text-muted"><?php echo $ticket['plane']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                    <h6 class="my-0">ПОВНА ВАРТІСТЬ</h6>
                    <small>з врахуванням НДС</small>
                </div>
                <span class="text-success"><?php echo $ticket['cost']; echo '$'?></span>
            </li>
        </ul>
    </div>
    <?php
    }}
    ?>
    <div class="btn-end">
        <a href = "./index.php" class = "btn btn-success btn-lg" role = "button">На головну</a>
    </div>
</body>
</html>