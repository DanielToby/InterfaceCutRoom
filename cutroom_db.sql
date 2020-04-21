CREATE TABLE JOB_ORDER
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    due_date DATE,
    spread_time FLOAT,
    cut_time FLOAT,
    user_priority INT,
    generated_priority INT,
    allowable_table_ids VARCHAR(100),
    pref INT,
    scheduled VARCHAR(100),
    job_completed BOOLEAN,

    cadfile_id INT,

    NM INT,         
    TNR INT,       
    TCY INT     
);

INSERT INTO JOB_ORDER (due_date, user_priority, generated_priority, allowable_table_ids, pref, scheduled, job_completed, cadfile_id, NM, TNR, TCY) values ("2020-05-01", 1, 0, 2, 0, 0, FALSE, 1, 100, 22, 65);
INSERT INTO JOB_ORDER (due_date, user_priority, generated_priority, allowable_table_ids, pref, scheduled, job_completed, cadfile_id, NM, TNR, TCY) values ("2020-05-02", 1, 0, 2, 0, 0, FALSE, 1, 110, 15, 70);
INSERT INTO JOB_ORDER (due_date, user_priority, generated_priority, allowable_table_ids, pref, scheduled, job_completed, cadfile_id, NM, TNR, TCY) values ("2020-05-01", 1, 0, 2, 0, 0, FALSE, 1, 100, 25, 65);


CREATE TABLE OPERATION_DATA
(
    id INT NOT NULL PRIMARY KEY,
    
    table_a_id INT,
    table_a_length INT,
    table_a_width INT,
    
    table_b_id INT,
    table_b_length INT,
    table_b_width INT,

    time_remaining_table_pair FLOAT,
    cutter_position INT,

    CS int,            
    PMT int,       
    CLT int,     
    CV int,     
    CLTS int,  
    SS int,      
    ST int,        
    CRT int,   

    CST int,    
    OEF int,     
    PST int,   
    MST int, 
    MLR int,  
    DT int,  
    SSA int,
    DY int,          

    STF VARCHAR(10),     
    CRF VARCHAR(10)   
);

INSERT INTO OPERATION_DATA (id, table_a_id, table_a_length, table_a_width, table_b_id, table_b_length, table_b_width, time_remaining_table_pair, cutter_position, CS, PMT, CLT, CV, CLTS, SS, ST, CRT, CST, OEF, PST, MST, MLR, DT, SSA, DY, STF, CRF)  values (1, 1, 1800, 2340, 2, 1800, 2340, 420, 1, 12, 1, 1800, 6, 5, 12, 1800, 10, 15, 0.75, 10, 3, 7, 12, 5, 10, 0, 0);

CREATE TABLE CAD_FILE
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    TCP1 int,      
    TCP2 int,   
    TCL int
);

INSERT INTO CAD_FILE (id, TCP1, TCP2, TCL) values (1, 4300, 75, 5000);