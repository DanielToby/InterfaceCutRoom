from datetime import datetime, date


class Order:
    not_sched = "Not Scheduled"
    ten_sched = "Tentatively Scheduled"
    accepted_sched = "Accepted Scheduled"
    in_progress = "In Progress"

    def __init__(self, order_num: int, due_date: datetime.date, spread_time: float, cut_time: float,
                 priority: str, total_space_area: int, allowableTableIDs: [int], priorityValue=-1):
        self.order_num = order_num
        self.due_date = due_date
        self.spread_time = spread_time
        self.cut_time = cut_time
        self.priority = priority
        self.total_space_area = total_space_area
        self.priorityValue = priorityValue
        self.allowableTableIDs = allowableTableIDs
        self.pref = -1
        self.scheduled = self.not_sched
        self.job_completed = False


class Table:

    def __init__(self, table_id: int, table_length: int, table_width: int):
        self.table_id = table_id
        self.table_length = table_length
        self.table_width = table_width
        self.table_assigned_to_workgroup = False
        self.queue = []


class TablePair:

    def __init__(self, workgroup_id: int, table_a_obj: Table, table_b_obj: Table, cutter_move_time: int,
                 ):
        self.workgroup_id = workgroup_id  # Found in  Equip.WKGROUP
        self.table_a = table_a_obj
        self.table_b = table_b_obj
        self.table_a.table_assigned_to_workgroup, self.table_b.table_assigned_to_workgroup = True, True

        self.last_round_scheduled = -1
        self.cutter_position = -1
        self.Largest_Empty_Space_size_is_on_table_A = None
        self.current_jobs = []

        self.cutter_move_time = cutter_move_time  # This is a constant that needs to be looked up via the database
        self.TTnr = None
        self.Tln_arr = None
        self.RTnr = None

    def get_job_in_progress(self) -> bool:
        """
        :return: True if there is at least one job in progess
        """
        return self.current_jobs != []

    def get_time_exiting_jobs(self) -> int:
        """
        Perform a DB call that gets the amount of time in seconds remaining for the table pair
        :return:
        """
        return 0

    def get_Largest_Empty_Space_size(self) -> int:
        """
        update the class attribute bool Largest_Empty_Space_size_is_on_table_A
        :return: the area of the largest space
        """
        self.Largest_Empty_Space_size_is_on_table_A = True
        return 0

    def largest_empty_space_is_on_table_A(self) -> bool:
        return self.Largest_Empty_Space_size_is_on_table_A

    def _update_current_cutter_position(self) -> None:
        """
        Perform a DB call to get the cutter position, the cutter can only be in three positions:
            -1: Error
            1: on table A
            2: on table B
        THIS NEEDS TO BE UPDATED WHEN IMPLIMENTED IN PHP
        :return:
        """
        self.cutter_position = -1

    def update_time_tracking_for_table_pair(self, SchWin):

        def getTimeInEachRound() -> int:
            """
            This isn't defined anywhere, it's usage can be found on page 9 of the Technical Document
            :return time in seconds rounded up to the whole second
            """
            return 0

        def getMaxLengthForEachRound() -> int:
            """
            This isn't defined anywhere, it's usage can be found on page 9 of the Technical Document
            :return: length rounded up to the near integer
            """
            return 0

        def getRemainingTime(SchWin) -> int:
            """
            //this method calculates the remaining Time, it's usage can be found on page 9 of the Technical Document.
            RTnr = SchWin -∑Tln  (for r= 1 to the round just prior to this scheduling round) - Tnr
            :param SchWin:
            :return: the remaining time in seconds rounded up
            """
            return 0

        self.TTnr = getTimeInEachRound()
        self.Tln_arr = getMaxLengthForEachRound()
        self.RTnr = getRemainingTime(SchWin)

    def table_A_currently_has_cutter(self) -> bool:
        pass

    def table_A_currently_has_largest_empty_space(self) -> bool:
        pass

    def move_cutter(self, table_a=False, table_b=False):
        if table_a:
            # Database call to move the cutter to table A
            pass
        elif table_b:
            # Database call to move the cutter to table B
            pass
        else:
            raise Exception


def get_list_of_order_objects() -> [Order]:
    """
    This function queries the Database to get all current unfinished orders and information associated with them
    :return:
    """
    return_list = []
    """
    Query the database to get a list of all order numbers that are outstanding (not completed)
    For each order number, get and calculate all of the variables and create an "Order object"
    The PHP code would like something like this:

    list_of_order_nums_of_unfinished_orders = []
    SQL query to filter by unfinished jobs
    add the order numbers to list_of_order_nums_of_unfinished_orders
    for order in list_of_order_nums_of_unfinished_orders
        SQL lookup by order number

        temp_obj =   Order(order.order_num, order.due_date , order.spread_time, order.cut_time,
                 order.priority, order.allowableTableIDs)
        return_list.append(temp_obj)

    """
    return return_list


def get_list_of_TablePairs() -> [TablePair]:
    """
    This function queries the Database to get all table pairs and information associated with them
    :return:
    """
    return_list = []
    """
    Query the database to get a list of all table pairs
    For each table_pair, get and calculate all of the variables and create an "Order object"
    The PHP code would like something like this:

    list_of_TablePairs = []
    SQL query to filter by unfinished jobs
    add the order numbers to list_of_order_nums_of_unfinished_orders
    for order in list_of_order_nums_of_unfinished_orders
        SQL lookup by order number

        temp_obj =   Order(order.order_num, order.due_date , order.spread_time, order.cut_time,
                 order.priority, order.allowableTableIDs)
        return_list.append(temp_obj)

    """
    return return_list


class Scheduler:
    """
    Quickstart:
    Function names are directly related to the steps outlined in the High Level Design Document

    Assumptions:
    1. Cutter travel time is minimized by cutting entire length of spreadable table before moving to next table and
    doing the same. The cutter move time between tables will be designated as Cmt.
    2. This model defines rules for two –table workstation solutions. Future versions will be formulated for the cases
    that utilize  one-table workgroups and 3 or more tables per workgroup.
    3. Users will be able to select a "goodness" value, X, that determines how well the algorithm will attempt to find
    optimal solutions.  X is a number from 0 to 1.  The closer to one, the harder the program will work to find optimal
    solutions. We will start with X=.95 for the pilot.
    4. A Priority can be determined for each Job as the combination of Due Date, expedited value and production line
    feed value. This is defined in the Priority Determination Process.
    5. For two table workstations, manual labor is minimized when one table is being spread while the other is being
    cut. This strategy balances the spreading time of jobs on one table with the cutting times of jobs on the opposite
    table.
    6. There are two states to Jobs being scheduled: Tentatively scheduled and Accepted scheduled.
    As the program selects Jobs to be placed on the table, those Jobs become “Tentatively scheduled” and are tentatively
    removed from the candidate pool of Jobs to schedule.  Once the Cut Room Manager accepts a number of Tentatively
    Scheduled Jobs they become “Accepted scheduled” and are permanently removed from the candidate pool of Jobs to
    schedule.

    """

    def __init__(self, schedule_window_value, all_orders: [Order], all_tablePairs: [TablePair]):
        """
        Initialize Variables upon invoking the Scheduling Engine
        :param schedule_window_value:
        """
        self.all_orders = all_orders
        self.all_tablePairs = all_tablePairs

        self.jobs_to_schedule = []  # a list of ordered lists
        self.tenatively_accepted_jobs = []
        self.accepted_jobs = []

        self.goodness = 0.95
        self.schedule_window_value = self.SchWin = schedule_window_value
        self.scheduling_process_status = None
        self.R = None

        self.invoke_engine(self.schedule_window_value)

    def invoke_engine(self, schedule_window_value):
        """
        Once invoked, the Scheduling Engine sorts all released and unscheduled Jobs by allowable workstations. Some
        Jobs will belong to more than one workstation. The Engine then runs four sequential steps:
        2.1: Initialize Variables upon invoking the Scheduling Engine
        2.2 Priority Determination to assign a Priority Value to every released but unscheduled Manufacturing Job.
        2.3 Scheduling Process – this consists of four sequential steps that result in a round of fully loaded table
        pairs.
        2.4 Tentative Schedule Presentation – Once Scheduling is complete this step presents the tentative results to
        the Cut Room Manager to allow the manager to select which Tentatively scheduled Jobs will change status to
        become Accepted Scheduled Jobs.
        """
        print("invoke_engine called")
        self._initialize_2_1(schedule_window_value)
        print("initialize_2_1 completed")
        self._priority_determination_2_2()
        print("_priority_determination_2_2 completed")
        self._scheduling_process_2_3()
        print("_scheduling_process_2_3 completed")
        self._tentative_schedule_presentation_2_4()
        print("_tentative_schedule_presentation_2_4 completed")
        print("invoke engine completed")

    def _initialize_2_1(self, schedule_window_value):
        # Initialize Variables upon invoking the Scheduling Engine
        # 1 Sort all released and unscheduled orders by allowable workstations.
        # Some orders will belong to more than one workstation.

        # 2 The Round counter (R) is set to 1
        self.R = 1

        # 3 The Scheduling Process Status is set to 0 to indicate initialization status
        self.scheduling_process_status = 0

        # 4. Get input for the value of the Schedule Window (SchWin a new field for the Factory table
        # that is input by the Cut Room Manager when the Scheduling Engine is Invoked)
        self.schedule_window_value = self.SchWin = schedule_window_value
        self.scheduling_process = None

    def _priority_determination_2_2(self):
        """
        Perform Priority Determination to assign a Priority Value to every released but unscheduled Manufacturing
        Job. The pool of candidate orders to schedule are those whose Milestone = “In Cutting”.  Within this pool
        Orders are always Prioritized by Due Date.  Within the pool of Orders for the same Due Date there is further
        prioritization. Within each set of workstation orders, sort orders by due date, giving the nearest due date
        the highest sort.

        :return:
        """

        def check_production_feed_for_order(order: Order) -> int:
            """
            :param order:
            :return:
            """

            def getOrdersinProdLine(job_num) -> int:
                # gets the quantity of orders which are in the Sew factory in the status “Cut Not Started Sew”
                # I assume this is a database call -Benji
                return 0

            def getConsumptionRate(job_num) -> float:
                # gets unit/hour consumption rate of the Production Line
                # I assume this is a database call -Benji
                return 0.0

            def getTableLengthTime(job_num) -> float:
                # There is no annotation for this function in the technical doc
                return 0.0

            def getDesiredQueueLength(job_num) -> int:
                # obtained from factory.reportGrp
                return 0

            Qi, Pr, Ts, Q = getOrdersinProdLine(order.order_num), getConsumptionRate(order.order_num), \
                            getTableLengthTime(order.order_num), getDesiredQueueLength(order.order_num)
            ExpConsumption = Pr * Ts
            if self.R == 1:
                EPQS = Qi
            else:
                # The Technical document states: EPQS = Qi + sum(both accepted and tentatively scheduled jobs for the
                # productionline P) – ExpConsumption;
                EPQS = Qi + len(self.tenatively_accepted_jobs) + len(self.accepted_jobs) - ExpConsumption
            if Q > EPQS:
                return 0
            else:
                return 1

        def get_preference(order: Order):
            """
            Preferences.  Within any priority pool,  preference will be given for either the same fabric color or
            same model as the last scheduled job.  The ReportGrp table has a field for the preferences of each
            Production line called Production Preference (Pref). Users will assign a Preference Value of either M or
            C for each production line.  Preference means only that the same Model (M) or Color (C) will be chosen
            next as a candidate but scheduled only if they meet the conditions of the Scheduling process. Pref will
            be a tie breaker for all Priority Values. :param order: :return:
            """
            return order.pref

        def sort_jobs_by_cut_date_pv_pref() -> None:

            def get_dict_list_of_all_due_dates(order_list: [Order]) -> {datetime.date: [Order]}:
                dict = {}
                for order in order_list:
                    if dict.get(order.due_date) is None:
                        dict[order.due_date] = [order]
                    else:
                        dict[order.due_date].append(order)
                return dict

            def get_sorted_list_by_pv_pref(order_list: [Order]) -> []:
                pv_0, pv_1, pv_2 = [], [], []
                for order in order_list:
                    if order.priorityValue == 0:
                        pv_0.append(order)
                    if order.priorityValue == 1:
                        pv_1.append(order)
                    else:
                        pv_2.append(order)
                pv_0.sort(key=lambda o: o.pref, reverse=True)
                pv_1.sort(key=lambda o: o.pref, reverse=True)
                pv_2.sort(key=lambda o: o.pref, reverse=True)
                return pv_2, pv_1, pv_0

            temp_dict = get_dict_list_of_all_due_dates(self.jobs_to_schedule)
            for key in temp_dict.keys():
                temp_list = temp_dict[key]
                temp_dict[key] = get_sorted_list_by_pv_pref(temp_list)
            date_sorted_keys = sorted(temp_dict.keys())
            temp_list = []
            for date_sorted_key in date_sorted_keys:
                temp_list.append(temp_dict[date_sorted_key])
            self.jobs_to_schedule = temp_list

        for order in self.jobs_to_schedule:
            if order.priority == "EXPEDITE":
                order.priorityValue = 2
            elif order.priority == "RUSH":
                order.priorityValue = 1
            else:
                order.priorityValue = check_production_feed_for_order(order)
            order.pref = get_preference(order)
        sort_jobs_by_cut_date_pv_pref()

    def _scheduling_process_2_3(self):
        """
        The following four sequential steps result in a round of fully loaded table pairs.
        :return:
        """

    def _table_pair_selection_2_3_i(self):
        # Table Pair Selection to determine which Table pair will be scheduled next.
        pass

        def get_next_table_pair():
            """
            2.3.1.1: Select the Table Pair whose allowable Jobs have the highest total Priority Value and Preference.

            2.3.1.2: If no tables currently contain Expedited , Rush or Production Feed Orders, the next Table Pair to
            schedule will be determined by:

                2.3.1.2.1: If there are partially scheduled table pairs, that is, this round of Scheduling does not
                            follow a round of fully scheduling all the Table Pairs and there are some scheduled jobs on
                            the tables, select the Table Pair with the greatest amount of remaining Table Schedule Time
                            (See section 2.3.4 aka 2.3.iv)

                2.3.1.2.2: If this round of Scheduling does follow a round of fully scheduling all the Table Pairs, or
                is the first round and there are no work-in-progress jobs on the tables, select the Table Pair with the
                least number of allowable Jobs to being Scheduling. This maximizes the chance of selecting an optimal
                solution for that table air because it gets the first shot at using jobs that can be assigned to other
                tables.

            2.3.1.3: The scheduling Engine will fill all the other table pairs before Tentatively Scheduling any further
            Jobs to this Table pair.  Loop back to 3.1.1 until all table pairs have been scheduled for this round.
            :return:
            """

    def _apply_Scheduling_Process_Status_algorithms_2_3_ii(self):
        """
        Initialization  - This is the process that will be used to initially load two-table workgroups at the beginning
        of Scheduling

        Cut Time Length Optimization – this is the process that will provide the second round of fully loaded table
        pairs and every other round thereafter. The two-table strategy starts by selecting the job with the
        longest Cut time (TCT), designated as the (Jct) to be spread on the table not being serviced by the cutter.

        Table Pair Time Equalization – After all table pairs fully loaded by the Cut Time Length Optimization process,
        the third round of table pair, and every other round thereafter, loading will select jobs that enable all the
        table pairs to finish their cutting and spreading activities at the same time.

        :return:
        """

        def schedule_algorithm_selection():
            if self.scheduling_process_status == 0:
                self._in
            elif self.scheduling_process_status == 1:
                self.cut_time_length_opt()
            elif self.scheduling_process_status == 2:
                self.table_pair_time_equalization()
            else:
                raise Exception

        pass

    def _update_variables_2_3_iii(self):
        self.R += 1
        if self.scheduling_process_status == 0:
            self.scheduling_process_status = 1
        elif self.scheduling_process_status == 1:
            self.scheduling_process_status = 2
        elif self.scheduling_process_status == 2:
            self.scheduling_process_status = 1
        else:
            raise Exception

    def _table_pair_time_tracking_2_3_iv(self):
        """
        This step keeps track of the amount of spread and cut time assigned to each table pair and performs a running
        calculation of the remaining time left in the scheduling window after each round of filling up the table.
        This is used to determine the remaining time for each pair within the Scheduling Window and whether
        scheduling is complete.  If scheduling is not complete then return to Step 2 (Priority Value Determination) and
        repeat until Scheduling is complete
        :return:
        """

    def _tentative_schedule_presentation_2_4(self):
        """
        Tentative Schedule Presentation: Once Scheduling is complete this step presents the tentative results to the
        Cut Room Manager to allow the manager to select which Tentatively scheduled Jobs will change status to become
        Accepted Scheduled Jobs.
        """

        def display_review_and_release_screen():
            """
            4.1: Display a Review and Release Screen showing the following:
                4.1.1: All rounds of Tentatively scheduled Rounds of Table Pairs where the X axis indicates the time
                length of each Table Pair per Round and the y axis shows the list of table pairs with the Order number
                and spread order of each Job.
                4.1.2: Each Table Pairs are color coded to indicate the “goodness” of the selection relative to X:
                    4.1.2.1: If the Job selection for the Table Pair was within X% then display grey
                    4.1.2.2: If the Job selection for the Table Pair was within Y % of X then display yellow
                    4.1.2.3 If the Job selection for the Table Pair was within Z% of X then display red
                        Where X,Y,Z are variables configured in the application set-up such that:
                        X =a "goodness" value that determines how well the algorithm will attempt to find optimal
                        solutions.  X is a number from 0 to 1.
                        Y =Lower Limit of out of tolerance for X
                        Z = Upper limit of out of tolerance for X
                4.1.3: The Cut Room Manager will be able to select entire Table Pairs for each Round to accept the
                schedule of the Jobs on those table Paris

            :return:
            """

        def change_milestones():
            """
            4.2: The Milestone of all accepted Jobs will change to “Scheduled”  a new milestone classification) and all
            non-accepted jobs will remain in the Milestone “In Cutting”.
            :return:
            """

        display_review_and_release_screen()
        change_milestones()

    def _cut_schedule_sync_check_3(self):
        pass

    def receive_list_of_orders(self, order_list: [Order]) -> None:
        for order in order_list:
            pass

    def recieve_table_pair_list(self, table_pair_list: [TablePair]) -> None:
        for table_pair in table_pair_list:
            pass

    def _initialization_process_appendix_A(self, table_pair_list: [TablePair]):
        """
        This process initializes the schedule for two-table workstations.  Two conditions exist:
            1. There are no Jobs in progress on any of the table pairs. Then update the Scheduling Process Status value
            to  1 and go to Step 3.1 of the Scheduling Process.
            2. There are existing Jobs already spread on one or more Tables.  We calculate the remaining time to
            complete the work-in-progress jobs. We will look for the largest empty space-time on a table on which to
            schedule Jct.  There are two cases for this:
                a. The table with the largest empty space-time already has the cutter:
                    If the spread time for Jct is longer than the time to cut the existing jobs (Ect1 to Ectn) on the
                    table then we must determine whether the cutter should wait upon Jct or move to the next table and
                    begin cutting those scheduled jobs. There will be two conditions:
                        a.1: The Spread jobs Est1-Estn have a total higher Priority Value - then move the cutter and
                            cut them before Jct.  Schedule a job to fill the space behind the spreading jobs from the
                            same Priority pool as Jct.
                        a.2: Jct is in the same priority tier as the existing  Spread jobs Est1-Estn.  Then determine
                        whether the wait time is longer than the cutter move time (Cmt) If it is the wait time is
                        shorter than the cutter move time (Cmt) then wait, cut Jct and populate table 2 as in the two
                        table process. If Spread time (Jct) >= Cut time (Ect1-Ectn) + Cmt

                b. The table with the largest space-time does not have the cutter. If the spread time for Jct plus the
                spread time for Estn on Table 2 is longer than the time to cut 	the existing jobs (E1ct1 to Ectn) on
                Table1 then we must determine whether we spread more 	jobs on Table 1 or move the cutter as soon as it
                cuts the existing jobs. There will be three conditions:
                    b.1: If Jct is has a higher Priority than the rest of the unscheduled jobs - then move the cutter
                    when it is done cutting the existing scheduled jobs.
                    b.2: There are more unscheduled jobs in the same priority tier as Jct.  Fill these in as Jst1 to
                    Jstn and spread and cut them before Jct.
                    b.3: All the unscheduled jobs have a lower priority than the existing jobs.  Cut Ect1 to Ectn while
                    spreading Estn and move the cutter to cut it and Jct.
        Before final Tentative table assignment of jobs Jst1 through Jstn schedule we must ascertain that the selected
        cuts for spreading fit on the table. That is: 	Table Length (T1) >=[ ∑ Length (Jstn)]*X If the above is not
        true, then remove the Job of smallest length and recalculate until the equation is true. After a table pair is
        filled with Tentatively Scheduled Jobs, the Table Schedule Time (new field TableTime in a cache memory table)
        is calculated and assigned to the table pair.  The Table Time for a Table Pair n in the rth round of Scheduling
        will be denoted as TTnr:
            TTnr = Cut time (Jct) + Cut time (Jrct) + ∑ Spread Time (Jstn) + Cmt

        The code below will follow the puesdocode in the Technical Document
        """

        def getJctForEmptySpace(list_of_jobs: [Order], empty_space_size: int) -> Order:
            """
            returns the Job such that job.length = Large_empty_space. First check for all jobs whose length is equal to
            available largest empty space on the table. If no jobs can be found, find the job which can accommodate the
            largest empty space on table with minimum empty space and keep proceeding until no jobs can be accommodated.
                Always before finalizing the schedule check:
                    Table Length (T1) >=[ ∑ Length (Jstn)]*X
                        If the above is not true, then remove the Job of smallest length and recalculate until the
                        equation is true.
            """

        def cutter_is_on_table_with_largest_empty_space(A_has_largest_space, A_has_cutter, B_has_largest_space,
                                                        B_has_cutter):
            if (A_has_largest_space and A_has_cutter) or (B_has_largest_space and B_has_cutter):
                return True
            else:
                return False

        for table_pair in table_pair_list:
            if not isinstance(table_pair, TablePair):
                raise Exception
            if table_pair.get_job_in_progress() == False:
                self.scheduling_process_status = 1
                return

            remaining_Time = table_pair.get_time_exiting_jobs()
            large_empty_space = table_pair.get_Largest_Empty_Space_size()
            Jct = getJctForEmptySpace(self.jobs_to_schedule, large_empty_space)

            table_A_has_largest_space = table_pair.largest_empty_space_is_on_table_A()
            table_A_has_cutter = table_pair.table_A_currently_has_cutter()
            table_B_has_largest_space = not table_A_has_largest_space
            table_B_has_cutter = not table_A_has_cutter

            if cutter_is_on_table_with_largest_empty_space(table_A_has_largest_space, table_A_has_cutter,
                                                           table_B_has_largest_space, table_B_has_cutter):
                pass
            else:
                pass

    def _cut_time_length_optimization_appendix_B(self):
        pass

    def _table_pair_time_equalization_appendix_C(self):
        pass


def get_list_of_TablePairs() -> [TablePair]:
    """
    This function queries the Database to get all table pairs and information associated with them
    :return:
    """
    return_list = []
    """
    Query the database to get a list of all table pairs
    For each table_pair, get and calculate all of the variables and create an "Order object"
    The PHP code would like something like this:

    list_of_TablePairs = []
    SQL query to filter by unfinished jobs
    add the order numbers to list_of_order_nums_of_unfinished_orders
    for order in list_of_order_nums_of_unfinished_orders
        SQL lookup by order number

        temp_obj =   Order(order.order_num, order.due_date , order.spread_time, order.cut_time,
                 order.priority, order.allowableTableIDs)
        return_list.append(temp_obj)

    """
    return return_list


class Scheduler2:
    """
    Quickstart:
    Function names are directly related to the steps outlined in the High Level Design Document

    Assumptions:
    1. Cutter travel time is minimized by cutting entire length of spreadable table before moving to next table and
    doing the same. The cutter move time between tables will be designated as Cmt.
    2. This model defines rules for two –table workstation solutions. Future versions will be formulated for the cases
    that utilize  one-table workgroups and 3 or more tables per workgroup.
    3. Users will be able to select a "goodness" value, X, that determines how well the algorithm will attempt to find
    optimal solutions.  X is a number from 0 to 1.  The closer to one, the harder the program will work to find optimal
    solutions. We will start with X=.95 for the pilot.
    4. A Priority can be determined for each Job as the combination of Due Date, expedited value and production line
    feed value. This is defined in the Priority Determination Process.
    5. For two table workstations, manual labor is minimized when one table is being spread while the other is being
    cut. This strategy balances the spreading time of jobs on one table with the cutting times of jobs on the opposite
    table.
    6. There are two states to Jobs being scheduled: Tentatively scheduled and Accepted scheduled.
    As the program selects Jobs to be placed on the table, those Jobs become “Tentatively scheduled” and are tentatively
    removed from the candidate pool of Jobs to schedule.  Once the Cut Room Manager accepts a number of Tentatively
    Scheduled Jobs they become “Accepted scheduled” and are permanently removed from the candidate pool of Jobs to
    schedule.

    """

    def __init__(self, schedule_window_value: int, all_orders: [Order], all_tablePairs: [TablePair]):
        """
        Initialize Variables upon invoking the Scheduling Engine
        :param schedule_window_value:
        """
        self.orders_to_schedule = all_orders
        self.all_tablePairs = all_tablePairs
        self.tablePairs_dict = {}  # Key is the ID of the tablepair, the values are the IDs of all allowable jobs
        self.update_table_pairs_dict()

        self.tenatively_accepted_jobs = []
        self.accepted_jobs = []

        self.goodness = 0.95
        self.schedule_window_value = self.SchWin = schedule_window_value
        self.scheduling_process_status = None
        self.R = None

        for order in self.orders_to_schedule:
            if order.scheduled == order.ten_sched:
                self.tenatively_accepted_jobs.append(order)
            elif order.scheduled == order.accepted_sched:
                self.accepted_jobs.append(order)

        self.invoke_engine(self.schedule_window_value)

    def invoke_engine(self, schedule_window_value):
        self.priority_determination()

    def get_next_table_pair_obj(self) -> TablePair:
        """
        This method isn't exactly in the Technical document, it adapts from Table pair selection:
        Table pair selection
        for all_table_pairs do
            tablePair = selectedTablePair(table_with_highest_priorityvalue_and_pref);
                if(tablePair = empty) then // no tables currently contain Expedited , Rush or Production Feed Orders
                if(checkPartiallyScheduledTablePairs() = true) then
                    tablePair=selectedTablePair(table_with_highest_remaining_table_scheduleTime);
                else if(checkFullyScheduledTablePairs() = true) then //ie., there are no jobs on the table
                    tablePair=selectedTablePair(table_with_least_allowableJobs);
        end for

        I am going to return the TablePair that is

        :return:
        """

    def check_production_feed_for_order(self, order: Order) -> int:
        """
        :param order:
        :return:
        """

        def getOrdersinProdLine(job_num) -> int:
            # gets the quantity of orders which are in the Sew factory in the status “Cut Not Started Sew”
            # I assume this is a database call -Benji
            return 0

        def getConsumptionRate(job_num) -> float:
            # gets unit/hour consumption rate of the Production Line
            # I assume this is a database call -Benji
            return 0.0

        def getTableLengthTime(job_num) -> float:
            # There is no annotation for this function in the technical doc
            return 0.0

        def getDesiredQueueLength(job_num) -> int:
            # obtained from factory.reportGrp
            return 0

        Qi, Pr, Ts, Q = getOrdersinProdLine(order.order_num), getConsumptionRate(order.order_num), \
                        getTableLengthTime(order.order_num), getDesiredQueueLength(order.order_num)
        ExpConsumption = Pr * Ts
        if self.R == 1:
            EPQS = Qi
        else:
            # The Technical document states: EPQS = Qi + sum(both accepted and tentatively scheduled jobs for the
            # productionline P) – ExpConsumption;
            EPQS = Qi + len(self.tenatively_accepted_jobs) + len(self.accepted_jobs) - ExpConsumption
        if Q > EPQS:
            return 0
        else:
            return 1

    def priority_determination(self):
        for index, order_obj in self.orders_to_schedule:
            if order_obj.priority == "EXPEDITE":
                order_obj.priorityValue = 2
            elif order_obj.priority == "RUSH":
                order_obj.priorityValue = 1
            else:
                order_obj.priorityValue = self.check_production_feed_for_order(order_obj)
            self.orders_to_schedule[index] = order_obj

    def update_table_pairs_dict(self):
        self.tablePairs_dict = {}  # Clear the old dictionary first
        for order in self.orders_to_schedule:
            for tablePair_id in order.allowableTableIDs:
                if self.tablePairs_dict.get(int(tablePair_id)) == None:
                    self.tablePairs_dict[int(tablePair_id)] = [order.order_num]
                else:
                    self.tablePairs_dict[int(tablePair_id)].append(order.order_num)

    def schedule_order(self, order_obj: Order, tablePair_obj: TablePair, table_id: int):
        if order_obj not in self.orders_to_schedule or table_id not in [1, 2]:
            raise Exception

        tablePair_obj.current_jobs.append(Order)
        if table_id == 1:
            tablePair_obj.table_a.queue.append(Order)
        else:
            tablePair_obj.table_b.queue.append(Order)

        self.orders_to_schedule.remove(order_obj)

    def schedule_algorithm_selection(self, table_pair_selection_order: [TablePair]):
        if self.scheduling_process_status == 0:
            self.initialize(table_pair_selection_order)
        elif self.scheduling_process_status == 1:
            self.cut_time_length_opt(table_pair_selection_order)
        elif self.scheduling_process_status == 2:
            self.table_pair_time_equalization(table_pair_selection_order)
        else:
            raise Exception

    def begin_scheduling_process(self):
        while self.orders_to_schedule != [] and self.TDT_is_greater_then_SchWin():
            self.schedule_one_round()


    def schedule_one_round(self):
        table_pair_selection_order = []
        for _ in range(len(self.all_tablePairs)):
            table_pair_selection_order.append(self.get_next_table_pair_obj())
        self.schedule_algorithm_selection(table_pair_selection_order)
        self._update_variables()

    def TDT_is_greater_then_SchWin(self) -> bool:
        return False

    def _update_variables(self):
        self.R += 1
        if self.scheduling_process_status == 0:
            self.scheduling_process_status = 1
        elif self.scheduling_process_status == 1:
            self.scheduling_process_status = 2
        elif self.scheduling_process_status == 2:
            self.scheduling_process_status = 1
        else:
            raise Exception

    def initialize(self, table_pair_selection_order: TablePair):
        pass

    def table_pair_time_equalization(self, table_pair_selection_order: TablePair):
        pass

    def cut_time_length_opt(self, table_pair_selection_order: TablePair):
        pass


order1 = Order(1, date(2020, 3, 3), 10.0, 20, "EXPEDITE", [1, 2])
order2 = Order(2, date(2020, 3, 3), 10.0, 20, "RUSH", [1, 2])
order3 = Order(3, date(2020, 3, 3), 5.0, 10, "RUSH", [1, 2])

T1 = Table(1, 10, 20)
T2 = Table(1, 10, 20)

TP1 = TablePair(1, 1, 2, 10)
