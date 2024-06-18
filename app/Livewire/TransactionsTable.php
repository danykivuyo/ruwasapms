<?php

namespace App\Livewire;

use Livewire\Component;

class TransactionsTable extends Component
{
    public $transactions = [];
    public function render()
    {
        return view('livewire.transactions-table');
    }
}
