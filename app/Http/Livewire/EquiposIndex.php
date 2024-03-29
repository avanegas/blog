<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use Livewire\{Component, WithPagination};

class EquiposIndex extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '20']
        ];

    public $search = '';
    public $sort ='name';
    public $direction = 'desc';
    public $perPage = '20';

    public function render()
    {
        $searchParams = '%' . $this->search . '%';
                
        return view('livewire.equipos-index', [
                    'equipos' => Equipo::where('name','LIKE', $searchParams)
                                       ->orWhere('marca','LIKE',$searchParams)
                                       ->orderBy($this->sort, $this->direction)
                                       ->paginate($this->perPage)            
        ]);
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
 
    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }   
}