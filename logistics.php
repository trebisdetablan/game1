<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstralisDB: Logistics</title>
    <link rel="stylesheet" href="logistics.css">
</head>
<body>
<div class="viewCont">

    <!-- Navigation Bar -->
    <div class="navbar">
        <h1>AstralisDB</h1>
        <a href="index.php">
            <div>
                <img src="white-home.png" alt="Home Icon"/>
                <p>Home</p>
            </div>
        </a>
        <a href="research.php">
            <div>
                <img src="white-flask.png" alt="Research Icon"/>
                <p>Research</p>
            </div>
        </a>
        <a href="logistics.php">
            <div class="active">
                <img src="black-crate.png" alt="Logistics Icon"/>
                <p>Logistics</p>
            </div>
        </a>
        <a href="config.php">
            <div>
                <img src="white-gear.png" alt="Config Icon"/>
                <p>Config</p>
            </div>
        </a>
    </div>

    <?php
    // Determine the current menu selection, defaulting to 'base'
    $menu = $_GET['menu'] ?? 'base';
    ?>

    <!-- Main Content -->
    <div class="main">
        <h1>Logistics</h1>
        <hr>
        <div class="mainCont">

            <!-- Categories -->
            <div class="categories">
                <form method="GET" action="">
                    <button type="submit" name="menu" value="base" class="catButton <?= $menu === 'base' ? 'active' : '' ?>">
                        Base Numbers
                    </button>
                    <button type="submit" name="menu" value="run" class="catButton <?= $menu === 'run' ? 'active' : '' ?>">
                        Production Runs
                    </button>
                    <button type="submit" name="menu" value="result" class="catButton <?= $menu === 'result' ? 'active' : '' ?>">
                        Results
                    </button>
                </form>
            </div>

            <!-- Menu Content -->
            <div class="menu-content">
                <?php if ($menu === 'base'): ?>
                    <h2>Base Numbers</h2>
                    <p>Manage and allocate your base numbers for production data.</p>
                    <hr>
                    <form action="submit_base_numbers.php" method="POST">
                        <!-- Firearms -->
                        <label for="firearms">Firearms:</label>
                        <input type="number" name="firearms" id="firearms" required><br>

                        <!-- APC/IFV -->
                        <label for="apc_ifv">APC/IFV:</label>
                        <input type="number" name="apc_ifv" id="apc_ifv" required><br>

                        <!-- MBT -->
                        <label for="mbt">MBT:</label>
                        <input type="number" name="mbt" id="mbt" required><br>

                        <!-- Artillery Piece -->
                        <label for="artillery_piece">Artillery Piece:</label>
                        <input type="number" name="artillery_piece" id="artillery_piece" required><br>

                        <!-- Self Propelled Artillery Gun -->
                        <label for="self_propelled_artillery">Self Propelled Artillery Gun:</label>
                        <input type="number" name="self_propelled_artillery" id="self_propelled_artillery" required><br>

                        <!-- Jet Fighter -->
                        <label for="jet_fighter">Jet Fighter:</label>
                        <input type="number" name="jet_fighter" id="jet_fighter" required><br>

                        <!-- Strategic Bomber/Tanker -->
                        <label for="strategic_bomber">Strategic Bomber/Tanker:</label>
                        <input type="number" name="strategic_bomber" id="strategic_bomber" required><br>

                        <!-- AWACS/EW Aircraft -->
                        <label for="awacs_ew">AWACS/EW Aircraft:</label>
                        <input type="number" name="awacs_ew" id="awacs_ew" required><br>

                        <!-- Helicopter -->
                        <label for="helicopter">Helicopter:</label>
                        <input type="number" name="helicopter" id="helicopter" required><br>

                        <!-- Ground-Based Air Defense Complex -->
                        <label for="ground_based_air_defense">Ground-Based Air Defense Complex:</label>
                        <input type="number" name="ground_based_air_defense" id="ground_based_air_defense" required><br>

                        <!-- Short-Range Air Defense Complex -->
                        <label for="short_range_air_defense">Short-Range Air Defense Complex:</label>
                        <input type="number" name="short_range_air_defense" id="short_range_air_defense" required><br>

                        <!-- Anti-Air Artillery/Guns -->
                        <label for="anti_air_artillery">Anti-Air Artillery/Guns:</label>
                        <input type="number" name="anti_air_artillery" id="anti_air_artillery" required><br>

                        <!-- Anti-Ballistic Missile Defense Complex -->
                        <label for="anti_ballistic_missile_defense">Anti-Ballistic Missile Defense Complex:</label>
                        <input type="number" name="anti_ballistic_missile_defense" id="anti_ballistic_missile_defense" required><br>

                        <!-- Cruise Missiles -->
                        <label for="cruise_missiles">Cruise Missiles:</label>
                        <input type="number" name="cruise_missiles" id="cruise_missiles" required><br>

                        <!-- Ballistic Missiles -->
                        <label for="ballistic_missiles">Ballistic Missiles:</label>
                        <input type="number" name="ballistic_missiles" id="ballistic_missiles" required><br>

                        <button type="submit">Submit</button>
                    </form>
                <?php elseif ($menu === 'run'): ?>
                    <h2>Production Runs</h2>
                    <p>Track and manage short, long, and continuous production runs of equipment.</p>
                    <hr>
                    <?php
                    // Determine which section to display based on the button clicked
                    $viewSection = isset($_POST['view_section']) ? $_POST['view_section'] : 'new'; // Default to 'new'

                    // Handle form submission (this would be for creating a new production run)
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $viewSection === 'new') {
                        // Process the new production run form data here
                        // For simplicity, we'll just simulate a response.
                        echo "<p>New Production Run Submitted! (This would normally be saved to the database.)</p>";
                    }
                    ?>

                    <div class="production-runs-container">
                        <div class="button-container">
                            <form method="POST">
                                <!-- Button for new production run -->
                                <button type="submit" name="view_section" value="new" class="toggle-btn <?php echo $viewSection === 'new' ? 'active' : ''; ?>">New Production Run</button>

                                <!-- Button for previous production runs -->
                                <button type="submit" name="view_section" value="previous" class="toggle-btn <?php echo $viewSection === 'previous' ? 'active' : ''; ?>">Previous Production Runs</button>
                            </form>
                        </div>

                        <!-- New Production Run Form -->
                        <?php if ($viewSection === 'new'): ?>
                            <div class="new-production-run-section active">
                                <h2>Create New Production Run</h2>
                                <form class="production-form" method="POST">
                                    <label for="nation-id">Nation ID:</label>
                                    <input type="number" id="nation-id" name="nation-id" required>

                                    <label for="weapon-name">Weapon Name:</label>
                                    <input type="text" id="weapon-name" name="weapon-name" required>

                                    <label for="quantity">Quantity to be Made:</label>
                                    <input type="number" id="quantity" name="quantity" required>

                                    <label for="discord-link">Discord Message Link:</label>
                                    <input type="url" id="discord-link" name="discord-link" required>

                                    <label for="start-year">Start Year:</label>
                                    <input type="number" id="start-year" name="start-year" min="1900" max="2099" required>

                                    <label for="end-year">End Year:</label>
                                    <input type="number" id="end-year" name="end-year" min="1900" max="2099" required>

                                    <label for="years-between">Years Between Start and End:</label>
                                    <input type="number" id="years-between" name="years-between" required readonly>

                                    <button type="submit">Submit Production Run</button>
                                </form>
                            </div>
                        <?php endif; ?>

                        <!-- Previous Production Runs Table -->
                        <?php if ($viewSection === 'previous'): ?>
                            <div class="previous-production-runs-section active">
                                <h2>Previous Production Runs</h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Weapon</th>
                                            <th>Quantity</th>
                                            <th>Start Year</th>
                                            <th>End Year</th>
                                            <th>Years Between</th>
                                            <th>Discord Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- This will be populated with previous production runs (this would come from your database) -->
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php elseif ($menu === 'result'): ?>
                    <h2>Results</h2>
                    <p>View the results and data summaries of your activities.</p>
                <?php else: ?>
                    <h2>404 Not Found</h2>
                    <p>The menu you are looking for does not exist.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>

</div>
</body>
</html>