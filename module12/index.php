<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Sign Up</title>
    <!-- Corrected Bootstrap 5 CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm p-4">
                <h2 class="text-center mb-4">Account Login</h2>
                
                <!-- Pointing to dashboard.php upon successful submission -->
                <form action="dashboard.php" method="POST" class="needs-validation" novalidate>
                    
                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="emailAddress" placeholder="name@example.com" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <div class="invalid-feedback">Please enter your password.</div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Login to Dashboard</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Validation Script -->
<script>
    (() => {
      'use strict'
      const forms = document.querySelectorAll('.needs-validation')
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })()
</script>

<script src="https://jsdelivr.net"></script>
</body>
</html>
