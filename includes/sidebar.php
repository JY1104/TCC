<?php
// 获取当前正在运行的 PHP 文件名
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
    <div class="sidebar-label">Menu</div>
    
    <a href="index.php" style="text-decoration: none; color: inherit;">
        <div class="nav-item <?php echo in_array($current_page, ['index.php', 'add_asset.php', 'edit_asset.php']) ? 'active' : ''; ?>">
            <i class="ti ti-layout-grid" aria-hidden="true"></i> Dashboard
        </div>
    </a>
    
    <a href="add_asset.php" style="text-decoration: none; color: inherit;">
        <div class="nav-item <?php echo ($current_page == 'add_asset.php') ? 'active' : ''; ?>">
            <i class="ti ti-package" aria-hidden="true"></i> Assets
        </div>
    </a>
    
    <a href="employees.php" style="text-decoration: none; color: inherit;">
        <div class="nav-item <?php echo ($current_page == 'employees.php') ? 'active' : ''; ?>">
            <i class="ti ti-users" aria-hidden="true"></i> Employees
        </div>
    </a>
    
    <a href="reports.php" style="text-decoration: none; color: inherit;">
        <div class="nav-item <?php echo ($current_page == 'reports.php') ? 'active' : ''; ?>">
            <i class="ti ti-report" aria-hidden="true"></i> Reports
        </div>
    </a>
    
    <a href="settings.php" style="text-decoration: none; color: inherit;">
        <div class="nav-item <?php echo ($current_page == 'settings.php') ? 'active' : ''; ?>">
            <i class="ti ti-settings" aria-hidden="true"></i> Settings
        </div>
    </a>

    <div style="margin-top: 20px; padding: 0 16px;">
        <div style="background: var(--color-background-primary); border: 0.5px solid var(--color-border-tertiary); border-radius: var(--border-radius-md); padding: 10px 12px;">
            <div style="font-size: 10px; font-weight: 500; color: var(--color-text-tertiary); margin-bottom: 6px; letter-spacing: 0.5px; text-transform: uppercase;">DB Connection</div>
            <div style="font-size: 11px; font-family: var(--font-mono); color: var(--color-text-secondary); line-height: 1.8;">
                <div><span style="color: var(--color-text-tertiary);">host:</span> localhost</div>
                <div><span style="color: var(--color-text-tertiary);">db:</span> assetdb</div>
                <div><span style="color: var(--color-text-tertiary);">port:</span> 5432</div>
                <div><span style="color: var(--color-text-tertiary);">user:</span> postgres</div>
            </div>
            <div style="margin-top: 8px; display: flex; align-items: center; gap: 4px; font-size: 11px; color: #0F6E56;">
                <span class="db-dot"></span> Connected
            </div>
        </div>
    </div>
</div>