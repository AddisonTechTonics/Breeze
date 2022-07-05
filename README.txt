###############################################################################
#         Developed by Addison Smith, released on June of 2021.               #
###############################################################################
#                                                                             #
###############################################################################
#                               OVERVIEW                                      #
###############################################################################
-This version is basically a template. It's to include basic and universal 
functionalities that cover a wide range of business & management tasks. I hope 
to grow and evolve it if used.

-The code is completely free to use how seen fit, built with LAMP in mind. 
Requires php 8 or above. If desired, contact me and I can assist initial 
setup/deployment for private use. (for a small charge)

-I charge below-market average rates for small businesses and nonprofits. I 
will design custom features and functionality to suit your use cases. 
Contact me for estimates.

-Not looking for contributors at this time.

############################ CORE FUNCTIONALITY ###############################

-account database connection with login password security
-admin can login and view, add, edit and delete both employees and scheduled 
events in DB
-users can view events and associated info after valid login
-stay logged in until timeout or exit

###############################################################################                                                   
#                          TO DO BEFORE PRODUCTION                            #
###############################################################################

-Limit page access for employees. Make it to where employees can see schedule,
but only managers can add/edit events and users in their respective databases.
-Security analysis, both full breakdown and peer-review

-------------------------------------------------------------------------------
                                v2 plans
-------------------------------------------------------------------------------
-Give each employee a unique schedule that can only be seen under their login
or by a manager.
-Redesign DB Structure to revolve around tax-prep and document storage
-More robust event system (true delete, multi-day event grouping, job status, 
option to complete job & save to seperate DB, scheduled workers for that day)
-More robust employee system(job titles, start/end dates, notes/write ups,
message board)	
-QoL
-------------------------------------------------------------------------------

###############################################################################
#           Components that need built, redesigned, or optimized              #
###############################################################################

-Add Event History option for managers with Full Calendar (including employee 
vacations)
-Timeclock
-output formatted tax documents

-Employee Message board
-quick PIN access

-Pages for customer viewing

###############################################################################
#              Quality of Life/Optimization/Polishing/Maintenance             #
###############################################################################

-Add more/better Error Handling
-Format Dates/Times for view on website
-Finish building the front-end
-Finish the error page
-add "Are You Sure" prompts
