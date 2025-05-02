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
        <header>
            <nav class="flex flex-row justify-between p-3 bg-[#b6c2a3] rounded-t">
                <h2 class="p-3 bg-[#32948f]">Mr Carlos</h2>
                <ul class="flex flex-row gap-10">
                    <li class="p-3">Mon Compte</li>
                    <li class="p-3">Mes Reserations</li>
                    <li class="p-3">Trouver un Évènement</li>
                    <li class="p-3 bg-[#32948f] border rounded"><a href="">Déconexion</a></li>
                </ul>
            </nav>
        </header>
        <?php
    require_once __DIR__ . '/views/event-list.php';
    ?>
    </div>
</body>