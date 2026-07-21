DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data`(IN `sql_query` TEXT, OUT `ret_member_id` VARCHAR(20))
    NO SQL
BEGIN
				SET @p_SQLQUERY=sql_query;
                PREPARE s FROM @p_SQLQUERY;
                EXECUTE s;
                DEALLOCATE PREPARE s;
select last_insert_id() into @ret_member_id ;
SET ret_member_id= @ret_member_id;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_data`(IN `sql_query` TEXT, OUT `ret_effected_rows` INT)
    NO SQL
BEGIN
				SET @p_SQLQUERY=sql_query;
                PREPARE s FROM @p_SQLQUERY;
                EXECUTE s;
                DEALLOCATE PREPARE s;
 select ROW_COUNT() into @ret_effected_rows ;
 SET ret_effected_rows = @ret_effected_rows;
END$$
DELIMITER ;
