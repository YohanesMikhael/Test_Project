<!DOCTYPE html>
<html>
<head>
    <title>Subscribe Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form method="POST" action="/subscribe" id="subscribeForm">
            @csrf
            <div class="form-group">
                <label for="email">Get the latest insight into property and infrastructure</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Email....">
            </div>
            <div class="text-danger" id="emailError"></div>
                <button type="submit" class="btn btn-primary mt-3">Subscribe</button>
            <div class="text-success mt-2" id="successMessage" style="display: none;">Subscription successful!</div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle form submission
            $("#subscribeForm").submit(function(e) {
                e.preventDefault();
                var email = $("#email").val();

                // Reset error and success messages
                $("#emailError").text("");
                $("#successMessage").hide();

                // Perform client-side validation
                if (email.trim() === "") {
                    $("#emailError").text("Email must be filled");
                } else if (email.length < 10) {
                    $("#emailError").text("Email must be at least 10 characters");
                } else if (!isValidEmail(email)) {
                    $("#emailError").text("Invalid email format");
                } else {
                    // If validation is successful, perform POST request to backend
                    $.ajax({
                        url: "/subscribe",
                        method: "POST",
                        data: {
                            email: email
                        },
                        success: function() {
                            // Display success message and reset form
                            $("#successMessage").show();
                            $("#subscribeForm")[0].reset();
                        },
                        error: function(xhr, status, error) {
                            // Display error message from backend
                            var errorMessage = xhr.responseText;
                            $("#emailError").text(errorMessage);
                        }
                    });
                }
            });

            // Function to validate email format
            function isValidEmail(email) {
                var emailRegex = /\S+@\S+\.\S+/;
                return emailRegex.test(email);
            }
        });
    </script>
</body>
</html>