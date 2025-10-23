<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amimir Library - Login</title>

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
      gap: 10px;
      margin-bottom: 20px;
    }

    .logo-img {
      width: 50px;
      height: 50px;
      object-fit: contain;
    }

    .logo h2 {
      font-weight: 700;
      color: #000;
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
    }

    input:focus {
      outline: none;
      border-color: #7c1313;
      box-shadow: 0 0 5px rgba(124, 19, 19, 0.5);
    }

    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
      font-size: 14px;
    }

    .remember-me {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .remember-me label {
      font-weight: 500;
      margin: 0;
    }

    .forgot-password a {
      text-decoration: none;
      color: #4b2e1e;
      font-weight: 600;
    }

    .forgot-password a:hover {
      text-decoration: underline;
    }

    .form-footer {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .btn-login {
      background-color: #69452c;
      color: white;
      border: none;
      border-radius: 25px;
      padding: 10px 25px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-login:hover {
      background-color: #3b271c;
    }

    footer {
      text-align: center;
      background-color: #7c1313;
      color: #f8e3ca;
      padding: 8px;
      width: 100%;
      position: fixed;
      bottom: 0;
      font-size: 13px;
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

      <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <div class="options">
          <div class="remember-me">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
          </div>
          <div class="forgot-password">
            <a href="#">Forgot Password?</a>
          </div>
        </div>

        <div class="form-footer">
          <button type="submit" class="btn-login">Login</button>
        </div>
      </form>
    </div>
  </div>

  <footer>
    <p>© Amimir Group | Created for ETS</p>
  </footer>
</body>
</html>
