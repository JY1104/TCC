<?php
// 引入公共头部
require_once 'includes/header.php';
?>

<div class="layout">
    <?php require_once 'includes/sidebar.php'; ?>

    <div class="main">
        <div class="page-header">
            <div>
                <div class="page-title">Employee Directory</div>
                <div class="page-sub">System Users & Asset Assignees</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <i class="ti ti-users" style="font-size:15px;" aria-hidden="true"></i>
                    Staff List
                </div>
                <div class="toolbar">
                    <button class="btn-primary" style="opacity: 0.7; cursor: not-allowed;"><i class="ti ti-plus" aria-hidden="true"></i> Add Employee</button>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Emp ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="asset-id">EMP-001</span></td>
                        <td style="font-weight:500;">Ahmad Razif</td>
                        <td>IT Department</td>
                        <td>ahmad.r@company.com</td>
                        <td><span class="status-pill s-active">Active</span></td>
                    </tr>
                    <tr>
                        <td><span class="asset-id">EMP-002</span></td>
                        <td style="font-weight:500;">Siti Norzahra</td>
                        <td>Human Resources</td>
                        <td>siti.n@company.com</td>
                        <td><span class="status-pill s-active">Active</span></td>
                    </tr>
                    <tr>
                        <td><span class="asset-id">EMP-003</span></td>
                        <td style="font-weight:500;">Hazwan Ismail</td>
                        <td>Operations</td>
                        <td>hazwan.i@company.com</td>
                        <td><span class="status-pill s-maintenance">On Leave</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>