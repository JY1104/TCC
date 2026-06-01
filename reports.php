<?php
require_once 'includes/header.php';
?>

<div class="layout">
    <?php require_once 'includes/sidebar.php'; ?>

    <div class="main">
        <div class="page-header">
            <div>
                <div class="page-title">Analytics & Reports</div>
                <div class="page-sub">Asset Distribution and Valuation Summaries</div>
            </div>
            <button class="btn-primary"><i class="ti ti-download" aria-hidden="true"></i> Export PDF</button>
        </div>

        <div class="metrics">
            <div class="metric">
                <div class="metric-label">IT Equipment Value</div>
                <div class="metric-value">RM 142,500</div>
                <div class="metric-trend up"><i class="ti ti-trending-up" aria-hidden="true"></i> 50% of total</div>
            </div>
            <div class="metric">
                <div class="metric-label">Depreciation This Year</div>
                <div class="metric-value" style="color: #BA7517;">RM 18,200</div>
                <div class="metric-trend down"><i class="ti ti-alert-triangle" aria-hidden="true"></i> Requires Review</div>
            </div>
        </div>

        <div class="card" style="padding: 40px; text-align: center; color: var(--color-text-tertiary);">
            <i class="ti ti-chart-bar" style="font-size: 48px; margin-bottom: 15px; display: block; color: var(--color-border-primary);" aria-hidden="true"></i>
            <h3>Advanced Reporting Module</h3>
            <p style="margin-top: 10px; font-size: 13px;">This module will be fully integrated with AWS QuickSight in Phase 4 for real-time visualization.</p>
        </div>
    </div>
</div>

</body>
</html>