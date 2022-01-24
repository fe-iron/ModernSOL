
  <!-- Modal -->
  <div class="modal fade bookfreetrial" id="pay_now" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><img src="images/icons/rupee.png" alt=""> Pay Now to Modern SOL</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="set_payment.php" method="post" name="set_payment">
            <div class="mb-3">
              <label for="name_pay" class="form-label">Your Name *</label>
              <input type="text" class="form-control"  name="name" id="name_pay" required>
            </div>
            <div class="mb-3">
              <label for="number_pay" class="form-label">Your Contact Number*</label>
              <input type="tel" class="form-control" name="number" id="number_pay" required>
            </div>
            <div class="mb-3">
              <label for="email_pay" class="form-label">Your Email*</label>
              <input type="email" class="form-control" name="email" id="email_pay" required>
            </div>
            <div class="mb-3">
              <label for="payment_pay" class="form-label">Payment Amount*</label>
              <input type="number" class="form-control" name="payment" id="payment_pay" required>
            </div>
            <input type="hidden" id="payment_id" name="payment_id">
            <button type="button" class="btn btn-info text-white btn-block" name="free_trials" onclick="payment_now();">Pay Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script src="admin/inc/js/payment.js"></script>