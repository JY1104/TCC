<?php
// 1. 引入数据库连接
require_once 'db.php';

// 2. 处理表单提交 (执行新增 INSERT)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $asset_id = $_POST['asset_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $assigned_to = $_POST['assigned_to'];
    $status = $_POST['status'];
    $value = $_POST['value'];

    // 使用预处理语句防止 SQL 注入
    $sql = "INSERT INTO assets (asset_id, name, category, assigned_to, status, value) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$asset_id, $name, $category, $assigned_to, $status, $value]);

    // 添加成功后，跳回主页 (index.php)
    header("Location: index.php");
    exit();
}

// 3. 引入公共头部 (包含 Topbar 和 CSS)
require_once 'includes/header.php';
?>

<div class="layout">
    
    <?php require_once 'includes/sidebar.php'; ?>

    <div class="main">
        <div class="page-header">
            <div>
                <div class="page-title">Add New Asset</div>
                <div class="page-sub">INSERT INTO assets (...) VALUES (...);</div>
            </div>
        </div>

        <div class="card" style="max-width: 600px;">
            <div class="card-header">
                <div class="card-title">
                    <i class="ti ti-plus" style="font-size:15px;" aria-hidden="true"></i>
                    Asset Information
                </div>
            </div>
            
            <div style="padding: 20px;">
                <form method="POST" action="add_asset.php">

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Asset ID *</label>
                        <input type="text" name="asset_id" placeholder="e.g. AST-00125" required style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Asset Name *</label>
                        <input type="text" name="name" placeholder="e.g. Dell XPS 15 Laptop" required style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Category</label>
                        <select name="category" style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                            <option value="IT Equipment">IT Equipment</option>
                            <option value="AV Equipment">AV Equipment</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Vehicle">Vehicle</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Assigned To</label>
                        <input type="text" name="assigned_to" placeholder="Employee Name or Department" style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Status</label>
                            <select name="status" style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                                <option value="Active">Active</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Reserved">Reserved</option>
                                <option value="Retired">Retired</option>
                            </select>
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Value (RM)</label>
                            <input type="number" step="0.01" name="value" placeholder="0.00" style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-primary);">
                        </div>
                    </div>

                    <div style="display: flex; gap: 10px; justify-content: flex-end; border-top: 1px solid var(--color-border-tertiary); padding-top: 15px;">
                        <a href="index.php" style="padding: 8px 16px; border-radius: 4px; text-decoration: none; color: var(--color-text-primary); border: 1px solid var(--color-border-tertiary); font-size: 13px;">Cancel</a>
                        <button type="submit" class="btn-primary" style="padding: 8px 16px; font-size: 13px;">Save Asset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>