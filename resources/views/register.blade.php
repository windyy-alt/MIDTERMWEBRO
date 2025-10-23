<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amimir Library - Register</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center; 
      align-items: center;   
      background: rgba(0, 0, 0, 0.6);
    }

    #bg-video {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      z-index: -1;
      object-fit: cover;
      filter: brightness(0.8);
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }

    .form-card {
      background-color: #ffdec2;
      padding: 40px;
      border-radius: 25px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      width: 450px;
    }

    .logo {
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      margin-bottom: 20px;
      gap: 10px;
    }

    .logo-img {
      width: 50px;
      height: 50px;
      object-fit: contain;
    }

    .logo h2 {
      font-weight: 700;
      font-size: 3rem;
      color: #000;
      font-family: "Libre Caslon Display", serif;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 5px;
      color: #000;
    }

    input {
      width: 100%;
      padding: 10px;
      border-radius: 25px;
      border: 2px solid #000;
      margin-bottom: 15px;
      font-size: 14px;
      font-family: "Libre Caslon Display", serif;
    }

    input:focus {
      outline: none;
      border-color: #7c1313;
      box-shadow: 0 0 5px rgba(124, 19, 19, 0.5);
    }

    .form-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 5px;
    }

    .already-registered {
      font-size: 14px;
      color: #69452c;
      font-weight: 500;
    }

    .already-registered a {
      text-decoration: none;
      color: #69452c;
      font-weight: 600;
      margin-left: 5px;
    }

    .already-registered a:hover {
      text-decoration: underline;
    }

    .btn-register {
      background-color: #69452c;
      color: white;
      border: none;
      border-radius: 25px;
      padding: 10px 20px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-register:hover {
      background-color: #3b271c;
    }

    footer {
      text-align: center;
      background-color: #7c1313;
      color: #fd8916;
      padding: 8px;
      width: 100%;
      font-size: 13px;
      position: fixed;
      bottom: 0;
      font-family: "Libre Caslon Display", serif;
    }

    .libre-caslon-display-regular {
      font-family: "Libre Caslon Display", serif;
      font-weight: 400;
      font-style: normal;
    }


  </style>
</head>

<body>
  <video autoplay muted loop id="bg-video">
    <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
    Your browser does not support HTML5 video.
  </video>

  <div class="container">
    <div class="form-card">
      <div class="logo">
        <img src="{{ asset('images/image.png') }}" alt="Amimir Logo" class="logo-img">
        <h2>Amimir Library</h2>
      </div>

      <!-- Ganti bagian ini -->
      <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm-password">Confirm password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>

        <div class="form-footer">
          <div class="already-registered">
            <p><a href="/login">Already registered?</a></p>
          </div>
          <button type="submit" class="btn-register">Register</button>
        </div>
      </form>
    </div>
  </div>

  <footer>
    <p>© Amimir Group | Created for ETS</p>
  </footer>
</body>
</html>
