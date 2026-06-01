<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssetTrack</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <style>
        /* CSS 变量定义，方便统一修改颜色 */
        :root {
            --color-background-primary: #ffffff;
            --color-background-secondary: #f8f9fa;
            --color-background-tertiary: #f1f3f5;
            --color-border-primary: #dee2e6;
            --color-border-secondary: #e9ecef;
            --color-border-tertiary: #e9ecef;
            --color-text-primary: #212529;
            --color-text-secondary: #495057;
            --color-text-tertiary: #868e96;
            --font-sans: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            --font-mono: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --border-radius-md: 6px;
            --border-radius-lg: 8px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: var(--font-sans); background: var(--color-background-tertiary); color: var(--color-text-primary);}
        
        .topbar { background: var(--color-background-primary); border-bottom: 0.5px solid var(--color-border-tertiary); padding: 0 20px; display: flex; align-items: center; justify-content: space-between; height: 52px; }
        .logo { display: flex; align-items: center; gap: 8px; font-weight: 500; font-size: 16px; color: var(--color-text-primary); }
        .logo-icon { width: 28px; height: 28px; background: #185FA5; border-radius: 6px; display: flex; align-items: center; justify-content: center; }
        .tech-badges { display: flex; gap: 6px; }
        .badge { font-size: 11px; font-weight: 500; padding: 3px 8px; border-radius: 4px; letter-spacing: 0.3px; }
        .badge-php { background: #AFA9EC; color: #26215C; }
        .badge-pg { background: #9FE1CB; color: #04342C; }
        .badge-aws { background: #FAC775; color: #412402; }
        .nav-user { display: flex; align-items: center; gap: 10px; font-size: 13px; color: var(--color-text-secondary); }
        .avatar { width: 28px; height: 28px; border-radius: 50%; background: #B5D4F4; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 500; color: #042C53; }

        .layout { display: grid; grid-template-columns: 200px 1fr; min-height: calc(100vh - 52px); }
        .sidebar { background: var(--color-background-secondary); border-right: 0.5px solid var(--color-border-tertiary); padding: 16px 0; }
        .sidebar-label { font-size: 10px; font-weight: 500; color: var(--color-text-tertiary); letter-spacing: 0.8px; padding: 0 16px 8px; text-transform: uppercase; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 9px 16px; font-size: 13px; color: var(--color-text-secondary); cursor: pointer; border-left: 2px solid transparent; transition: all 0.15s; }
        .nav-item:hover { background: var(--color-background-primary); color: var(--color-text-primary); }
        .nav-item.active { background: var(--color-background-primary); color: #185FA5; border-left: 2px solid #185FA5; font-weight: 500; }
        .nav-item i { font-size: 16px; }

        .main { padding: 20px 24px; background: var(--color-background-tertiary); width: 100%;}
        .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
        .page-title { font-size: 18px; font-weight: 500; color: var(--color-text-primary); }
        .page-sub { font-size: 12px; color: var(--color-text-tertiary); margin-top: 2px; font-family: var(--font-mono); }

        .metrics { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 16px; }
        .metric { background: var(--color-background-primary); border-radius: var(--border-radius-md); border: 0.5px solid var(--color-border-tertiary); padding: 12px 14px; }
        .metric-label { font-size: 11px; color: var(--color-text-secondary); margin-bottom: 4px; }
        .metric-value { font-size: 22px; font-weight: 500; color: var(--color-text-primary); }
        .metric-trend { font-size: 11px; margin-top: 2px; }
        .up { color: #0F6E56; }
        .down { color: #993C1D; }

        .card { background: var(--color-background-primary); border-radius: var(--border-radius-lg); border: 0.5px solid var(--color-border-tertiary); overflow: hidden; margin-bottom: 14px; }
        .card-header { display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; border-bottom: 0.5px solid var(--color-border-tertiary); }
        .card-title { font-size: 13px; font-weight: 500; color: var(--color-text-primary); display: flex; align-items: center; gap: 8px; }
        .toolbar { display: flex; gap: 8px; align-items: center; }
        .toolbar input { font-size: 12px; padding: 5px 10px; border-radius: var(--border-radius-md); border: 0.5px solid var(--color-border-tertiary); background: var(--color-background-secondary); color: var(--color-text-primary); width: 160px; }
        .btn-primary { background: #185FA5; color: white; border: none; padding: 6px 14px; border-radius: var(--border-radius-md); font-size: 12px; font-weight: 500; cursor: pointer; display: flex; align-items: center; gap: 6px; text-decoration: none;}
        
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th { background: var(--color-background-secondary); font-size: 11px; font-weight: 500; color: var(--color-text-secondary); text-align: left; padding: 8px 14px; border-bottom: 0.5px solid var(--color-border-tertiary); letter-spacing: 0.3px; text-transform: uppercase; }
        td { padding: 10px 14px; border-bottom: 0.5px solid var(--color-border-tertiary); color: var(--color-text-primary); vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: var(--color-background-secondary); }

        .asset-id { font-family: var(--font-mono); font-size: 11px; color: var(--color-text-secondary); }
        .status-pill { font-size: 11px; font-weight: 500; padding: 2px 8px; border-radius: 20px; display: inline-block; }
        .s-active { background: #EAF3DE; color: #27500A; }
        .s-maintenance { background: #FAEEDA; color: #633806; }
        .s-retired { background: #F1EFE8; color: #444441; }
        .s-reserved { background: #EEEDFE; color: #3C3489; }
        .cat-pill { font-size: 11px; padding: 2px 8px; border-radius: 4px; background: var(--color-background-secondary); color: var(--color-text-secondary); border: 0.5px solid var(--color-border-tertiary); }
        .action-btns { display: flex; gap: 6px; }
        .btn-icon { background: none; border: 0.5px solid var(--color-border-tertiary); border-radius: 5px; padding: 4px 7px; cursor: pointer; color: var(--color-text-secondary); font-size: 14px; transition: all 0.15s; }
        .btn-icon:hover { border-color: var(--color-border-secondary); color: var(--color-text-primary); }
        .btn-icon.danger:hover { color: #D85A30; border-color: #D85A30; }

        .db-bar { background: var(--color-background-secondary); border-top: 0.5px solid var(--color-border-tertiary); padding: 7px 16px; display: flex; align-items: center; gap: 16px; font-size: 11px; color: var(--color-text-tertiary); font-family: var(--font-mono); }
        .db-dot { width: 6px; height: 6px; border-radius: 50%; background: #1D9E75; display: inline-block; margin-right: 4px; }
        .db-sep { color: var(--color-border-tertiary); }
    </style>
</head>
<body>
    
    <div class="topbar">
      <div class="logo">
        <div class="logo-icon"><i class="ti ti-package" style="color:white; font-size:15px;" aria-hidden="true"></i></div>
        AssetTrack
      </div>
      <div class="tech-badges">
        <span class="badge badge-php">PHP 8</span>
        <span class="badge badge-pg">PostgreSQL 15</span>
        <span class="badge badge-aws">AWS EC2</span>
      </div>
      <div class="nav-user">
        <span>admin@company.com</span>
        <div class="avatar">AD</div>
      </div>
    </div>