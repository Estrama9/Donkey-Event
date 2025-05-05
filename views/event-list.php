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
        <div class="flex flex-col items-center gap-5">
            <h2 class="text-3xl">Évènements</h2>
            <div class="flex flex-row justify-center gap-5">
                <div class="flex flex-col items-center gap-5 border rounded p-3">
                    <?php
                        foreach($events as $event): ?>
                            <h3><?=htmlspecialchars($event['name'])?></h3>
                            <p><?=htmlspecialchars($event['price']) . " € / jour"?></p>
                            <p><?= "Date:" . htmlspecialchars($event['date'])?></p>
                            <p><?= "Catégorie:" . htmlspecialchars($event['category_name'])?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>