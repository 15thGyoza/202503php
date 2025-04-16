<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p>
    <?php
    $is_Master = true; // 假设这是从数据库中获取的值
    $is_logged_in = false; // 假设这是从会话中获取的值
    $username = "巫师学徒"; // 假设这是从数据库中获取的值
    ?>

    <?php if ($is_Master): ?>
        <span>欢迎回来，Master！</span>
        <a href="/admin">进入管理后台</a>
    <?php elseif ($is_logged_in): ?>
        <?php echo htmlspecialchars($username); ?>！
    <?php else: ?>
        请 <a href="/login">登录</a> 或 <a href="/register">注册</a>。
    <?php endif; ?>
</p>
</body>
</html>