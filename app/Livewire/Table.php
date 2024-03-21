<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    #[Reactive]
    public string $resource;
    public array $columns;
    public string $edit;
    public string $delete;
    public array $eagerLoading;

    public function render()
    {
        $resource = app("App\Models\\" . $this->resource);
        if (!empty($this->eagerLoading))
        {
            $resource = $resource->with($this->eagerLoading);
        }

        return view('livewire.table', [
            'items' => $resource->paginate(10)
        ]);
    }
}
