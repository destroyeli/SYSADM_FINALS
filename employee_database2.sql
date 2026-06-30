-- ==========================================
-- SYSADM_FINALS DATABASE
-- ==========================================

DROP DATABASE IF EXISTS employee_database;
CREATE DATABASE employee_database;
USE employee_database;

-- ==========================================
-- EMPLOYEES TABLE
-- ==========================================

CREATE TABLE employees (

    id INT AUTO_INCREMENT PRIMARY KEY,

    employee_name VARCHAR(100) NOT NULL,

    email VARCHAR(100) NOT NULL UNIQUE,

    password_plain VARCHAR(100) NOT NULL,

    password_hash VARCHAR(255) NOT NULL,

    phone_number VARCHAR(20) NOT NULL,

    deleted TINYINT(1) DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- ==========================================
-- ADMINS TABLE
-- ==========================================

CREATE TABLE admins(

    id INT AUTO_INCREMENT PRIMARY KEY,

    username VARCHAR(50) UNIQUE NOT NULL,

    password VARCHAR(255) NOT NULL

);

-- ==========================================
-- DEFAULT ADMIN ACCOUNT
--
-- Username : admin
-- Password : admin
--
-- Hash generated using PHP password_hash()
-- ==========================================

INSERT INTO admins(username,password)
VALUES
(
'admin',
'$2y$10$QfQF0S7S2PpM8Sq9e7gI4eB8xJXfL0JmD2iV8rVQmR5WJwqN0r8B6'
);

-- ==========================================
-- SAMPLE EMPLOYEES
-- ==========================================

INSERT INTO employees
(employee_name,email,password_plain,password_hash,phone_number)

VALUES

(
'Sky Macaspac',
'sky.macaspac@fun.com',
'Sky@2025Work',
'$2y$10$placeholderhash001',
'09174821056'
),

(
'David Credo',
'david.credo@fun.com',
'David#2025IT',
'$2y$10$placeholderhash002',
'09056639182'
),

(
'Angelito Regero',
'angelito.regero@fun.com',
'Angelito@2025',
'$2y$10$placeholderhash003',
'09275407731'
),

(
'Nolan Casuga',
'nolan.casuga@fun.com',
'Nolan#Work25',
'$2y$10$placeholderhash004',
'09982146650'
),

(
'Vaughn Caringal',
'vaughn.caringal@fun.com',
'Vaughn@Desk25',
'$2y$10$placeholderhash005',
'09197804421'
),

(
'Anthony Genciana',
'anthony.genciana@fun.com',
'Anthony#IT25',
'$2y$10$placeholderhash006',
'09473312098'
),

(
'Crishia Guansing',
'crishia.guansing@fun.com',
'Crishia@Work25',
'$2y$10$placeholderhash007',
'09175503846'
),

(
'Angel Fabregas',
'angel.fabregas@fun.com',
'Angel#Office25',
'$2y$10$placeholderhash008',
'09087716603'
),

(
'Andrie Detera',
'andrie.detera@fun.com',
'Andrie@Work25',
'$2y$10$placeholderhash009',
'09364189027'
),

(
'Peach Ranola',
'peach.ranola@fun.com',
'Peach#Desk25',
'$2y$10$placeholderhash010',
'09956021184'
);