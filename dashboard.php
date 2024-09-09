<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection code here
require_once("db_connection.php");

// Start a session
session_start();

// Check if the user is logged in (i.e., user ID is set in the session)
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or show an access denied message if not logged in
    header("Location: login1.php");
    exit();
}

// You can access user-related data from the session
$userId = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>MST Coin Auction - Your Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="stylesheet" href="dashboards.css">
    <link href='https://fonts.googleapis.com/css?family=Young Serif' rel='stylesheet'>
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
    <script defer src="JS_index1.js"></script>
    <script defer src="JS_index.js"></script>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 0;">

    <!-- Header -->
    <header>
        <h1>Welcome to MST Coin Auction</h1>
    </header>

    <!-- Breadcrumb -->
    <nav>
        <ul>
            <li><a href="dashboard.php"><i class="feather icon-home"></i> Dashboard</a></li>
            <li style="display: inline;"><a href="javascript:">Home of Rain57</a></li>  
            <div class="menu-icon" id="topnav-right">
                <span onclick="openNav()">&#9776;</span>
            </div>
        </ul>
        <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <li><a href="index.php">Home</a></li>
                <li class="topnav-right"><a href="bankdetails.php">Banking Details</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li class="topnav-right"><a href="logout.php">Sign Out</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </div>
            
    </nav>

    <!-- <div class="bank-details">
        <?php
        // Include your database connection code here (e.g., mysqli_connect)
        require_once("db_connection.php");

        // Check if the user is logged in and retrieve user ID
        session_start();
        if (!isset($_SESSION["user_id"])) {
            // Redirect to the login page if the user is not logged in
            header("Location: login1.php");
            exit();
        }
        $userId = $_SESSION["user_id"];
        echo "<h2>Bank Details</h2>";
        // Retrieve bank details based on user ID
        $sqlBank = "SELECT account_number, bank_name FROM bank_details WHERE user_id = ?";
        $stmtBank = mysqli_prepare($conn, $sqlBank);
        mysqli_stmt_bind_param($stmtBank, "i", $userId);
        mysqli_stmt_execute($stmtBank);
        mysqli_stmt_bind_result($stmtBank, $accountNumber, $bankName);

        while (mysqli_stmt_fetch($stmtBank)) {
            echo "<p><strong>Account Number:</strong> $accountNumber</p>";
            echo "<p><strong>Bank Name:</strong> $bankName</p>";
        }
        echo "<h2>Profile</h2>";
        // Close the statement and connection only when you're done using them
        $sql = "SELECT username, email FROM users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $username, $email);
        mysqli_stmt_fetch($stmt);

        echo "<p><strong>Username:</strong> $username</p>";
        echo "<p><strong>Email:</strong> $email</p>";

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        ?>
    </div> -->
    <!-- Coins Currently in the Market Section -->
    <section class="market-coins-section">
        <div class="container">
            <h2>Coins Currently in the Market</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="coin-item">
                        <img src="images/coin1.png" width="150px" height="150px">
                        <p>Price: R1</p>
                        <p>Available Quantity: 500</p>
                        <button class="btn btn-primary">50% Return</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="coin-item">
                        <img src="images/coin2.png" width="150px" height="150px">
                        <p>Price: R5</p>
                        <p>Available Quantity: 1000</p>
                        <button class="btn btn-primary">75% Return</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="coin-item">
                        <img src="images/coin3.png" width="180px" height="150px">
                        <p>Price: R10</p>
                        <p>Available Quantity: 300</p>
                        <button class="btn btn-primary">100% Return</button>
                    </div>
                    <div class="col-md-4">
                        <div class="coin-item">
                            <img src="images/coin1.png" width="150px" height="150px">
                            <p>Price: R15</p>
                            <p>Available Quantity: 300</p>
                            <button class="btn btn-primary">150% Return</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Balance of Coins Section -->
    <section class="balance-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Your Coin Balance</h2>
                    <p>Your current balance of coins:</p>
                    <div id="coinBalance" class="balance-value">K0</div>
                </div>
                <div class="col-md-6">
                    <!-- Button to update balance (for demonstration) -->
                    <button id="updateBalanceButton" class="btn btn-primary">Update Balance</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Buy Section -->
    <section class="buy-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Buy Coins</h2>
                    <p>Get ready to bid on your favorite coins and expand your collection.</p>
                    <button id="buyCoinsButton" class="btn btn-primary">Buy Now</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Sell Section -->
    <section class="sell-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Sell Coins</h2>
                    <p>Ready to cash in on your rare coins? Sell them to eager collectors.</p>
                    <button class="btn btn-primary">Sell Now</button>
                </div>
            </div>
        </div>
    </section>


    <!-- Main Content -->
    <main>
        <section>
            <div class="countdown-timer">
                <h2>Token Sale Countdown</h2>
                <p>Time to Next Auction: <span id="countdown"></span></p>
                <!--countclock with javascript-->
                <div class="launch-timer">
                    <div>
                        <p id="days">00</p>
                        <span>Days</span>
                    </div>
                    <div>
                        <p id="hours">00</p>
                        <span>Hours</span>
                    </div>
                    <div>
                        <p id="minutes">00</p>
                        <span>Minutes</span>
                    </div>
                    <div>
                        <p id="seconds">00</p>
                        <span>Seconds</span>
                    </div>
                </div>

            </div>
        </section>
        <!-- Main Content -->
        <main class="main-content">
            <div class="summary-container">
                <h2>Daily Summary</h2>
                <div class="summary-items">
                    <div class="summary-item blue-bg">
                        <h3>Coins Bought</h3>
                        <p>K0</p>
                    </div>
                    <div class="summary-item green-bg">
                        <h3>Coins Sold</h3>
                        <p>K0</p>
                    </div>
                    <div class="summary-item yellow-bg">
                        <h3>Referral Commission</h3>
                        <p>K0</p>
                    </div>
                </div>
            </div>

            <div class="transactions-container">
                <h2>Recent Transactions</h2>
                <table class="transaction-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Recipient</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5">No Coin Pay</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- Footer -->
        <footer>
            <p>&copy; 2023 MST Coin Auction</p>
        </footer>

</body>

</html>