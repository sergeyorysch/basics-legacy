<?php
include_once 'DBConnector.php';

class Tickets
{
    public static function getFreeTickets($departureDate, $from, $to)
    {
        $connector = DBConnector::getConnection();
        $statement = $connector->prepare("
        SELECT
        tickets.id AS id,
        tickets.date_departure AS date_departure,
        tickets.date_arrive AS date_arrive,
        tickets.cost AS cost,
        ticket_types.name AS ticket_type,
        towns_to.name AS town_to,
        towns_from.name AS town_from,
        planes.name AS plane
        FROM tickets
        INNER JOIN ticket_types
        ON tickets.ticket_type_id=ticket_types.id
        INNER JOIN towns AS towns_to
        ON tickets.town_to_id=towns_to.id
        INNER JOIN towns AS towns_from
        ON tickets.town_from_id=towns_from.id
        INNER JOIN planes
        ON tickets.plane_id=planes.id
        WHERE tickets.sold=0
        AND (towns_from.name=:from OR :from='')
        AND (towns_to.name=:to OR :to='')
        AND (tickets.date_departure LIKE '$departureDate%' OR :departureDate='')");
        $statement->execute(array(':from' => $from,
            ':to' => $to,
            ':departureDate' => $departureDate));
        return $statement->fetchAll();
    }

    public static function sellTicket($ticketId, $name, $email, $passport, $creditCard)
    {
        try {
            $connector = DBConnector::getConnection();
            $statement = $connector->prepare("INSERT INTO buyers (name, email, passport, credit_card)
        VALUES (:name, :email, :passport, :credit_card)");
            $statement->execute(array(':name' => $name,
                ':email' => $email,
                ':passport' => $passport,
                ':credit_card' => $creditCard));

            $insertedId = $connector->lastInsertId();
            $statement = $connector->prepare("UPDATE tickets SET sold=1, buyer_id=$insertedId WHERE id=$ticketId");
            $statement->execute();
            return true;
        } catch (Exception $ignored) {
            return false;
        }
    }

    public static function showTicket($id){
        $connector = DBConnector::getConnection();
        $statement = $connector->prepare("
        SELECT
        tickets.id AS id,
        tickets.date_departure AS date_departure,
        tickets.date_arrive AS date_arrive,
        planes.name AS plane,
        ticket_types.name AS ticket_type,
        towns_to.name AS town_to,
        towns_from.name AS town_from,
        tickets.cost AS cost
        FROM tickets
        INNER JOIN ticket_types
        ON tickets.ticket_type_id=ticket_types.id
        INNER JOIN towns AS towns_to
        ON tickets.town_to_id=towns_to.id
        INNER JOIN towns AS towns_from
        ON tickets.town_from_id=towns_from.id
        INNER JOIN planes
        ON tickets.plane_id=planes.id
        WHERE tickets.id=$id
        ");
        $statement->execute();
        return $statement->fetchAll();
    }
    
}