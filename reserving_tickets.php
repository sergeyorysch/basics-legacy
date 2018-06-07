<?php
$dateDeparture = $_GET['date_departure'];
$to = $_GET['to'];
$from = $_GET['from'];
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
<!--<h2 class="text">-->
<!--    <br><br>-->
<!--    Welcome to TRAVEL! Best aviacompany in Europe. <br>-->
<!--    Here you can buy a ticket to any flight in our company! <br>-->
<!--    Also we have the "hot" tickets and other things, that make it looks good. <br>-->
<!--</h2>-->
<table class="table table-striped">
    <thead>
    <tr>
        <th>Дата вильоту</th>
        <th>Місце вильоту</th>
        <th>Дата прибуття</th>
        <th>Місце прибуття</th>
        <th>Тип білету</th>
        <th>Літак</th>
        <th>Ціна</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    include_once './php/Tickets.php';
    $ticketsTable = Tickets::getFreeTickets($dateDeparture, $from, $to);
    foreach ($ticketsTable as $ticket) {
        ?>
        <tr>
            <td><?php echo $ticket['date_departure']; ?></td>
            <td><?php echo $ticket['town_from']; ?></td>
            <td><?php echo $ticket['date_arrive']; ?></td>
            <td><?php echo $ticket['town_to']; ?></td>
            <td><?php echo $ticket['ticket_type']; ?></td>
            <td><?php echo $ticket['plane']; ?></td>
            <td><?php echo $ticket['cost']; ?></td>
            <td><a type="button" class="btn btn-primary"
                   href="./reserving_form.php?id=<?php echo $ticket['id']; ?>">Купити</a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>