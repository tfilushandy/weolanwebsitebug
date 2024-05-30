@extends('layouts.template')
@section('content')
<div class="container1 d-flex justify-content-center align-items-center">
  <div class="col-12">
    <div class="d-flex flex-column align-items-center fadeIn">
      <div class="info-container d-flex flex-column align-items-center">
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
  background-image: url('/images/BG7.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}


.judul {
  color: white;
  margin: 0;
}

.container1 {
  height: auto;
  min-height: 80vh;
  border-radius: 30px;
  overflow: hidden;
  position: relative;
  padding: 40px;
  margin: 20px;
  background-color: rgba(0, 0, 0, 0.6);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.info-container {
  background-color: rgba(0, 0, 0, 0.7);
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
  text-align: center;
  width: 100%;
  max-width: 600px;
}

h5, p {
  color: white;
  margin: 10px 0;
}

.social-icons {
  margin-top: 20px;
}

.social-icon {
  color: white;
  margin: 0 10px;
  font-size: 24px;
  transition: color 0.3s;
}

.social-icon:hover {
  color: #007bff;
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
    padding: 20px;
    margin: 10px;
  }

  .info-container {
    padding: 20px;
  }

  .judul-container {
    top: 10px;
    padding: 5px 10px;
  }
}
</style>
