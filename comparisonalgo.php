<?php
if (isset($_POST['compare'])) {
    $text1 = $_POST['textarea1'];
    $text2 = $_POST['textarea2'];

    // Compare the contents
    if (strcmp($text1, $text2) === 0) {
        $result = "Text areas are identical";
    } else {
        $result = "Text areas are different";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Compare Text Areas</title>
</head>
<body>
    <form method="post" action="">
        <textarea name="textarea1" rows="5" cols="30"></textarea><br>
        <textarea name="textarea2" rows="5" cols="30"></textarea><br>
        <input type="submit" name="compare" value="Compare">
    </form>

    <?php if (isset($result)) : ?>
        <p><?php echo $result; ?></p>
    <?php endif; ?>
</body>
</html>
