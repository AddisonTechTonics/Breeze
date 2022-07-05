####              #### ################################# ####               ####
###################### ###  CURRENTLY IN PRODUCTION  ### #######################
####              #### ################################# ####               ####

#-#-#-#-#-#- ###################################################### -#-#-#-#-#-#
#/\\//\\//\  ### Developed by Addison Smith, released June 2022 ###  \//\\//\\/#
#-#-#-#-#-#- ###################################################### -#-#-#-#-#-#

################    #-#   ############################   #-#    ################
### >< <> >< ###   #-#-#  ### >< #  OVERVIEW  # >< ###  #-#-#   ### >< <> >< ###
################    #-#   ############################   #-#    ################
 
-This version is basically a template. It's to include basic and universal 
functionalities that cover a wide range of business & management tasks. I hope 
to grow and evolve it if used.

-The code is completely free to use how seen fit, built to work with LAMP 
stack. Requires php 8 or above. If desired, contact me and I can assist initial 
setup/deployment for private use. (for a small, one-time charge)

-I will design custom features and functionality to suit client needs. Will 
charge below-market rates for small businesses, nonprofits, or other types of
non-megacorporations aiming to benefit society. Contact me for estimates.

-Not looking for contributors at this point in time, but i am not against 
adding the right security specialist if the stars ever align for it.

##                       #############################                        ##
################################################################################
#### # # # #             ### CURRENT FUNCTIONALITY ###              # # # # ####
################################################################################
##                       #############################                        ##
                          
-Must log-in with a valid username and password to access the web-app

-Admin can access 'Employee' page to view, add, edit, and delete users inside
the 'Employees' table (While properly connected to MySQL database)
-Admin can acces 'Event' page to view, add, edit, and delete events inside
the 'Events' table (While properly connected)

-Employees can log in and view Event schedule on the home page (Right now 
employees can edit/modify employees and events... soon to be fixed)

-stay logged in until timeout or exit

##                       ################################                     ##
################################################################################
#### # # # #             ###   DO BEFORE PRODUCTION   ###           # # # # ####
################################################################################
##                       ################################                     ##

-Limit page access for employees. Make it to where employees can see schedule,
but only managers can add/edit events and users in their respective databases.
-Security analysis, both full breakdown and peer-review

##                            ###################                            ##
###############################################################################
#### # # # #                  ###  V2 PLANS  ####                  # # # # ####
###############################################################################
##                            ###################                            ##

-Give each employee a unique schedule that can only be seen under their login
or by a manager.

-Redesign DB Structure to revolve around tax-prep and document storage
-add timeclock functionality
-add payroll info & calculation functionality
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
