<?php
require_once "db.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");
    $content = trim($_POST["content"] ?? "");
    if ($title === "" || $content === "") {
        $error = "Please enter both a title and note content.";
    } else {
        $stmt = $conn->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);
        if ($stmt->execute()) {
            header("Location: index.php?message=" . urlencode("Note added successfully."));
            exit;
        }
        $error = "Unable to add the note.";
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Note</title>
<style>
body{font-family:Arial;background:#f5f5f5;margin:0}.box{max-width:500px;margin:50px auto;background:white;padding:28px;border-radius:9px}
h1{color:#365b85}label{display:block;margin-top:15px}input,textarea{width:100%;padding:11px;margin-top:6px;border:1px solid #ccc;border-radius:5px;font-family:Arial}textarea{min-height:120px;resize:vertical}
button,.back{display:inline-block;margin-top:20px;padding:11px 16px;background:#365b85;color:white;border:0;border-radius:5px;text-decoration:none;cursor:pointer}.back{background:#666;margin-left:6px}.error{color:#b00020}
</style></head><body><div class="box">
<h1>Add Note</h1>
<?php if($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="POST">
<label>Note Title</label><input type="text" name="title" placeholder="Example: Things to do" required>
<label>Note Content</label><textarea name="content" placeholder="Write your note here..." required></textarea>
<button type="submit">Save Note</button><a class="back" href="index.php">Cancel</a>
</form></div></body></html>
