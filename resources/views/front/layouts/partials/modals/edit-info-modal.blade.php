<div
	class="modal modal-lg fade rounded-3"
	id="edit-info"
	tabindex="-1"
	aria-labelledby="edit-infoLabel"
	aria-hidden="true"
  >
	<div class="modal-dialog">
		<div class="modal-content">
      <div class="modal-header form-header border-0">
        <h5
          class="edit-info-title text-start w-100 text-black fw-semibold fst-italic">
          Edit details
        </h5>
      </div>
      <div class="modal-body">
        <form action="" class="form-body">
          <div class="row">
            <div class="col-10 m-auto">
              <div class="row mb-3">
                <div class="col-12 col-md-5"><label for=""class="fw-semibold">Name:</label></div>
                <div class="offset-1 offset-sm-0 col-11 col-md-7">
                  <input
                    type="text"
                    class="fw-bold border-0 text-secondary"
                    value="Harsh Desai"
                    name="username"
                    id=""
                  />
                </div>
              </div>
              <div class="row mb-3 ">
                <div class="col-12 col-md-5">
                  <label for=""class="fw-semibold text-disabled">Email address:</label></div>
                <div class="offset-1 offset-sm-0 col-11 col-md-7">
                  <input
                    type="email"
                    class="fw-bold border-0 bg-white text-disabled"
                    value="hd@webologymarketing.co.uk"
                    name="useremail" id=""
                    disabled
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12 col-md-5"><label for=""class="fw-semibold">Mobile number:</label></div>
                <div class="offset-1 offset-sm-0 col-11 col-md-7">
                  <input
                    type="tel"
                    class="fw-bold border-0 text-secondary"
                    value="07596 122 344"
                    name="user-mobile" id=""
                  />
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12">
                  <div class="d-flex align-items-center justify-content-center gap-1">
                    <input type="checkbox" name="resent-mail-checkbox" id="mail-checkbox">
                    <label for="mail-checkbox" class="fst-italic">Resend confirmation</label>
                  </div>
                  <div class="d-flex align-items-center justify-content-center gap-5 mt-3">
                    <input
                      type="submit"
                      name="save-btn"
                      class="btn btn-primary shadow-sm rounded-0 rounded-bottom"
                      value="Save"
                      id=""
                    />
                    <button
                      type="button"
                      class="btn btn-primary shadow-sm rounded-0 rounded-bottom"
                      data-bs-dismiss="modal"
                      aria-label="Close">
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
		</div>
	</div>
</div>
