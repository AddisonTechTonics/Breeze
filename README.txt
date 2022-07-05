####              #### ################################# ####               ####
###################### ###  CURRENTLY IN PRODUCTION  ### #######################
####              #### ################################# ####               ####

[changetest]

#-#-#-#-#-#- ###################################################### -#-#-#-#-#-#
#/\\//\\//\  ### Developed by Addison Smith, released June 2022 ###  \//\\//\\/#
#-#-#-#-#-#- ###################################################### -#-#-#-#-#-#

################    #-#   ############################   #-#    ################
### >< <> >< ###   #-#-#  ### >< #  OVERVIEW  # >< ###  #-#-#   ### >< <> >< ###
################    #-#   ############################   #-#    ################
 
-This version is basically a template. It's to include basic and universal 
functionalities that cover a wide range of business & management tasks. I hope 
to grow and evolve it as my skills advance. V2 Plans listed below.

-The code is completely free to use how seen fit, built to work with LAMP stack.
Requires php 8 or above. If desired, contact me and I can assist initial setup 
or deployment for public or private use. (possible small, one-time charge if I 
deem it necessary)

-I will design custom features and functionality to suit client needs. Will 
charge below-market rates for small businesses, nonprofits, or other types of
non-megacorporations. I want to help those who are working to benefit society. 
Contact me for estimates.

-Not looking for contributors at this point in time, but I am not against adding
the right front-end designer or security specialist if the stars align for it.

-Expect 1.0.0 to be released after an in-depth code review, polishing, security 
audit, and some much-needed reorganization.

##                       #############################                        ##
################################################################################                                                   
#### # # # #             ### CURRENT FUNCTIONALITY ###              # # # # ####
################################################################################
##                       #############################                        ##
                          
-Employees and managers are allowed their access level after username/password
login. Employees redirected to personal pages when routing through the navbar.
-Prepared statements used for all user-input queries to prevent SQL Injection.
-Only password hashes are stored in MySQL database. Extra precautions should be
taken while securing production server & database. (Especially while Breeze is
evolving into payroll/tax-prep services)

-Employees can log in and view Event schedule on the home page. If they click 
on 'Manage Employees' they are sent to a user profile feature currently in-
development. Manage Schedule as well, will send them to a time-off request
subpage also in-development.
-Admins can log in and access the employee/login table and the appointments 
table, and are able to add/edit/delete entries to either page as the need
arises. Full CRUD functionality as it stands.

-All functionality rests on being properly configured to a server and a MySQL 
database.

##                       ################################                     ##
################################################################################                                                   
#### # # # #             ###   DO BEFORE PRODUCTION   ###           # # # # ####
################################################################################
##                       ################################                     ##

-Security analysis, both full breakdown and peer-review

##                            ###################                            ##
###############################################################################
#### # # # #                  ###  V2 PLANS  ####                  # # # # ####
###############################################################################
##                            ###################                            ##

#### Redesign DB Structure to revolve around tax-prep and document storage ####

-Give each employee a unique schedule, set by managers and can only be viewed 
by them or the employee it's assigned to.
-add timeclock functionality
-add payroll info & basic calculation functionality
-output formatted tax documents, and store them securely

-More robust event system (true delete, multi-day event grouping, job status, 
option to complete job & save needed info to seperate DB, view scheduled 
workers for a given day & add/remove daily workers as needed)
-More robust employee system (job titles, start/end dates, notes/write ups,
etc.)	
-QoL

##               #############################################                ##
################################################################################
#### # # # #      ### COMPONENTS THAT NEED BUILT/OPTIMIZED ###      # # # # ####
################################################################################
##               #############################################                ##

-Add Event History option for managers
-Monthly-view Calendar (Showing Events, deadlines, employee vacations, etc)

-quick PIN access
-Employee Message Board (View manager-created messages on homescreen, send
quick messages/notifications to be viewed by manager)
-Employee Task Board (View/mark complete manager-assigned tasks on homescreen)

-Pages for customer viewing

##               ##############################################               ##
################################################################################
#### # # # #     ### QUALITY-OF-LIFE/MAINTAINENCE/POLISHING ###     # # # # ####
################################################################################
##               ##############################################               ##

-Add more/better Error Handling
-Format Dates/Times for view on website
-Finish building the front-end
-Finish the error page
-add "Are You Sure" prompts
-'Welcome [Employee Name]' header for homepage, with last-login session info

################################################################################
################################################################################
