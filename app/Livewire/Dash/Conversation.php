<?php

namespace App\Livewire\Dash;

use App\Models\Conversation as ModelsConversation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Conversation extends Component
{
    public $conversations = [];
    public $conversation;
    public $title;
    public $conversation_id;

    public function mount()
    {
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
    }

    public function initData($id)
    {
        $conversation = ModelsConversation::findOrFail($id);

        $this->conversation = $conversation;
        $this->title = $conversation->title;
        $this->conversation_id = $conversation->id;
    }

    public function delete(){
        $this->conversation->is_delete = true;
        $this->conversation->save();
    }

    public function editConvesation(){
        $this->conversation->title = $this->title;
        $this->conversation->save();
    }
    
    public function render()
    {
        $this->conversations=ModelsConversation::where('user_id', Auth::id())->where('is_delete', false)->with(['messages'])->get();

        return view('livewire.dash.conversation');
    }
}
