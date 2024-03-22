<?php

namespace App\Livewire\Seller;

use App\Models\Seller;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $this->authorize('viewAny', Seller::class);
        return view('livewire.seller.index');
    }

    public function destroy(Seller $seller)
    {
        $this->authorize('delete', $seller);
        $seller->delete();
    }
}
