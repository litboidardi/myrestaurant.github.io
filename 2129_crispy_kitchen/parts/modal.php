<div class="modal fade" id="BookingModal" tabindex="-1" aria-labelledby="BookingModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Reserve a table</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-center">
                <div class="booking">
                    <form id="reservationForm" class="booking-form row" role="form" action="#" method="post"">
                        <div class="col-lg-6 col-12">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="your@email.com" required>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" class="form-control" placeholder="09xxxxxxxx">
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="people" class="form-label">Number of persons</label>
                            <input type="text" name="people" id="people" class="form-control" placeholder="12 persons">
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date" value="" class="form-control">
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="time" class="form-label">Time</label>
                            <select class="form-select form-control" name="time" id="time">
                                <option value="17:00:00" selected>5:00 PM</option>
                                <option value="18:00:00">6:00 PM</option>
                                <option value="19:00:00">7:00 PM</option>
                                <option value="20:00:00">8:00 PM</option>
                                <option value="21:00:00">9:00 PM</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Special Request</label>

                            <textarea class="form-control" rows="4" id="message" name="message" placeholder=""></textarea>
                        </div>
                        <div class="col-lg-4 col-12 ms-auto">
                            <button type="submit" class="form-control" data-bs-dismiss="modal">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

