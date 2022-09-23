<div class="box-lightbox">
    <div class="col-lg-6">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">Edit User</h2>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="card-body">
                    <form action="updateUser" method="post" id="edit-user-form">
                    <div class="row mb-3">
                                <label for="fullname" class="form-label col-sm-4 col-form-label">Full name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" id="fullname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="form-label col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" placeholder="Email" id="email" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="form-label col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control"  name="password" placeholder="Password" id="password" >
                                </div>
                            </div>
                            <fieldset class="">
                                <div class="row">
                                    <div class="col-form-label col-sm-4 pt-0">Role</div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="admin" value="admin" checked="">
                                            <label class="form-label form-check-label" for="admin">
                                                Admin
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="creater" value="creater">
                                            <label class="form-label form-check-label" for="creater">
                                                Creater
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="publicer" value="publicer">
                                            <label class="form-label form-check-label" for="publicer">
                                                Publicer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="model-footer">
                                <button type="button" class="btn btn-secondary js-lightbox-close" >Close</button>
                                <button class="btn btn-primary" id="updateUser" disabled>Change</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>