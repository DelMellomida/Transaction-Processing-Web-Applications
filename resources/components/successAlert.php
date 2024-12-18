<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="relative">
        <div class="absolute top-0 left-0 w-full p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 z-50"
            role="alert">
            <span class="font-medium">Success Alert!</span> <?= htmlspecialchars($alertMessage) ?>
        </div>
    </div>
</body>

</html>