<?php
include 'connect.php';
session_start();

// ----------- SIGN UP -----------  
if (isset($_POST['signUp'])) {
    // Sanitize and validate inputs
    $firstName = trim($_POST['firstName']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('⚠️ Invalid email format'); window.location.href='signup.php';</script>";
        exit();
    }

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('⚠️ Email address already registered!'); window.location.href='signup.php';</script>";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO user (firstName, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $firstName, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert('✅ Registered successfully! Please log in.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('❌ Registration failed: " . $stmt->error . "'); window.location.href='signup.php';</script>";
        }
    }
    $stmt->close();
}
?>
<?php
include 'connect.php';
session_start();

// ----------- SIGN IN -----------  
if (isset($_POST['signIn'])) {
    // Sanitize and validate inputs
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('⚠️ Invalid email format'); window.location.href='login.php';</script>";
        exit();
    }

    $loginQuery = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($loginQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $loginResult = $stmt->get_result();

    if ($loginResult->num_rows > 0) {
        $user = $loginResult->fetch_assoc();

        // Verify the password entered by the user
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            // Redirect to homepage
            header("Location: main.php");
            exit();
        } else {
            echo "<script>alert('❌ Incorrect password. Please try again.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('❌ Email not found. Please sign up first.'); window.location.href='login.php';</script>";
    }

    $stmt->close();
}
?>
