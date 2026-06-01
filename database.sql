-- ========================================================
-- TCC6313 Cloud Computing (T2610) Project - Phase 1
-- Database Schema for E-Commerce Asset Management System
-- Target DB: PostgreSQL 15+
-- ========================================================

-- 1. 如果表已经存在，先删除（用于本地重复测试，实际生产环境慎用）
-- DROP TABLE IF EXISTS assets;

-- 2. 创建资产管理核心表
CREATE TABLE assets (
    id SERIAL PRIMARY KEY,                          -- 数据库内部自增主键
    asset_id VARCHAR(20) UNIQUE NOT NULL,           -- 资产唯一编号 (例如 AST-00124)
    name VARCHAR(100) NOT NULL,                     -- 资产名称
    category VARCHAR(50),                           -- 资产分类 (IT Equipment, Vehicle 等)
    assigned_to VARCHAR(100),                       -- 分配给哪个员工/部门
    status VARCHAR(20) DEFAULT 'Active',            -- 状态 (Active, Maintenance, Reserved, Retired)
    value NUMERIC(10, 2) DEFAULT 0.00,              -- 资产价值 (RM)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- 创建时间
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- 最后更新时间
);

-- 3. 插入几条初始测试数据（可选，方便你和队友第一次打开就有数据看）
INSERT INTO assets (asset_id, name, category, assigned_to, status, value) VALUES
('AST-00124', 'Dell XPS 15 Laptop', 'IT Equipment', 'Ahmad Razif', 'Active', 4500.00),
('AST-00118', 'Epson Projector EB-X51', 'AV Equipment', 'Siti Norzahra', 'Maintenance', 2200.00),
('AST-00109', 'Office Desk Set (x4)', 'Furniture', 'Warehouse', 'Reserved', 1800.00);