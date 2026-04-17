<?php
$movies = [
    [
        'title' => "SONE-207",
        'poster' => "https://wallpapercave.com/wp/wp4770368.jpg",
        'rating' => 8.6,
        'age' => "D 18+",
        'genre' => "TEMBAK DALAM",
        'duration' => "2 hours 14 minutes",
        'director' => "Derpixon",
        'schedules' => [
            [
                'date' => '15 Apr - Hari ',
                'cinemas' => [
                    [
                        'name'=>'AEON MALL JGC CGV',
                        'screens'=>[
                            ['type'=>'SCREENX 2D','price'=>'Rp55.000 - Rp90.000','times'=>['12:30','15:25','18:15']],
                            ['type'=>'VELVET 2D','price'=>'Rp80.000','times'=>['14:00','16:45']]
                        ]
                    ]
                ]
            ],
            [
                'date' => '16 Apr - THU',
                'cinemas' => [
                    [
                        'name'=>'TAMINI SQUARE',
                        'screens'=>[
                            ['type'=>'XXI','price'=>'Rp20.000 - Rp80.000','times'=>['12:30','15:25','18:15']],
                            ['type'=>'VELVET 2D','price'=>'Rp90.000','times'=>['14:00','16:45']]
                        ]
                    ]
                ]
            ],
            [
               'date' => '1 Apr - THU',
                'cinemas' => [
                    [
                        'name'=>'TRANSTUDIO MALL',
                        'screens'=>[
                            ['type'=>'XXI','price'=>'Rp45.000 - Rp55.000','times'=>['12:30','15:25','18:15']],
                            ['type'=>'CINEMAX','price'=>'Rp40.000','times'=>['14:00','16:45']]
                        ]
                    ]
                ] 
            ]
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Movie Schedule - Centered Card</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    font-family: Arial, sans-serif;
    background-color:#121212;
    color:#E0E0E0;
}
.center-wrapper {
    display:flex;
    justify-content:center;
    padding:20px;
}
.movie-card {
    max-width:500px;
    width:100%;
    border:1px solid #444;
    border-radius:12px;
    padding:20px;
    background-color:#1E1E1E;
    color:#E0E0E0;
}
.movie-header {
    display:flex;
    gap:15px;
    margin-bottom:15px;
}
.movie-header img {
    width:90px;
    border-radius:6px;
}
.movie-info h2 { 
    font-size:1.1rem; 
    font-weight:bold; 
    margin:0; 
}
.movie-info .rating { 
    color:#FFC107; 
    font-weight:bold; 
    margin-right:5px; 
}
.movie-info .age { 
    border:1px solid #FFC107; 
    border-radius:4px; 
    padding:0 4px; 
    font-size:0.75rem; 
    color:#DEE2E6; 
}
.tabs { 
    display:flex; 
    border-bottom:1px solid #DEE2E6; 
    margin-bottom:10px; 
}
.tab { 
    flex:1; 
    text-align:center; 
    padding:8px 0; 
    font-weight:bold; 
    cursor:pointer; 
}
.tab.active { 
    color:#0D6EFD; 
    border-bottom:2px solid #0D6EFD; 
}
.date-picker { 
    display:flex; 
    gap:8px; 
    overflow-x:auto; 
    margin-bottom:10px; 
}
.date-picker button { 
    border:1px solid #DEE2E6; 
    border-radius:6px; 
    padding:8px 12px; 
    white-space:nowrap; 
    background:white; 
    cursor: pointer;
}
.date-picker button.active { 
    background:#14532d; 
    color:white; 
    border-color:#14532d; 
}
.cinema-card { 
    background-color:#2A2A2A; 
    border-radius:8px; 
    padding:12px; 
    margin-bottom:10px; 
    border:1px solid #444; 
}
.showtime { 
    border:1px solid #444; 
    border-radius:6px; 
    padding:5px 12px; 
    margin:5px 5px 5px 0; 
    background-color:#2A2A2A; 
    color:#E0E0E0; 
    cursor:pointer; 
}
.showtime:hover { 
    background-color:#4CAF50; 
    color:white; 
}
.price { 
    font-weight:bold; 
    margin-bottom:5px; 
}
.price.regular { 
    color:#FFFFFF; 
}
.price.gold { 
    color:#FFB74D; 
}
.price.premium { 
    color:#BA68C8; 
}
.total { 
    color:#14532d; 
    font-weight:bold; 
    font-size:1.1rem; 
    margin-top:10px; 
}
.btn-confirm { 
    background-color:#14532d; 
    color:white; 
    border:none; 
    border-radius:6px; 
    padding:8px 20px; 
}
.btn-cancel { 
    background-color:#333333; 
    color:white; 
    border:none; 
    border-radius:6px; 
    padding:8px 20px; 
}

</style>
</head>
<body>
<div class="center-wrapper">
    <div class="movie-card">
        <?php foreach($movies as $movie): ?>
            <div class="movie-header">
                <img src="<?= $movie['poster'] ?>" alt="Poster <?= $movie['title'] ?>">
                <div class="movie-info">
                    <h2><?= $movie['title'] ?></h2>
                    <div>
                        <span class="rating">★ <?= $movie['rating'] ?></span>
                        <span class="age"><?= $movie['age'] ?></span>
                    </div>
                    <div>Genre: <?= $movie['genre'] ?></div>
                    <div>Duration: <?= $movie['duration'] ?></div>
                    <div>Director: <?= $movie['director'] ?></div>
                    <button class="btn btn-outline-primary btn-sm mt-1">See Trailer</button>
                </div>
            </div>

            <div class="tabs">
                <div class="tab">SYNOPSIS</div>
                <div class="tab active">SCHEDULE</div>
            </div>

            <div class="date-picker">
                <?php foreach($movie['schedules'] as $i=>$schedule): ?>
                    <button class="<?= $i===0?'active':'' ?>"><?= $schedule['date'] ?></button>
                <?php endforeach; ?>
            </div>

            <input type="text" class="form-control mb-2" placeholder="Search cinema">

                <?php foreach($movie['schedules'][0]['cinemas'] as $cinema): ?>
                    <div class="cinema-card">
                        <h5><?= $cinema['name'] ?></h5>
                        <?php foreach($cinema['screens'] as $screen): ?>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div><?= $screen['type'] ?></div>
                                <div><?= $screen['price'] ?></div>
                            </div>
                            <div class="d-flex flex-wrap mb-2">
                                <?php foreach($screen['times'] as $time): ?>
                                    <div class="showtime"><?= $time ?></div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

            <div class="d-flex justify-content-between mt-2">
                <span>Total pembayaran</span>
                <span class="total">Rp 510.000</span>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-cancel">Batal</button>
                <button class="btn btn-confirm">Konfirmasi & Bayar</button>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
    const dateButtons = document.querySelectorAll('.date-picker button');
    const cinemaContents = document.querySelectorAll('.cinema-content');
    dateButtons.forEach((btn, idx) => {
    btn.addEventListener('click', () => {
        dateButtons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        cinemaContents.forEach(c => c.style.display = 'none');
        cinemaContents[idx].style.display = 'block';
    });
});
</script>
</div>
</body>
</html>