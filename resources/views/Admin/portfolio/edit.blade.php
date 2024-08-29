<form id="storeAndUpdateForm" action="{{ route('portfolios.update', $portfolio->id) }}" method="post"
    enctype='multipart/form-data'>
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $portfolio->title }}">
        <div class="titleError errors d-none text-danger"></div>

        <label for="Client">Client</label>
        <input type="text" class="form-control" name="client" value="{{ $portfolio->client }}"
            placeholder="Enter Your Project">
        <div class="clientError errors d-none text-danger"></div>

        <label for="Technology">Technology:</label>
        <input type="text" class="form-control" name="technology" value="{{ $portfolio->technology }}"
            placeholder="Enter Technologies">
        <div class="technologyError errors d-none text-danger"></div>

        <label for="Preview">Preview Link:</label>
        <input type="text" class="form-control" name="preview" value="{{ $portfolio->preview }}"
            placeholder="Enter Preview Link">
        <div class="previewError errors d-none alert-danger"></div>

        <label for="Order By">Order By:</label>
        <input type="number" class="form-control" name="order_by" value="{{ $portfolio->order_by }}"
            placeholder="Enter Serial Order">
        <div class="orderByError errors d-none text-danger"></div>

        <label for="image">Image</label>
        <input type="file" class="form-control " name="image">
        <img src="{{ asset($portfolio->image) }}" height="100" width="100">
        <div class="imageError errors d-none text-danger"></div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary btn-loading">Update</button>
    </div>

</form>
