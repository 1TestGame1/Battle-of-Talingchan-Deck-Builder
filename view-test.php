<?php
// ดึงข้อมูลจาก Supabase
$url = "https://YOUR_PROJECT.supabase.co/rest/v1/users";
$apikey = "YOUR_SUPABASE_API_KEY";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "apikey: $apikey",
    "Authorization: Bearer $apikey",
    "Content-Type: application/json",
]);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>
    <h1>รายชื่อผู้ใช้จาก Supabase</h1>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
