<?php
function get_best_schedule()
{
    // Include config file
    require "config.php";

    $query = "SELECT * FROM jobs";
    if ($jobs = mysqli_query($link, $query)) {

        // job_pq = PriorityQueue(job_id -> estimated_time)
        $job_pq = new SplPriorityQueue();

        while ($job = $jobs->fetch_assoc()) {
            $job_pq->insert($job['id'], $job['TDT']);
        }

        // job_id_array will hold the new order
        $job_id_array = array();
        while (!$job_pq->isEmpty()) {
            $job_id_array[] = $job_pq->extract();
        }

        return $job_id_array;
    }
}

function two_table_solution($t1, $t2, $schwin)
{
    // Include config file
    require "config.php";
    
    /* 1 */
    // 1 ?? Sort all released and unscheduled orders by allowable workstations. Some orders will belong to more than one workstation.
    $round_count = 1; // 2 The Round counter (R) is set to 1
    $scheduling_process_status = 0;  // 3 Scheduling Process Status is set to 0 to indicate initialization status
    $scheduling_window = $schwin; // 4 Get input for the value of the Schedule Window

    /* 2 */
    // 1 The pool of candidate orders to schedule are those whose Milestone = “In Cutting”.  
    //   Within this pool Orders are always Prioritized by Due Date.
    $job_pool = [];
    $sql = "SELECT * FROM jobs WHERE 'milestone'='In Cutting' and 'due_date' > NOW() ORDER BY 'due_date'";
    if ($jobs = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($jobs) > 0) {
            while ($job = $jobs->fetch_assoc()) {
                $job_pool[] = $job;
            }
        }
    }

    // 2 
    // 2.1 Expedited Orders (determined when the 20th byte of ORDDET.ITMDATA5=C).  These are assigned the Priority Value = 2
    $expedited_jobs = [];

    // 2.2 Standard Rush Orders (determined when the 20th byte of ORDDET.ITMDATA5  = D) and Production Feed Orders are assigned Priority Value = 1
    $rush_PD_jobs = [];
    /* 2.2.1
    An Order is classified as Production Feed when 
    the number of units in the queue for each 
    Production line of each Sew Factory (“Factory” in the ReportGrp table) 
    that are in the Milestone “Cut Not Started Sew” falls below a constant “Q”, 
    which is found in the ReportGrp table
    */

    // 4
}