<form class="storeAndUpdateForm" action="{{ route('educations.update', $education->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="title">Degree</label>
        <input type="text" value="{{ $education->title }}" name="title" class="form-control" id=""
            placeholder="Enter Degree">
        <div class="titleError errors d-none text-danger"></div>
    </div>
    <div class="form-group">
        <label for="sector">Institute</label>
        <input type="text" value="{{ $education->sector }}" name="sector" class="form-control" id=""
            placeholder="Institute">
        <div class="sectorError errors d-none text-danger"></div>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" value="" name="description" class="form-control" id="" rows="3">{{ $education->description }}</textarea>
        <div class="descriptionError errors d-none text-danger"></div>
    </div>
    <div class="form-group">
        <label for="time">Year</label>
        <input type="text" value="{{ $education->time }}" name="time" class="form-control" id=""
            placeholder="Education year">
        <div class="timeError errors d-none text-danger"></div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger bootbox-close-button">Cancel</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>
