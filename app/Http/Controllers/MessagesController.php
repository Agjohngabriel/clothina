<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    public function store(Request $request)
    {

    	Message::create([
    		'name' => $request->name,
    		'subject' => $request->subject,
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'message' => $request->message,
    	]);

    	return redirect()->back()->with('success_msg', 'We recieved your message. Our agent will get back to you with the email provided');

    }
}
