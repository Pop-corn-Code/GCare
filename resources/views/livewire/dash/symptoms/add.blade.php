<div class="modal fade" id="addSymptomModal" tabindex="-1" aria-labelledby="addSymptomModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSymptomModalLabel">Log a New Symptom</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs-9"></span></button>
      </div>
        <form wire:submit.prevent="submit">
            <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="date">Date</label>
                        <input type="date" id="date" class="form-control @error('date') is-invalid @enderror" wire:model="date">
                        @error('date') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="symptomType">Symptom Type</label>
                        <input type="text" id="symptomType" wire:model="symptomType" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="symptom">Symptom</label>
                        <input type="text" id="symptom" class="form-control @error('symptom') is-invalid @enderror" wire:model="symptom">
                        @error('symptom') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="severity">Severity (1-10)</label>
                        <input type="number" id="severity" class="form-control @error('severity') is-invalid @enderror" wire:model="severity" min="1" max="10">
                        @error('severity') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="notes">Notes (Optional)</label>
                        <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" wire:model="notes"></textarea>
                        @error('notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Log Symptom</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
  </div>
</div>