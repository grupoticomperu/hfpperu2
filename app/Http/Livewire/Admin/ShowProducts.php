<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;


use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;

    public $search;

    /* cada vez que se modifique search ejecutara resetpage */
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        //hola mundo

        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');
    }
    
}
