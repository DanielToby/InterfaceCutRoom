CREATE TABLE jobs
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    cutter_speed INT(10) NOT NULL,
    order1 INT(10) NOT NULL,

    TCP1 int NOT NULL,
    TCP2 int NOT NULL,
    TCL int NOT NULL,

    CLTS int NOT NULL,
    CST int not null,
    COEF int not null,

    CS int not null,
    PMT int not null,
    CLT int not null,
    CV int not null,

    TCT float,
    CCRC float,
    
    MCMT float,
    NCM float,
    MCMTS float,
    MCT float,
    MPMT int,
    
    
    SCST int not null,
    PST int not null,
    MST int not null,
    MLR int not null,
    DT int not null,
    SOEF int not null,
    SSA int not null,
    DY int not null,

    SS int not null,
    ST int not null,
    CRT int not null,

    NM int not null,
    TNR int not null,
    TCY int not null,

    STF int not null,
    CRF int not null,

    MMT int,
    MNT int,
    MUT int,
    MS float,
    MT float,
    MRT float,
    MLT float,
    MCaT float,
    MDT float,

    total_time float
);

