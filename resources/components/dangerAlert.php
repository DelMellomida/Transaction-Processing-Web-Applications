<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php if (isset($alertMessage) && !empty($alertMessage)): ?>
        <div class="absolute top-0 left-0 w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 z-50"
            role="alert">
            <span class="font-medium">Error!</span> <?= htmlspecialchars($alertMessage) ?>
        </div>
    <?php endif; ?>
</body>

</html>