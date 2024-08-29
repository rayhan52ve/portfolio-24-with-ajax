<form id="storeAndUpdateForm" action="{{ route('experiences.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Experience Type</label>
        <input type="text" name="title" class="form-control" id="" placeholder="Enter experience"
            value="{{ old('title') }}">
        <div class="titleError errors d-none text-danger"></div>
    </div>
    <div class="form-group">
        <label for="sector">Institute</label>
        <input type="text" name="sector" class="form-control" id="" placeholder="Institute"
            value="{{ old('sector') }}">
        <div class="sectorError errors d-none text-danger"></div>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" id="" placeholder="Description"
            value="{{ old('description') }}" rows="3"></textarea>
        <div class="descriptionError errors d-none text-danger"></div>
    </div>
    <div class="form-group">
        <label for="time">Years of Experience</label>
        <input type="text" name="time" class="form-control" id="" placeholder="Experience in Years"
            value="{{ old('time') }}">
        <div class="timeError errors d-none text-danger"></div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
