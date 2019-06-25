<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateThreadRequest;
use App\Message;
use App\Thread;
use Carbon\Carbon;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Thread::get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateThreadRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateThreadRequest $request)
    {

        if($request['recipient'] == auth('api')->user()->email)
        {
            return response()->json(['errors' => 'You can not send a message to yourself'],422);
        }
        $time= Carbon::now();

        $threadRequest["subject"] = $request["subject"];
        $threadRequest['time'] = $time;
        $threadRequest['creator']  = auth('api')->user()->id;

        $thread =Thread::create($threadRequest);

        $messageRequest["body"] = $request["message"];
        $messageRequest["creator"] = auth('api')->user()->id;
        $messageRequest['time'] = $time;
        $messageRequest['thread'] = $thread->id;

        $message = Message::create($messageRequest);
        $thread = $thread->fresh();
        return response()->json($thread, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return response()->json($thread, 200);
    }

}
