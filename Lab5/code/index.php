<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lab5</title>
</head>
<body>
<?php
function displayDirectoryTree($dir, $prefix = '') {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        $path = $dir . '/' . $file;
        echo $prefix . '├── ' . $file . "\n";
        
        if (is_dir($path)) {
            displayDirectoryTree($path, $prefix . '│   ');
        }
    }
}
?>
    <div id="form">
        <form action="save.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" required>

            <label for="category">Category</label>
            <select name="category" required>
                <?php
                $categories = [];
                if (file_exists('categories') && is_dir('categories')) {
                    $dirs = scandir('categories');
                    foreach ($dirs as $dir) {
                        if ($dir !== '.' && $dir !== '..' && is_dir("categories/{$dir}")) {
                            $categories[] = $dir;
                        }
                    }
                }
                foreach ($categories as $ctg) {
                    echo "<option value=\"{$ctg}\">{$ctg}</option>";
                }
                ?>
            </select>

            <label for="title">Title</label>
            <input type="text" name="title" required>
            
            <label for="description">Description</label>
            <textarea name="description" rows ="3" placeholder="Enter a description"></textarea>

            <button type="submit">Save</button>
        </form>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $table = [];
                foreach ($categories as $category) {
                    $emails = scandir("categories/{$category}");
                    foreach ($emails as $email) {
                        if ($email === '.' || $email === '..') continue;
                        $files = scandir("categories/{$category}/{$email}");
                        foreach ($files as $file) {
                            if ($file === '.' || $file === '..') continue;
                            $title = str_replace('.txt', '', $file);
                            $description = file_get_contents("categories/{$category}/{$email}/{$file}");

                            $table[] = [
                                'category' => $category,
                                'email' => $email,
                                'title' => $title,
                                'description' => $description
                            ];
                        }
                    }
                }
                if (!empty($table)) {
                    foreach ($table as $row) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['category']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['description']) . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>