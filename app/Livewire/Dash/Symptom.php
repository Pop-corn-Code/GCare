<?php

namespace App\Livewire\Dash;

use App\Models\Symptom as SymptomModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Symptom extends Component
{
    public $symptoms;
    public $date;
    public $symptom;
    public $severity;
    public $notes;
    public $time;
    public $symptomType; 
    public $symptom_id; 
    public $symptomData; 
    public $inputs = [];
    public $i = 1;

    public function mount(){
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
    }
    public function addContactPerson($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    protected $rules = [
        'date' => 'required|date',
        'symptom' => 'required|string|max:255',
        'severity' => 'required|integer|min:1|max:10',
        'notes' => 'nullable|string|max:1000',
    ];

    public function initData($symptom_id)
    {
        $symptom = SymptomModel::findOrFail($symptom_id);

        $this->symptomData = $symptom;
        $this->date = $symptom->date;
        $this->symptom = $symptom->symptom;
        $this->severity = $symptom->severity;
        $this->notes = $symptom->notes;
        $this->symptom_id = $symptom->id;
    }
    
    public function refresh($message, $modal)
    {
        //Close the active modal
        $this->emit('cancel', $modal);
        session()->flash('message', $message);
        // $this->clearFields();
        //Refresh the livewire component
        $refresh;
    }

    public function submit()
    {
        $this->validate();

        SymptomModel::create([
            'user_id' => Auth::id(),
            'date' => $this->date,
            'time' => $this->time ? Carbon::parse($this->time)->toTimeString() : Carbon::now()->toTimeString(),
            'symptom_type' => $this->symptomType, // Set this field
            'symptom' => $this->symptom,
            'severity' => $this->severity,
            'notes' => $this->notes,
        ]);

        // Reset fields after storing
        $this->reset(['symptom', 'severity', 'notes', 'date', 'time', 'symptomType']);

        session()->flash('message', 'Symptom logged successfully.');

        $this->reset();
    }

    public function delete()
    {
        if (Auth::id() != $this->symptomData->user_id) {
            return abort(401);
        }

        if (!empty($this->symptomData)) {

            $this->symptomData->delete();
        }

        $this->refresh(__('Symptom successfully deleted!'), 'DeleteModal');
    }
    public function render()
    {
        $this->symptoms = SymptomModel::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('livewire.dash.symptoms.index',[
            'symptoms'=> $this->symptoms
        ]);
    }
}