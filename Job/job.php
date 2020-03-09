<?php
class Job {
    // Use this as the identifier for the job
    public $ID;

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

    public $TST;   // TOTAL SPREAD TIME

    public $total_time;

    function __construct($id, $tcp1, $tcp2, $tcl, $clts, $cst, $coef, $cs, $pmt, $clt, $cv, $scst, $pst, $mst, $mlr, $dt, $soef, $dy, $ss, $st, $crt, $nm, $tnr, $tcy, $stf, $crf) {
        $this->ID = $id;
        $this->TCP1 = $tcp1;
        $this->TCP2 = $tcp2;
        $this->TCL = $tcl;
        $this->CLTS = $clts;
        $this->CST = $cst;
        $this->COEF = $coef;
        $this->CS = $cs;
        $this->PMT = $pmt;
        $this->CLT = $clt;
        $this->CV = $cv;
        $this->SCST = $scst;
        $this->PST = $pst;
        $this->MST = $mst; 
        $this->MLR = $mlr; 
        $this->DT = $dt;
        $this->SOEF = $soef; 
        $this->DY = $dy;
        $this->SS = $ss; 
        $this->ST = $st; 
        $this->CRT = $crt; 
        $this->NM = $nm;
        $this->TNR = $tnr; 
        $this->TCY = $tcy;
        $this->STF = $stf;
        $this->CRF = $crf;
    }

    // Methods
    function calculate_cut_time() {
        $MCMT = $this->TCL / $this->CV; // minutes of conveyor move time
        $NCM = $this->TCL / $this->CLT; // minutes of conveyor move setup time
        $MCMTS = $this->NCM * $this->CLTS; // minutes of conveyor move setup time
        $MCT = $this->TCP1 / $this->CS; // minutes of cut time
        $MPMT = $this->TCP2 * $this->PMT; // minutes of piece move time

        $this->TCT = ($MCMT + $MCMTS + $MCT + $MPMT + $this->CST) / $this->COEF; // total cutting time
        $this->CCRC = ($this->TCL / $this->TCT); // cutting consumption rate for cut
    }
    function calculate_spread_time() {
        $MMT = $this->PST * $this->NM * 2; // Minutes to deploy / take up markers
        $MNT = $this->MST * $this->NM; // Minutes to mark ends and splice points
        $MUT = $this->PST * $this->NM; // Minutes put down underlayment. (MUT)
        $MS = $this->TCY / $this->SS; // Minutes of Spread Time (MS)
        $MT = $this->TCY / $this->ST * $this->STF; // Minutes of Travel Time (MT)
        $MRT = ($this->TCL * .5) * ($this->TNR) / $this->ST; // Minutes of travel time to load rolls. (MRT)
        $MLT = $this->MLR * ($this->TNR - 1); // Minutes to load Rolls (MLT)
        $MCT = $this->CRT * $this->CRF; // Minutes of carriage rotation (MCT)
        $MDT = $this->TCY / $this->DY * $this->DT; // Minutes for defects (MDT)

        $XSST = ($this->CST + $this->MMT + $this->MNT + $this->MUT + $this->SSA) / $this->OEF; //  Minutes of spread set up time (XSST) 
        $XST = ($this->MS + $this->MT + $this->MRT + $this->MLT + $this->MCT + $this->MDT) / $this->OEF; // Minutes of Spreading Time (XST)
        $this->TST = ($this->XSST + $this->XST); // Total Spreading Time (TST)
    }

    function get_total_time() {
        $this->total_time = $this->TCT + $this->TST;
        return $this->total_time;
    }
}
?> 