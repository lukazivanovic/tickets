<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppor Ticket Status</title>
</head>
<body>
    <div class="container">
        <p>
            Здраво {{ ucfirst($ticketOwner->name) }},
        </p>
        <p>
            Твој тикет са бројем ID #{{ $ticket->ticket_id }} је решен и затворен.
        </p>
    </div>
</body>
</html>