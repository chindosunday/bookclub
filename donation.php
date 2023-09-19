<?php
require_once("partials/header.php");
?>

<section>
    <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1>DONATE TO US</h1>
            <p>Help our donations through your giving</p>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row">
        <div class="col-md-3">
                *******
        </div>
        <div class="col-md-6">
        <form id="paymentForm">
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" id="email-address" class="form-control" required />
  </div>
  <div class="form-group">
    <label for="amount">Amount</label>
    <input type="tel" id="amount" class="form-control" required />
  </div>
  <div class="form-group">
    <label for="first-name">First Name</label>
    <input type="text" id="first-name" class="form-control" />
  </div>
  <div class="form-group">
    <label for="last-name">Last Name</label>
    <input type="text" id="last-name" class="form-control"/>
  </div>
  <div class="form-submit my-2">
    <button type="submit" class="btn btn-primary" onclick="payWithPaystack()"> Pay </button>
  </div>
</form>

        </div>
    </div>

    </div>
</section>



<footer class="bg-primary py-3">
    <p class="text-center text-white">&#169;<?php echo date("Y"); ?> ALL RIGHT RESERVED </p>
</footer>

<script src="../assets/scripts/pooper.js" crossorigin="anonymous"></script>
<script src="../assets/scripts/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../assets/scripts/script.js" crossorigin="anonymous"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', payWithPaystack, false);
    function payWithPaystack(e) {
        e.preventDefault();
     var handler = PaystackPop.setup({
    key: 'pk_test_73bdc14d9dbc2675722cc2ad4590a8a7cf430cfe', // Replace with your public key
    email: document.getElementById('email-address').value,
    amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
    currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
    ref: "ujhbjhjhvnhg", // Replace with a reference you generated
    callback: function(response) {
      //this happens after the payment is completed successfully
      var reference = response.reference;
      alert('Payment complete! Reference: ' + reference);
      // Make an AJAX call to your server with the reference to verify the transaction
    },
    onClose: function() {
      alert('Transaction was not completed, window closed.');
    },
  });
  handler.openIframe();
}
</script>
</body>
</html>