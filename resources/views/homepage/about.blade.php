@extends('layouts.template')
@section('content')

<div class="container1 d-flex flex-column align-items-center">
  <div class="col-12 d-flex flex-column align-items-center fadeIn">
    <!-- Tentang Kami Section -->
    <div class="section-container">
      <div class="judul-container">
        <h2 class="judul">Tentang Kami</h2>
      </div>
      <div class="text-container">
        <p>Selamat datang di WEOLAN. Kami adalah sebuah platform yang didedikasikan untuk memudahkan Anda dalam melakukan top up kebutuhan game. <br>
        Dengan menggunakan metode transaksi otomatis (Auto Transaction Method), kami menyediakan layanan yang cepat, aman, dan dapat diandalkan.</p>
      </div>
    </div>

    <!-- Kontak Kami Section -->
    <div class="section-container">
      <div class="judul-container">
        <h2 class="judul">Kontak Kami</h2>
      </div>
      <div class="info-container">
        <h5>Alamat Kami:</h5>
        <p>Waterfront WP 3 No.5, Bongso Wetan, Citraland, Sambikerep, Surabaya City, East Java 61174</p>
        <h5>Email:</h5>
        <p>weolan@gmail.com</p>
        <h5>Hubungi Kami:</h5>
        <p>+62 895345902896</p>
        <div class="d-flex justify-content-center social-icons">
          <a href="your-link-here" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
          <a href="your-link-here" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
          <a href="your-link-here" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
          <a href="your-link-here" target="_blank" class="social-icon"><i class="fab fa-discord"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<style>
body {
  background-image: url('/images/bgmain.png'); /* Replace with the path to your background image */
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed; /* Ensure the background remains fixed when scrolling */
  font-family: 'Arial', sans-serif;
  color: #f3f4f6;
  margin: 0;
  padding: 0;
}

.container1 {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 20px;
  margin: 20px;
  background-color: rgba(0, 0, 0, 0.8);
  border-radius: 30px;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
}

.section-container {
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  padding: 30px;
  margin: 20px;
  width: 100%;
  max-width: 800px;
  box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
  text-align: center;
  backdrop-filter: blur(10px);
}

.judul-container {
  margin-bottom: 20px;
}

.judul {
  color: #00aced; /* Light blue color */
  font-size: 2.5rem;
  margin: 0;
  letter-spacing: 2px;
  text-transform: uppercase;
  position: relative;
}

.judul:before {
  content: "";
  position: absolute;
  width: 50px;
  height: 3px;
  background-color: #00aced; /* Light blue color */
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
}

.text-container, .info-container {
  color: #f3f4f6;
  font-size: 1rem;
  line-height: 1.5;
}

.text-container p, .info-container p {
  margin: 10px 0;
}

.social-icons {
  margin-top: 20px;
}

.social-icon {
  color: #00aced; /* Light blue color */
  margin: 0 10px;
  font-size: 24px;
  transition: color 0.3s, transform 0.3s;
}

.social-icon:hover {
  color: #fff;
  transform: scale(1.1);
}

.fadeIn {
  animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Media Queries for responsiveness */
@media (max-width: 768px) {
  .container1 {
    padding: 10px;
    margin: 10px;
  }

  .section-container {
    padding: 20px;
  }

  .judul {
    font-size: 1.8rem;
  }

  .text-container, .info-container {
    font-size: 1rem;
  }
}
</style>
