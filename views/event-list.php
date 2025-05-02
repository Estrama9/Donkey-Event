<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Évènements</title>
</head>
<body>
<div class="h-[calc(100vh-60px)] bg-orange-500 m-[30px] relative rounded">
    <?php
    require_once __DIR__ . '/header.php';
    ?>
    <div class="flex flex-col items-center justify-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-96 bg-[#f1d0a4] py-10 text-center border-l-[12px] border-r-[12px] border-orange-500">
        <h2 class="text-3xl">TROUVER DES ÉVÈNEMETS</h2>
        <form action="..controllers/eventController.php" aria-label="Formulaire d'evenement" class="flex flex-col items-center gap-5 bg-#f1d0a4 p-6 px-12 pt-12" method="POST">
            <div class="flex flex-row justify-center gap-5">
                <div class="w-[260px] border rounded p-3 bg-[#b6c2a3]">
                    <select name="city" id="city" class="border rounded p-3">
                        <option value="" disabled selected>Choisissez une ville</option>
                        <?php
                            foreach($cities as $city): ?>
                            <option value="<?=htmlspecialchars($city['id'])?>"><?= htmlspecialchars($city['name']) ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="w-[260px] border rounded p-3 bg-[#b6c2a3]">
                    <select name="date" id="date" class="border rounded p-3">
                        <option value="" disabled selected>Choisissez une date</option>
                        <?php foreach($dates as $date): ?>
                            <option value="<?=htmlspecialchars($date)?>"><?= htmlspecialchars($date) ?></option>
                        <?php endforeach; ?>
                    </select> 
                </div>
                <div class="w-[260px] border rounded p-3 bg-[#b6c2a3]">
                    <select name="category" id="category" class="border rounded p-3">
                        <option value="" disabled selected>Choisissez une categorie</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?=htmlspecialchars($category)?>"><?= htmlspecialchars($category) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="border rounded p-3 text-center w-40 bg-[#32948f]">
                <input type="submit" value="Rechercher" aria-label="Bouton de recherche">
            </div>  
        </form>
    </div>
</div>
</body>
</html>