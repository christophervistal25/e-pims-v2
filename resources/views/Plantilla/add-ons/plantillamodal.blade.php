<div id="addPositionBtn" class="modal custom-modal fade" role="dialog">
    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Position</h5>
                <button style="background-color:white;margin-right:2px; margin-top:2px; " type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color:black; font-size:20px;" aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form action="/plantilla" method="POST">
                   @csrf
                    <div class="row">
                    <div class="form-group col-12">
                        <label class="d-block">Position Name</label>
                        <input placeholder="Input Position Name" class="form-control" id="positionName" name="positionName" type="text">
                    </div>
                    <div class="form-group submit-section col-12">
                        <button id="btnPosition" type="submit" class="btn btn-success submit-btn">Save</button>
                    </div>
                    <div class="result">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>