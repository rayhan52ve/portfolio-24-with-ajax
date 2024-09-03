<form class="storeAndUpdateForm" action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">

        <!-- Title Input -->
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Title" id="title">

        <!-- Client Input -->
        <label for="client">Client</label>
        <input type="text" class="form-control" name="client" placeholder="Enter Client Name" id="client">

        <!-- Technology Input -->
        <label for="technology">Technology</label>
        <input type="text" class="form-control" name="technology"
            placeholder="Enter Technologies (e.g., Laravel, AJAX)" id="technology">

        <!-- Preview Link Input -->
        <label for="preview">Preview Link</label>
        <input type="text" class="form-control" name="preview" placeholder="Enter Preview Link" id="preview">

        <!-- Order By Input -->
        <label for="order_by">Order By</label>
        <input type="number" class="form-control" name="order_by" placeholder="Enter Serial Order" id="order_by">

        <!-- Image Input -->
        <label for="image">Image</label>
        <input type="file" class="image form-control" name="image" >
        <img src="" class="preview_image img-thumbnail" width="150" alt="">

    </div>

    <!-- Loading Indicator -->
    <div class="loading-indicator text-center my-3"></div>

    <!-- Modal Footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary btn-loading">Submit</button>
    </div>
</form>
