<?php 
include 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        $msg = "Message sent successfully!";
    } else {
        $msg = "Failed to send message. Please try again.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PixelCraft Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .section-header {
            background: linear-gradient(to right, #343a40, #495057);
            color: #ffffff;
            padding: 2rem;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        .pricing-card {
            background-color: #ffffff;
            border-left: 5px solid #17a2b8;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }
        .contact-form-custom {
            background-color: #f1f3f5;
            padding: 2rem;
            border-radius: 10px;
            border: 1px solid #dee2e6;
        }
        .contact-form-custom label {
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <!-- Section: About -->
    <div class="section-header">
        <h2>About PixelCraft Studio</h2>
        <p>PixelCraft Studio is your go-to destination for stunning photography and professional memories. We capture weddings, portraits, events, and everything in between with creative brilliance and unmatched service.</p>
    </div>

    <!-- Section: Pricing -->
    <div class="mb-5">
        <h4 class="mb-4 text-center">💸 Our Services & Pricing</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="pricing-card">
                    <h5>Wedding Shoot</h5>
                    <p>Complete day coverage with edited album and candid shots.</p>
                    <strong>₹25,000</strong>
                </div>
                <div class="pricing-card">
                    <h5>Pre-Wedding Shoot</h5>
                    <p>Outdoor shoot with creative concepts and styling support.</p>
                    <strong>₹10,000</strong>
                </div>
                <div class="pricing-card">
                    <h5>Studio Portraits</h5>
                    <p>Indoor portraits with lighting setup and makeup support.</p>
                    <strong>₹3,000</strong>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pricing-card">
                    <h5>Product Photography</h5>
                    <p>White background and lifestyle shots for catalogs and ecommerce.</p>
                    <strong>₹2,000</strong>
                </div>
                <div class="pricing-card">
                    <h5>Event Coverage</h5>
                    <p>Birthdays, ceremonies, corporate events with high-quality output.</p>
                    <strong>₹6,000</strong>
                </div>
                <div class="pricing-card">
                    <h5>Custom Packages</h5>
                    <p>Let’s work together to create a package that fits your needs!</p>
                    <strong>Contact us</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Section: Contact Form -->
    <div class="mb-5">
        <h4 class="mb-4 text-center">📞 Get in Touch</h4>

        <?php if (isset($msg)): ?>
            <div class="alert alert-info"><?php echo $msg; ?></div>
        <?php endif; ?>

        <form action="info.php" method="POST" class="shadow-sm p-4 rounded bg-light">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" required class="form-control" placeholder="Enter your full name">
            </div>
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" required class="form-control" placeholder="Enter your email address">
            </div>
            <div class="form-group mt-3">
                <label for="message">Your Message</label>
                <textarea name="message" rows="4" required class="form-control" placeholder="Your message..."></textarea>
            </div>
            <button type="submit" name="contact_submit" class="btn btn-success mt-3">Submit</button>
        </form>
    </div>
</div>

</body>
</html>
