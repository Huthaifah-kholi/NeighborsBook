We started collecting the requirements of our project then we started with designing our system and determining the tools that will be used and after that, we designed our application database and then we start downloading laravel dependencies like composer and wamp server.

Then after everything is installed correctly we downloaded our laravel app using composer by typing the following command: laravel new project via windows cmd.
    

Then after downloading laravel app, we run laravel using the following command:
“php artisan serve”



Then we configure our environment variables like database name and password
	
            
## Website pages:

![image](https://user-images.githubusercontent.com/15262648/37873693-91ae0fbc-302a-11e8-992c-0e9e1cb9c2a4.png)

This page is viewed when a new user visits the website:

 

## Register page:

      In this page the user register in our website after typing the required information, the user enters his home location on the map and he can drag the marker exactly to his location on the map and the app will pick his location automatically. 

![image](https://user-images.githubusercontent.com/15262648/37873695-95f727b6-302a-11e8-8e83-e4f72ef60892.png)



4.1.1.3 Login page:

     The login page is used to authenticate the user to his profile after typing the email and password:

![image](https://user-images.githubusercontent.com/15262648/37873696-989c287c-302a-11e8-94fb-d722ddb0e443.png)


















4.1.1.4 Home page:

     This page contains a map that show markers for everyone around the user 

![image](https://user-images.githubusercontent.com/15262648/37873698-9b3a5914-302a-11e8-9463-7ba5ce72f660.png)



     The user can click on the marker to view the status of his neighbor:



Also, he can see the returned and unreturned stuff around him:
Basic information about stuff is viewed as the name of the stuff, owner name, type, and distance. 
 
![image](https://user-images.githubusercontent.com/15262648/37873699-9e3ec12c-302a-11e8-9df3-5a78b84a91ed.png)






He can also see the skills around him:

We view the basic information name, free times.  
 

Everything is categorized and the user just clicks in the category to view everything inside it:  





















4.1.1.5 Categories page:

    In this page we view the categories:

DVDs:



Sports:






Books:



4.1.1.6 Add stuff page:
     At this page the user can add stuff to his neighbors:







4.1.1.7 Add skill page:
     At this page the user adds skills to share them with his neighbors: 














4.1.1.7 Pick needs page:   
     
      At this page the user can tell his neighbors that he wants a stuff:



4.1.1.8 Request skills page:   

     At this page the user can request skills from his neighbors:


4.1.1.9 Profile page: 

At this page, we view all data related to the user, profile info, uploads, notifications and the user can add a profile picture and cover picture.
    

4.1.1.10 Profile info page:
At this page, we view the profile info and the user can edit his info


Here the user can edit his profile and submit changes:



4.1.1.11 user uploads page:
At this page, the user can see his uploads and the orders from his neighbors. 
 


4.1.1.12 notifications page:
At this page the user can see his notifications:
A notification is sanded to the user in the following cases:
1-If someone accepted his request.
2-If someone around him requests a skill.
3-If someone around him requests a stuff.

We used real-time notification system using Redis. 



 










4.1.1.13 user-stuff page:
At this page, the user can update stuff info, approve users to get this stuff.

When the user clicks update this window is appear, so he can update stuff information:




Also, the user can approve his neighbor’s orders:


4.1.1.14 use-neighbors page:
At this page the user can see all his neighbors ordered based in distance:








 	4.1.1.15 users profile page:
At this page, the user can see his neighbor profile page, and they can chat with each other

We implanted a full real-time shat using Redis. 
 

	4.1.1.16 stuff preview page:
At this page, the user can order the stuff, chat with his neighbor, get directed to the stuff location.




At this section, the user can get directed to the stuff location.

















	4.1.1.17 thanks, page:
This page is previewed when the user requests stuff:















4.2 Mobile Application:

4.2.1 Sign in and home pages: 
In the mobile app, the user needs to sign in to access the services that the app provides. When the user enters email and password automatically he will be redirected to home page. By default, home page shows the random stuff and skills around the user. Also, he can choose the categories of stuff and skills around him.

                                                               
   














4.2.2 Add stuff and skill pages: 

 If the user wants to add new stuff or skill.He can go to add a page by side menu. 


The user can choose from the tab (stuff or skill).If the user chooses stuff then he must fill the following fields name, category, type (returned or unreturned stuff), deadline date if it is returned, details f about it and photo which is either from camera or gallery.  

      


















Another tab choice is “skill”, the user on this page must fill the following fields skill’s name, category, free time (days in week and time) and description.

                       
