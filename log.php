<?php
// Open the SQLite3 database
$db = new SQLite3('visitors.db');

// Get the visitor's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Get the visitor's user agent
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Get the current date and time
$date_time = date('Y-m-d H:i:s');

// Prepare the SQL insert query
$stmt = $db->prepare('INSERT INTO visitors (ip, user_agent, date_time) VALUES (:ip, :user_agent, :date_time)');
$stmt->bindValue(':ip', $ip, SQLITE3_TEXT);
$stmt->bindValue(':user_agent', $user_agent, SQLITE3_TEXT);
$stmt->bindValue(':date_time', $date_time, SQLITE3_TEXT);

// Execute the query
$stmt->execute();

// Close the database connection
$db->close();

// Optionally, display a thank you message or redirect
//echo "Visitor logged!";
?>
