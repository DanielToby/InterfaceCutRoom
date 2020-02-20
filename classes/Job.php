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
    public $SSA;   //(min) time to adjust spreading machine and stops
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
	$this->total_time = $this->total_time + $this->TCT;
        return $this->TCT;
    }
    function calculate_spread_time() {
	$MMT = $this->PST * $this->NM * 2; // minutes to deploy / take up markers
	$MNT = $this->MST * $this->NM; // minutes to mark ends and splice points
	$MUT = $this->PST * $this->NM; // minutes put down underlayment
	$MS = $this->TCY / $this->SS; // minutes of spread time
	$MT = $this->TCY / $this-ST * $this->STF // minutes of travel time
	$MRT = $this->TCL * 0.5 * $this->TNR / $this->ST; // minutes of travel time to load rolls
	$MLT = $this->MLR * ($this->TNR - 1); // minutes to load rolls
	$MCT = $this->CRT * $this->CRF; //minutes of carriage rotation
	$MDT = $this->TCY / $this->DY * $this->DT; // minutes for defects


	$XSST = ($this->CST + $MMT + $MNT + $MUT + $this->SSA) / $this->SOEF; // minutes of set up
	$XST = ($MS + $MT + $MRT + $MLT + $MCT + $MDT) / $this->SOEF; // minutes of spreading time
        $TST = $XSST + $XST; // total spreading time
	$this->total_time = $this->total_time + $TST;
	return $TST;
       
    }

    function get_total_time() {

        return $this->total_time;
    }
}
?> 