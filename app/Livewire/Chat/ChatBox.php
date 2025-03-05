<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use App\Notifications\MessageRead;
use App\Notifications\MessageSent;
use Livewire\Component;

class ChatBox extends Component
{
    public $selectedConversation;
    public $body;
    public $loadedMessages;

    public $paginate_var = 10;

    protected $listeners = ['loadMore'];

    public function getListeners()
    {
        $auth_id = auth()->user()->id;

        return [
            'loadMore',
            "echo-private:users.{$auth_id},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'broadcastedNotifications',
        ];
    }

    public function broadcastedNotifications($event)
    {
        if ($event['type'] == MessageSent::class) {
            if ($event['conversation_id'] == $this->selectedConversation->id) {
                $this->dispatchBrowserEvent('scroll-bottom');

                $newMessage = Message::find($event['message_id']);

                #push message
                $this->loadedMessages->push($newMessage);

                #mark as read
                $newMessage->read_at = now();
                $newMessage->save();

                #broadcast
                $this->selectedConversation
                    ->getReceiver()
                    ->notify(new MessageRead($this->selectedConversation->id));
            }
        }
    }

    public function loadMore(): void
    {
        #increment
        $this->paginate_var += 10;

        #call loadMessages()

        $this->loadMessages();

        #update the chat height
        $this->dispatchBrowserEvent('update-chat-height');
    }

    public function loadMessages()
    {
        $userId = auth()->id();
        #get count
        $count = Message::where(
            'conversation_id',
            $this->selectedConversation->id
        )
            ->where(function ($query) use ($userId) {
                $query
                    ->where('sender_id', $userId)
                    ->whereNull('sender_deleted_at');
            })
            ->orWhere(function ($query) use ($userId) {
                $query
                    ->where('receiver_id', $userId)
                    ->whereNull('receiver_deleted_at');
            })
            ->count();

        #skip and query
        $this->loadedMessages = Message::where(
            'conversation_id',
            $this->selectedConversation->id
        )
            ->where(function ($query) use ($userId) {
                $query
                    ->where('sender_id', $userId)
                    ->whereNull('sender_deleted_at');
            })
            ->orWhere(function ($query) use ($userId) {
                $query
                    ->where('receiver_id', $userId)
                    ->whereNull('receiver_deleted_at');
            })
            ->skip($count - $this->paginate_var)
            ->take($this->paginate_var)
            ->get();

        return $this->loadedMessages;
    }

    public function sendMessage()
    {
        dd($this->body);
    }

    public function mount()
    {
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
