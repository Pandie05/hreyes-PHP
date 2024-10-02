<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        // task array
        $task = [
            'title' => 'Task:D',
            'due' => '10/7/2024',
            'assigned to' => 'Hendry',
            'completed' => true,
        ];
    ?>

    <!-- list the tasks -->
    <ul>
        <li>
            <strong>Title:</strong> <?= $task['title']; ?>
        </li>

        <li>
            <strong>Due:</strong> <?= $task['due']; ?>
        </li>

        <li>
            <strong>Assigned to:</strong> <?= $task['assigned to']; ?>
        </li>

        <li>
            <strong>Completed:</strong>

            <!-- check if the task is done display check -->
            <?php if($task['completed']) : ?>
                
                <span class="icon">&#9989;</span>

            <?php else : ?>

                <!-- if not display X -->
                <span class="icon">&#10060;</span> 

            <?php endif; ?>     
        </li>
    </ul>

</body>
</html>