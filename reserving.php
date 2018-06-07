<!DOCTYPE html>
<html>
<head>
    <title>
        Reserving
    </title>
    <?php require_once 'php/blocks/head.php'; ?>
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
    <script type="text/javascript">
        $(function () {
            $('#date_departure').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>

    <form class="reserving rounded" action="reserving_tickets.php" method="get">
        <div class="form-group">
            <label for="date_departure">Дата вильоту</label>
            <input type="text" class="form-control" id="date_departure" name="date_departure" placeholder="Дата вильоту">
        </div>
        <div class="form-group">
            <label for="from">Місто вильоту</label>
            <input type="text" class="form-control" id="from" name="from" placeholder="Місто вильоту">
        </div>
        <div class="form-group">
            <label for="to">Місто призначення</label>
            <input type="text" class="form-control" id="to" name="to" placeholder="Місто призначення">
        </div>
        <button type="submit" class="btn btn-primary">Пошук</button>
    </form>

</body>
</html>