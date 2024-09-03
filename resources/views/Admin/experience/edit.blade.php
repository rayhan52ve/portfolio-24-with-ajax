<form class="storeAndUpdateForm" action="{{ route('experiences.update', $experience->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="title">Experience Type</label>
        <input type="text" value="{{ $experience->title }}" name="title" class="form-control" id=""
            placeholder="Enter experience">
        <div class="titleError errors d-none text-danger"></div>
    </div>
    <div class="form-group">
        <label for="sector">Institute</label>
        <input type="text" value="{{ $experience->sector }}" name="sector" class="form-control" id=""
            placeholder="Institute">
        <div class="sectorError errors d-none text-danger"></div>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" value="" name="description" class="form-control" id=""
            placeholder="Description">{{ $experience->description }}</textarea>
        <div class="descriptionError errors d-none text-danger"></div>
    </div>
    <div class="form-group">
        <label for="time">Years of Experience</label>
        <input type="text" value="{{ $experience->time }}" name="time" class="form-control" id=""
            placeholder="Years of Experience">
        <div class="timeError errors d-none text-danger"></div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
