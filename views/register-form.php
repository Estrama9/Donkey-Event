<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Page d'inscription</title>
</head>
<body>
    <div class="h-[calc(100vh-60px)] bg-orange-500 m-[30px] rounded">
        <div class="h-screen flex flex-col items-center justify-center justify-start gap-10">
            <h2 class="text-5xl font-bold mt-[35px] text-[#f1d0a4]">Inscription</h2>
            <div class="">
                <form action="//registerController//" aria-label="Formulaire d'inscription" class="flex flex-col border rounded gap-5 bg-[#f1d0a4] p-6 px-12 pt-12" method="POST">
                    <div class="border rounded p-3 bg-[#b6c2a3]" aria-label="Champ Prenom">
                        <label for="">Prenom</label>
                        <input class="px-3 py-1" type="text" name="prenom" required>
                    </div>
                    <div class="border rounded p-3 bg-[#b6c2a3]" aria-label="Champ Nom">
                        <label for="">Nom</label>
                        <input class="px-3 py-1" type="text" name="nom" required>
                    </div>
                    <div class="border rounded p-3 bg-[#b6c2a3]" aria-label="Champ Portable">
                        <label for="">Portable</label>
                        <input class="px-3 py-1" type="number" name="portable" required>
                    </div>
                    <div class="border rounded p-3 bg-[#b6c2a3]" aria-label="Champ Civilité">
                        <label for="civilite">Civilité</label>
                        <select class="px-3 py-1 text-center" name="civilite" id="civilite">
                            <option value="" disabled selected>Choisissez une civilité</option>
                            <option value="Mr">Mr</option>
                            <option value="Mme">Mme</option>
                            <option value="autre">autre</option>
                        </select>
                    </div>
                    <div class="border rounded p-3 bg-[#b6c2a3]" aria-label="Champ Email">
                        <label for="">Email</label>
                        <input class="px-3 py-1" type="email" name="email" required>
                    </div>
                    <div class="border rounded p-3 bg-[#b6c2a3]" aria-label="Champ password">
                        <label for="password">Password</label>
                        <input class="px-3 py-1" type="password" name="password" required>
                    </div>
                    <div class="border rounded p-3 self-center text-center w-40 bg-[#32948f]" aria-label="Bouton de enregistrement">
                        <input type="submit">
                    </div>
                    <div aria-label="Lien vers la page d'inscription">
                        <p>Vous avez déjà un compte ?<a href="/index.php" class="underline">Login ici</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>