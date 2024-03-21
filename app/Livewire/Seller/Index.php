<?php

namespace App\Livewire\Seller;

use App\Models\Seller;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.seller.index');
    }

    public function destroy(Seller $seller)
    {
        $seller->delete();
    }
}
