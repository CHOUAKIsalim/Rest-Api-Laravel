<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Message;
use App\Thread;
use Illuminate\Support\Carbon;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Thread $thread
     * @param CreateMessageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Thread $thread, CreateMessageRequest $request)
    {
        if($request["creator"] == auth('api')->user()->email)
        {
            return response()->json(['errors' => "You can not send a message to yourself"],422);
        }
        if($thread["creator"] != auth('api')->user()->id)
        {
            return response()->json(['errors' => "This is not your thread"], 422);
        }
        $messageRequest["body"] = $request["message"];
        $messageRequest["creator"] = auth('api')->user()->id;
        $messageRequest['time'] = Carbon::now();
        $messageRequest['thread'] = $thread->id;

        $message = Message::create($messageRequest);
        $message = $message->fresh();
        return response()->json($message, 200);
    }
}
