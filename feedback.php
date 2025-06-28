<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background-color: #f5f5f5;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
          sans-serif;
        margin: 0;
        padding: 40px 20px;
      }

      .contact-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        padding: 30px 50px;
      }

      .logo-section {
        text-align: center;
        margin-bottom: 30px;
      }

      .divider {
        width: 120px;
        height: 2px;
        background-color: #F8922E;
        margin: 0 auto 30px;
      }

      .contact-text {
        font-size: 14px;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
      }

      .main-title {
        font-size: 48px;
        font-weight: 300;
        color: #333;
        margin: 0 0 50px 0;
        line-height: 1.2;
      }

      .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
      }

      .form-group {
        flex: 1;
      }

      .form-control,
      .form-select {
        width: 100%;
        padding: 18px 20px;
        border: none;
        background-color: #f8f8f8;
        font-size: 16px;
        color: #666;
        border-radius: 0;
        box-sizing: border-box;
      }

      .form-control:focus,
      .form-select:focus {
        outline: none;
        background-color: #f0f0f0;
        box-shadow: none;
      }

      .form-control::placeholder {
        color: #999;
      }

      .message-group {
        margin-bottom: 30px;
      }

      textarea.form-control {
        min-height: 200px;
        resize: vertical;
        font-family: inherit;
      }

      .btn-send {
        background-color: #F8922E;
        color: white;
        border: none;
        padding: 18px 35px;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .btn-send:hover {
        background-color:rgb(224, 133, 42);
      }

      .success-message {
        display: none;
        margin-top: 20px;
        padding: 15px;
        background-color: #d4edda;
        color: #155724;
        border-radius: 4px;
      }

      @media (max-width: 768px) {
        .form-row {
          flex-direction: column;
          gap: 20px;
        }

        .contact-container {
          padding: 0 10px;
        }

        .main-title {
          font-size: 36px;
        }
      }

      .swal2-confirm{
        background-color: #F8922E !important
      }
    </style>
  </head>
  <body>
    <div class="contact-container">
      <div class="logo-section">
        <div>
          <img src="lg.png" alt="">
        </div>
        <div class="divider"></div>
        <div class="contact-text">Contact With Us</div>
        <h1 class="main-title">Send us a Message</h1>
      </div>

      <form id="contactForm">
        <div class="form-row">
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              name="name"
              id="name"
              placeholder="Your Name"
            />
          </div>
          <div class="form-group">
            <input
              type="email"
              class="form-control"
              name="email"
              id="email"
              placeholder="Email Address"
            />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <input
              type="tel"
              class="form-control"
              name="phone"
              id="pnum"
              placeholder="Phone Number"
            />
          </div>
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              name="subject"
              id="subject"
              placeholder="Subject"
            />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <select class="form-select" name="category" id="hotel">
              <option value="default">Select a Hotel</option>
              <option value="Thaproban Beach House">Thaproban Beach House</option>
              <option value="Thaproban Pavilion Waves">Thaproban Pavilion Waves</option>
              <option value="Thaproban Pavilion">Thaproban Pavilion</option>
              <option value="Thaproban Villa">Thaproban Villa</option>
              <option value="Thambapanni Retreat">Thambapanni Retreat</option>
            </select>
          </div>
        </div>

        <div class="message-group">
          <textarea
            class="form-control"
            name="message"
            id="msg"
            placeholder="Write a Message"
          ></textarea>
        </div>

        <button type="submit" class="btn-send">Send a Message</button>

      </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document
    .getElementById("contactForm")
    .addEventListener("submit", function (e) {
      e.preventDefault();

      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const pnum = document.getElementById("pnum").value.trim();
      const subject = document.getElementById("subject").value.trim();
      const hotel = document.getElementById("hotel").value;
      const msg = document.getElementById("msg").value.trim();

      let isValid = true;
      let errorMessage = "";

      if (!name) {
        isValid = false;
        errorMessage = "Please enter your name";
      } else if (/\d/.test(name)) {
        isValid = false;
        errorMessage = "Invalid Name";
      }

      else if (!email) {
        isValid = false;
        errorMessage = "Please enter your email address";
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        isValid = false;
        errorMessage = "Ivalid email address";
      }

      else if (!pnum) {
        isValid = false;
        errorMessage = "Please enter your phone number";
      } else if (!/^0\d{9}$/.test(pnum)) {
        isValid = false;
        errorMessage = "Invalid Mobile Number";
      }

      else if (!subject) {
        isValid = false;
        errorMessage = "Please enter a subject";
      }

      else if (hotel === "default") {
        isValid = false;
        errorMessage = "Please select a hotel";
      }

      else if (!msg) {
        isValid = false;
        errorMessage = "Please write your message";
      }

      if (isValid) {

        const submitBtn = this.querySelector(".btn-send");
        const originalBtnText = submitBtn.textContent;
        
        submitBtn.textContent = "Sending...";
        submitBtn.disabled = true;

        const formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('pnum', pnum);
        formData.append('subject', subject);
        formData.append('hotel', hotel);
        formData.append('msg', msg);

        fetch('email_send_process.php', {
          method: 'POST',
          body: formData
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
  if (data.success) {
    const hotelData = new FormData();
    hotelData.append('hotel', hotel);
    hotelData.append('name', name);

    fetch('email_send_user.php', {
      method: 'POST',
      body: hotelData
    })
    .then(res => res.json())
    .then(resData => {
      console.log('Second email response:', resData);
    })
    .catch(err => {
      console.error('Error sending second email:', err);
    });
    Swal.fire({
      title: "Thank you!",
      text: data.message || "Your message has been sent successfully. We'll get back to you soon.",
      icon: "success",
      draggable: false,
    });
    this.reset();

  } else {
    Swal.fire({
      title: data.message || "Failed to send message",
      icon: "error",
      draggable: false,
    });
  }
})

        .catch(error => {
          Swal.fire({
            title: "Error",
            text: "An error occurred while sending your message. Please try again later.",
            icon: "error",
            draggable: false,
          });
          console.error('Error:', error);
        })
        .finally(() => {
          submitBtn.textContent = originalBtnText;
          submitBtn.disabled = false;
        });
      } else {
        Swal.fire({
          title: errorMessage,
          icon: "error",
          draggable: false,
        });
      }
    });
</script>
  </body>
</html>
