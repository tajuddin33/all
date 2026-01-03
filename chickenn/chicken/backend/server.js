const express = require("express");
const Stripe = require("stripe");
const cors = require("cors");
const sgMail = require("@sendgrid/mail");
const twilio = require("twilio");
require("dotenv").config();

const app = express();
const stripe = Stripe(process.env.STRIPE_SECRET_KEY);
sgMail.setApiKey(process.env.SENDGRID_API_KEY);
const twilioClient = twilio(process.env.TWILIO_SID, process.env.TWILIO_AUTH);

app.use(cors());
app.use(express.json());

app.post("../create-checkout-session", async (req, res) => {
  const items = req.body.cart.map(item => ({
    price_data: {
      currency: "inr",
      product_data: { name: item.name },
      unit_amount: item.price * 100,
    },
    quantity: 1,
  }));

  const session = await stripe.checkout.sessions.create({
    payment_method_types: ["card"],
    line_items: items,
    mode: "payment",
    success_url: "http://localhost:5500/frontend/index.html?success=true",
    cancel_url: "http://localhost:5500/frontend/index.html?canceled=true",
  });

  // Send Email
  const msg = {
    to: "customer@example.com",
    from: "yourshop@example.com",
    subject: "Order Confirmation",
    text: "Thank you for ordering from Chicken Shop!",
  };
  await sgMail.send(msg);

  // Send SMS
  await twilioClient.messages.create({
    body: "Your Chicken Shop order has been placed successfully!",
    from: process.env.TWILIO_PHONE,
    to: "+91XXXXXXXXXX",
  });

  res.json({ url: session.url });
});

app.listen(5000, () => console.log("Server running on http://127.0.0.1:5500/frontend/index.html"));
