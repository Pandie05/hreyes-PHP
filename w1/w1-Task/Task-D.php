<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        // associative array
        $task = [
            'title' => 'Task:D',
            'due' => '10/7/2024',
            'assigned to' => 'Hendry',
            'completed' => 'No',
        ];
    ?>
    <!-- loop through the array and print -->
    <?php foreach($task as $key => $val): ?>
        <li><strong><?= $key; ?>:</strong> <?= $val; ?></li>
    <?php endforeach; ?>
        

</body>
</html>