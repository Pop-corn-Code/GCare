<?php

namespace App\Livewire\Dash;

use App\Models\Environment;
use App\Models\Symptom as SymptomModel;
use App\Models\Trigger;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Symptom extends Component
{
    // symptom data
    public ?SymptomModel $symptomData = null; 
    public $symptoms = [];
    public ?string $symptom_onset;
    public ?string $symptom_name;
    public ?string $symptom_severity;
    public ?string $symptom_description;
    public ?string $time = null;
    public ?string $symptom_type; 
    public ?string $symptom_duration; 
    public ?string $symptom_location; 
    public $symptom_id; 
    public $inputs = [];
    public $i = 1;

    // trigger data
    public ?string $trigger_name;
    public ?string $trigger_description;

    // Environement data
    public ?string $location;
    public ?string $indoor_enivironement = '';
    public ?string $occupation;
    public ?string $lifestyle = '';

    public function mount(){
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
        $this->symptoms = SymptomModel::where('user_id', Auth::id())->where('is_delete', false)->orderBy('created_at', 'desc')->get();
    }
    

    protected $rules = [
        'symptom_name' => 'required|string|max:255',
        'symptom_type' => 'required',
        'symptom_onset' => 'required|date',
        'symptom_severity' => 'required|integer|min:1|max:10',
        'symptom_description' => 'nullable|string|max:1000',
        'symptom_duration'=>'required',
        'symptom_location'=>'required',
    ];
    
    protected $trigger_rules = [
        'trigger_name' => 'required|string|max:255',
        'trigger_description' => 'nullable|string|max:1000',
    ];

    protected $environment_rules = [
        'location' => 'required|string|max:255',
        'indoor_enivironement' => 'nullable|string|max:1000',
        'occupation' => 'required|string|max:255',
        'lifestyle' => 'nullable|string|max:1000',
    ];

    public function initData($symptom_id)
    {
        $symptom = SymptomModel::findOrFail($symptom_id);

        $this->symptomData = $symptom;
        $this->symptom_name = $symptom->symptom_name;
        $this->symptom_onset = $symptom->symptom_onset;
        $this->symptom_severity = $symptom->severity;
        $this->symptom_description = $symptom->symptom_description;
        $this->symptom_id = $symptom->id;
    }
    
    /*public function refresh($message, $modal)
    {
        //Close the active modal
        $this->emit('cancel', $modal);
        session()->flash('message', $message);
        // $this->clearFields();
        //Refresh the livewire component
        $refresh;
    }*/

    public function submit()
    {
        DB::transaction(function(){
            $this->validate($this->rules);
    
            $symptom = SymptomModel::create([
                'user_id' => Auth::id(),
                'symptom_onset' => $this->symptom_onset,
                // 'time' => $this->time ? Carbon::parse($this->time)->toTimeString() : Carbon::now()->toTimeString(),
                'symptom_type' => $this->symptom_type, // Set this field
                'symptom_name' => $this->symptom_name,
                'symptom_duration' => $this->symptom_duration,
                'symptom_severity' => $this->symptom_severity,
                'symptom_location' => $this->symptom_location,
                'symptom_description' => $this->symptom_description,
            ]);
    
            $this->validate($this->trigger_rules);
            $trigger = Trigger::create([
                'symptom_id' => $symptom->id,
                'trigger_name' => $this->trigger_name,
                'trigger_description' => $this->trigger_description,
            ]);

            $this->validate($this->environment_rules);
            $environment = Environment::create([
                'symptom_id' => $symptom->id,
                'location' => $this->location,
                'indoor_enivironement' => $this->indoor_enivironement,
                'occupation' => $this->occupation,
                'lifestyle' => $this->lifestyle,
            ]);

            // Reset fields after storing
            $this->reset([
                'symptom_name', 
                'symptom_severity', 
                'symptom_duration', 
                'symptom_description', 
                'symptom_onset', 
                'time', 
                'symptom_description',
                'trigger_name',
                'trigger_description',
                'location',
                'indoor_enivironement',
                'occupation',
                'lifestyle',
            ]);
        });

        // session()->flash('message', 'Symptom logged successfully.');

        // $this->reset();
    }

    public function delete()
    {
        if (Auth::id() != $this->symptomData->user_id) {
            return abort(401);
        }
    
        if (!empty($this->symptomData)) {
            $this->symptomData->is_delete = true;
            $this->symptomData->save();
        }
    
        // Emit an event to close the modal and show a success message
        // $this->emit('symptomDeleted', __('Symptom successfully deleted!'));
        $this->dispatch('symptom-deleted'); 
        // $this->closeModal();
        // $this->skipRender();
    }
    
    public function render()
    {
        return view('livewire.dash.symptoms.index');
    }
}