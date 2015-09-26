<?php 

echo "<h2>Facebook Like List</h2>";
echo "<ul>";
foreach ($data['getLikes']['data'] as $like) {
    echo "<li>" . $like['name'] . "</li>";
}
echo "<ul>";