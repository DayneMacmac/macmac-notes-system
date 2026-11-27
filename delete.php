<?php
require_once "db.php";
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if ($id) {
    $stmt = $conn->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: index.php?message=" . urlencode("Note deleted."));
    exit;
}
header("Location: index.php");
exit;
?>
