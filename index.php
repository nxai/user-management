<?php
// Include database connection
require_once 'config/database.php';

// Include header
include 'includes/header.php';

// Fetch all users
$sql = "SELECT * FROM users ORDER BY id DESC";
$stmt = $pdo->query($sql);
?>

<a href="templates/add_user.php" class="btn btn-primary">ເພີ່ມຜູ້ໃຊ້ໃໝ່</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ຊື່ຜູ້ໃຊ້</th>
            <th>ອີເມວ</th>
            <th>ການກະທຳ</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td>
                <a href="templates/edit_user.php?id=<?php echo $row['id']; ?>">ແກ້ໄຂ</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('ທ່ານແນ່ໃຈບໍ່ວ່າຕ້ອງການລົບ?');">ລົບ</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
// Include footer
include 'includes/footer.php';
?>