<?php
class Job {
    // CAD cut properties
    public $TCP1; // (in) tum of all piece perimeters within the cut
    public $TCP2; // (n/a) number of pieces in the cut
    public $TCL;  // (in) linear length of the cut
    
    // Cut room efficiency cut properties
    public $CLTS;  // (min) setup time per CLT minute
    public $CST;   // (min) setup time for 
    public $COEF;   // (%) operational efficiency factor

    // Machinery cut properties
    public $CS;   // (in / min) cutting speed of the machine head
    public $PMT;  // (min) move time of cutting head between pieces
    public $CLT;  // (in) cut head linear travel
    public $CV;   // (in / min) conveyor speed

    public $TCT;   // TOTAL CUT TIME
    public $CCRC;  // cutting consumption rate

    // Spread room efficiency spread properties
    public $SCST;  // (min) time to obtain markers and review specs
    public $PST;   // (min) time to deploy marker to table
    public $MST;   // (min) time per marker to mark splice points
    public $MLR;   // (min) time to load roll
    public $DT;    // (min) time to cut out or mark defect
    public $SOEF;   // (%) operational efficiency factor
    public $DY;    // (n/a) number of defects per yard
    
    // Machinery spread properties
    public $SS;    // (yd/min) spreading rate
    public $ST;    // (yards) spreader travel
    public $CRT;   // (min) minutes per carriage rotation

    // Order data spread properties
    public $NM;    // (n/a) number of markers
    public $TNR;   // (n/a) number of rolls
    public $TCY;   // (n/a) total cut yards

    // Spread factors
    public $STF;   // spreader travel yards factor(0: face to face and face up, 1: face up only)
    public $CRF;   // carriage rotation factor(0: face to face and face up, TCY / TCL: face up only)

    public $total_time;

    // Methods
    function calculate_cut_time() {
        $MCMT = $this->TCL / $this->CV; // minutes of conveyor move time
        $NCM = $this->TCL / $this->CLT; // minutes of conveyor move setup time
        $MCMTS = $this->NCM * $this->CLTS; // minutes of conveyor move setup time
        $MCT = $this->TCP1 / $this->CS; // minutes of cut time
        $MPMT = $this->TCP2 * $this->PMT; // minutes of piece move time

        $this->TCT = ($MCMT + $MCMTS + $MCT + $MPMT + $this->CST) / $this->COEF; // total cutting time
        $this->CCRC = ($this->TCL / $this->TCT); // cutting consumption rate for cut
        return $this->TCT;
    }
    function calculate_spread_time() {
        /* TODO:
        PST * NM * 2 = Minutes to deploy / take up markers (MMT)
        MST * NM = Minutes to mark ends and splice points (MNT)
        PST * NM = Minutes put down underlayment. (MUT)
        TCY / SS = Minutes of Spread Time (MS)
        TCY / ST * STF = Minutes of Travel Time (MT)
        (TCL *.5) * (TNR) / ST= Minutes of travel time to load rolls. (MRT)
        MLR * TNR-1 = Minutes to load Rolls (MLT)
        CRT * CRF = Minutes of carriage rotation (MCT)
        TCY /DY * DT = Minutes for defects (MDT)

        Resulting in the final calculations for spreading time:

        (CST + MMT + MNT + MUT + SSA) / OEF =  Minutes of spread set up time (XSST) 
        (MS + MT + MRT + MLT + MCT + MDT) / OEF = Minutes of Spreading Time (XST)
        (XSST + XST) = Total Spreading Time (TST)
        */
    }

    function get_total_time() {
        return $this->total_time;
    }
}
?> 