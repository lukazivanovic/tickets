<?php
 
namespace App\Http\Controllers;
 
use App\Category;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mailers\AppMailer;
 
class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(10);
 
        return view('tickets.index', compact('tickets'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
 
        return view('tickets.create', compact('categories'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'message' => 'required'
        ]);
 
        $ticket = new Ticket([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id' => $request->input('category'),
            'message' => $request->input('message'),
            'status' => "Отворен"
        ]);
 
        $ticket->save();
 
        $mailer->sendTicketInformation(Auth::user(), $ticket);
 
        return redirect()->back()->with("status", "Тикет са бројем ID: #$ticket->ticket_id је отворен.");
    }
 
    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
 
        return view('tickets.user_tickets', compact('tickets'));
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
 
        return view('tickets.show', compact('ticket'));
    }
 
    public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
 
        $ticket->status = "Затворен";
 
        $ticket->save();
 
        $ticketOwner = $ticket->user;
 
        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);
 
        return redirect()->back()->with("status", "Тикет је затворен.");
    }
}