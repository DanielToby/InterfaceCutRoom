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

CREATE TABLE OPERATION_DATA
(
    id enum('1') PRIMARY KEY NOT NULL,
    
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

INSERT INTO OPERATION_DATA (table_a_id, table_a_length, table_a_width, table_b_id, table_b_length, table_b_width, time_remaining_table_pair, cutter_position, CS, PMT, CLT, CV, CLTS, SS, ST, CRT, CST, OEF, PST, MST, MLR, DT, SSA, DY, STF, CRF)  values (1, null, null, 2, null, null, null, null, null, null, null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null);

CREATE TABLE CAD_FILE
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    TCP1 int,      
    TCP2 int,   
    TCL int
);
