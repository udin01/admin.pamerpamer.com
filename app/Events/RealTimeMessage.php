<?php

namespace App\Events;

/*
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class RealTimeMessage implements ShouldBroadcast
{
    use SerializesModels;

    public string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('events');
    }
}
*/
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RealTimeMessage implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message;
  public $channel;

  public function __construct($message, $channel = '')
  {
      $this->message = $message;
      $this->channel = ($channel) ? $channel : 'my-channel' ;
  }

  public function broadcastOn()
  {
      return [$this->channel];
      // return ['my-channel'];
  }

  public function broadcastAs()
  {
      // return $this->event;
      return 'my-event';
  }
}