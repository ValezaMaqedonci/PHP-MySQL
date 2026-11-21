
<?php
session_start();

require_once('config.php');

echo "<h2>DATABASE TEST</h2>";

echo "User ID: ";
var_dump($_SESSION['user_id'] ?? 'MISSING');

echo "<br>Admin: ";
var_dump($_SESSION['is_admin'] ?? 'MISSING');

echo "<br>Total bookings: ";

$stmt = $conn->query("SELECT COUNT(*) FROM bookings");
echo $stmt->fetchColumn();

echo "<br><br>All bookings:<br>";

$stmt = $conn->query("SELECT * FROM bookings");

echo "<pre>";
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
echo "</pre>";

exit();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get session information
$user_id = (int) $_SESSION['user_id'];
$isAdmin = (int) ($_SESSION['is_admin'] ?? 0);
$username = $_SESSION['username'] ?? 'User';

// Get bookings from database
try {

    if ($isAdmin === 1) {

        // Admin can see ALL bookings
        $sql = "SELECT
                    bookings.id,
                    movies.movie_name,
                    users.email,
                    bookings.nr_tickets,
                    bookings.date,
                    bookings.time,
                    bookings.is_approved
                FROM bookings
                LEFT JOIN movies
                    ON movies.id = bookings.movie_id
                LEFT JOIN users
                    ON users.id = bookings.user_id
                ORDER BY bookings.id DESC";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

    } else {

        // Normal user can see ONLY their bookings
        $sql = "SELECT
                    bookings.id,
                    movies.movie_name,
                    users.email,
                    bookings.nr_tickets,
                    bookings.date,
                    bookings.time,
                    bookings.is_approved
                FROM bookings
                LEFT JOIN movies
                    ON movies.id = bookings.movie_id
                LEFT JOIN users
                    ON users.id = bookings.user_id
                WHERE bookings.user_id = :user_id
                ORDER BY bookings.id DESC";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':user_id' => $user_id
        ]);
    }

    $bookings_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Something went wrong while loading bookings. Please check your database structure.");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Bookings</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: calc(100vh - 56px);
        }

        .nav-link {
            color: #333;
        }

        .nav-link:hover {
            background-color: #e9ecef;
        }

        .main-content {
            padding-top: 30px;
        }

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<header class="navbar navbar-dark sticky-top bg-dark shadow">

    <a class="navbar-brand px-3" href="dashboard.php">
        Welcome, <?php echo htmlspecialchars($username); ?>
    </a>

    <div class="navbar-nav">

        <div class="nav-item text-nowrap">

            <a class="nav-link px-3" href="logout.php">
                Sign out
            </a>

        </div>

    </div>

</header>


<div class="container-fluid">

    <div class="row">

        <!-- SIDEBAR -->

        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">

            <div class="position-sticky pt-3">

                <ul class="nav flex-column">

                    <li class="nav-item">

                        <a class="nav-link" href="home.php">
                            Home
                        </a>

                    </li>

                    <?php if ($isAdmin === 1) { ?>

                        <li class="nav-item">

                            <a class="nav-link" href="dashboard.php">
                                Dashboard
                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="list_movies.php">
                                Movies
                            </a>

                        </li>

                    <?php } ?>

                    <li class="nav-item">

                        <a class="nav-link active fw-bold" href="bookings.php">
                            Bookings
                        </a>

                    </li>

                </ul>

            </div>

        </nav>


        <!-- MAIN CONTENT -->

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">

            <div class="d-flex justify-content-between align-items-center border-bottom mb-4">

                <h1 class="h2 pb-2">
                    Movie Bookings
                </h1>

            </div>


            <div class="table-container">

                <h4 class="mb-3">

                    <?php
                    echo ($isAdmin === 1)
                        ? "All Movie Bookings"
                        : "My Bookings";
                    ?>

                </h4>


                <div class="table-responsive">

                    <table class="table table-striped table-hover">

                        <thead class="table-dark">

                            <tr>

                                <th>Movie Name</th>

                                <?php if ($isAdmin === 1) { ?>

                                    <th>User Email</th>

                                <?php } ?>

                                <th>Number of Tickets</th>

                                <th>Date</th>

                                <th>Time</th>

                                <th>Approved</th>

                                <?php if ($isAdmin === 1) { ?>

                                    <th>Actions</th>

                                <?php } ?>

                            </tr>

                        </thead>


                        <tbody>

                            <?php if (empty($bookings_data)) { ?>

                                <tr>

                                    <td colspan="<?php echo ($isAdmin === 1) ? 7 : 5; ?>"
                                        class="text-center text-muted py-4">

                                        No bookings found.

                                    </td>

                                </tr>

                            <?php } else { ?>

                                <?php foreach ($bookings_data as $booking) { ?>

                                    <tr>

                                        <td>
                                            <?php
                                            echo htmlspecialchars($booking['movie_name'] ?? 'Movie unavailable');
                                            ?>
                                        </td>


                                        <?php if ($isAdmin === 1) { ?>

                                            <td>
                                                <?php
                                                echo htmlspecialchars($booking['email'] ?? 'Unknown');
                                                ?>
                                            </td>

                                        <?php } ?>


                                        <td>
                                            <?php
                                            echo htmlspecialchars((string)$booking['nr_tickets']);
                                            ?>
                                        </td>


                                        <td>
                                            <?php
                                            echo htmlspecialchars($booking['date'] ?? '');
                                            ?>
                                        </td>


                                        <td>
                                            <?php
                                            echo htmlspecialchars($booking['time'] ?? '');
                                            ?>
                                        </td>


                                        <td>

                                            <?php if ((string)$booking['is_approved'] === '1') { ?>

                                                <span class="badge bg-success">
                                                    Approved
                                                </span>

                                            <?php } else { ?>

                                                <span class="badge bg-warning text-dark">
                                                    Pending
                                                </span>

                                            <?php } ?>

                                        </td>


                                        <?php if ($isAdmin === 1) { ?>

                                            <td>

                                                <a class="btn btn-sm btn-success"
                                                   href="approve.php?id=<?php echo (int)$booking['id']; ?>">

                                                    Approve

                                                </a>


                                                <a class="btn btn-sm btn-danger"
                                                   href="decline.php?id=<?php echo (int)$booking['id']; ?>"
                                                   onclick="return confirm('Are you sure you want to decline this booking?');">

                                                    Decline

                                                </a>

                                            </td>

                                        <?php } ?>

                                    </tr>

                                <?php } ?>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
