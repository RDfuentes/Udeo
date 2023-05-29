<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tipopersona;

class Tipopersonas extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $descripcion, $status;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.tipopersonas.view', [
            'tipopersonas' => Tipopersona::latest()
                ->orWhere('name', 'LIKE', $keyWord)
                ->orWhere('descripcion', 'LIKE', $keyWord)
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
        $this->descripcion = null;
        $this->status = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'status' => 'required',
        ]);

        Tipopersona::create([
            'name' => $this->name,
            'descripcion' => $this->descripcion,
            'status' => $this->status
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('alert', '¡Exito!', 'Tipo de Persona Creado Correctamente', 'success');
        $this->emit('closeModal');
    }

    public function edit($id)
    {
        $record = Tipopersona::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->descripcion = $record->descripcion;
        $this->status = $record->status;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'status' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Tipopersona::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'descripcion' => $this->descripcion,
                'status' => $this->status
            ]);

            $this->resetInput();
            $this->emit('alert', '¡Exito!', 'Tipo de Persona Actualizado Correctamente', 'success');
            $this->emit('closeModal');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deletedConfirmed()
    {
        if ($this->selected_id) {
            $record = Tipopersona::find($this->selected_id);
            $record->status = 0;
            $record->save();

            $this->resetInput();
            $this->emit('alert', '¡Exito!', 'Tipo de Persona Eliminado Correctamente', 'success');
            $this->emit('closeModal');
        }
    }
}
