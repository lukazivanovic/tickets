<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<title>Suppor Ticket Information</title>
</head>
<body>
    <div class="container">
        <p>
        Хвала {{ ucfirst($user->name) }}. Тикет је отворен. Бићеш обавештен о одговору имејлом. Детаљи твог тикета су:
        </p>
        
        <p>Наслов: {{ $ticket->title }}</p>
        <p>Категорија: {{ $ticket->category->name }}</p>
        <p>Стање: {{ $ticket->status }}</p>
        
        <p>
        Можеш да прегледаш тикет било када код {{ url('tickets/'. $ticket->ticket_id) }}
        </p>
    </div>
</body>
</html>