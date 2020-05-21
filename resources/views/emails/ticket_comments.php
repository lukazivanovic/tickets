<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>
<body>
    <div class="container">
        <p>
            {{ $comment->comment }}
        </p>
        
        ---
        <p>Одговор од: {{ $user->name }}</p>
        
        <p>Наслов: {{ $ticket->title }}</p>
        <p>Тикет ID: {{ $ticket->ticket_id }}</p>
        <p>Стање: {{ $ticket->status }}</p>
        
        <p>
            Можеш да прегледаш тикет било када код {{ url('tickets/'. $ticket->ticket_id) }}
        </p>
    </div>
</body>
</html>