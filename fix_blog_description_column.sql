-- SQL скрипт для изменения типа столбца description в таблице blog_translations
-- Используйте этот файл, если миграция не работает из-за проблем с PHP версией

ALTER TABLE `blog_translations` 
MODIFY COLUMN `description` LONGTEXT NOT NULL;

-- Проверка изменений
SHOW COLUMNS FROM `blog_translations` LIKE 'description';

