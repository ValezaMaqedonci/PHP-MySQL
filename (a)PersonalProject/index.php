
<?php

$pageTitle = 'Home | Hotel Bellavista Spain';

require_once __DIR__ . '/includes/header.php';

// Get featured rooms from database
$stmt = $pdo->query("
    SELECT rooms.*, room_types.name AS category
    FROM rooms
    INNER JOIN room_types
    ON rooms.room_type_id = room_types.id
    ORDER BY rooms.price_per_night ASC
    LIMIT 3
");

$rooms = $stmt->fetchAll();

// Get hotel services
$serviceStmt = $pdo->query("
    SELECT * FROM services LIMIT 4
");

$services = $serviceStmt->fetchAll();

?>

<!-- HERO SECTION -->

<section class="hero">

    <div class="hero-overlay"></div>

    <div class="hero-content">

        <span class="hero-label">WELCOME TO</span>

        <h1>hotel bellavista</h1>

        <div class="hero-location">
            — SPAIN —
        </div>

        <p>
            Experience the perfect stay
            in the heart of Spain.
        </p>

        <a href="<?= BASE_URL ?>rooms/index.php"
           class="primary-btn">
            Explore Rooms <span>→</span>
        </a>

    </div>

    <!-- BOOKING BAR -->

    <div class="booking-bar">

        <form action="<?= BASE_URL ?>rooms/index.php"
              method="GET"
              class="booking-form">

            <div class="booking-field">
                <label>CHECK IN</label>
                <input type="date"
                       name="check_in"
                       id="check_in"
                       required>
            </div>

            <div class="booking-field">
                <label>CHECK OUT</label>
                <input type="date"
                       name="check_out"
                       id="check_out"
                       required>
            </div>

            <div class="booking-field">
                <label>GUESTS</label>
                <select name="guests">
                    <option value="1">1 Guest</option>
                    <option value="2" selected>2 Guests</option>
                    <option value="3">3 Guests</option>
                    <option value="4">4 Guests</option>
                </select>
            </div>

            <button type="submit" class="search-btn">
                Search Rooms →
            </button>

        </form>

    </div>

</section>


<!-- HOTEL FEATURES -->

<section class="features-strip">

    <div class="feature-item">
        <span>♢</span>
        <p>Luxury Stay</p>
    </div>

    <div class="feature-item">
        <span>✿</span>
        <p>Spa & Wellness</p>
    </div>

    <div class="feature-item">
        <span>♨</span>
        <p>Fine Dining</p>
    </div>

    <div class="feature-item">
        <span>⌖</span>
        <p>Prime Location</p>
    </div>

</section>


<!-- ABOUT SECTION -->

<section class="about-section">

    <div class="about-image">
        <img
            src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=1000"
            alt="Luxury hotel swimming pool">
    </div>

    <div class="about-content">

        <span class="section-label">DISCOVER BELLAVISTA</span>

        <h2>A place where every moment feels special.</h2>

        <p>
            Welcome to Hotel Bellavista, where Mediterranean
            charm meets exceptional hospitality.

            Enjoy beautiful surroundings, elegant accommodation
            and unforgettable experiences.
        </p>

        <a href="<?= BASE_URL ?>about.php" class="text-link">
            Discover Our Story →
        </a>

    </div>

</section>


<!-- ROOMS SECTION -->

<section class="rooms-section">

    <div class="section-heading">

        <span class="section-label">ACCOMMODATION</span>

        <h2>Our Beautiful Rooms</h2>

        <p>
            Find the perfect space for your next getaway.
        </p>

    </div>

    <div class="rooms-grid">

        <?php foreach ($rooms as $room): ?>

            <article class="room-card">

                <div class="room-image">

                    <?php if (!empty($room['image'])): ?>

                        <img
                            src="<?= BASE_URL . 'assets/images/' . e($room['image']) ?>"
                            alt="<?= e($room['name']) ?>">

                    <?php else: ?>

                        <img
                            src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800"
                            alt="Hotel room">

                    <?php endif; ?>

                </div>

                <div class="room-details">

                    <span class="room-category">
                        <?= e($room['category']) ?>
                    </span>

                    <h3><?= e($room['name']) ?></h3>

                    <p><?= e($room['description']) ?></p>

                    <div class="room-bottom">

                        <div class="room-price">
                            <strong>
                                €<?= number_format($room['price_per_night'], 2) ?>
                            </strong>
                            <span>/ night</span>
                        </div>

                        <a href="<?= BASE_URL ?>rooms/details.php?id=<?= (int)$room['id'] ?>"
                           class="room-link">
                            View Details →
                        </a>

                    </div>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

    <div class="center-btn">

        <a href="<?= BASE_URL ?>rooms/index.php"
           class="outline-btn">
            View All Rooms
        </a>

    </div>

</section>


<!-- SERVICES SECTION -->

<section class="services-section">

    <div class="section-heading">

        <span class="section-label">YOUR EXPERIENCE</span>

        <h2>Designed Around You</h2>

        <p>Everything you need for a relaxing stay.</p>

    </div>

    <div class="services-grid">

        <?php foreach ($services as $service): ?>

            <div class="service-card">

                <div class="service-icon">✧</div>

                <h3><?= e($service['name']) ?></h3>

                <p><?= e($service['description']) ?></p>

            </div>

        <?php endforeach; ?>

    </div>

</section>


<!-- CALL TO ACTION -->

<section class="cta-section">

    <span class="section-label">YOUR NEXT ESCAPE</span>

    <h2>Your stay in Spain starts here.</h2>

    <p>
        Make your next holiday unforgettable
        at Hotel Bellavista.
    </p>

    <a href="<?= BASE_URL ?>rooms/index.php"
       class="primary-btn">
        Book Your Stay →
    </a>

</section>


<?php require_once __DIR__ . '/includes/footer.php'; ?>
