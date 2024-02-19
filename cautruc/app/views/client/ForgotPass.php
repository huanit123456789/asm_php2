<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Snippet - BBBootstrap</title>
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="./public/js/function.js"></script>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <style>
    ::-webkit-scrollbar {
      width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    body {
      background-position: center;
      background-color: #eee;
      background-repeat: no-repeat;
      background-size: cover;
      color: #505050;
      font-family: "Rubik", Helvetica, Arial, sans-serif;
      font-size: 14px;
      font-weight: normal;
      line-height: 1.5;
      text-transform: none;
    }

    .forgot {
      background-color: #fff;
      padding: 12px;
      border: 1px solid #dfdfdf;
    }

    .padding-bottom-3x {
      padding-bottom: 72px !important;
    }

    .card-footer {
      background-color: #fff;
    }

    .btn {

      font-size: 13px;
    }

    .form-control:focus {
      color: #495057;
      background-color: #fff;
      border-color: #76b7e9;
      outline: 0;
      box-shadow: 0 0 0 0px #28a745;
    }
  </style>
</head>

<body className='snippet-body'>
  <div class="container padding-bottom-3x mb-2 mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="forgot">

          <h2>Forgot your password?</h2>
          <p>Change your password in three easy steps. This will help you to secure your password!</p>
          <ol class="list-unstyled">
            <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
            <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary link</li>
            <li><span class="text-primary text-medium">3. </span>Use the link to reset your password</li>
          </ol>

        </div>

        <form class="card mt-4" method="POST" action="?url=forgotpass">
          <div class="card-body">
            <div class="form-group">
              <label for="email-for-pass">Enter your email address</label><span style="color:red; margin-left:30px; font-size:10px"><?= $_SESSION["validation"]["email"]??"" ?></span>
              <input class="form-control" type="text" name="email" id="email-for-pass" require=""><small
                class="form-text text-muted">Enter the email address you used during the registration on
                BBBootstrap.com. Then we'll email a link to this address.</small>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-success" name="submit" type="submit">Get New Password</button>
            <a class="btn btn-danger" href="?url=signinclient">Back to Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>