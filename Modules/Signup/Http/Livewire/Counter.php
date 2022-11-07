<?php

namespace Modules\Signup\Http\Controllers\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $amout = 0;
    public function render()
    {
        return view('livewire.counter');
    }
}
