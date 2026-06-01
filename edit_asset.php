<?php
// 1. 引入数据库连接
require_once 'db.php';

// ==========================================
// 逻辑区块 A：处理表单提交 (执行更新 UPDATE)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 接收表单传来的新数据
    $id = $_POST['id']; // 隐藏字段传过来的数据库主键 ID
    $asset_id = $_POST['asset_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $assigned_to = $_POST['assigned_to'];
    $status = $_POST['status'];
    $value = $_POST['value'];

    // 准备 UPDATE SQL 语句 (使用占位符 ? 防止 SQL 注入)
    $sql = "UPDATE assets SET 
            asset_id = ?, 
            name = ?, 
            category = ?, 
            assigned_to = ?, 
            status = ?, 
            value = ?, 
            updated_at = CURRENT_TIMESTAMP 
            WHERE id = ?";
            
    $stmt = $pdo->prepare($sql);
    // 执行更新
    $stmt->execute([$asset_id, $name, $category, $assigned_to, $status, $value, $id]);

    // 更新成功，跳回主页
    header("Location: index.php");
    exit();
}

// ==========================================
// 逻辑区块 B：加载页面数据 (执行查询 SELECT)
// ==========================================
// 检查 URL 中是否带有 id 参数
if (!isset($_GET['id'])) {
    // 如果没有 id，说明是非法访问，踢回主页
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// 根据 ID 从数据库中查出该资产的当前信息
$stmt = $pdo->prepare("SELECT * FROM assets WHERE id = ?");
$stmt->execute([$id]);
$asset = $stmt->fetch();

// 如果数据库里找不到这个 ID 的记录
if (!$asset) {
    die("Error: Asset not found in the database.");
}

// 2. 引入公共头部
require_once 'includes/header.php';
?>

<div class="layout">
    <?php require_once 'includes/sidebar.php'; ?>

    <div class="main">
        <div class="page-header">
            <div>
                <div class="page-title">Edit Asset</div>
                <div class="page-sub">UPDATE assets SET ... WHERE id = <?php echo htmlspecialchars($id); ?>;</div>
            </div>
        </div>

        <div class="card" style="max-width: 600px;">
            <div class="card-header">
                <div class="card-title">
                    <i class="ti ti-edit" style="font-size:15px;" aria-hidden="true"></i>
                    Update Asset Information
                </div>
            </div>
            
            <div style="padding: 20px;">
                <form method="POST" action="edit_asset.php">
                    <input type="hidden" name="id" value="<?php echo $asset['id']; ?>">

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Asset ID</label>
                        <input type="text" name="asset_id" value="<?php echo htmlspecialchars($asset['asset_id']); ?>" required style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Asset Name</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($asset['name']); ?>" required style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Category</label>
                        <select name="category" style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                            <option value="IT Equipment" <?php echo ($asset['category'] == 'IT Equipment') ? 'selected' : ''; ?>>IT Equipment</option>
                            <option value="AV Equipment" <?php echo ($asset['category'] == 'AV Equipment') ? 'selected' : ''; ?>>AV Equipment</option>
                            <option value="Furniture" <?php echo ($asset['category'] == 'Furniture') ? 'selected' : ''; ?>>Furniture</option>
                            <option value="Vehicle" <?php echo ($asset['category'] == 'Vehicle') ? 'selected' : ''; ?>>Vehicle</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Assigned To</label>
                        <input type="text" name="assigned_to" value="<?php echo htmlspecialchars($asset['assigned_to']); ?>" style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Status</label>
                            <select name="status" style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                                <option value="Active" <?php echo ($asset['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                                <option value="Maintenance" <?php echo ($asset['status'] == 'Maintenance') ? 'selected' : ''; ?>>Maintenance</option>
                                <option value="Reserved" <?php echo ($asset['status'] == 'Reserved') ? 'selected' : ''; ?>>Reserved</option>
                                <option value="Retired" <?php echo ($asset['status'] == 'Retired') ? 'selected' : ''; ?>>Retired</option>
                            </select>
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Value (RM)</label>
                            <input type="number" step="0.01" name="value" value="<?php echo htmlspecialchars($asset['value']); ?>" style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                        </div>
                    </div>

                    <div style="display: flex; gap: 10px; justify-content: flex-end; border-top: 1px solid var(--color-border-tertiary); padding-top: 15px;">
                        <a href="index.php" style="padding: 8px 16px; border-radius: 4px; text-decoration: none; color: var(--color-text-primary); border: 1px solid var(--color-border-tertiary); font-size: 13px;">Cancel</a>
                        <button type="submit" class="btn-primary" style="padding: 8px 16px; font-size: 13px;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>