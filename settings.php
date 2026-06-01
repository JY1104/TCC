<?php
require_once 'includes/header.php';
?>

<div class="layout">
    <?php require_once 'includes/sidebar.php'; ?>

    <div class="main">
        <div class="page-header">
            <div>
                <div class="page-title">System Settings</div>
                <div class="page-sub">Configure your AssetTrack environment</div>
            </div>
        </div>

        <div class="card" style="max-width: 600px;">
            <div class="card-header">
                <div class="card-title">
                    <i class="ti ti-settings" style="font-size:15px;" aria-hidden="true"></i>
                    General Configuration
                </div>
            </div>
            
            <div style="padding: 20px;">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Company Name</label>
                    <input type="text" value="E-Commerce Corp (Demo)" disabled style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-tertiary); color: var(--color-text-secondary);">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Admin Email</label>
                    <input type="email" value="admin@company.com" disabled style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-tertiary); color: var(--color-text-secondary);">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-size: 12px; color: var(--color-text-secondary); margin-bottom: 5px;">Currency Symbol</label>
                    <select disabled style="width: 100%; padding: 8px; border: 1px solid var(--color-border-tertiary); border-radius: 4px; background: var(--color-background-tertiary); color: var(--color-text-secondary);">
                        <option>RM (Malaysian Ringgit)</option>
                        <option>USD ($)</option>
                    </select>
                </div>

                <div style="display: flex; gap: 10px; justify-content: flex-end; border-top: 1px solid var(--color-border-tertiary); padding-top: 15px;">
                    <button class="btn-primary" style="opacity: 0.7; cursor: not-allowed;">Save Settings</button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>