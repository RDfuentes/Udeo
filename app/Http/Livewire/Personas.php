<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Persona;

class Personas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $telefono, $tipopersona_id, $status;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.personas.view', [
            'personas' => Persona::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('tipopersona_id', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->name = null;
		$this->telefono = null;
		$this->tipopersona_id = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'telefono' => 'required',
		'tipopersona_id' => 'required',
		'status' => 'required',
        ]);

        Persona::create([ 
			'name' => $this-> name,
			'telefono' => $this-> telefono,
			'tipopersona_id' => $this-> tipopersona_id,
			'status' => $this-> status
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Persona Successfully created.');
    }

    public function edit($id)
    {
        $record = Persona::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->telefono = $record-> telefono;
		$this->tipopersona_id = $record-> tipopersona_id;
		$this->status = $record-> status;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'telefono' => 'required',
		'tipopersona_id' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Persona::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'telefono' => $this-> telefono,
			'tipopersona_id' => $this-> tipopersona_id,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Persona Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Persona::where('id', $id)->delete();
        }
    }
}