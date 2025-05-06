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
                    <?php
                        foreach($events as $event): ?>
                            <div class="flex flex-col items-center w-[300px] gap-7 border rounded p-3 bg-[#b6c2a3]">
                                <h3><?=htmlspecialchars($event['event_name'])?></h3>
                                <p><?=htmlspecialchars($event['price']) . " € / jour"?></p>
                                <p><?= "Date: " . htmlspecialchars($event['event_date'])?></p>
                                <p><?= "Catégorie: " . htmlspecialchars($event['category_name'])?></p>
                                <form class="border rounded p-3 text-center w-40 bg-[#32948f]" action="showEventController.php" method="GET">
                                    <input type="hidden" name="id" value="<?= $event['id'] ?>">
                                    <button type="submit">Réserver</button>
                                </form>
                            </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>