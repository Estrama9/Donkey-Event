<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Page d'entrée</title>
</head>
<body>
    <div class="h-[calc(100vh-60px)] bg-orange-500 m-[30px]">
        <div class="h-screen flex flex-col items-center justify-center gap-10">
            <h2 class="text-5xl font-bold text-white">DONKEY EVENTS</h2>
            <div class="">
                <form action="//loginController//" aria-label="Formulaire de connexion" class="flex flex-col border rounded gap-5 bg-white p-6 px-12 pt-12" method="POST">
                    <div class="border rounded p-3 bg-[#78b5a380]" aria-label="Champ Email">
                        <label for="">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="border rounded p-3 bg-[#78b5a380]" aria-label="Champ password">
                        <label for="password">Mot de Passe</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="border rounded p-3 self-center text-center w-40 bg-[#32948f]" aria-label="Bouton de connexion">
                        <input type="submit">
                    </div>
                    <div aria-label="Lien vers la page d'inscription">
                        <p>Vous n'avez pas de compte ?<a href="./register-form.php" class="underline">Inscrivez-vous ici</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>