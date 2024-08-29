<form id="storeAndUpdateForm" action="{{ route('skils.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="program">Program</label>
        <input type="text" class="form-control" name="program" placeholder="Enter Your Program"
            value="{{ old('program') }}">
        <div class="programError errors d-none text-danger"></div>
        <label for="percentage">Percentage</label>
        <input type="number" class="form-control" name="percentage" placeholder="Enter Percentage"
            value="{{ old('percentage') }}"  min="1" max="100">
        <div class="percentageError errors d-none text-danger"></div>


        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="submit btn btn-primary">Submit</button>
        </div>

    </div>

</form>
