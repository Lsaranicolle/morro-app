<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ComentarioComponent extends Component
{
    use WithPagination;

    public $comentario;

    public $comment;

    public $entrega;

    public function storeComment()
    {
        $this->validate([
            'comment' => 'required|min:3|max:300',
        ]);

        $this->entrega->comentarios()->create([
            'user_id' => auth()->id(),
            'contenido' => $this->comment,
        ]);

        $this->comment = '';
        $this->reset('comment');
    }

    public function render()
    {
        return view('livewire.comentario-component', [
            'entrega' => $this->entrega,
        ]);
    }
}
