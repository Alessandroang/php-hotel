<?php
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
    
];

// Logica per filtrare gli hotel in base al parcheggio

if (isset($_GET['parking']) && ($_GET['parking'] === '0' || $_GET['parking'] === '1')) {
    $parkingFilter = $_GET['parking'];
    foreach ($hotels as $hotel) {
        if (($parkingFilter === '1' && $hotel['parking']) || ($parkingFilter === '0' && !$hotel['parking'])) {
            $filteredHotels[] = $hotel;
        }
    }
} else {
    $filteredHotels = $hotels;
}
?>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>PHP Hotels</title>
</head>

<body>
    <div class="container mt-4">
    <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel): ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <title>PHP Hotels</title>
    
</head>

<body>
    <div class="container mt-4">
        <!-- Form per il filtro -->
        <form action="" method="get">
            <div class="mb-3">
                <label for="parkingFilter" class="form-label fs-5 fw-bold">Filtro per parcheggio:</label>
                <select class="form-select" id="parkingFilter" name="parking">
                <option value="" <?php echo !isset($_GET['parking']) ? 'selected' : ''; ?>>Tutti gli hotel</option>
                    <option value="1" <?php echo isset($_GET['parking']) && $_GET['parking'] === '1' ? 'selected' : ''; ?>>Con parcheggio
                        </option>
                    <option value="0" <?php echo isset($_GET['parking']) && $_GET['parking'] === '0' ? 'selected' : ''; ?>>Senza parcheggio
                        </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtra</button>
        </form>

        <!-- Tabella degli hotel -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Visualizza gli hotel filtrati
                foreach ($filteredHotels as $hotel): ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
