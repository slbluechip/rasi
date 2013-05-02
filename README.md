rasi
====

A project to gamify the process of standardizing words for localization purposes

Status of admin interface
1. What happens now :
   a. username:shijiltv and password:test have been designated as admin credentials by setting role column value as 1
   b. when these credentials are used the admin page appears and shows a list of meanings and their ratings from    temp_meanings and rating table 
   c. user can enter meanings through words.php-Add functionality and these are stored in temp_meanings
   d. rating table is being filled manually from command prompt
   e. Admin can Approve meanings ( in this case the same are entered into meanings table and deleted from temp_meanings and rating) or Reject them ( then the status column in temp_meanings is set to 'R')

Note: Tables are related by one word has many temp_meanings and one temp_meaning has many ratings . Delete cascade causes entries in rating to be deleted when corresponding row in temp_meaning is deleted
  
2. What I intend to do next
   a. Work on admin table Ui
   b. Work on bugs
   c. Whatever Shijil/fsmk assigns..
   .
   .
 ... 

