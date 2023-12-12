<div class="modal fade" id="RegisterModal" tabindex="-1" aria-labelledby="RegisterModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Register Admin</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-center">
                <div class="booking">
                    <form id="registerForm" class="booking-form row" role="form" action="../lib/register_process.php" method="post">
                        <div class="col-lg-6 col-12">
                            <label for="register-username" class="form-label">Username</label>
                            <input type="text" name="register-username" id="register-username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="register-password" class="form-label">Password</label>
                            <input type="password" name="register-password" id="register-password" class="form-control" required>
                        </div>
                        <div class="col-lg-4 col-12 ms-auto">
                            <button type="submit" class="form-control">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

