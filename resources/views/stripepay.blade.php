<!DOCTYPE html>
<html>
<head>
  <title>Stripe Payment</title>
  <script src="https://js.stripe.com/v3/"></script>
  <style>
    /* Add some styling to the form */
    #payment-form {
      max-width: 400px;
      margin: 0 auto;
    }
    #card-element {
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 4px;
    }
    #submit {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      border-radius: 4px;
      margin-top: 10px;
    }
    #submit:hover {
      background-color: #0056b3;
    }
    #error-message {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <form id="payment-form">
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>
    <button id="submit">Pay</button>
    <div id="error-message" role="alert"></div>
  </form>

  <script>
    document.addEventListener('DOMContentLoaded', async () => {
      const stripe = Stripe('pi_3Phfs9AvZkWDJwLR0y9OzPgp');
      const elements = stripe.elements();
      const cardElement = elements.create('card');
      cardElement.mount('#card-element');

      const form = document.getElementById('payment-form');
      form.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Fetch the client secret from the backend
        const response = await fetch('/create-payment-intent', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            amount: 1099, // Amount in cents (e.g., $10.99)
            currency: 'usd',
          }),
        });

        const { clientSecret } = await response.json();

        const { error, paymentIntent } = await stripe.confirmCardPayment(clientSecret, {
          payment_method: {
            card: cardElement,
            billing_details: {
              name: 'Customer Name',
            },
          },
        });

        if (error) {
          // Show error to your customer
          document.getElementById('error-message').textContent = error.message;
        } else if (paymentIntent.status === 'succeeded') {
          // Show a success message to your customer
          alert('Payment succeeded!');
        }
      });
    });
  </script>
</body>
</html>
