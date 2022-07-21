<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{

    use WithPagination;

    public $search, $cant;

    /* cada vez que se modifique search ejecutara resetpage */
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
                            ->where('status', 2)->paginate(4);
        return view('livewire.show-products', compact('products'));
    }
}
