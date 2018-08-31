CREATE TABLE `bank_db`.`transaction_header` ( `ID` INT(125) NOT NULL AUTO_INCREMENT , `Voucher_no` VARCHAR(100) NOT NULL , `Acc_no` VARCHAR(200) NOT NULL , `Amount` DECIMAL(65,2) NOT NULL , `Tranction_id` VARCHAR(100) NOT NULL , `Naration` LONGTEXT NOT NULL , `Transaction_type` INT(1) NOT NULL , `IsClosed` INT NOT NULL DEFAULT '0' , `IsManual` INT(1) NOT NULL , `FinancialYear_id` INT(100) NOT NULL , `Branch_id` INT(100) NOT NULL , `Added_by` INT(125) NOT NULL , `Added_on` TIMESTAMP NOT NULL , `Modifed_by` INT(125) NOT NULL , `Modified_on` TIMESTAMP NOT NULL , `Remark` VARCHAR(400) NOT NULL , `IsActive` INT(1) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

CREATE TABLE `bank_db`.`transaction_footer` ( `ID` INT(125) NOT NULL AUTO_INCREMENT , `Voucher_no` VARCHAR(100) NOT NULL , `Ledger_type` VARCHAR(2) NOT NULL , `Ledger_id` INT(100) NOT NULL , `Ledger_name` VARCHAR(200) NOT NULL , `Amount` DECIMAL(65,2) NOT NULL , `IsInward` INT(1) NOT NULL , `FinancialYear_id` INT(10) NOT NULL , `Branch_id` INT(10) NOT NULL , `Added_by` INT(125) NOT NULL , `Added_on` TIMESTAMP NOT NULL , `Modified_by` INT(125) NOT NULL , `Modified_on` TIMESTAMP NOT NULL , `IsActive` INT(1) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

CREATE TABLE `bank_db`.`account_nature` ( `ID` INT(3) NOT NULL AUTO_INCREMENT , `Name` INT(30) NOT NULL , `isActive` INT(1) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

CREATE TABLE `bank_db`.`account_ledger` ( `ID` INT(125) NOT NULL , `Ledger` VARCHAR(200) NOT NULL , `Open_balance` DECIMAL(65,2) NOT NULL , `Group_ID` INT(125) NOT NULL , `Added_by` INT(125) NOT NULL , `Added_on` TIMESTAMP NOT NULL , `Modified_by` INT(125) NOT NULL , `Modified_on` TIMESTAMP NOT NULL , `Remark` VARCHAR(200) NOT NULL , `IsActive` INT(1) NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `bank_db`.`account_group` ( `ID` INT(125) NOT NULL AUTO_INCREMENT , `Group_name` VARCHAR(200) NOT NULL , `Group_under` INT(125) NOT NULL , `Group_nature` INT(125) NOT NULL , `IsDefault` INT(1) NOT NULL , `Added_by` INT(125) NOT NULL , `Added_on` TIMESTAMP NOT NULL , `Modified_by` INT(125) NOT NULL , `Modified_on` TIMESTAMP NOT NULL , `Remark` VARCHAR(200) NOT NULL , `IsActive` INT(1) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;




//Branch
CREATE TABLE `bank_db`.`branch` ( `ID` INT(125) NOT NULL AUTO_INCREMENT , `Branch_name` VARCHAR(200) NOT NULL , `Branch_code` VARCHAR(100) NOT NULL , `Branch_address` VARCHAR(200) NOT NULL , `Added_by` INT(125) NOT NULL , `Added_on` TIMESTAMP NOT NULL , `Modified_by` INT(125) NOT NULL , `Modified_on` TIMESTAMP NOT NULL , `Remark` VARCHAR(200) NOT NULL , `IsActive` INT(1) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

CREATE TABLE `bank_db`.`financial_year` ( `ID` INT(125) NOT NULL AUTO_INCREMENT , `Financial_year` VARCHAR(125) NOT NULL , `Start_date` DATE NOT NULL , `End_date` DATE NOT NULL , `Added_by` INT(125) NOT NULL , `Added_on` TIMESTAMP NOT NULL , `Modified_by` INT(125) NOT NULL , `Modified_on` TIMESTAMP NOT NULL , `IsActive` INT(1) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;