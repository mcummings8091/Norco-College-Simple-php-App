<?php
$db = new SQLite3('contactData.db');

$db->exec("CREATE TABLE IF NOT EXISTS contactData (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    subject TEXT NOT NULL,
    message TEXT NOT NULL
)");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare('INSERT INTO contactData (`name`, `email`, `subject`, `message`) VALUES (:name, :email, :subject, :message )');
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':subject', $_POST['subject']);
    $stmt->bindValue(':message', $_POST['message']);
    $stmt->execute();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
    <h1 id="h1">Contact Me</h1>
    <form class="user-input" method="post">
        <label id="user" for="name">Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Your name..."
            required
        />
        <label id="email" for="email">Email:</label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="Example@gmail.com"
            required
        />
        <label id="text" for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required />
        <label id="text" for="message">Message:</label>
        <input type="text" id="message" name="message" required />
        <input id="btn" type="submit" class="submit-btn" value="Submit" />
    </form>
    <ul class="nav-links">
        <li id="home" class="nav-link"><a href="index.php">Home</a></li>
    </ul>
</ul>
</div>

</body>
</html>