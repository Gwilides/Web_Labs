<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lab5</title>
    </head>
    <body>
        <form action="save.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" required>

            <label for="category">Category</label>
            <select name="category" required>
                <option value="repair">Repair</option>
                <option value="construction">Construction</option>
                <option value="tools">Tools</option>
            </select>

            <label for="title">Title</label>
            <input type="text" name="title" required>
            
            <label for="description">Description</label>
            <textarea name="description" rows ="3" placeholder="Enter a description"></textarea>

            <button type="submit">Save</button>
        </form>
    </body>
</html>