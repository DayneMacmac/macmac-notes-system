<?php
require_once "db.php";
$result = $conn->query("SELECT * FROM notes ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Macmac Notes System</title>
<style>
*{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;background:#f5f5f5;color:#292929}
.container{width:90%;max-width:850px;margin:45px auto;background:white;padding:28px;border-radius:10px;box-shadow:0 2px 12px #00000012}
h1{margin-top:0;color:#365b85}.subtitle{color:#666;margin-top:-8px}
.add{display:inline-block;background:#365b85;color:white;padding:11px 16px;border-radius:5px;text-decoration:none;margin:15px 0}
table{width:100%;border-collapse:collapse;margin-top:8px}th,td{padding:13px;text-align:left;border-bottom:1px solid #ddd}
th{background:#eaf0f7}.action a{margin-right:10px;color:#365b85;text-decoration:none;font-weight:bold}
.message{background:#e8f5e9;padding:10px;border-radius:5px}
@media(max-width:600px){.container{padding:16px}th,td{padding:8px;font-size:13px}}
</style>
</head>
<body>
<div class="container">
<h1>Macmac Notes System</h1>
<p class="subtitle">A simple place to save your notes</p>
<?php if(isset($_GET["message"])): ?>
<p class="message"><?= htmlspecialchars($_GET["message"]) ?></p>
<?php endif; ?>
<a class="add" href="create.php">+ Add Note</a>
<table>
<tr><th>ID</th><th>Note Title</th><th>Note Content</th><th>Actions</th></tr>
<?php if($result && $result->num_rows > 0): ?>
<?php while($note=$result->fetch_assoc()): ?>
<tr>
<td><?= (int)$note["id"] ?></td>
<td><?= htmlspecialchars($note["title"]) ?></td>
<td><?= nl2br(htmlspecialchars($note["content"])) ?></td>
<td class="action">
<a href="edit.php?id=<?= (int)$note["id"] ?>">Edit</a>
<a href="delete.php?id=<?= (int)$note["id"] ?>" onclick="return confirm('Are you sure you want to delete this note?');">Delete</a>
</td>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr><td colspan="4">No notes yet. Click "Add Note" to create one.</td></tr>
<?php endif; ?>
</table>
</div>
</body>
</html>
