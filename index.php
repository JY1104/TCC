<?php
// 1. 引入数据库连接 (这行代码会让这个页面拥有操作 PostgreSQL 的能力)
require_once 'db.php'; 

// 2. 从数据库获取基础统计数据 (让顶部的 Metrics 卡片活起来)
$stmt_total = $pdo->query("SELECT COUNT(*) FROM assets");
$total_assets = $stmt_total->fetchColumn();

// 3. 从数据库获取所有资产记录，按更新时间倒序排列
$stmt_assets = $pdo->query("SELECT * FROM assets ORDER BY updated_at DESC");
$assets = $stmt_assets->fetchAll();

// 4. 定义一个辅助函数：根据状态动态返回 CSS 类名，让状态标签颜色不一样
function getStatusClass($status) {
    switch (strtolower($status)) {
        case 'active': return 's-active';
        case 'maintenance': return 's-maintenance';
        case 'retired': return 's-retired';
        case 'reserved': return 's-reserved';
        default: return '';
    }
}

// 5. 引入页面的头部 (包含你写的 CSS 和 Topbar)
require_once 'includes/header.php'; 
?>

<div class="layout">
  <?php require_once 'includes/sidebar.php'; ?>

  <div class="main">
    <div class="page-header">
      <div>
        <div class="page-title">Asset Inventory</div>
        <div class="page-sub">SELECT * FROM assets ORDER BY updated_at DESC;</div>
      </div>
    </div>

    <div class="metrics">
      <div class="metric">
        <div class="metric-label">Total Assets</div>
        <div class="metric-value"><?php echo htmlspecialchars($total_assets); ?></div>
        <div class="metric-trend up"><i class="ti ti-trending-up" aria-hidden="true"></i> Live Data</div>
      </div>
      </div>

    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <i class="ti ti-table" style="font-size:15px;" aria-hidden="true"></i>
          Asset Records
        </div>
        <div class="toolbar">
          <input type="text" placeholder="Search assets..." />
          <a href="add_asset.php" class="btn-primary" style="text-decoration: none;"><i class="ti ti-plus" aria-hidden="true"></i> Add Asset</a>
        </div>
      </div>
      
      <table>
        <thead>
          <tr>
            <th>Asset ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Assigned To</th>
            <th>Status</th>
            <th>Value (RM)</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          // 7. 最核心的魔法：用 foreach 循环把数据库里的每一行数据“打印”成一个 <tr> 表格行
          foreach ($assets as $asset): 
          ?>
            <tr>
              <td><span class="asset-id"><?php echo htmlspecialchars($asset['asset_id']); ?></span></td>
              <td style="font-weight:500;"><?php echo htmlspecialchars($asset['name']); ?></td>
              <td><span class="cat-pill"><?php echo htmlspecialchars($asset['category']); ?></span></td>
              <td><?php echo htmlspecialchars($asset['assigned_to']); ?></td>
              
              <td>
                <span class="status-pill <?php echo getStatusClass($asset['status']); ?>">
                  <?php echo htmlspecialchars($asset['status']); ?>
                </span>
              </td>
              
              <td><?php echo number_format($asset['value'], 0); ?></td>
              
              <td>
                <div class="action-btns">
                  <button class="btn-icon"><i class="ti ti-eye" aria-hidden="true"></i></button>
                  
                  <a href="edit_asset.php?id=<?php echo $asset['id']; ?>" class="btn-icon">
                    <i class="ti ti-edit" aria-hidden="true"></i>
                  </a>
                  
                  <form action="delete_asset.php" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this asset?');">
                    <input type="hidden" name="id" value="<?php echo $asset['id']; ?>">
                    <button type="submit" class="btn-icon danger" style="cursor: pointer;">
                      <i class="ti ti-trash" aria-hidden="true"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          
          <?php if (empty($assets)): ?>
            <tr>
                <td colspan="7" style="text-align: center; color: var(--color-text-tertiary);">No assets found in the database. Click 'Add Asset' to create one.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      
      <div class="db-bar">
        <span><span class="db-dot"></span>PostgreSQL</span>
        <span class="db-sep">|</span>
        <span>Table: <strong>assets</strong></span>
        <span class="db-sep">|</span>
        <span><?php echo $total_assets; ?> rows total</span>
      </div>
    </div>
  </div>
</div>

</body>
</html>