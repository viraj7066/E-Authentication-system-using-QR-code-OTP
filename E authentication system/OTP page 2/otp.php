<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Verify Account</title>
  </head>
  <body>
    <form method=post action='<B>sendsms.php</B>'>
    <div class="container">
      <h2>Verify Your OTP</h2>
      <p>We messaged you the six digit code  <br/> Enter the code below to confirm your identity.</p>
      <div class="code-container">
        <input type="number" class="code" placeholder="0" min="0" max="9" required>
        <input type="number" class="code" placeholder="0" min="0" max="9" required>
        <input type="number" class="code" placeholder="0" min="0" max="9" required>
        <input type="number" class="code" placeholder="0" min="0" max="9" required>
        <input type="number" class="code" placeholder="0" min="0" max="9" required>
        <input type="number" class="code" placeholder="0" min="0" max="9" required>
      </div>
      
        <a href="../project website/demo 3/index.html" class="button" style="margin-left:120px; margin-right: 120px; text-decoration: none;">Verify</a>
      
      
    </div>
    <script src="script.js"></script>
    </form>
  </body>
</html>