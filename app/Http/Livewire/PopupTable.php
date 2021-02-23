<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Models\Popup;

class PopupTable extends Component
{
    use WithPagination;

    public $search ='';
    public $perPage ='10';
    public $field = null;
    public $order = null;

    public $start_date, $end_date, $popup_id, $name, $title, $text, $user_id, $url, $status;


    public function render()
    {
        $popups = Popup::where('name', 'LIKE', "%$this->search%")->orderBy('start_date', 'desc');
        if ($this->field && $this->order) {
            $popups = $popups->orderBy($this->field, $this->order);
        }else{
            $this->field = null;
            $this->order = null;
        }
        $popups = $popups->paginate($this->perPage);
        return view('livewire.popups.popup-table', [
            'popups'    => $popups
        ]);
    }

    public function sortBy($field)
    {
        switch ($this->order) {
            case null:
                $this->order = 'asc';
                break;
            
            case 'asc':
                $this->order = 'desc';
                break;

            case 'desc':
                $this->order = 'asc';
                break;
        }
        $this->field = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->page = 10;
        $this->order = null;
        $this->field = null;
        $this->search = '';
    }

    public function default()
    {
        $this->name = '';
    }
}
