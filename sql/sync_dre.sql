CREATE DEFINER=`root`@`localhost` PROCEDURE `sync_dre`(IN `current_month` TINYINT, IN `current_year` MEDIUMINT)
    DETERMINISTIC
BEGIN

    DECLARE dre_count TINYINT DEFAULT 0;

	/*DECLARE current_month TINYINT DEFAULT 0;
    DECLARE current_year MEDIUMINT DEFAULT 0;*/
    
    DECLARE start_date, end_date DATE;
    
    DECLARE sales DECIMAL DEFAULT 0;
    
    /*SET current_month = MONTH(NOW());
    SET current_year = YEAR(NOW()); */
    
    SET start_date = CONCAT(current_year, '-' , current_month, '-1');
    SET end_date = DATE_ADD( start_date, INTERVAL 1 MONTH);
    
    SELECT SUM(total) INTO sales 
    FROM orders WHERE orders.date BETWEEN start_date AND end_date;
    
    SELECT COUNT(*) INTO dre_count
    FROM reports_dre
    WHERE month = current_month AND year = current_year;
    
    /* Implement other calcs here*/
    
    IF dre_count > 0 THEN
        UPDATE reports_dre SET reports_dre.sales = sales
        WHERE month = current_month AND year = current_year;
    ELSE
	    INSERT INTO reports_dre VALUES (0, current_month, current_year, sales, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);
	END IF;


END
