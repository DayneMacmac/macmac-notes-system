<?php
require_once "db.php";
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id) { header("Location: index.php"); exit; }
$stmt = $conn->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$note = $stmt->get_result()->fetch_assoc();
if (!$note) { header("Location: index.php?message=" . urlencode("Note not found.")); exit; }
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");
    $content = trim($_POST["content"] ?? "");
    if ($title === "" || $content === "") {
        $error = "Please enter both a title and note content.";
    } else {
        $update = $conn->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
        $update->bind_param("ssi", $title, $content, $id);
        if ($update->execute()) {
            header("Location: index.php?message=" . urlencode("Note updated successfully."));
            exit;
        }
        $error = "Unable to update the note.";
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Note</title>
<style>
body{font-family:Arial;background:#f5f5f5;margin:0}.box{max-width:500px;margin:50px auto;background:white;padding:28px;border-radius:9px}
h1{color:#365b85}label{display:block;margin-top:15px}input,textarea{width:100%;padding:11px;margin-top:6px;border:1px solid #ccc;border-radius:5px;font-family:Arial}textarea{min-height:120px;resize:vertical}
button,.back{display:inline-block;margin-top:20px;padding:11px 16px;background:#365b85;color:white;border:0;border-radius:5px;text-decoration:none;cursor:pointer}.back{background:#666;margin-left:6px}.error{color:#b00020}
</style></head><body><div class="box">
<h1>Edit Note</h1>
<?php if($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="POST">
<label>Note Title</label><input type="text" name="title" value="<?= htmlspecialchars($note["title"]) ?>" required>
<label>Note Content</label><textarea name="content" required><?= htmlspecialchars($note["content"]) ?></textarea>
<button type="submit">Update Note</button><a class="back" href="index.php">Cancel</a>
</form></div></body></html>
